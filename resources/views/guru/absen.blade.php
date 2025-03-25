@extends('layout.guru')

@section('konten')
    @if (!$data->isEmpty())
        @foreach ($data as $item)
            <div class="card mt-2 border-0 border-start border-primary border-4">
                <div class="card-body">
                    <p><strong>Tahun Pelajaran</strong>: {{ $item->tahun_ajaran }}</p>
                    <p><strong>Semester</strong>: {{ $item->semester }}</p>
                    <p><strong>Tanggal</strong>: {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                </div>
            </div>
        @endforeach
    @else
        <div class="card mt-2">
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Tahun Pelajaran Belum Aktif</h4>
                    <p>Silakan aktifkan tahun pelajaran terlebih dahulu.</p>
                    <hr>
                    <p class="mb-0">Untuk informasi lebih lanjut, silakan hubungi admin.</p>
                </div>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h2>
                <center>Pilih Absen</center>
            </h2>

            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-primary" id="masuk-button" onclick="startAbsen('masuk')">
                        <i class="fas fa-sign-in-alt"></i> Absen Masuk
                    </button>
                    <p id="status-masuk" class="status-text">belum masuk</p>
                </div>
                <div class="col text-center">
                    <button class="btn btn-danger" id="keluar-button" onclick="startAbsen('keluar')">
                        <i class="fas fa-sign-out-alt"></i> Absen Keluar
                    </button>
                    <p id="status-keluar" class="status-text">belum masuk</p>
                </div>
            </div>

            <!-- Hidden form for submitting data -->
            <form id="absen-form" action="{{ route('absen.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="guru_id" class="form-label">Guru</label>
                    <select name="guru_id" id="guru_id" class="form-control" required>
                        <option value="">Pilih Guru</option>
                        @foreach ($guru as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tapel combobox -->
                <div class="mb-3">
                    <label for="tapel_id" class="form-label">Tahun Pelajaran</label>
                    <select name="idt" id="tapel_id" class="form-control" required>
                        <option value="">Pilih Tahun Pelajaran</option>
                        @foreach ($data as $tapel)
                            <option value="{{ $tapel->id }}">{{ $tapel->tahun_ajaran }} - Semester {{ $tapel->semester }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="status" id="status-field" value="hadir">
                <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                <input type="hidden" name="jam_masuk" id="jam-masuk-field">
                <input type="hidden" name="jam_keluar" id="jam-keluar-field">
            </form>

            <!-- Video container for scan -->
            <center>
                <div id="video-container" class="video-container"
                    style="position: relative; width: 300px; height: 300px; display: none;">
                    <video id="preview" autoplay="autoplay" class="active" style="width: 100%; height: 100%;"
                        onclick="submitAbsen()"></video>
                    <div class="red-line"></div>
                </div>
            </center>
            <audio id="scanSound" src="{{ asset('mp3/beep.mp3') }}"></audio>
        </div>
    </div>

    <style>
        .red-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: red;
            animation: lineMove 5s infinite;
        }

        @keyframes lineMove {
            0% {
                top: 0;
            }

            50% {
                top: 89%;
            }

            90% {
                top: 0;
            }
        }
    </style>

    <script src="https://unpkg.com/jsqr/dist/jsQR.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            updateStatusText('status-masuk', 'belum masuk', 'red');
            updateStatusText('status-keluar', 'belum masuk', 'red');
        });

        const video = document.getElementById('preview');
        const videoContainer = document.getElementById('video-container');
        const statusField = document.getElementById('status-field');
        const jamMasukField = document.getElementById('jam-masuk-field');
        const jamKeluarField = document.getElementById('jam-keluar-field');
        let stream;

        function getCurrentTime() {
            const now = new Date();
            return now.toTimeString().slice(0, 5);
        }

        function startAbsen(type) {
            statusField.value = 'hadir';

            const currentTime = getCurrentTime();
            if (type === 'masuk') {
                jamMasukField.value = currentTime;
            } else if (type === 'keluar') {
                jamKeluarField.value = currentTime;
            }

            videoContainer.style.display = 'block';
            startCamera();
        }

        function startCamera() {
    if (stream) {
        video.play();
        console.log("Video is playing.");
        return;
    }

    navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: "environment"
            }
        })
        .then(camStream => {
            stream = camStream;
            video.srcObject = stream;
            video.setAttribute("playsinline", true);
            video.play();
            console.log("Camera stream started.");
            requestAnimationFrame(tick);
        })
        .catch(err => {
            console.error("Error accessing the camera: ", err);
        });
}


        function tick() {
            const canvasElement = document.createElement('canvas');
            const canvasContext = canvasElement.getContext('2d');

            if (video.readyState === video.HAVE_ENOUGH_DATA) {
                canvasElement.height = video.videoHeight;
                canvasElement.width = video.videoWidth;
                canvasContext.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
                const imageData = canvasContext.getImageData(0, 0, canvasElement.width, canvasElement.height);
                const code = jsQR(imageData.data, imageData.width, imageData.height);

                if (code) {
                    submitAbsen();
                }
            }
            requestAnimationFrame(tick);
        }

        function updateStatusText(elementId, text, color) {
            const statusElement = document.getElementById(elementId);
            statusElement.textContent = text;
            statusElement.style.color = color;
        }

        function playScanSound() {
            const sound = document.getElementById("scanSound");
            sound.play().catch(error => {
                console.error("Audio playback failed:", error);
            });
        }

        function submitAbsen() {
            playScanSound();

            if (statusField.value === 'hadir') {
                if (jamMasukField.value) {
                    updateStatusText('status-masuk', 'sudah absen', 'green');
                }
                if (jamKeluarField.value) {
                    updateStatusText('status-keluar', 'sudah absen', 'green');
                }
            }

            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }

            document.getElementById('absen-form').submit();
        }
    </script>

@endsection
