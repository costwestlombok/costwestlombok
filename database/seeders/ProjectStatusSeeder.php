<?php

namespace Database\Seeders;

use App\Models\ProjectStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks=0');
        ProjectStatus::truncate();
        DB::statement('SET foreign_key_checks=1');

        ProjectStatus::create([
            'code' => 'identification',
        ]);
        ProjectStatus::create([
            'code' => 'preparation',
        ]);
        ProjectStatus::create([
            'code' => 'implementation',
        ]);
        ProjectStatus::create([
            'code' => 'completion',
        ]);
        ProjectStatus::create([
            'code' => 'completed',
        ]);
        ProjectStatus::create([
            'code' => 'cancelled',
        ]);
    }
}
