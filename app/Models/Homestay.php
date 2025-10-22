<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    use HasFactory;
    protected $table = 'homestay';
    protected $primaryKey = 'homestay_id';
    protected $fillable = [
        'nama','deskripsi','alamat','kontak','harga_per_malam','fasilitas','media'
    ];
}

