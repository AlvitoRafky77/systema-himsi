@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak') {{-- Tambahkan title jika belum ada --}}

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Detail Pesan Kontak</h1>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">No. HP</th>
                    <th class="p-2">Pesan</th>
                    <th class="p-2">Tanggal Kirim</th>
                    <th class="p-2">Aksi</th> {{-- Tambahkan kolom Aksi --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td class="p-2">{{ $contact->nama }}</td>
                        <td class="p-2">{{ $contact->email }}</td>
                        <td class="p-2">{{ $contact->no_hp ?? '-' }}</td>
                        <td class="p-2">{{ $contact->pesan }}</td>
                        <td class="p-2">{{ $contact->created_at->format('d M Y, H:i') }}</td> {{-- Format tanggal agar lebih mudah dibaca --}}
                        <td class="p-2">
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-2 text-center">Tidak ada pesan kontak.</td> {{-- Sesuaikan colspan --}}
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection