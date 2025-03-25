@extends('layout.guru')

@section('konten')
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Halo, Guru!</h1>
                            <p>Ayo mulai absensi kehadiran Anda.</p>
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

    <!-- Bagian Kartu Dashboard untuk Absensi Guru -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Kartu Kehadiran Guru -->
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <h5 class="card-title">Kehadiran</h5>
                            <p class="card-text">Cek kehadiran Anda hari ini.</p>
                        </div>
                        <div class="ms-auto">
                            <i class="fas fa-user-check fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Absensi Sakit -->
            <div class="col-md-3">
                <div class="card bg-warning text-dark">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <h5 class="card-title">Sakit</h5>
                            <p class="card-text">Lihat status absensi sakit.</p>
                        </div>
                        <div class="ms-auto">
                            <i class="fas fa-head-side-cough fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Absensi Izin -->
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <h5 class="card-title">Izin</h5>
                            <p class="card-text">Lihat status absensi izin.</p>
                        </div>
                        <div class="ms-auto">
                            <i class="fas fa-calendar-times fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Absensi Alfa -->
            <div class="col-md-3 mb-5">
                <div class="card bg-danger text-white">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <h5 class="card-title">Alfa</h5>
                            <p class="card-text">Lihat status absensi alfa.</p>
                        </div>
                        <div class="ms-auto">
                            <i class="fas fa-user-times fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection
