@extends('master')

@section('title', 'Edit Departemen')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1><i class="bi bi-pencil-square"></i> Form Edit Departemen</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="nama_departemen" class="form-label">
                        Nama Departemen <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           class="form-control form-control-lg @error('nama_departemen') is-invalid @enderror" 
                           id="nama_departemen" 
                           name="nama_departemen" 
                           value="{{ old('nama_departemen', $department->nama_departemen) }}" 
                           required>
                    @error('nama_departemen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary">
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