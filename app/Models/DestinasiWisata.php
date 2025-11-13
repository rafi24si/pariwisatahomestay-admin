<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    use HasFactory;

    protected $table = 'destinasi_wisata';
    protected $primaryKey = 'destinasi_id';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'rt',
        'rw',
        'jam_buka',
        'tiket',
        'kontak',
    ];
}
