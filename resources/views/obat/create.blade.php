@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow rounded">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><i class="fas fa-capsules me-2"></i>Tambah Obat Baru</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-circle me-2"></i>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('obat.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control" placeholder="Masukkan nama obat..." required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" placeholder="Contoh: Sirup, Tablet, dll" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" placeholder="Jumlah stok tersedia" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukkan harga obat" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kadaluarsa</label>
                    <input type="date" name="expired_date" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('obat.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Simpan Obat
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
