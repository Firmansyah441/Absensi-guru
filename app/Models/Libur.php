<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libur extends Model
{
    use HasFactory;
    protected $table = 'liburs';
    protected $fillable = [
        'tapel_id',     // ID tahun pelajaran
        'nama_libur',   // Nama libur
        'tanggal_mulai', // Tanggal mulai libur
        'tanggal_selesai', // Tanggal selesai libur (nullable)
    ];
    public function tapel()
    {
        return $this->belongsTo(Tapel::class);
    }
}
