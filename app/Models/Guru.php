<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'gurus';
    protected $fillable = [
        'name',
        'nip',
        'nuptk',
        'alamat',
        'no_telepon',
        'gambar',
        'jenis_kelamin',
        'mata_pelajaran',
    ];
    /**
     * Get all of the comments for the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function absens()
    {
        return $this->hasMany(Absen::class, 'guru_id', 'id');
    }


}
