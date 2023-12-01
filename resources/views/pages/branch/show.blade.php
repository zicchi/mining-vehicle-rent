@extends('layouts.main')

@section('title', 'Detail Cabang')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Cabang</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Cabang:</label>
                        <p>{{ $branch->name }}</p>
                    </div>

                    <!-- Tabel Data Sites -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Data Tambang</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#siteModal">Tambah Lokasi Tambang</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                        <tr>
                                            <th>Nama Tambang</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @foreach ($branch->sites as $site)
                                            <tr>
                                                <td>{{ $site->name }}</td>
                                                <td>
                                                    <form action="{{ route('dashboard::branches::sites::destroy', ['branch' => $branch->id, 'site' => $site->id]) }}" method="POST" style="display: inline-block;">
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
            </div>
        </div>
    </section>

    <div class="modal fade" id="siteModal" tabindex="-1" role="dialog" aria-labelledby="siteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="siteModalForm" action="{{ route('dashboard::branches::sites::store', $branch) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" id="siteModalMethod" value="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="siteModalLabel">Tambah Site</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="site-name">Nama Site</label>
                            <input type="text" class="form-control" id="site-name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
