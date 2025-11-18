<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;
use App\Models\KamarHomestay;
use App\Models\Warga;

class Homestay extends Model
{
    use HasFactory;

    protected $table = 'homestay';
    protected $primaryKey = 'homestay_id';

    protected $fillable = [
        'pemilik_warga_id',
        'nama',
        'alamat',
        'rt',
        'rw',
        'fasilitas_json',
        'harga_per_malam',
        'status'
    ];

    // Relasi ke warga
    public function pemilik()
    {
        return $this->belongsTo(Warga::class, 'pemilik_warga_id', 'warga_id');
    }

    // Relasi ke kamar
    public function kamar()
    {
        return $this->hasMany(KamarHomestay::class, 'homestay_id', 'homestay_id');
    }

    // Foto homestay (media table)
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
                    ->where('ref_table', 'homestay');
    }
}
