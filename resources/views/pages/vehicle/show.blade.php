@extends('layouts.main')

@section('title', 'Detail Kendaraan')

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
                            <div class="form-group">
                                <label>Nama Kendaraan:</label>
                                <p>{{ $vehicle->name }}</p>
                            </div>

                            <div class="form-group">
                                <label>Cabang:</label>
                                <p>{{ $vehicle->branch->name ?? 'Tidak Tersedia' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Status:</label>
                                <p>{{ $vehicle->status }}</p>
                            </div>

                            <div class="form-group">
                                <label>Tipe Muatan:</label>
                                <p>{{ $vehicle->type }}</p>
                            </div>

                            <div class="form-group">
                                <label>Kepemilikan:</label>
                                <p>{{ $vehicle->ownership }}</p>
                            </div>

                            <div class="form-group">
                                <label>Jadwal Perawatan Berikutnya:</label>
                                <p>{{ $vehicle->maintenance_schedule }}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('dashboard::vehicles::monitoring-create',$vehicle) }}" class="btn btn-primary mr-auto">Tambah Monitoring</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Tipe</th>
                                        <th>Volume(liter)</th>
                                        <th>Tanggal</th>
                                    </tr>
                                    @foreach ($monitors as $monitor)
                                        <tr>
                                            <td>{{ $monitor->type }}</td>
                                            <td>{{ $monitor->fuel }}</td>
                                            <td>{{ $monitor->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>
@endsection
