<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule_tatib extends Model
{
    use HasFactory;
    // protected $fillable = ['rule', 'id_sanksi'];

    // protected $casts = [
    //     'rule' => 'array', // Konversi JSON ke array secara otomatis
    // ];

    protected $fillable = ['rule', 'id_sanksi'];

    public function getRuleAttribute($value)
    {
        return json_decode($value, true); // Ubah string JSON ke array
    }

    public function sanksi()
    {
        return $this->belongsTo(Sanksi::class);
    }
}
