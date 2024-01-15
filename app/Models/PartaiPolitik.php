<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartaiPolitik extends Model
{
    use HasFactory;

    protected $table = 'partai_politik'; 
    protected $primaryKey = 'Id_Partai';
    protected $fillable = [
        'Id_Partai',
        'NamaPartai',
        'Ideologi',
        'JumlahAnggota',
        'PemimpinPartai',
    ];

    // Tambahkan metode atau relasi jika diperlukan
}
