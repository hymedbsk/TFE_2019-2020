<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $table = 'depenses';
    protected $primaryKey = 'dep_id';
    protected $fillable = ['libelle','montant','User_id','budg_id','description'];
    const CREATED_AT = "date_cree";
    use SoftDeletes;
    const DELETED_AT = 'date_supp';
    const UPDATED_AT= 'date_maj';

    public function budgets(){
		return $this->belongsTo('App\Budget','budg_id')->withTrashed();
    }

    public function users(){
		return $this->belongsTo('App\User','User_id')->withTrashed();
	}
    public function setUpdatedAtAttribute($value){
        // to Disable updated_at
    }
}
