@extends('master')

@section('title', 'Detail Departemen')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1><i class="bi bi-diagram-3"></i> Detail Departemen</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">
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
                        <i class="bi bi-building"></i> Nama Departemen
                    </h6>
                    <p class="h4">{{ $department->nama_departemen }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <h6 class="text-muted mb-2">
                        <i class="bi bi-people"></i> Jumlah Pegawai
                    </h6>
                    <p class="h4">
                        <span class="badge bg-primary fs-5">
                            {{ $department->employees_count }} Orang
                        </span>
                    </p>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">
                        <i class="bi bi-clock-history"></i> Dibuat: {{ $department->created_at->format('d F Y H:i') }}
                    </small>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted">
                        <i class="bi bi-arrow-clockwise"></i> Diupdate: {{ $department->updated_at->format('d F Y H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    @if($department->employees->count() > 0)
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-people"></i> Daftar Pegawai di Departemen Ini</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($department->employees as $index => $employee)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $employee->nama_lengkap }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $employee->position->nama_jabatan ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                @if($employee->status == 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}" 
                                   class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> Belum ada pegawai di departemen ini.
    </div>
    @endif

    <div class="mt-3">
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>
</div>
@endsection