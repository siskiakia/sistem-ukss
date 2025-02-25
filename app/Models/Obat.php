<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $fillable = ['nama', 'stok', 'foto', 'slug', 'satuan', 'kategori_id', 'rak_id', 'pengunjung_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class);
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function obat()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }

    // mutator
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucfirst($value);
    }
   
    public function setSatuanAttribute($value)
    {
        $this->attributes['satuan'] = ucfirst($value);
    }
}
