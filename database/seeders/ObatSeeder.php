<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Obat::create([
            'nama' => 'kasa steril',
            'slug' => Str::slug('kasa-steril'),
            'foto' => 'obat/Sampul_novel_Bintang.jpeg',
            'satuan' => 'stip',
            'pengunjung_id' => 2,
            'kategori_id' => 2,
            'rak_id' => 2,
            'stok' => 10
        ]);

        Obat::create([
            'nama' => 'tandu',
            'slug' => Str::slug('tandu'),
            'foto' => 'obat/Sampul_novel_Matahari.jpeg',
            'satuan' => 'stip',
            'pengunjung_id' => 3,
            'kategori_id' => 2,
            'rak_id' => 3,
            'stok' => 10
        ]);

        Obat::create([
            'nama' => 'betadine',
            'slug' => Str::slug('betadine'),
            'foto' => 'obat/Tentang_Kamu_sampul.jpeg',
            'satuan' => 'stip',
            'pengunjung_id' => 2,
            'kategori_id' => 2,
            'rak_id' => 4,
            'stok' => 10
        ]);

        Obat::create([
            'nama' => 'promagh',
            'slug' => Str::slug('promagh'),
            'foto' => 'obat/gusdur.jpg',
            'satuan' => 'stip',
            'pengunjung_id' => 2,
            'kategori_id' => 3,
            'rak_id' => 7,
            'stok' => 10
        ]);

        Obat::create([
            'nama' => 'paracetamol',
            'slug' => Str::slug('paracetamol'),
            'foto' => 'obat/habibie.jpg',
            'satuan' => 'stip',
            'pengunjung_id' => 2,
            'kategori_id' => 3,
            'rak_id' => 8,
            'stok' => 10
        ]);

        Obat::create([
            'nama' => 'sanmol',
            'slug' => Str::slug('sanmol'),
            'foto' => 'obat/naruto-58.jpg',
            'satuan' => 'stip',
            'pengunjung_id' => 3,
            'kategori_id' => 6,
            'rak_id' => 12,
            'stok' => 10
        ]);

        Obat::create([
            'nama' => 'meloxicam',
            'slug' => Str::slug('meloxicam'),
            'foto' => 'obat/naruto-71.jpg',
            'satuan' => 'stip',
            'pengunjung_id' => 3,
            'kategori_id' => 6,
            'rak_id' => 13,
            'stok' => 10
        ]);
    }
}
