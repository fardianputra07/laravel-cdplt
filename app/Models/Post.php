<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function comments(){
        //SELECT * WHERE comments WHERE post_id=$this->id
        return $this->hasMany(Comment::class);
    }

    public function scopeActive($query){
        return $query->where('active', 1);
    }
}
