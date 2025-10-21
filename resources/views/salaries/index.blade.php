@extends('master')

@section('title', 'Daftar Gaji')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1><i class="bi bi-cash-stack"></i> Daftar Gaji Pegawai</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('salaries.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Catat Gaji Baru
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Bulan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Potongan</th>
                            <th>Total Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($salaries as $salary)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($salary->bulan . '-01')->format('F Y') }}</td>
                            <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                            <td>
                                <strong class="text-success">
                                    Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                                </strong>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('salaries.show', $salary->id) }}" 
                                       class="btn btn-info" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('salaries.edit', $salary->id) }}" 
                                       class="btn btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('salaries.destroy', $salary->id) }}" 
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" 
                                                onclick="return confirm('Yakin ingin menghapus data gaji ini?')" 
                                                title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="py-5">
                                    <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
                                    <p class="text-muted mt-3">Belum ada data gaji yang dicatat</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($salaries->hasPages())
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $salaries->links() }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection