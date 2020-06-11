<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professeur extends Model
{
    use SoftDeletes;

    protected $fillable = ['nom', 'prenom', 'email', 'year', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
