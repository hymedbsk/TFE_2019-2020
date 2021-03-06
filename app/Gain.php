<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gain extends Model
{
    protected $table = 'gains';
    protected $primaryKey = 'gain_id';
    protected $fillable = ['libelle','montant','User_id','budg_id','description'];
    const CREATED_AT = "date_cree";
    use SoftDeletes;
    const DELETED_AT = 'date_supp';
   const UPDATED_AT ='date_maj';

    public function budgets(){
		return $this->belongsTo('App\Budget','budg_id')->withTrashed();
    }

    public function users(){
		return $this->belongsTo('App\User','User_id');
	}
    public function setUpdatedAtAttribute($value){
        // to Disable updated_at
    }
}
