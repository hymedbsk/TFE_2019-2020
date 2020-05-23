<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class File extends Model
{
   protected $table = "fichier";
    protected $primaryKey = "file_id";
    const CREATED_AT = "ajoute_le";
    const DELETED_AT = "supp_le";
    const UPDATED_AT = "date_maj";
    public function setUpdatedAtAttribute($value){
        // to Disable updated_at
        }

    protected $fillable = ['file_nom','ajoute_par','doc_id'];
    use SoftDeletes;

    public function user(){
		return $this->belongsTo('App\User','ajoute_par')->withTrashed();
    }

    public function docs()
    {
        return $this->belongsToMany('App\Doc', 'doc_file','file_id','doc_id');
    }


}
