<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model{

    protected $table = 'post';
    protected $primaryKey = 'Post_id';
    protected $foreignKey = 'User_id';
    protected $fillable = ['User_id','titre','description', 'bac','option','doc'];
    const UPDATED_AT = "date_maj";
    use SoftDeletes;
    const CREATED_AT = "date_cree";
    const DELETED_AT = 'date_supp';

    public function user(){
		return $this->belongsTo('App\User','User_id')->withTrashed();
	}
    //
    
    public function setUpdatedAtAttribute($value){
        // to Disable updated_at
        }

        public function setCreatedAtAttribute($value){
            // to Disable updated_at
            }

}
