@extends('layout.main')

@section('konten')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        alert() - > success('SuccessAlert', 'Lorem ipsum dolor sit amet.');
    </script>
    <div class="container-fluid content-inner mt-n5 y-0">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row row-cols-1">
                    <div class="overflow-hidden d-slider1 ">
                        <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-01"
                                            class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                            data-min-value="0" data-max-value="100" data-value="{{ $totalAdminPercentage }}"
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                                <!-- Arrow pointing down -->
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Total Admin</p>
                                            <h4 class="counter">{{ $totalAdmin }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-02"
                                            class="text-center circle-progress-01 circle-progress circle-progress-info"
                                            data-min-value="0" data-max-value="100" data-value="{{ $totalGuruPercentage }}"
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                                <!-- Arrow pointing down -->
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Total Guru</p>
                                            <h4 class="counter">{{ $totalGuru }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-03"
                                            class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                            data-min-value="0" data-max-value="100"
                                            data-value="{{ $totalKepsekPercentage }}" data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                                <!-- Arrow pointing down -->
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Total Kepsek</p>
                                            <h4 class="counter">{{ $totalKepsek }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-04"
                                            class="text-center circle-progress-01 circle-progress circle-progress-info"
                                            data-min-value="0" data-max-value="100" data-value="{{ $totalAbsenPercentage }}"
                                            data-type="percent">
                                            <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                                <!-- Arrow pointing up -->
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Total Absen</p>
                                            <h4 class="counter">{{ $totalAbsen }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="swiper-button swiper-button-next"></div>
                        <div class="swiper-button swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="800">
                            <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                                <div class="header-title">
                                    <h4 class="card-title">{{ $totalAbsen }}</h4> <!-- Display total absence count -->
                                    <p class="mb-0">Total Absen</p>
                                </div>
                                <div class="d-flex align-items-center align-self-center">
                                    <!-- Legend for attendance types -->
                                    <div class="d-flex align-items-center text-primary">
                                        <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="text-gray">Hadir: {{ $hadirCount }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ms-3 text-info">
                                        <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="text-gray">Sakit: {{ $sakitCount }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ms-3 text-warning">
                                        <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="text-gray">Izin: {{ $izinCount }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ms-3 text-danger">
                                        <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="text-gray">Alfa: {{ $alfaCount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Canvas for Chart.js -->
                                <canvas id="attendanceChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Setup data for Chart.js
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Hadir', 'Sakit', 'Izin', 'Alfa'],
                datasets: [{
                    label: 'Jumlah Kehadiran',
                    data: [{{ $hadirCount }}, {{ $sakitCount }}, {{ $izinCount }}, {{ $alfaCount }}],
                    backgroundColor: [
                        'rgba(0, 123, 255, 0.5)', // Hadir
                        'rgba(23, 162, 184, 0.5)', // Sakit
                        'rgba(255, 193, 7, 0.5)',  // Izin
                        'rgba(220, 53, 69, 0.5)'   // Alfa
                    ],
                    borderColor: [
                        'rgba(0, 123, 255, 1)',
                        'rgba(23, 162, 184, 1)',
                        'rgba(255, 193, 7, 1)',
                        'rgba(220, 53, 69, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
