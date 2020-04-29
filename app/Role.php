<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'Role_id';
    const CREATED_AT = 'cree_le';
    const UPDATED_AT = 'mis_a_jour_le';
    protected $fillable = ['nom'];





    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
