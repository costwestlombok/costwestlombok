<?php

namespace App\Services;

use App\Models\Project;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProjectExcelImportService
{
    public function import(string $filePath): array
    {
        $spreadsheet = IOFactory::load($filePath);
        $imported = 0;
        $updated = 0;
        $skipped = 0;

        foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
            $rowData = $this->extractSheetData($sheet);
            $projectData = $this->mapProjectData($rowData);

            if (!$projectData['project_code'] && !$projectData['project_title']) {
                $skipped++;
                continue;
            }

            $existing = null;
            if ($projectData['project_code']) {
                $existing = Project::where('project_code', $projectData['project_code'])->first();
            }

            if ($existing) {
                $existing->update($projectData);
                $updated++;
                continue;
            }

            Project::create($projectData);
            $imported++;
        }

        return [
            'imported' => $imported,
            'updated' => $updated,
            'skipped' => $skipped,
        ];
    }

    private function extractSheetData(Worksheet $sheet): array
    {
        $data = [];
        $maxRow = $sheet->getHighestDataRow();

        for ($row = 1; $row <= $maxRow; $row++) {
            $leftLabel = $this->getCellFormattedValue($sheet, 3, $row);
            $leftValue = $this->getCellFormattedValue($sheet, 4, $row);
            $rightLabel = $this->getCellFormattedValue($sheet, 7, $row);
            $rightValue = $this->getCellFormattedValue($sheet, 8, $row);

            if ($leftLabel !== '') {
                $normalizedLeftLabel = $this->normalizeLabel($leftLabel);
                if (!array_key_exists($normalizedLeftLabel, $data) || $data[$normalizedLeftLabel] === '') {
                    $data[$normalizedLeftLabel] = $leftValue;
                }
            }

            if ($rightLabel !== '') {
                $normalizedRightLabel = $this->normalizeLabel($rightLabel);
                if (!array_key_exists($normalizedRightLabel, $data) || $data[$normalizedRightLabel] === '') {
                    $data[$normalizedRightLabel] = $rightValue;
                }
            }
        }

        return $data;
    }

    private function mapProjectData(array $data): array
    {
        $projectCode = $this->getByCandidate($data, [
            'nomorrefrensi',
            'nomorreferensi',
        ]);

        $projectTitle = $this->getByCandidate($data, [
            'namaproyek',
        ]);

        $purpose = $this->getByCandidate($data, [
            'tujuan',
        ]);
        $overview = $this->getByCandidate($data, [
            'gambaranproyek',
        ]);

        $description = trim(implode("\n\n", array_filter([$purpose, $overview])));

        $projectScope = $this->getByCandidate($data, [
            'lingkupproyekoutpututama',
            'lingkupkerja',
        ]);

        $startDate = null;
        $endDate = null;

        $contractPeriod = $this->getByCandidate($data, [
            'tanggalmulaisertalamakontrak',
        ]);
        if ($contractPeriod) {
            [$startDate, $endDate] = $this->parsePeriod($contractPeriod);
        }

        if (!$endDate) {
            $endDate = $this->parseDateString($this->getByCandidate($data, [
                'tanggalselesaiproyeksi',
            ]));
        }

        $approvedDate = $this->parseDateString($this->getByCandidate($data, [
            'tanggalpersetujuananggaranproyek',
        ]));

        $publishedDate = $this->parseDateString($this->getByCandidate($data, [
            'tanggal',
        ]));

        $budget = $this->parseNumeric($this->getByCandidate($data, [
            'anggaranproyek',
            'biayasaatselesaiproyeksi',
            'hargakontrak',
        ]));

        $duration = null;
        if ($startDate && $endDate) {
            $duration = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;
        }

        return [
            'project_code' => $projectCode ?: null,
            'project_title' => $projectTitle ?: null,
            'project_description' => $description ?: null,
            'project_location' => $this->getByCandidate($data, ['lokasiproyek']) ?: null,
            'project_scope' => $projectScope ?: null,
            'environment_desc' => $this->getByCandidate($data, ['dampaklingkungan']) ?: null,
            'settlement_desc' => $this->getByCandidate($data, ['dampakterhadaplahandanpermukiman']) ?: null,
            'budget' => $budget,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'duration' => $duration,
            'date_of_approved' => $approvedDate,
            'date_of_publication' => $publishedDate,
        ];
    }

    private function getByCandidate(array $data, array $candidates): ?string
    {
        foreach ($candidates as $candidate) {
            if (array_key_exists($candidate, $data) && $data[$candidate] !== '') {
                return $data[$candidate];
            }
        }

        return null;
    }

    private function parsePeriod(string $value): array
    {
        $clean = preg_replace('/\s+/', ' ', trim($value));
        if (!$clean) {
            return [null, null];
        }

        if (preg_match('/(\d{1,2}\s+[A-Za-z]+)\s*-\s*(\d{1,2}\s+[A-Za-z]+\s+\d{4})/u', $clean, $matches)) {
            $end = $this->parseDateString($matches[2]);
            if ($end) {
                $endYear = Carbon::parse($end)->year;
                $start = $this->parseDateString($matches[1].' '.$endYear);
                return [$start, $end];
            }
        }

        return [null, null];
    }

    private function parseDateString(?string $value): ?string
    {
        if (!$value) {
            return null;
        }

        $clean = strtolower(trim($value));
        $months = [
            'januari' => 'january',
            'februari' => 'february',
            'maret' => 'march',
            'april' => 'april',
            'mei' => 'may',
            'juni' => 'june',
            'juli' => 'july',
            'agustus' => 'august',
            'september' => 'september',
            'oktober' => 'october',
            'november' => 'november',
            'desember' => 'december',
        ];

        $translated = strtr($clean, $months);
        $translated = preg_replace('/\s+/', ' ', $translated);
        if (!$translated) {
            return null;
        }

        try {
            return Carbon::parse($translated)->format('Y-m-d H:i:s');
        } catch (\Throwable $th) {
            return null;
        }
    }

    private function parseNumeric(?string $value): ?float
    {
        if (!$value) {
            return null;
        }

        if (is_numeric($value)) {
            return (float) $value;
        }

        $clean = preg_replace('/[^0-9,.\-]/', '', $value);
        if (!$clean) {
            return null;
        }

        if (substr_count($clean, ',') > 0 && substr_count($clean, '.') > 0) {
            $clean = str_replace('.', '', $clean);
            $clean = str_replace(',', '.', $clean);
        } else {
            $clean = str_replace(',', '', $clean);
        }

        return is_numeric($clean) ? (float) $clean : null;
    }

    private function normalizeLabel(string $value): string
    {
        $value = strtolower($value);
        $value = preg_replace('/\(.+?\)/', '', $value);
        $value = preg_replace('/[^a-z0-9]/', '', $value);

        return $value ?? '';
    }

    private function cleanString($value): string
    {
        if ($value === null) {
            return '';
        }

        return trim((string) $value);
    }

    private function getCellFormattedValue(Worksheet $sheet, int $column, int $row): string
    {
        $cellAddress = Coordinate::stringFromColumnIndex($column).$row;

        return $this->cleanString($sheet->getCell($cellAddress)->getFormattedValue());
    }
}
