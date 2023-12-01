<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\VehicleMonitoring;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        $selected_vehicle = $request->input('vehicle');

        $vehicle_monitoring = VehicleMonitoring::where('vehicle_id',$selected_vehicle)->where('type','fuel-usage')->get();
        $vehicles = Vehicle::when(auth()->user()->branch_id > 1, function ($query) {
                        return $query->where('branch_id', auth()->user()->branch_id);
                    })->get();
        if ($user->level == 'branch_manager') {
            $bookings = Booking::where('status','first_approval')
                                ->where('branch_manager',$user->id)
                                ->get();
        } elseif($user->level == 'site_manager') {
            $bookings = Booking::where('status','pending')
            ->where('site_manager',$user->id)
            ->get();
        }else{
            $bookings = null;
        }

        return view('pages.dashboard',[
            'bookings' => $bookings,
            'vehicles' => $vehicles,
            'selected_vehicle' => $selected_vehicle,
            'vehicle_monitoring' => $vehicle_monitoring,
        ]);
    }
}
