<?php

namespace App\View\Components\dashboard;

use Carbon\Carbon;
use Illuminate\View\Component;

class calendar extends Component
{
    public $selectedDate;
    public $selectedDay;

    public function __construct()
    {
        // Get the selected date from the session or default to current date
        $this->selectedDate = session('selected_date', now());
        $this->selectedDay = session('selected_day', $this->selectedDate->day);
    }

    public function navigate($monthChange)
    {
        // Adjust month and year based on user input
        $month = $this->selectedDate->month + $monthChange;
        $year = $this->selectedDate->year;

        // Handle month overflow
        if ($month < 1) {
            $month = 12;
            $year--;
        } elseif ($month > 12) {
            $month = 1;
            $year++;
        }

        // Update the selected date in session
        session(['selected_date' => Carbon::createFromDate($year, $month, 1)]);
    }

    public function selectDay($day)
    {
        // Store the selected day in session
        session(['selected_day' => $day]);
    }

    public function render()
    {
        return view('components.dashboard.calendar', [
            'month' => $this->selectedDate->month,
            'year' => $this->selectedDate->year,
            'daysInMonth' => cal_days_in_month(CAL_GREGORIAN, $this->selectedDate->month, $this->selectedDate->year),
            'firstDayOfMonth' => date('w', strtotime($this->selectedDate->format('Y-m-01'))), // Adjust for Sunday as 0
        ]);
    }
}
