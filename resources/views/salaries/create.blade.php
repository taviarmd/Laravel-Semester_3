@extends('master')

@section('title', 'Catat Gaji Baru')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="bi bi-plus-circle"></i> Form Catat Gaji Baru</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="karyawan_id" class="form-label">
                            Nama Pegawai <span class="text-danger">*</span>
                        </label>
                        <select class="form-select form-control-lg @error('karyawan_id') is-invalid @enderror" 
                                id="karyawan_id" name="karyawan_id" required>
                            <option value="" disabled selected>Pilih Pegawai</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->nama_lengkap }} ({{ $employee->position->nama_jabatan ?? 'N/A' }})
                                </option>
                            @endforeach
                        </select>
                        @error('karyawan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="bulan" class="form-label">
                            Bulan <span class="text-danger">*</span>
                        </label>
                        <input type="month" 
                               class="form-control form-control-lg @error('bulan') is-invalid @enderror" 
                               id="bulan" 
                               name="bulan" 
                               value="{{ old('bulan') }}" 
                               required>
                        @error('bulan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-3">
                <h5 class="mb-3">Rincian Gaji</h5>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok (Rp) <span class="text-danger">*</span></label>
                        <input type="number" 
                               class="form-control @error('gaji_pokok') is-invalid @enderror" 
                               id="gaji_pokok" name="gaji_pokok" 
                               value="{{ old('gaji_pokok') }}" 
                               placeholder="Contoh: 5000000"
                               step="0.01" required>
                        @error('gaji_pokok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="tunjangan" class="form-label">Tunjangan (Rp)</label>
                        <input type="number" 
                               class="form-control @error('tunjangan') is-invalid @enderror" 
                               id="tunjangan" name="tunjangan" 
                               value="{{ old('tunjangan', 0) }}" 
                               step="0.01">
                        @error('tunjangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="potongan" class="form-label">Potongan (Rp)</label>
                        <input type="number" 
                               class="form-control @error('potongan') is-invalid @enderror" 
                               id="potongan" name="potongan" 
                               value="{{ old('potongan', 0) }}" 
                               step="0.01">
                        @error('potongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <small class="text-muted d-block mb-4">
                    * Total Gaji akan dihitung otomatis (Gaji Pokok + Tunjangan - Potongan)
                </small>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">
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