<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salary extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara massal (mass assignable).
     */
    protected $fillable = [
        'karyawan_id',
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
    ];

    /**
     * Mendefinisikan relasi "milik" ke model Employee.
     * Satu data gaji (Salary) hanya dimiliki oleh satu Pegawai (Employee).
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}