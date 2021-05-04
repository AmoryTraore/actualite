<?php

namespace AmoryTraore\Actualite\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;
    public function categorie(){
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
