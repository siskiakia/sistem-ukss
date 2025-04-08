<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';
    // protected $fillable = ['nama','kelas', 'tanggal', 'keluhan', 'obat', 'slug'];
    protected $fillable = ['nama', 'kelas', 'tanggal', 'keluhan','obat'];


    // relation
    public function obat()
    {
        return $this->hasMany(Obat::class);
    }

    // mutator
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucfirst($value);
        $this->attributes['kelas'] = ucfirst($value);
        $this->attributes['tanggal'] = ucfirst($value);
        $this->attributes['keluhan'] = ucfirst($value);
        $this->attributes['obat'] = ucfirst($value);
    }
}
