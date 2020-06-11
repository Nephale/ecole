<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function professeur()
    {
    return $this->hasMany(Professeur::class);
    }
}
