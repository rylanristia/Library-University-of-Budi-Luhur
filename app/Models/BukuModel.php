<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul', 'description', 'slug', 'pengarang', 'kategori_id', 'thumbnail', 'created_by', 'updated_by'
    ];

    public function categories()
    {
        return $this->hasOne(KategoriModel::class, 'id', 'kategori_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}