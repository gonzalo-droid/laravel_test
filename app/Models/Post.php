<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // MUTATORS
    public function setNameAttribute($value) 
    {
        $this->attributes['name'] = strtolower($value); // Mutators
    }

    // ACCESSORS
    public function getSlugAttribute() 
    {
        return str_replace(' ', '-', $this->name); // Accessors
    }

    public function href()
    {
        return "blog/{$this->slug}";
    }
}
