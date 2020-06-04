<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

	 use SoftDeletes;
    const DELETED_AT = 'date_supp';
    protected $table = 'users';
    protected $primaryKey = 'id'; 
       
 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'matricule','nom', 'prenom', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){


    return $this->hasMany('App\Post');
    }


    public function setUpdatedAtAttribute($value){
    // to Disable updated_at
    }

 public function roles()
    {
        return $this->belongsToMany('App\Role','role_user','User_id','Role_id');
   }


    public function files(){

        return $this->hasMany('App\File');
    }

    public function docs(){

        return $this->hasMany('App\Doc');

    }

    public function budget(){

        return $this->hasMany('App\Budget');

    }
    public function depense(){

        return $this->hasMany('App\Depense');

    }
    public function gain(){

        return $this->hasMany('App\Gain');

    }

}
