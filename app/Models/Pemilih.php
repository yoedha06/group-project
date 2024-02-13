<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Pemilih';
    protected $table = 'pemilih';
    protected $fillable = ['Id_Pemilih', 'nama_pemilih', 'tanggal_lahir', 'alamat', 'no_ktp', 'status_pemilihan', 'koordinat'];
    public function kandidat()
    {
        return $this->hasOne(HasilPemilihan::class, 'Id_Pemilih');
    }
    public function hasilPemilihan()
    {
        return $this->hasOne(HasilPemilihan::class, 'Id_Pemilih', 'Id_Pemilih');
    }
}
