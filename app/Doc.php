<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Doc extends Model
{
    protected $table = "documents";
    protected $primaryKey = "doc_id";
    const CREATED_AT = "date_cree";
    const UPDATED_AT  = "date_maj";
    const DELETED_AT = "date_supp";

    protected $fillable = ['nom', 'user_id'];
    use SoftDeletes;

    public function files(){
        return $this->belongsToMany('App\File', 'doc_file','doc_id', 'file_id');
    }
    public function setUpdatedAtAttribute($value){
        // to Disable updated_at
        }

    public function user(){
		return $this->belongsTo('App\User','user_id');
    }

}

