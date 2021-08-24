<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function description(){
        return $this->hasOne('App\Models\Description');
    }
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }
    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }
    
    //Relacion uno a uno polimorfica

    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    //Relacion uno a uno polimorfica

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    

}
