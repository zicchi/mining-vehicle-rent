@extends('layouts.main')

@section('title', 'Daftar Driver')

@section('content')
    <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('dashboard::drivers::create') }}" class="btn btn-primary">Tambah Driver</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Telepon</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($drivers as $driver)
                                    <tr>
                                        <td>{{ $driver->id }}</td>
                                        <td>{{ $driver->name }}</td>
                                        <td>{{ $driver->site->name }}</td>
                                        <td>{{ $driver->phone }}</td>
                                        <td>{{ $driver->status }}</td>
                                        <td>
                                            <a href="{{ route('dashboard::drivers::show', $driver) }}" class="btn btn-info">Detail</a>
                                            @if (auth()->user()->branch_id == 1)
                                            <a href="{{ route('dashboard::drivers::edit', $driver) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('dashboard::drivers::destroy', $driver) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Hapus</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
