<?php

namespace App\Http\Controllers;

use App\Models\Attendance; // 👈 PENTING: Tambahkan Model Attendance
use App\Models\Employee;   // 👈 PENTING: Tambahkan Model Employee
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Menampilkan daftar absensi (Halaman index).
     */
    public function index()
    {
        // Ambil data absensi, urutkan dari yg terbaru, 
        // 'with('employee')' untuk mengambil relasi data pegawainya
        // 'paginate(10)' untuk membagi data per 10 item per halaman
        $attendances = Attendance::with('employee')
                                 ->latest()
                                 ->paginate(10);
        
        // Kirim data $attendances ke view 'attendances.index'
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Menampilkan form untuk membuat absensi baru (Halaman create).
     */
    public function create()
    {
        // Kita butuh daftar semua pegawai untuk ditampilkan di dropdown
        $employees = Employee::orderBy('nama_lengkap', 'asc')->get();
        
        // Tampilkan view 'attendances.create' dan kirim data $employees
        return view('attendances.create', compact('employees'));
    }

    /**
     * Menyimpan data absensi baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'karyawan_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required|date',
            'waktu_masuk'    => 'nullable|date_format:H:i',
            'waktu_keluar'   => 'nullable|date_format:H:i|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        // 2. Jika validasi berhasil, buat data baru
        Attendance::create($request->all());

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('attendances.index')
                         ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu data absensi (Halaman show).
     */
    public function show(Attendance $attendance)
    {
        // '$attendance' sudah otomatis diambil oleh Laravel (Route Model Binding)
        // Kita hanya perlu menampilkannya di view 'attendances.show'
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Menampilkan form untuk mengedit data absensi (Halaman edit).
     */
    public function edit(Attendance $attendance)
    {
        // Kita butuh daftar semua pegawai untuk dropdown
        $employees = Employee::orderBy('nama_lengkap', 'asc')->get();
        
        // Tampilkan view 'attendances.edit' dan kirim data $attendance dan $employees
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    /**
     * Mengupdate data absensi di database.
     */
    public function update(Request $request, Attendance $attendance)
    {
        // 1. Validasi input
        $request->validate([
            'karyawan_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required|date',
            'waktu_masuk'    => 'nullable|date_format:H:i',
            'waktu_keluar'   => 'nullable|date_format:H:i|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        // 2. Jika validasi berhasil, update data
        $attendance->update($request->all());

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('attendances.index')
                         ->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Menghapus data absensi dari database.
     */
    public function destroy(Attendance $attendance)
    {
        // Hapus data
        $attendance->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('attendances.index')
                         ->with('success', 'Data absensi berhasil dihapus.');
    }
}