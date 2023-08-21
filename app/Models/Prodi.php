<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodis';
    protected $fillable = ['kode', 'nama'];

    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_id', 'id');
    }
}
