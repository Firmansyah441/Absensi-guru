<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;
    protected $table = 'qr_codes';
    protected $fillable = [
        'idt',
        'guru_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function tapel()
    {
        return $this->belongsTo(Tapel::class, 'idt');
    }
}
