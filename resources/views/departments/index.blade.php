@extends('master')

@section('title', 'Daftar Departemen')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1><i class="bi bi-diagram-3"></i> Daftar Departemen</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('departments.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Departemen
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($departments as $department)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm hover-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-building text-primary"></i>
                            {{ $department->nama_departemen }}
                        </h5>
                        <span class="badge bg-primary rounded-pill">
                            {{ $department->employees_count }} Pegawai
                        </span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="bi bi-calendar"></i> 
                            {{ $department->created_at->format('d M Y') }}
                        </small>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('departments.show', $department->id) }}" 
                               class="btn btn-info" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('departments.edit', $department->id) }}" 
                               class="btn btn-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('departments.destroy', $department->id) }}" 
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Yakin ingin menghapus departemen ini?')" 
                                        title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
                <p class="text-muted mt-3">Belum ada data departemen</p>
                <a href="{{ route('departments.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Departemen Pertama
                </a>
            </div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $departments->links() }}
    </div>
</div>

<style>
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
}
</style>
@endsection