@extends('master')

@section('title', 'Detail Pegawai')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1><i class="bi bi-person-lines-fill"></i> Detail Pegawai</h1>
            </div>
            <div class="col-auto">
                {{-- INI BAGIAN YANG DIPERBAIKI --}}
                {{-- Link ini sekarang mengarah ke 'employees.edit' dengan variabel $employee --}}
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                {{-- Data Pribadi Pegawai --}}
                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2"><i class="bi bi-person-fill"></i> Nama Lengkap</h6>
                    <p class="h4">{{ $employee->nama_lengkap }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2"><i class="bi bi-envelope-at-fill"></i> Email</h6>
                    <p class="h4">{{ $employee->email }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2"><i class="bi bi-telephone-fill"></i> Nomor Telepon</h6>
                    <p class="h4">{{ $employee->nomor_telepon ?? '-' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2"><i class="bi bi-calendar-event"></i> Tanggal Lahir</h6>
                    <p class="h4">{{ $employee->tanggal_lahir ? \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') : '-' }}</p>
                </div>
                <div class="col-12 mb-3">
                    <h6 class="text-muted mb-2"><i class="bi bi-geo-alt-fill"></i> Alamat</h6>
                    <p class="h4">{{ $employee->alamat ?? '-' }}</p>
                </div>
                
                <div class="col-12"><hr></div>

                {{-- Data Pekerjaan (Relasi) --}}
                <div class="col-md-4 mb-3">
                    <h6 class="text-muted mb-2"><i class="bi bi-building"></i> Departemen</h6>
                    {{-- INI BAGIAN YANG DIPERBAIKI --}}
                    {{-- Menggunakan relasi dari $employee untuk mengambil nama departemen --}}
                    <p class="h4"><span class="badge bg-primary fs-6">{{ $employee->department->nama_departemen ?? 'N/A' }}</span></p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="text-muted mb-2"><i class="bi bi-person-badge"></i> Jabatan</h6>
                    {{-- Menggunakan relasi dari $employee untuk mengambil nama jabatan --}}
                    <p class="h4"><span class="badge bg-secondary fs-6">{{ $employee->position->nama_jabatan ?? 'N/A' }}</span></p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="text-muted mb-2"><i class="bi bi-toggle-on"></i> Status</h6>
                    <p class="h4">
                        @if($employee->status == 'aktif')
                            <span class="badge bg-success fs-6">Aktif</span>
                        @else
                            <span class="badge bg-danger fs-6">Nonaktif</span>
                        @endif
                    </p>
                </div>
                
                <div class="col-12"><hr></div>
                
                {{-- Info Waktu --}}
                <div class="col-md-6">
                    <small class="text-muted"><i class="bi bi-clock-history"></i> Dibuat: {{ $employee->created_at->format('d F Y H:i') }}</Tsmall>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted"><i class="bi bi-arrow-clockwise"></i> Diupdate: {{ $employee->updated_at->format('d F Y H:i') }}</small>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>
</div>
@endsection