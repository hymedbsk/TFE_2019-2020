<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Doc extends Model
{
    protected $table = "document";
    protected $primaryKey = "doc_id";
    const CREATED_AT = "cree_le";
    const DELETED_AT = "supprimer_le";

    protected $fillable = ['nom','cree_par'];
    use SoftDeletes;

    public function files(){
        return $this->belongsToMany('App\File', 'doc_file','doc_id', 'file_id');
    }
    public function setUpdatedAtAttribute($value){
        // to Disable updated_at
        }

    public function user(){
		return $this->belongsTo('App\User','cree_par')->withTrashed();
    }

}
