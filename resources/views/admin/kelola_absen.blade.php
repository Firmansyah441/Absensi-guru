@extends('layout.polosan')

@section('konten')
    @if ($tapel && $tapel->status === 'aktif')
        <div class="card mt-4 border-0 border-start border-primary border-4">
            <div class="card-body">
                <p><strong>Tahun Pelajaran</strong>: {{ $tapel->tahun_ajaran }}</p>
                <p><strong>Semester</strong>: {{ $tapel->semester }}</p>
                <p><strong>Tanggal Efektif</strong>: {{ \Carbon\Carbon::parse($tapel->tanggal_mulai)->format('d F Y') }} -
                    {{ \Carbon\Carbon::parse($tapel->tanggal_selesai)->format('d F Y') }}</p>
            </div>
        </div>

        <div class="card mt-4 border border-4">
            <div class="card-body">
                <div class="row">
                    @php
                        $tanggalMulai = new DateTime($tapel->tanggal_mulai);
                        $tanggalSelesai = new DateTime($tapel->tanggal_selesai);
                    @endphp
                    @while ($tanggalMulai <= $tanggalSelesai)
                        <div class="col-md-3">
                            <a href="/admin/tabel_absen?month={{ $tanggalMulai->format('m') }}&year={{ $tanggalMulai->format('Y') }}"
                                class="text-decoration-none">
                                <div class="card mt-4 border-4 shadow-sm card-hover">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="bi bi-calendar-check me-2"></i>
                                        <h5 class="card-title mb-0 text-dark">{{ $tanggalMulai->format('F Y') }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @php
                            $tanggalMulai->modify('+1 month');
                            if ($tanggalMulai > $tanggalSelesai) {
                                break;
                            }
                        @endphp
                    @endwhile
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Tahun Pelajaran Belum Aktif</h4>
                    <p>Silakan aktifkan tahun pelajaran terlebih dahulu.</p>
                    <hr>
                    <p class="mb-0">Untuk informasi lebih lanjut, silakan hubungi admin.</p>
                </div>
            </div>
        </div>
        </div>
    @endif
    <style>
        .card-hover:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
    </style>
@endsection
