@extends('master')

@section('title', 'Detail Gaji')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1><i class="bi bi-receipt"></i> Detail Gaji</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Slip Gaji: {{ $salary->employee->nama_lengkap ?? 'N/A' }}
                - {{ \Carbon\Carbon::parse($salary->bulan . '-01')->format('F Y') }}
            </h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2"><i class="bi bi-person"></i> Pegawai</h6>
                    <p class="h4">{{ $salary->employee->nama_lengkap ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2"><i class="bi bi-building"></i> Departemen</h6>
                    <p class="h4">{{ $salary->employee->department->nama_departemen ?? 'N/A' }}</p>
                </div>
            </div>
            
            <hr>
            <h5 class="mb-3">Rincian</h5>
            
            <table class="table table-borderless table-striped">
                <tbody>
                    <tr>
                        <td style="width: 200px;">
                            <i class="bi bi-wallet2 text-muted"></i> Gaji Pokok
                        </td>
                        <td class="text-end h5 text-dark">
                            Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="bi bi-plus-circle-dotted text-success"></i> Tunjangan
                        </td>
                        <td class="text-end h5 text-success">
                            + Rp {{ number_format($salary->tunjangan, 2, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="bi bi-dash-circle-dotted text-danger"></i> Potongan
                        </td>
                        <td class="text-end h5 text-danger">
                            - Rp {{ number_format($salary->potongan, 2, ',', '.') }}
                        </td>
                    </tr>
                    <tr class="table-light">
                        <td class="fw-bold h4">
                            <i class="bi bi-cash-coin"></i> Total Gaji Diterima
                        </td>
                        <td class="text-end h4 text-primary fw-bold">
                            Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <hr class="mt-4">
            <div class="row">
                <div class="col-md-6">
                    <small class="text-muted">
                        <i class="bi bi-clock-history"></i> Dibuat: {{ $salary->created_at->format('d F Y H:i') }}
                    </small>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted">
                        <i class="bi bi-arrow-clockwise"></i> Diupdate: {{ $salary->updated_at->format('d F Y H:i') }}
                    </small>
                </div>
            </div>
            
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('salaries.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>
</div>
@endsection