<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookingsExport implements FromView
{
    protected $year, $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function view(): View
    {
        $bookings = Booking::query()
                        ->when($this->year, function ($query) {
                            return $query->whereYear('booking_date', $this->year);
                        })
                        ->when($this->month, function ($query) {
                            return $query->whereMonth('booking_date', $this->month);
                        })
                        ->get();

        return view('exports.bookings', [
            'bookings' => $bookings,
            'month' => $this->month,
            'year' => $this->year,
        ]);
    }
}


