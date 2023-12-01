@extends('layouts.main')

@section('title', $driver->id ? 'Edit Driver' : 'Tambah Driver')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ $driver->id ? route('dashboard::drivers::update', $driver) : route('dashboard::drivers::store') }}" method="POST">
                        @csrf
                        @if(isset($driver))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="site_id">Site ID</label>
                            <select name="site_id" id="site_id" class="form-control" required>
                                @foreach ($sites as $site)
                                 <option value="{{$site->id}}" {{$driver->site_id == $site->id ? 'selected' : ''}}>{{$site->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $driver->name ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $driver->phone ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="available" {{$driver->status == 'available' ? 'selected' : ''}}>Available</option>
                                <option value="work" {{$driver->status == 'work' ? 'selected' : ''}}>Sedang Bekerja</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ isset($driver) ? 'Perbarui' : 'Simpan' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
