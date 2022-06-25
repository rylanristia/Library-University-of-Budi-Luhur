<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama', 'slug', 'created_by', 'updated_by'
    ];

    public function buku()
    {
        return $this->belongsTo(BukuModel::class, 'kategori_id', 'id');
    }
}