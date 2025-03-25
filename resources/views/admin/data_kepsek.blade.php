@extends('layout.main')

@section('konten')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data kepsek</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nip</th>
                                    <th>Nuptk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kepseks as $kepsek)
                                    <tr> <!-- Memindahkan <tr> di dalam loop -->
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $kepsek->name }} </td>
                                        <td> {{ $kepsek->jenis_kelamin }} </td>
                                        <td> {{ $kepsek->nip }} </td>
                                        <td> {{ $kepsek->nuptk }} </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editkepsek{{ $kepsek->id }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deletekepsek{{ $kepsek->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @include('modal.update_kepsek')
                                    @include('modal.delete_kepsek')
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nip</th>
                                    <th>Nuptk</th>
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
