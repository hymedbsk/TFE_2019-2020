<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class File extends Model
{
   protected $table = "fichiers";
    protected $primaryKey = "file_id";
    const CREATED_AT = "date_cree";
    const DELETED_AT = "date_supp";
    const UPDATED_AT = "date_maj";
    public function setUpdatedAtAttribute($value){
        // to Disable updated_at
        }

    protected $fillable = ['file_nom','user_id','doc_id'];
    use SoftDeletes;

    public function user(){
		return $this->belongsTo('App\User','user_id')->withTrashed();
    }

    public function docs()
    {
        return $this->belongsToMany('App\Doc', 'doc_file','file_id','doc_id');
    }


}

