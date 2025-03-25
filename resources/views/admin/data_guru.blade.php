@extends('layout.main')

@section('konten')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Guru</h4>
                    </div>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahguru">
                        Tambah Guru
                    </button>
                    @include('modal.tambah_guru')

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nip</th>
                                    <th>Gambar</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gurus as $guru)
                                    <tr> <!-- Memindahkan <tr> di dalam loop -->
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $guru->name }} </td>
                                        <td> {{ $guru->jenis_kelamin }} </td>
                                        <td> {{ $guru->nip }} </td>
                                        <td>
                                            <a href="" data-bs-toggle="modal"
                                                data-bs-target="#lihatgambar{{ $guru->id }}">lihat gambar</a>
                                        </td>
                                        <td> {{ $guru->mata_pelajaran }} </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editguruModal{{ $guru->id }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteguruModal{{ $guru->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @include('modal.lihat_qr_code')
                                    @include('modal.update_guru')
                                    @include('modal.delete_guru')
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nip</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
