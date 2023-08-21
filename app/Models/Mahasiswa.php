<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    use HasFactory;
    public $table = 'mahasiswa';
    protected $fillable = ['nama', 'email', 'prodi_id', 'alamat', 'no_hp'];

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }
}
