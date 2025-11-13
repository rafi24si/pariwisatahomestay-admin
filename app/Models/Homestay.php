<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    use HasFactory;

    protected $primaryKey = 'homestay_id';
    protected $fillable = [
    'nama',
    'alamat',
    'rt',
    'rw',
    'fasilitas',
    'harga_per_malam',
    'status',
    'warga_id'
];


    protected $casts = [
        'fasilitas_json' => 'array',
    ];
}
