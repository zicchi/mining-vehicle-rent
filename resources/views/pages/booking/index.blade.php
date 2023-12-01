@extends('layouts.main')

@section('title', 'History Pemesanan Kendaraan')

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard::bookings::index') }}" method="GET">
                <div class="row">
                    <div class="col-md-2">
                        <select name="year" class="form-control">
                            <option {{ request('year') == '' ? 'selected' : '' }} value="">Semua Status</option>
                            <option {{ request('year') == 2023 ? 'selected' : '' }} value="2023">2023</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select name="month" class="form-control">
                            <option {{ request('month') == '' ? 'selected' : '' }} value="">Semua Bulan</option>
                            <option {{ request('month') == 1 ? 'selected' : '' }} value="1">Januari</option>
                            <option {{ request('month') == 2 ? 'selected' : '' }} value="2">Februari</option>
                            <option {{ request('month') == 3 ? 'selected' : '' }} value="3">Maret</option>
                            <option {{ request('month') == 4 ? 'selected' : '' }} value="4">April</option>
                            <option {{ request('month') == 5 ? 'selected' : '' }} value="5">Mei</option>
                            <option {{ request('month') == 6 ? 'selected' : '' }} value="6">Juni</option>
                            <option {{ request('month') == 7 ? 'selected' : '' }} value="7">Juli</option>
                            <option {{ request('month') == 8 ? 'selected' : '' }} value="8">Agustus</option>
                            <option {{ request('month') == 9 ? 'selected' : '' }} value="9">September</option>
                            <option {{ request('month') == 10? 'selected' : '' }} value="10">Oktober</option>
                            <option {{ request('month') == 11 ? 'selected' : '' }} value="11">November</option>
                            <option {{ request('month') == 12 ? 'selected' : '' }} value="12">Desember</option>
                        </select>
                    </div>

                    <div class="col-md-1 ml-auto">
                        <button class="btn btn-primary text-white">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('dashboard::bookings::create') }}" class="btn btn-primary">Tambah Pesanan</a>
            <a href="{{ route('dashboard::bookings::export', ['month' => $month, 'year' => $year]) }}" class="btn btn-success">Export to Excel</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Kendaraan</th>
                        <th>Status</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->vehicle->name }}</td>
                            <td>{{ $booking->status }}</td>
                            <td>{{ $booking->booking_date}}</td>
                            <td>
                                <a href="{{ route('dashboard::bookings::show', $booking) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
