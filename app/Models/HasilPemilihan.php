<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemilihan extends Model
{
    use HasFactory;

    protected $table = 'hasilpemilihan';

    protected $primaryKey =  'Id_HasilPemilihan';

    protected $fillable = [
        'Id_HasilPemilihan',
        'Id_Pemilih',
        'Id_Kandidat',
    ];
}
