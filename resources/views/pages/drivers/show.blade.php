@extends('layouts.main')

@section('title', 'Detail Driver')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Detail Driver</h1>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama:</label>
                <p>{{ $driver->name }}</p>
            </div>
            <div class="form-group">
                <label>Telepon:</label>
                <p>{{ $driver->phone }}</p>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <p>{{ $driver->status }}</p>
            </div>
        </div>
    </div>
@endsection
