<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'Role_id';
    const CREATED_AT = 'date_cree';
    const UPDATED_AT = 'date_maj';
    
    protected $fillable = ['nom'];





    public function users()
    {
        return $this->belongsToMany('App\User','role_user','Role_id','User_id');
    }
}

