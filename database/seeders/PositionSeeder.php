<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            ['nama_jabatan' => 'Manager', 'gaji_pokok' => 15000000],
            ['nama_jabatan' => 'Supervisor', 'gaji_pokok' => 10000000],
            ['nama_jabatan' => 'Staff', 'gaji_pokok' => 6000000],
            ['nama_jabatan' => 'Intern', 'gaji_pokok' => 3000000],
        ];

        foreach ($positions as $pos) {
            Position::create($pos);
        }
    }
}