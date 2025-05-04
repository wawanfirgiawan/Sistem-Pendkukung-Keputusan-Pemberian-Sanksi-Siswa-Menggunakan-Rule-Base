<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingRegistration extends Model
{
    use HasFactory;
    protected $table = 'pending_registrations'; // Nama tabel

    protected $fillable = [
        'name',
        'email',
        'role',
        'siswa_id',
        'password',
    ];
}
