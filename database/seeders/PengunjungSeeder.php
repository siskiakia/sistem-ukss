<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Pengunjung = ['admin', 'petugas', 'peminjam'];

        foreach ($Pengunjung as $key => $value) {
            Pengunjung::create([
                'nama' => $value,
                'kelas' => $value,
                'tanggal' => $value,
                'keluhan' => $value,
                'obat' => $value,
                'slug' => Str::slug($value)
            ]);
        }

      
    }
}
