@extends('layouts.main')

@section('title', 'Detail Pesanan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Kendaraan</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            @if (auth()->user()->level == 'site_manager' && $booking->status == 'pending' )
                                <a href="{{route('dashboard::bookings::approve',$booking)}}" class="btn btn-success">Approve</a>
                            @elseif (auth()->user()->level == 'branch_manager' && $booking->status == 'first_approval')
                                <a href="{{route('dashboard::bookings::approve',$booking)}}" class="btn btn-success">Approve</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kendaraan:</label>
                                <p>{{ $booking->vehicle->name }}</p>
                            </div>

                            <div class="form-group">
                                <label>Cabang:</label>
                                <p>{{ $booking->vehicle->branch->name ?? 'Tidak Tersedia' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Driver:</label>
                                <p>{{ $booking->driver->name }}</p>
                            </div>

                            <div class="form-group">
                                <label>Status:</label>
                                <p>{{ $booking->getStatusTextAttribute() }}</p>
                            </div>

                            <div class="form-group">
                                <label>Persetujuan Site Manager:</label>
                                <p>{{ $booking->siteManagerApprover->name }}</p>
                            </div>

                            <div class="form-group">
                                <label>Persetujuan Branch Manager:</label>
                                <p>{{ $booking->branchManagerApprover->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
