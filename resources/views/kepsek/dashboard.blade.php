@extends('layout.kepsek')

@section('konten')
<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Halo, Kepsek!</h1>
                        <p>Ayo mulai Rekap kehadiran Guru.</p>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-header-img">
        <img src="{{ asset('img/top-header.png') }}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
    </div>
</div>

<!-- Bagian Kartu Rekap Absensi Guru -->
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Kartu Ringkasan Kehadiran Bulan Ini -->
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Kehadiran Bulan Ini</h5>
                    <p class="card-text">Total kehadiran guru sepanjang bulan ini.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fs-4">{{ $monthlyAttendanceCount }}</span>
                        <i class="fas fa-calendar-check fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Grafik Kehadiran -->
        <div class="col-md-4">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <h5 class="card-title">Grafik Kehadiran</h5>
                    <p class="card-text">Lihat tren kehadiran guru setiap minggu.</p>
                    <canvas id="attendanceChart"></canvas> <!-- Grafik kehadiran dengan Chart.js -->
                </div>
            </div>
        </div>

        <!-- Kartu Rekap Sakit & Izin Mingguan -->
        <div class="col-md-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Rekap Sakit & Izin</h5>
                    <p class="card-text">Total sakit dan izin minggu ini.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p>Sakit: {{ $weeklySickCount }}</p>
                            <p>Izin: {{ $weeklyLeaveCount }}</p>
                        </div>
                        <i class="fas fa-user-injured fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Laporan Kehadiran -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Laporan Kehadiran Lengkap</h5>
                    <p class="card-text">Akses laporan kehadiran lengkap untuk semua guru.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/kepsek/rekap_absen" class="btn btn-light">Lihat Laporan</a>
                        <i class="fas fa-file-alt fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('attendanceChart').getContext('2d');
    var attendanceChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($weekLabels),
            datasets: [{
                label: 'Kehadiran Mingguan',
                data: @json($weeklyAttendanceData),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
