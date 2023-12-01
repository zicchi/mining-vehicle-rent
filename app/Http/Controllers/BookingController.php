<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        $bookings = Booking::when($month, function ($query) use ($month) {
                    return $query->whereMonth('booking_date', $month);
                })
                ->when($year, function ($query) use ($year) {
                    return $query->whereYear('booking_date', $year);
                })
                ->get();


        return view('pages.booking.index', compact('bookings', 'month', 'year'));
    }

    public function create()
    {
        $vehicles = Vehicle::when(auth()->user()->branch_id > 1, function ($query) {
                return $query->where('branch_id', auth()->user()->branch_id);
            })->get();
        $user = auth()->user();
        if ($user->branch_id == 1) {
            $drivers = Driver::all();
            $smanagers = User::where('level','site_manager')->get();
            $bmanagers = User::where('level','branch_manager')->get();
        }else{
            $drivers = Driver::where('site_id',$user->site_id)->get();
            $smanagers = User::where('level','site_manager')
                ->where('site_id',$user->site_id)
                ->get();
            $bmanagers = User::where('level','branch_manager')
                ->where('branch_id',$user->branch_id)
                ->get();
        }

        return view('pages.booking.form', compact('vehicles','drivers','smanagers','bmanagers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_id' => 'required',
            'booking_date' => 'required',
            'driver_id' => 'required',
            'site_manager' => 'required',
            'branch_manager' => 'required',
        ]);

        $booking = Booking::create($validatedData);
        $booking->save();

        return redirect()->route('dashboard::bookings::index')->with('success', 'Pemesanan berhasil ditambahkan.');
    }

    public function show(Booking $booking)
    {
        return view('pages.booking.show',[
            'booking' => $booking
        ]);
    }

    public function approve(Booking $booking)
    {
        $user = auth()->user();
        if($user->level == 'site_manager'){
            $booking->status = 'first_approval';
        }else{
            $booking->status = 'approved';
        }

        $booking->save();
        return redirect()->route('dashboard::bookings::show',$booking)->with('success', 'Pemesanan disetujui.');
    }
}
