@extends('layouts.main')

@section('title','Tambah Pesanan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pesanan</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard::bookings::store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="vehicle_id">Kendaraan</label>
                            <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="driver_id">Driver</label>
                            <select name="driver_id" id="driver_id" class="form-control" required>
                                @foreach ($drivers as $driver)
                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="site_manager">Site Manager</label>
                            <select name="site_manager" id="site_manager" class="form-control" required>
                                @foreach ($smanagers as $sm)
                                    <option value="{{$sm->id}}">{{$sm->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="branch_manager">Branch Manager</label>
                            <select name="branch_manager" id="branch_manager" class="form-control" required>
                                @foreach ($bmanagers as $bm)
                                    <option value="{{$bm->id}}">{{$bm->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="booking_date">Tanggal Pemesanan</label>
                            <input type="date" name="booking_date" id="booking_date" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
