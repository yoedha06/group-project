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
        'nama_barang',
        'Tanggal_Lahir',
        'Partai_Politik',
        'Nomor_Urut',
        'Program_Kerja',
    ];

}
