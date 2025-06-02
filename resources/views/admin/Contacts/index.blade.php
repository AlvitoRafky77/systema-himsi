@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')

@section('styles')
<style>
    .contacts-container {
        padding: 2rem;
        background: #f6f8fd;
        min-height: calc(100vh - 60px);
        position: relative;
        overflow: hidden;
    }

    .contacts-container::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        background: rgba(0, 114, 255, 0.05);
        z-index: 0;
    }

    .content-wrapper {
        position: relative;
        z-index: 1;
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
        color: var(--secondary-color);
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        animation: titleAppear 0.8s ease-out;
    }

    .contacts-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
        animation: cardAppear 0.6s ease-out;
    }

    .table-wrapper {
        overflow-x: auto;
        margin: -0.5rem;
        padding: 0.5rem;
    }

    .contacts-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .contacts-table th {
        background: #005AD4;
        color: white;
        padding: 1rem;
        font-weight: 600;
        text-align: left;
        border: none;
        white-space: nowrap;
    }

    .contacts-table th:first-child {
        border-top-left-radius: 10px;
    }

    .contacts-table th:last-child {
        border-top-right-radius: 10px;
        text-align: center;
        width: 100px;
    }

    .contacts-table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 90, 212, 0.1);
        transition: all 0.3s ease;
        vertical-align: middle;
    }

    .contacts-table tr:hover td {
        background: rgba(0, 90, 212, 0.05);
    }

    .message-cell {
        max-width: 300px;
        padding: 0.5rem 1rem;
        line-height: 1.5;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .date-cell {
        white-space: nowrap;
        color: #666;
        font-size: 0.9rem;
    }

    .btn-delete {
        background: linear-gradient(135deg, #E74C3C 0%, #C0392B 100%);
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(231, 76, 60, 0.2);
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        background: linear-gradient(135deg, #C0392B 0%, #922B21 100%);
        color: white;
    }

    .empty-message {
        text-align: center;
        padding: 2rem;
        color: #666;
        font-style: italic;
    }

    @keyframes cardAppear {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes titleAppear {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 768px) {
        .contacts-container {
            padding: 1rem;
        }

        .page-title {
            font-size: 2rem;
        }

        .contacts-card {
            padding: 1rem;
        }

        .table-wrapper {
            margin: -0.5rem;
            padding: 0.5rem;
        }

        .message-cell {
            max-width: 150px;
        }

        .btn-delete {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }
    }
</style>
@endsection

@section('content')
<div class="contacts-container">
    <div class="content-wrapper">
        <h1 class="page-title">Detail Pesan Kontak</h1>

        <div class="contacts-card">
            <div class="table-wrapper">
                <table class="contacts-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Pesan</th>
                            <th>Tanggal Kirim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->nama }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->no_hp ?? '-' }}</td>
                                <td class="message-cell" title="{{ $contact->pesan }}">
                                    {{ $contact->pesan }}
                                </td>
                                <td class="date-cell">
                                    {{ $contact->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                          method="POST"
                                          style="display: inline;"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fas fa-trash-alt"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-message">
                                    Tidak ada pesan kontak.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection