<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'id_rs'
    ];

    public function rs(){
        return $this->belongsTo(RumahSakit::class, 'id_rs', 'id');
    }
}
