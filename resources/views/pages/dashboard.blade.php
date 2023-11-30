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
                        <div class="card-header">Jumlah Pengguna</div>
                        <div class="card-body text-large">
                            <h3>3</h3>
                        </div>
                        <div class="card-footer text-muted text-center"><i>Total jumlah pengguna sampai
                                {{ now()->format('d, M Y') }}</i></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Jumlah Pemesanan</div>
                        <div class="card-body text-large">
                            <h3>5</h3>
                        </div>
                        <div class="card-footer text-muted text-center"><i>Total jumlah pemesanan sampai
                                {{ now()->format('d, M Y') }}</i></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Jumlah Produk</div>
                        <div class="card-body text-large">
                            <h3>2</h3>
                        </div>
                        <div class="card-footer text-muted text-center"><i>Total jumlah produk sampai
                                {{ now()->format('d, M Y') }}</i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </section>
@endsection
