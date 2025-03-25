@extends('layout.polosan')

@section('konten')
    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tahun Ajaran</h4>
                    </div>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahTapel">
                        Tambah Tapel
                    </button>
                    @include('modal.tambah_tapel')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Semester</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Status</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tapels as $tapel)
                                    <tr>
                                        <td>{{ $tapel->id }}</td>
                                        <td>{{ $tapel->semester }}</td>
                                        <td>{{ $tapel->tahun_ajaran }}</td>
                                        <td>
                                            @if ($tapel->status == 'aktif')
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>{{ $tapel->tanggal_mulai }}</td>
                                        <td>{{ $tapel->tanggal_selesai }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editTapel{{ $tapel->id }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteTapel{{ $tapel->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @include('modal.update_tapel')
                                    @include('modal.delete_tapel')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
