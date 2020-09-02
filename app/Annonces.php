<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonces extends Model
{
   protected  $table = "annonces";
   protected $primaryKey = "annonce_id";
   protected $fillable = ['titre','contenu','user_id'];
   const CREATED_AT = "date_cree";
   const UPDATED_AT = "date_maj";
   const DELETED_AT = "date_supp";
   use SoftDeletes;

   public function user(){
        return $this->belongsTo('App\User','user_id');
    }

}


