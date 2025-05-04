<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPelanggaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_siswa',
        'kelas_id',
        'pelanggaran',
        'keterangan',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
