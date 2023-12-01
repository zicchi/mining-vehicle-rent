<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('pages.drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('pages.drivers.form', [
            'driver' => new Driver(),
            'sites' => auth()->user()->branch->sites,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'site_id' => 'required|exists:sites,id',
            'name' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        Driver::create($validatedData);

        return redirect()->route('dashboard::drivers::index')->with('success', 'Driver berhasil ditambahkan.');
    }

    public function show(Driver $driver)
    {
        return view('pages.drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        return view('pages.drivers.form', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $validatedData = $request->validate([
            'site_id' => 'required|exists:sites,id',
            'name' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        $driver->update($validatedData);

        return redirect()->route('dashboard::drivers::index')->with('success', 'Driver berhasil diperbarui.');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()->route('dashboard::drivers::index')->with('success', 'Driver berhasil dihapus.');
    }
}

