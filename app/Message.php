<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Message extends Model{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $fillable = ['message'];

    public function user(){
         return $this->belongsTo('App\User');
    }

}
