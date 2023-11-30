@extends('layouts.main')

@section('title')
    Kendaraan
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
        </div>

        <div class="section-body">

            <div class="card">
               <div class="card-body">
                <form action="{{ route('dashboard::vehicles::index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
                        </div>

                        <div class="col-md-2">
                        <select name="branch" class="form-control">
                            <option value="">Semua Cabang</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ request('branch') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="col-md-2">
                            <select name="status" class="form-control">
                                <option value="">Semua Status</option>
                                <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                                <option value="booked" {{ request('status') == 'booked' ? 'selected' : '' }}>Booked</option>
                                <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="type" class="form-control">
                                <option value="">Semua Tipe Muatan</option>
                                <option value="goods" {{ request('type') == 'goods' ? 'selected' : '' }}>Muatan Barang</option>
                                <option value="people" {{ request('type') == 'people' ? 'selected' : '' }}>Muatan Manusia</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="ownership" class="form-control">
                                <option value="">Semua Jenis Kepemilikan</option>
                                <option value="company" {{ request('ownership') == 'company' ? 'selected' : '' }}>Milik Perusahaan</option>
                                <option value="rent" {{ request('ownership') == 'rent' ? 'selected' : '' }}>Sewa</option>
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
                    <a href="{{ route('dashboard::vehicles::create') }}" class="btn btn-primary mr-auto">Tambah Kendaraan</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Status</th>
                                <th>Operasi</th>
                            </tr>
                            @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>
                                        {{$vehicle->name}}
                                        @if ($vehicle->ownership === 'rent')
                                            <span class="badge badge-info">Rental</span>
                                        @endif
                                    </td>
                                    <td>{{ $vehicle->type }}</td>
                                    <td>
                                        @php
                                            $badgeClass = '';
                                            switch ($vehicle->status) {
                                                case 'Tersedia':
                                                    $badgeClass = 'badge-success';
                                                    break;
                                                case 'Sedang Digunakan':
                                                    $badgeClass = 'badge-warning';
                                                    break;
                                                case 'Dalam Perawatan':
                                                    $badgeClass = 'badge-danger';
                                                    break;
                                            }
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">{{ $vehicle->status }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard::vehicles::show', $vehicle) }}" class="btn btn-link">Lihat</a>
                                        <a href="{{ route('dashboard::vehicles::edit', $vehicle) }}" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            {{ $vehicles->appends(Request::all())->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
