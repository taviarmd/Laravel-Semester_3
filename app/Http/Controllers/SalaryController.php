<?php

namespace App\Http\Controllers;

use App\Models\Salary;   //  IMPORT MODEL SALARY
use App\Models\Employee;  //  IMPORT MODEL EMPLOYEE
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Menampilkan daftar semua gaji (halaman index).
     */
    public function index()
    {
        // Ambil data gaji, sertakan data pegawai (relasi), urutkan dari yg terbaru
        $salaries = Salary::with('employee')->latest()->paginate(10);
        
        // Kirim data ke view 'salaries.index'
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Menampilkan form untuk membuat data gaji baru.
     */
    public function create()
    {
        // Ambil semua data pegawai untuk ditampilkan di dropdown
        $employees = Employee::orderBy('nama_lengkap', 'asc')->get();
        
        // Tampilkan view 'salaries.create'
        return view('salaries.create', compact('employees'));
    }

    /**
     * Menyimpan data gaji baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data input
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|date_format:Y-m',
            'gaji_pokok'  => 'required|numeric|min:0',
            'tunjangan'   => 'nullable|numeric|min:0',
            'potongan'    => 'nullable|numeric|min:0',
        ]);

        // 2. Hitung Total Gaji
        $total_gaji = ($request->input('gaji_pokok', 0) + $request->input('tunjangan', 0)) - $request->input('potongan', 0);

        // 3. Siapkan semua data untuk disimpan
        $data = $request->all();
        $data['total_gaji'] = $total_gaji;

        // 4. Simpan ke database
        Salary::create($data);

        // 5. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu data gaji.
     */
    public function show(Salary $salary)
    {
        // $salary sudah otomatis diambil oleh Laravel (Route Model Binding)
        return view('salaries.show', compact('salary'));
    }

    /**
     * Menampilkan form untuk mengedit data gaji.
     */
    public function edit(Salary $salary)
    {
        // Ambil semua data pegawai untuk dropdown
        $employees = Employee::orderBy('nama_lengkap', 'asc')->get();
        
        // Tampilkan view 'salaries.edit'
        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Mengupdate data gaji di database.
     */
    public function update(Request $request, Salary $salary)
    {
        // 1. Validasi data input
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|date_format:Y-m',
            'gaji_pokok'  => 'required|numeric|min:0',
            'tunjangan'   => 'nullable|numeric|min:0',
            'potongan'    => 'nullable|numeric|min:0',
        ]);

        // 2. Hitung Total Gaji
        $total_gaji = ($request->input('gaji_pokok', 0) + $request->input('tunjangan', 0)) - $request->input('potongan', 0);

        // 3. Siapkan semua data untuk di-update
        $data = $request->all();
        $data['total_gaji'] = $total_gaji;

        // 4. Update data di database
        $salary->update($data);

        // 5. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil diperbarui.');
    }

    /**
     * Menghapus data gaji dari database.
     */
    public function destroy(Salary $salary)
    {
        // Hapus data
        $salary->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil dihapus.');
    }
}