@extends('layouts.main')

@section('title', $vehicle->id ? 'Edit Kendaraan' : 'Tambah Kendaraan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ $vehicle->id ? route('dashboard::vehicles::update', $vehicle) : route('dashboard::vehicles::store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($vehicle)
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="name">Nama Kendaraan</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $vehicle->name ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="branch_id">Cabang</label>
                            <select class="form-control" id="branch_id" name="branch_id">
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ ($vehicle && $vehicle->branch_id == $branch->id) ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="available" {{ ($vehicle && $vehicle->status == 'available') ? 'selected' : '' }}>Tersedia</option>
                                <option value="booked" {{ ($vehicle && $vehicle->status == 'booked') ? 'selected' : '' }}>Booked</option>
                                <option value="maintenance" {{ ($vehicle && $vehicle->status == 'maintenance') ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Tipe Muatan</label>
                            <select class="form-control" id="type" name="type">
                                <option value="goods" {{ ($vehicle && $vehicle->type == 'goods') ? 'selected' : '' }}>Muatan Barang</option>
                                <option value="people" {{ ($vehicle && $vehicle->type == 'people') ? 'selected' : '' }}>Muatan Manusia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ownership">Kepemilikan</label>
                            <select class="form-control" id="ownership" name="ownership">
                                <option value="company" {{ ($vehicle && $vehicle->ownership == 'company') ? 'selected' : '' }}>Milik Perusahaan</option>
                                <option value="rent" {{ ($vehicle && $vehicle->ownership == 'rent') ? 'selected' : '' }}>Sewa</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ $vehicle ? 'Update' : 'Simpan' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
