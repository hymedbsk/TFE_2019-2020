<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';
    protected $primaryKey = 'budg_id';
    protected $fillable = ['nom','total','annee', 'User_id','date_cree','date_supp','date_maj'];
    const CREATED_AT = "date_cree";
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
