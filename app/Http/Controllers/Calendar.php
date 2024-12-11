<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function navigate(Request $request)
    {
        $monthChange = $request->input('monthChange');
        $selectedDate = session('selected_date', now());

        $month = $selectedDate->month + $monthChange;
        $year = $selectedDate->year;

        if ($month < 1) {
            $month = 12;
            $year--;
        } elseif ($month > 12) {
            $month = 1;
            $year++;
        }

        session(['selected_date' => Carbon::createFromDate($year, $month, 1)]);
        return back();
    }

    public function selectDay(Request $request)
    {
        $day = $request->input('day');
        session(['selected_day' => $day]);
        return back();
    }
}
