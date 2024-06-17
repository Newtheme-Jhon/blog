<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'slug'];

    //Method replace ID to slug
    public function getRouteKeyName(){
        return 'slug';
    }

    //Relación uno a muchos
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
