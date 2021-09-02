<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements  MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'fecha',
        'cedula',
        'ocupacion',
        'direccion'
    ];
    /* const admin=1;
    const voluntario=2;
    const usuario=3; */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //Relacion uno a uno
    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }
    //Relacion uno a muchos -->Adultos mayor del curso
    public function courses_dictated(){
        return $this->hasMany('App\Models\Course');
    }

        //Relacion uno a muchos
        public function reviews(){
            return $this->hasMany('App\Models\Review');
        }

    //Relacion uno a muchos
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    //RELACION MUCHOS A MUCHOS -->Voluntarios del curso
    public function courses_enrolled(){
        return $this->belongsToMany('App\Models\Course')->withTimestamps();
    }

}
