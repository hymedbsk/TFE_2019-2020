<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gain extends Model
{
    protected $table = 'gain';
    protected $primaryKey = 'id';
    protected $fillable = ['id','qte','User_id','budg_id','description','date_cree','date_supp'];
    const CREATED_AT = "date_cree";
    use SoftDeletes;
    const DELETED_AT = 'date_supp';


    public function budgets(){
		return $this->belongsTo('App\Budget','budg_id');
    }

    public function users(){
		return $this->belongsTo('App\User','User_id');
	}

}
