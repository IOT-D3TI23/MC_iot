@extends('layouts.layout')
<style>
    .scrollable-content {
        max-height: 850px; /* Sesuaikan tinggi maksimum sesuai kebutuhan */
        overflow-y: auto; /* Tambahkan pengguliran vertikal */
        padding: 20px; /* Tambahkan padding jika diperlukan */
        border: 1px solid #ccc; /* Tambahkan batas jika ingin */
        background-color: #f9f9f9; /* Latar belakang konten */
    }

    .pedro {
        font-size: 1.5em; /* Mengurangi ukuran font untuk keterbacaan */
        color: black;
        padding-top: 20px; /* Menambah jarak atas */
    }

    .judul {
        color: black;
        font-size: 3.5em; /* Mengurangi ukuran font */
        margin-top: 20px; /* Menambah jarak atas */
    }

    .subjudul {
        color: black;
        padding-top: 30px; /* Mengurangi jarak atas */
        font-size: 2.5em; /* Mengurangi ukuran font */
    }

    .li {
        margin-top: 20px; /* Mengurangi jarak antara list item */
        font-size: 1.5em; /* Mengurangi ukuran font */
    }
</style>

@section('content')
    <div class="container-fluid">
        <div class="scrollable-content">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="judul">Deskripsi Proyek</h1>
                    
                    <h2 class="subjudul">Tujuan Proyek</h2>
                    <ul>
                        <li class="li">Mendeteksi keberadaan orang secara real-time.</li>
                        <li class="li">Mengidentifikasi jumlah orang yang terdeteksi pada suatu waktu tertentu.</li>
                        <li class="li">Memberikan peringatan atau notifikasi jika jumlah orang melebihi batas yang ditentukan (misalnya dalam area terbatas).</li>
                        <li class="li">Menyimpan data deteksi untuk analisis lebih lanjut, seperti pola kunjungan atau kepadatan area.</li>
                    </ul>

                    <h2 class="subjudul">Komponen Utama</h2>
                    <ol>
                        <li class="li"><strong>Sensor Kamera:</strong> Kamera berfungsi sebagai alat utama untuk menangkap gambar dan video di area yang diawasi. Jenis kamera yang digunakan dapat disesuaikan, seperti kamera CCTV atau kamera pintar dengan konektivitas IoT.</li>
                        <li class="li"><strong>Unit Pemrosesan:</strong> Dilengkapi dengan kemampuan pengenalan objek (Object Detection) menggunakan teknologi kecerdasan buatan, seperti model deteksi YOLO (You Only Look Once) atau SSD (Single Shot MultiBox Detector).</li>
                        <li class="li"><strong>Perangkat Lunak Deteksi:</strong> Aplikasi berbasis Python dengan framework seperti OpenCV dan TensorFlow atau PyTorch.</li>
                        <li class="li"><strong>Sistem Penyimpanan dan Analisis Data:</strong> Menyimpan data hasil deteksi untuk analisis lebih lanjut.</li>
                        <li class="li"><strong>Antarmuka Pengguna (Dashboard):</strong> Dilengkapi dengan dashboard berbasis web atau aplikasi mobile.</li>
                    </ol>

                    <h2 class="subjudul">Alur Kerja Sistem</h2>
                    <ol>
                        <li class="li"><strong>Perekaman Video dan Deteksi:</strong> Kamera merekam area secara terus-menerus.</li>
                        <li class="li"><strong>Penghitungan Jumlah Orang:</strong> Model deteksi mengidentifikasi dan menghitung jumlah orang di setiap frame.</li>
                        <li class="li"><strong>Penyimpanan dan Analisis Data:</strong> Semua hasil deteksi disimpan dalam basis data.</li>
                        <li class="li"><strong>Tampilan Real-Time di Dashboard:</strong> Pengguna dapat memantau data secara langsung melalui dashboard.</li>
                    </ol>

                    <h2 class="subjudul">Teknologi yang Digunakan</h2>
                    <ul>
                        <li class="li"><strong>Bahasa Pemrograman:</strong> Python untuk pemrosesan citra, PHP untuk dashboard.</li>
                        <li class="li"><strong>Frameworks:</strong> OpenCV untuk pemrosesan citra, TensorFlow atau PyTorch untuk model deteksi.</li>
                        <li class="li"><strong>Database:</strong> MySQL atau PostgreSQL untuk penyimpanan data deteksi.</li>
                        <li class="li"><strong>Platform:</strong> Server lokal atau layanan cloud untuk pemrosesan dan penyimpanan data.</li>
                    </ul>

                    <h2 class="subjudul">Potensi Pengembangan</h2>
                    <ol>
                        <li class="li"><strong>Integrasi dengan Sistem IoT:</strong> Dapat berintegrasi dengan perangkat IoT lain.</li>
                        <li class="li"><strong>Peningkatan Akurasi dengan Machine Learning:</strong> Melatih model deteksi dengan dataset yang lebih besar dan beragam.</li>
                        <li class="li"><strong>Fitur Keamanan Tambahan:</strong> Dapat dikembangkan untuk mendeteksi perilaku mencurigakan.</li>
                    </ol>

                    <p class="pedro">Proyek ini diharapkan dapat membantu dalam pengelolaan area publik atau fasilitas tertentu dengan lebih efisien serta meningkatkan keamanan dengan mendeteksi dan melaporkan keberadaan orang secara otomatis.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
