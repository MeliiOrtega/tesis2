<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'couse_id'];

//UNO A UNO INVERSA
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
