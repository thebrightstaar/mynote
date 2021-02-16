<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'user_id','photo','prioity'
          
         
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User' );

    }

    public function getFeaturedAttribute($photo)
     {
         return asset($photo);
     }
     public function tag()
    {
        return $this->belongsToMany('App\Models\Notes' );
    }
}

