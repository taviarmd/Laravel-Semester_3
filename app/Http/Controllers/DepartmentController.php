<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('employees')
            ->latest()
            ->paginate(10);
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments',
        ]);

        Department::create($request->all());
        
        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $department = Department::withCount('employees')
            ->with(['employees' => function($query) {
                $query->latest()->take(10);
            }])
            ->findOrFail($id);
        return view('departments.show', compact('department'));
    }

    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen,' . $id,
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        
        // Check if department has employees
        if ($department->employees()->count() > 0) {
            return redirect()->route('departments.index')
                ->with('error', 'Tidak dapat menghapus departemen yang masih memiliki pegawai!');
        }
        
        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil dihapus!');
    }
}