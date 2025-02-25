<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = ['obat umum', 'obat non resep', 'obat resep', 'alat kesehatan', 'vitamin', 'p3k'];

        foreach ($kategori as $value) {
            Kategori::create([
                'nama' => $value,
                'slug' => Str::slug($value)
            ]);
        }
       
    }
}
