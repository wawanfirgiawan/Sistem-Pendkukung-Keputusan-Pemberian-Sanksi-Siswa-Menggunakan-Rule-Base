<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_sanksi',
        'item_sanksi'
    ];
}
