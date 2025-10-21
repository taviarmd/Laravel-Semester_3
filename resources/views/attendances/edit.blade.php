@extends('master')

@section('title', 'Edit Absensi')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="bi bi-calendar-check"></i> Form Edit Absensi</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="karyawan_id" class="form-label">
                        Nama Pegawai <span class="text-danger">*</span>
                    </label>
                    <select class="form-select form-control-lg @error('karyawan_id') is-invalid @enderror" 
                            id="karyawan_id" name="karyawan_id" required>
                        <option value="" disabled>Pilih Pegawai</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" 
                                {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }} ({{ $employee->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('karyawan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="tanggal" class="form-label">
                            Tanggal <span class="text-danger">*</span>
                        </label>
                        <input type="date" 
                               class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" 
                               name="tanggal" 
                               value="{{ old('tanggal', $attendance->tanggal) }}" 
                               required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                        <input type="time" 
                               class="form-control @error('waktu_masuk') is-invalid @enderror" 
                               id="waktu_masuk" 
                               name="waktu_masuk" 
                               value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}">
                        @error('waktu_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                        <input type="time" 
                               class="form-control @error('waktu_keluar') is-invalid @enderror" 
                               id="waktu_keluar" 
                               name="waktu_keluar" 
                               value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                        @error('waktu_keluar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="status_absensi" class="form-label">
                        Status Absensi <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('status_absensi') is-invalid @enderror" 
                            id="status_absensi" name="status_absensi" required>
                        <option value="" disabled>Pilih Status</option>
                        <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                    @error('status_absensi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('attendances.index') }}" class="btn btn-secondary">
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