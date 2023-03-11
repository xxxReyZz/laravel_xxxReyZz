<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    use HasFactory;
    protected $table = 'rumah_sakit';
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'telepon'
    ];

    public function list_pasien(){
        return $this->hasMany(Pasien::class, 'id_rs', 'id');
    }
}
