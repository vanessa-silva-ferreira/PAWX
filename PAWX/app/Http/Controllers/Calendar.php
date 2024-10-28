<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function navigate(Request $request)
    {
        $monthChange = $request->input('monthChange');
        $selectedDate = session('selected_date', now());

        // Adjust month and year based on user input
        $month = $selectedDate->month + $monthChange;
        $year = $selectedDate->year;

        // Handle month overflow
        if ($month < 1) {
            $month = 12;
            $year--;
        } elseif ($month > 12) {
            $month = 1;
            $year++;
        }

        // Update the selected date in session
        session(['selected_date' => \Carbon\Carbon::createFromDate($year, $month, 1)]);
        return back(); // Redirect back to the previous page
    }

    public function selectDay(Request $request)
    {
        $day = $request->input('day');
        session(['selected_day' => $day]); // Store the selected day in session
        return back(); // Redirect back to the previous page
    }
}
