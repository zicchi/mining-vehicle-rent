<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Vehicle;
use App\Models\VehicleMonitoring;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request){
        $vehicles = Vehicle::with('branch')
            ->when($request->input('search'), function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->when($request->input('branch'), function ($query, $branchId) {
                return $query->whereHas('branch', function ($query) use ($branchId) {
                    $query->where('id', $branchId);
                });
            })
            ->when(auth()->user()->branch_id > 1, function ($query) {
                return $query->where('branch_id', auth()->user()->branch_id);
            })
            ->when($request->input('status'), function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($request->input('type'), function ($query, $type) {
                return $query->where('type', $type);
            })->when($request->input('ownership'), function ($query, $ownership) {
                return $query->where('ownership', $ownership);
            })->paginate(10);

        $branches = Branch::all();
        return view('pages.vehicle.index',[
            'vehicles' => $vehicles,
            'branches' => $branches,
        ]);
    }

    public function create(){
        return view('pages.vehicle.form',[
            'vehicle' => new Vehicle(),
            'branches' => Branch::all(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        $vehicle = new Vehicle($request->all());
        $vehicle->save();

        return redirect()->route('dashboard::vehicles::index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function show(Vehicle $vehicle){
        return view('pages.vehicle.show',[
            'vehicle' => $vehicle,
            'monitors' => $vehicle->monitors,
        ]);
    }

    public function edit(Vehicle $vehicle){
        $branches = Branch::all();
        return view('pages.vehicle.form',[
            'vehicle' => $vehicle,
            'branches' => $branches,
        ]);
    }

    public function update(Request $request, Vehicle $vehicle){
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'status' => 'required',
            'ownership' => 'required'
        ]);

        $vehicle->update($request->all());

        return redirect()->route('dashboard::vehicles::index')->with('success', 'Kendaraan berhasil diperbarui.');
    }

    public function monitoringCreate(Vehicle $vehicle){
        return view('pages.monitoring.form',[
            'vehicle' => $vehicle
        ]);
    }

    public function monitoringStore(Request $request, Vehicle $vehicle){
        $monitoring = new VehicleMonitoring();
        $monitoring->vehicle_id = $vehicle->id;
        $monitoring->type = $request->input('type');
        $monitoring->fuel = $request->input('fuel');
        $monitoring->save();

        return redirect()->route('dashboard::vehicles::show',$vehicle)->with('success', 'Kendaraan berhasil diperbarui.');
    }
}
