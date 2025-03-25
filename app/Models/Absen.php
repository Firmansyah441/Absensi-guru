<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'absens';
    protected $fillable = [
        'guru_id', 'tapel_id', 'tanggal', 'jam_masuk', 'jam_keluar', 'status'
    ];
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function tapel()
    {
        return $this->belongsTo(Tapel::class);
    }
}
