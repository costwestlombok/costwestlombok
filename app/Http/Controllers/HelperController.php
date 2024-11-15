<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;

class HelperController extends Controller
{
    public function duration()
    {
        ini_set('max_execution_time', '-1');
        ini_set('memory_limit', '-1');

        foreach (Project::all() as $a) {
            if ($a->start_date && $a->end_date) {
                $start = Carbon::parse($a->start_date);
                $end = Carbon::parse($a->end_date);
                $a->duration = $start->diffInDays($end) + 1;
            } else {
                $a->duration = null;
            }
            $a->save();
        }
    }
}
