@extends('master')

@section('title', 'Daftar Pegawai')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1><i class="bi bi-people"></i> Daftar Pegawai</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('employees.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Pegawai
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $index => $employee)
                <tr>
                    <td>{{ $employees->firstItem() + $index }}</td>
                    <td>
                        <strong>{{ $employee->nama_lengkap }}</strong>
                    </td>
                    <td>
                        <i class="bi bi-envelope"></i> {{ $employee->email }}
                    </td>
                    <td>
                        <i class="bi bi-telephone"></i> {{ $employee->nomor_telepon }}
                    </td>
                    <td>
                        <span class="badge bg-info">
                            {{ $employee->department->nama_departemen ?? 'N/A' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-secondary">
                            {{ $employee->position->nama_jabatan ?? 'N/A' }}
                        </span>
                    </td>
                    <td>
                        @if($employee->status == 'aktif')
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle"></i> Aktif
                            </span>
                        @else
                            <span class="badge bg-danger">
                                <i class="bi bi-x-circle"></i> Nonaktif
                            </span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4">
                        <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                        <p class="text-muted mt-2">Belum ada data pegawai</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $employees->links() }}
    </div>
</div>
@endsection