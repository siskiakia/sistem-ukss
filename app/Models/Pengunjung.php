<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';
    protected $fillable = ['nama', 'slug'];

    // relation
    public function obat()
    {
        return $this->hasMany(Obat::class);
    }

    // mutator
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucfirst($value);
    }
}
