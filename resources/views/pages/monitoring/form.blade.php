@extends('layouts.main')

@section('title','Tambah Monitoring Kendaraan '.$vehicle->name)

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard::vehicles::monitoring-store',$vehicle) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="type">Tipe Monitoring</label>
                            <select name="type" id="type" class="form-control">
                                <option value="fuel-refill">Pengisian Bahan Bakar</option>
                                <option value="fuel-usage">Penggunaan Bahan Bakar</option>
                                <option value="maintenance">Perawatan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fuel">Jumlah Bensin</label>
                            <input type="number" class="form-control" id="fuel" name="fuel" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
