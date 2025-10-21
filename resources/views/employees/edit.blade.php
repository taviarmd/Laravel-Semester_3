@extends('master')

@section('title', 'Edit Data Pegawai')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="bi bi-pencil-square"></i> Form Edit Pegawai</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            
            <form action="{{ route('employees.update', $employee->id)}}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('nama_lengkap') is-invalid @enderror" 
                               id="nama_lengkap"
                               name="nama_lengkap" 
                               value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" 
                               required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email"
                               name="email" 
                               value="{{ old('email', $employee->email) }}" 
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" 
                               class="form-control @error('nomor_telepon') is-invalid @enderror" 
                               id="nomor_telepon"
                               name="nomor_telepon" 
                               value="{{ old('nomor_telepon', $employee->nomor_telepon) }}">
                        @error('nomor_telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" 
                               class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                               id="tanggal_lahir"
                               name="tanggal_lahir" 
                               value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                              id="alamat"
                              name="alamat" 
                              rows="3">{{ old('alamat', $employee->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" 
                               class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                               id="tanggal_masuk"
                               name="tanggal_masuk" 
                               value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}">
                        @error('tanggal_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected': '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected': '' }}>Nonaktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection