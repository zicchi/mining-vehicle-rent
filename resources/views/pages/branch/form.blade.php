@extends('layouts.main')

@section('title', $branch->id ? 'Edit Cabang' : 'Tambah Cabang')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $branch->id ? 'Edit Cabang' : 'Tambah Cabang' }}</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ $branch->id ? route('dashboard::branches::update', $branch) : route('dashboard::branches::store') }}" method="POST">
                        @csrf
                        @if($branch->id)
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="name">Nama Cabang</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $branch->name ?? '') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ $branch->id ? 'Update' : 'Simpan' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
