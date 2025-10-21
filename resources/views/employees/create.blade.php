@extends('master')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="bi bi-person-plus"></i> Form Tambah Pegawai</h1>
    </div>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                       id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                @error('nama_lengkap')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" 
                       id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required>
                @error('nomor_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                       id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                          id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                       id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required>
                @error('tanggal_masuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="departemen_id" class="form-label">Departemen <span class="text-danger">*</span></label>
                <select class="form-select @error('departemen_id') is-invalid @enderror" 
                        id="departemen_id" name="departemen_id" required>
                    <option value="">Pilih Departemen</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ old('departemen_id') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->nama_departemen }}
                        </option>
                    @endforeach
                </select>
                @error('departemen_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="jabatan_id" class="form-label">Jabatan <span class="text-danger">*</span></label>
                <select class="form-select @error('jabatan_id') is-invalid @enderror" 
                        id="jabatan_id" name="jabatan_id" required>
                    <option value="">Pilih Jabatan</option>
                    @foreach($positions as $pos)
                        <option value="{{ $pos->id }}" {{ old('jabatan_id') == $pos->id ? 'selected' : '' }}>
                            {{ $pos->nama_jabatan }}
                        </option>
                    @endforeach
                </select>
                @error('jabatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select @error('status') is-invalid @enderror" 
                        id="status" name="status" required>
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection