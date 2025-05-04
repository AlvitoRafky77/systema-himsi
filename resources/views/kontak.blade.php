@extends('layouts.frontend')

@section('title', 'Kontak Kami')

@section('content')
<div class="container my-5" style="font-family: 'Montserrat', sans-serif; font-weight: 400; letter-spacing: 0.01em;">
    <h1>Kontak Kami</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: 500;">Lokasi Kami</h5>
                    <div id="map-container" style="height: 300px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.380582935824!2d106.84080997586805!3d-6.2134347608619205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d99fe71b5b%3A0x4613509b4a40b539!2sUniversitas%20Telkom%20Jakarta%20Kampus%20Minangkabau!5e0!3m2!1sid!2sid!4v1746190785092!5m2!1sid!2sid"
                            width="100%"
                            height="300"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="map">
                        </iframe>
                    </div>
                    <p class="mt-3">
                        Jl. Minangkabau Barat No.50, RT.1/RW.1, Ps. Manggis,<br>
                        Kecamatan Setiabudi, Kota Jakarta Selatan,<br>
                        Daerah Khusus Ibukota Jakarta 12970
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: 500;">Hubungi Kami</h5>
                    <form action="{{ route('kontak.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" value="{{ old('nama', Auth::user()->name ?? '') }}" style="font-weight: 400;">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email Anda" value="{{ old('email', Auth::user()->email ?? '') }}" style="font-weight: 400;">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Telepon Anda" style="font-weight: 400;">
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Pesan Anda" style="font-weight: 400;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="font-weight: 500;">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .map {
        width: 100%;
        height: 100%;
    }
    /* Pastikan font Montserrat dengan berbagai weights sudah di-load. */
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');
</style>
@endsection