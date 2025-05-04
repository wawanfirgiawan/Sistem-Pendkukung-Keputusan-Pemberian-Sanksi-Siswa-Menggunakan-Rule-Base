<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSanksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'daftar_pelanggaran',
        'kode_tatib',
        'siswa_id',
        'sanksi'
    ];


    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
}
