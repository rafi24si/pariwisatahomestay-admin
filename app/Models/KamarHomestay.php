<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarHomestay extends Model
{
    use HasFactory;

    protected $table = 'kamar_homestay';
    protected $primaryKey = 'kamar_id';

    protected $fillable = [
        'homestay_id',
        'nama_kamar',
        'kapasitas',
        'fasilitas_json',
        'harga'
    ];

    // Relasi ke homestay
    public function homestay()
    {
        return $this->belongsTo(Homestay::class, 'homestay_id', 'homestay_id');
    }

    // Foto kamar (menggunakan polymorphic manual)
    public function media()
    {
        return $this->morphMany(Media::class, 'owner', 'ref_table', 'ref_id')
                    ->where('ref_table', 'kamar_homestay');
    }
}
