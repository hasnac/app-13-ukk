<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table= 'bukus';
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'id_buku',
        'judul',
        'penulis',
        'penerbit',
        'tahunterbit',
        'gambar',
        'deskripsi',
        'stok',
        'kategori',
        'status',
    ];
    public function pinjam()
    {
        return $this->belongsTo(peminjaman::class, 'id_buku', 'id_buku');
    }
    public function koleksi()
    {
        return $this->hasMany(koleksi::class, 'id_buku', 'id_buku');
    }
}
