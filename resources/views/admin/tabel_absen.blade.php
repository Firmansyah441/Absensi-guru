@extends('layout.polosan')

@section('konten')
    <style>
        .bg-weekend {
            background-color: red !important;
            color: white !important;
            font-weight: bold;
        }

        .bg-holiday {
            background-color: #ffcc00 !important;
            color: black !important;
            font-weight: bold;
        }
    </style>

    <a href="/kelola_absen" class="btn mt-2">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    @foreach ($tapels as $item)
        <div class="card mt-2 border-0 border-start border-primary border-4">
            <div class="card-body">
                <p><strong>Tahun Pelajaran</strong>: {{ $item->tahun_ajaran }}</p>
                <p><strong>Semester</strong>: {{ $item->semester }}</p>
                <p><strong>Tanggal Efektif</strong>: {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }} -
                    {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d F Y') }}</p>
            </div>
        </div>
    @endforeach

    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Absen Cuyy</h4>
                    </div>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                        data-bs-target="#tambahabsen">
                        Tambah Absen
                    </button>
                    @include('modal.tambah_absen')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Guru</th>
                                    <th>NIP/NUPTK</th>
                                    <th>L/P</th>
                                    @foreach ($dates as $date)
                                        @php
                                            $dayOfWeek = \Carbon\Carbon::parse($date)->dayOfWeek;
                                            $isWeekend = $dayOfWeek == 6 || $dayOfWeek == 0;
                                            $holiday =
                                                $liburs->firstWhere('tanggal_mulai', '<=', $date) &&
                                                $liburs->firstWhere('tanggal_selesai', '>=', $date);
                                            $holidayName = $holiday
                                                ? $liburs
                                                    ->firstWhere('tanggal_mulai', '<=', $date)
                                                    ->where('tanggal_selesai', '>=', $date)->nama_libur
                                                : '';
                                        @endphp
                                        <th class="{{ $isWeekend ? 'bg-weekend' : '' }} {{ $holiday ? 'bg-holiday' : '' }}"
                                            @if ($holiday) title="{{ $holidayName }}" data-bs-toggle="tooltip" @endif>
                                            {{ \Carbon\Carbon::parse($date)->format('d') }}<br>
                                            {{ \Carbon\Carbon::parse($date)->format('D') }}
                                        </th>
                                    @endforeach
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($gurus as $guru)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $guru->name }}</td>
                                        <td>{{ $guru->nip . '/' . $guru->nuptk }}</td>
                                        <td>{{ $guru->jenis_kelamin }}</td>
                                        @foreach ($dates as $date)
                                            @php
                                                $attendance = $guru->absens->where('tanggal', $date)->first();
                                            @endphp
                                            <td>
                                                @if ($attendance)
                                                    <span
                                                        class="badge
                                                    @if ($attendance->status == 'hadir') bg-success
                                                    @elseif ($attendance->status == 'alfa') bg-danger
                                                    @elseif ($attendance->status == 'izin') bg-warning
                                                    @elseif ($attendance->status == 'sakit') bg-info @endif"
                                                        data-bs-toggle="modal" data-bs-target="#detailAbsenModal"
                                                        data-guru-name="{{ $guru->name }}"
                                                        data-tanggal="{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}"
                                                        data-jam-masuk="{{ $attendance->jam_masuk }}"
                                                        data-jam-keluar="{{ $attendance->jam_keluar }}"
                                                        data-status="{{ ucfirst($attendance->status) }}">
                                                        {{ strtoupper(substr($attendance->status, 0, 1)) }}
                                                    </span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        @endforeach
                                        <td>{{ $guru->total_hadir }}</td>
                                    </tr>
                                    @include('modal.detail_absen')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endsection
