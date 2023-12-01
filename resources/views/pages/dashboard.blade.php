@extends('layouts.main')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Jumlah Kendaraan</div>
                        <div class="card-body text-large">
                            <h3>{{$vehicles->count()}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Jumlah Kendaraan yang sedang digunakan</div>
                        <div class="card-body text-large">
                            <h3>{{$vehicles->where('status','Sedang Digunakan')->count()}}</h3>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Jumlah Kendaraan yang sedang dalam perawatan</div>
                        <div class="card-body text-large">
                            <h3>{{$vehicles->where('status','Dalam Perawatan')->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>
           @if ($bookings)
           <div class="row">
           <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Menunggu Persetujuan Sewa
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
                            @if ($bookings->count() > 0)
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
                            @else
                                    <tr>
                                       <td colspan="4" class="text-center">Tidak ada sewa yang belum disetujui</td>
                                    </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
           </div>
           <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('dashboard::dashboard') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="vehicle" class="form-control">
                                            @foreach ($vehicles as $vehicle)
                                                <option {{ request('vehicle') == $selected_vehicle ? 'selected' : '' }} value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2 ml-auto">
                                        <button class="btn btn-primary text-white">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <canvas id="chart"></canvas>
                </div>
            </div>
           </div>
        </div>
           @endif
        </div>
    </section>
@endsection

@push('bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js" integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var ctx = document.getElementById('chart');
        var chart = new Chart(ctx, {
            data: {
                labels: [{!! collect($vehicle_monitoring)->pluck('created_at')->map(function($date) { return "'".$date."'"; })->join(',') !!}],
                datasets: [
                    {
                        type: 'line',
                        label: "Konsumsi Bensin",
                        data: [{{ collect($vehicle_monitoring)->pluck('fuel')->map(function($item) { return floor($item); })->join(',') }}],
                        backgroundColor: '#00b8ff',
                        borderColor: '#00b8ff',
                        tension: 0
                    },
                ]

            },
            options: {
                scales: {
                    xAxes:[{
                        gridLines: {
                            display: false,
                        }
                    }],
                }
            }
        })
    </script>
@endpush
