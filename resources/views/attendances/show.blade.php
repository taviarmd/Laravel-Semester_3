@extends('master')

@section('title', 'Detail Absensi')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1><i class="bi bi-calendar-event"></i> Detail Absensi</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2">
                        <i class="bi bi-person"></i> Nama Pegawai
                    </h6>
                    <p class="h4">{{ $attendance->employee->nama_lengkap ?? 'N/A' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2">
                        <i class="bi bi-calendar"></i> Tanggal
                    </h6>
                    <p class="h4">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2">
                        <i class="bi bi-box-arrow-in-right"></i> Waktu Masuk
                    </h6>
                    <p class="h4">{{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : 'Belum Clock-in' }}</p>
                </div>
                
                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2">
                        <i class="bi bi-box-arrow-out-right"></i> Waktu Keluar
                    </h6>
                    <p class="h4">{{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : 'Belum Clock-out' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2">
                        <i class="bi bi-clipboard-check"></i> Status Absensi
                    </h6>
                    <p class="h4">
                        @php
                            $status_badge = [
                                'hadir' => 'bg-success',
                                'izin'  => 'bg-info',
                                'sakit' => 'bg-warning text-dark',
                                'alpha' => 'bg-danger',
                            ];
                        @endphp
                        <span class="badge fs-5 {{ $status_badge[$attendance->status_absensi] ?? 'bg-secondary' }}">
                            {{ ucfirst($attendance->status_absensi) }}
                        </span>
                    </p>
                </div>
                
                <div class="col-12">
                    <hr>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">
                        <i class="bi bi-clock-history"></i> Dibuat: {{ $attendance->created_at->format('d F Y H:i') }}
                    </small>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted">
                        <i class="bi bi-arrow-clockwise"></i> Diupdate: {{ $attendance->updated_at->format('d F Y H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('attendances.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>
</div>
@endsection