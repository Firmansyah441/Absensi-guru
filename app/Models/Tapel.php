<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tapel extends Model
{
    use HasFactory;
    protected $table = 'tapels';
    protected $fillable = [
        'semester',
        'tahun_ajaran',
        'status',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
    public function liburs()
    {
        return $this->hasMany(Libur::class, 'tapel_id');
    }
    public function getStatusReadableAttribute()
    {
        return $this->status === 'aktif' ? 'Aktif' : 'Tidak Aktif';
    }
    public function getDateRange()
    {
        return $this->tanggal_mulai . ' hingga ' . $this->tanggal_selesai;
    }
    public function absens()
    {
        return $this->hasMany(Absen::class);
    }
  // In Tapel.php
public function guru()
{
    return $this->belongsTo(Guru::class, 'guru_id');
}


}
