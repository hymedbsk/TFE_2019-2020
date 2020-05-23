<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Budget extends Model{

    protected $table = 'budget';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nom','total','annee', 'User_id','date_ajout','date_supp','date_maj'];
    const CREATED_AT = "date_ajout";
    use SoftDeletes;
    const DELETED_AT = 'date_supp';
    const UPDATED_AT = 'date_maj';
    public function depenses(){
        return $this->hasMany('App\Depense');
    }

    public function users(){
		return $this->belongsTo('App\User','User_id')->withTrashed();
	}


}
