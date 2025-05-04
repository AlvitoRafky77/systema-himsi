@extends('layouts.frontend')

@section('title', 'Tentang Kami - Systema HIMSI')

@section('content')
<div class="container my-5 animated-container">
    <div class="animated-blue-box" style="background-color: #C4E5FC; padding: 30px; border-radius: 10px;">
        <h1 class="text-center mb-4 animated-title" style="font-family: 'Montserrat', sans-serif; font-weight: bold; color: #333;">
            Tentang Kami
        </h1>
        <div class="card shadow-sm animated-card" style="border: none;">
            <div class="card-body">
                <h2 class="text-center animated-subtitle" style="font-family: 'Montserrat', sans-serif; color: #003366;">
                    Systema HIMSI
                </h2>
                <p class="mt-4 animated-paragraph" style="font-family: 'Montserrat', sans-serif; color: #666; line-height: 1.7;">
                    Selamat datang di <strong>Systema HIMSI</strong>, sebuah platform yang dirancang untuk mendukung
                    kegiatan Himpunan Mahasiswa Sistem Informasi (HIMSI). HIMSI adalah organisasi mahasiswa yang
                    berfokus pada pengembangan kemampuan akademik, profesional, dan sosial mahasiswa Sistem
                    Informasi.
                </p>
                <p class="animated-paragraph" style="font-family: 'Montserrat', sans-serif; color: #666; line-height: 1.7;">
                    <strong>Kenapa Memilih Produk Kami ?</strong>
                </p>
                </p>
                <p class="animated-paragraph" style="font-family: 'Montserrat', sans-serif; color: #666; line-height: 1.7;">
                Produk kami merupakan hasil kreativitas mahasiswa Sistem Informasi yang dikemas dengan desain menarik, harga terjangkau, dan kualitas terbaik. Dengan membeli, kamu tidak hanya mendapatkan produk unik, tapi juga turut mendukung UMKM kampus dan semangat wirausaha mahasiswa.
                </p>

                <p class="text-center mt-4 animated-paragraph" style="font-family: 'Montserrat', sans-serif; font-weight: bold; color: #333;">
                    <strong>"Bersama HIMSI, Kita Berkarya dan Berinovasi!"</strong>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Pastikan font Montserrat sudah di-load. Anda bisa menambahkannya di file CSS utama Anda (misalnya, app.css) atau di bagian head template utama. */
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

    /* Animasi container */
    .animated-container {
        opacity: 0;
        animation: fadeInContainer 1s ease-in-out 0s forwards; /* Durasi diperlambat */
    }

    @keyframes fadeInContainer {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Animasi kotak biru */
    .animated-blue-box {
        transform: scale(0);
        opacity: 0;
        animation: zoomIn 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) 0.5s forwards; /* Durasi & delay diperlambat */
    }

    @keyframes zoomIn {
        from { transform: scale(0); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    /* Animasi tulisan "Tentang Kami" */
    .animated-title {
        opacity: 0;
        transform: translateY(-30px);
        animation: slideInDown 0.6s cubic-bezier(0.215, 0.610, 0.355, 1.000) 1.0s forwards; /* Durasi & delay diperlambat */
    }

    @keyframes slideInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Animasi kotak putih (card) */
    .animated-card {
        opacity: 0;
        transform: translateY(30px);
        animation: slideInUp 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) 1.5s forwards; /* Durasi & delay diperlambat */
    }

    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Animasi tulisan "Systema HIMSI" dan paragraf */
    .animated-subtitle {
        opacity: 0;
        animation: fadeIn 0.6s ease-in-out 2.0s forwards; /* Durasi & delay diperlambat */
    }

    .animated-paragraph {
        opacity: 0;
        animation: fadeIn 0.6s ease-in-out 2.5s forwards; /* Durasi & delay diperlambat */
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
@endsection
