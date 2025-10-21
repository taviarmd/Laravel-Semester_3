@extends('master')

@section('title', 'Daftar Absensi')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1><i class="bi bi-calendar-week"></i> Daftar Absensi</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('attendances.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Absensi
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
                            <th>Tanggal</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Keluar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $attendance)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $attendance->employee->nama_lengkap ?? 'Pegawai Dihapus' }}</td>
                            <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td>
                            <td>{{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-' }}</td>
                            <td>{{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-' }}</td>
                            <td>
                                @php
                                    $status_badge = [
                                        'hadir' => 'bg-success',
                                        'izin'  => 'bg-info',
                                        'sakit' => 'bg-warning text-dark',
                                        'alpha' => 'bg-danger',
                                    ];
                                @endphp
                                <span class="badge {{ $status_badge[$attendance->status_absensi] ?? 'bg-secondary' }}">
                                    {{ ucfirst($attendance->status_absensi) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('attendances.show', $attendance->id) }}" 
                                       class="btn btn-info" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('attendances.edit', $attendance->id) }}" 
                                       class="btn btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('attendances.destroy', $attendance->id) }}" 
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" 
                                                onclick="return confirm('Yakin ingin menghapus data absensi ini?')" 
                                                title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <i class="bi bi-inbox" style="font-size: 2rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">Belum ada data absensi</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($attendances->hasPages())
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $attendances->links() }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection