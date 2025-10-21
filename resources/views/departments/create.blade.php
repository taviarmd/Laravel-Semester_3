@extends('master')

@section('title', 'Tambah Departemen')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="bi bi-plus-circle"></i> Form Tambah Departemen</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="nama_departemen" class="form-label">
                        Nama Departemen <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           class="form-control form-control-lg @error('nama_departemen') is-invalid @enderror" 
                           id="nama_departemen" 
                           name="nama_departemen" 
                           value="{{ old('nama_departemen') }}" 
                           placeholder="Contoh: IT, HR, Finance"
                           required>
                    @error('nama_departemen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Masukkan nama departemen yang unik</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection