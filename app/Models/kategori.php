<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $fillable = ['id','kategori'];
        public function agendas()
    {
        return $this->hasMany(Agenda::class, 'kategori_id', 'id');
    }

}
