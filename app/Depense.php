<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depense extends Model
{
    protected $table = 'depense';
    protected $primaryKey = 'id';
    protected $fillable = ['id','libelle','montant','User_id','budg_id','description','date_cree','date_supp'];
    const CREATED_AT = "date_cree";
    use SoftDeletes;
    const DELETED_AT = 'date_supp';


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
