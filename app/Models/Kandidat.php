<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $table = 'kandidat';
    protected $primaryKey = 'Id_Kandidat';
    protected $fillable = [
        'Nama_Kandidat',
        'Tanggal_Lahir',
        'Partai_Politik',
        'Nomor_Urut',
        'Program_Kerja',
    ];
    public function pemilih()
    {
        return $this->hasOne(HasilPemilihan::class, 'Id_Kandidat');
    }
}
