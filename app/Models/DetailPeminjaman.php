<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman';
    protected $fillable = ['peminjaman_id', 'obat_id'];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
