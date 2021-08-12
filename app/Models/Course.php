<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'status'];
    //CONOCER EL # DE ADULTOS MAYORES REGISTRADOS
    protected $withCount = ['students', 'reviews'];
//CONSTANTES
    const BORRADOR=1;
    const REVISION=2;
    const PUBLICADO=3;

    //PARA LAS ESTRELLAS
    public function getRatingAttribute(){
         //SABER SI TIENNE O NO REVIEWS
         if($this->reviews_count){
            return round($this->reviews->avg('rating'),1);
         }else{
             return 5;
         }

       /*devuelve la coleccion
       avg('rating') saca promedio de la calificacion las calificacion son que se guardan en
       round() para redondear el valor 1->cantd de decimales
       */

    }

    public function getRouteKeyName(){
        return "slug";

    }


    //Relacion uno a muchos
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    //Relacio uno a muchos inversa
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    //Relacion muchos a muchos
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    //relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

}
