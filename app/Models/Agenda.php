<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = ['id','judul', 'deskripsi', 'kategori_id'];
    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'kategori_id');
}
}
