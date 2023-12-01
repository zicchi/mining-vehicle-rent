@extends('layouts.main')

@section('title', 'Daftar Cabang')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Cabang</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard::branches::create') }}" class="btn btn-primary">Tambah Cabang</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($branches as $branch)
                                <tr>
                                    <td>{{ $branch->id }}</td>
                                    <td>{{ $branch->name }}</td>
                                    <td>
                                        <a href="{{ route('dashboard::branches::show', $branch) }}" class="btn btn-info">Detail</a>
                                        <a href="{{ route('dashboard::branches::edit', $branch) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('dashboard::branches::destroy', $branch) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Hapus</button>
                                        </form>
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
