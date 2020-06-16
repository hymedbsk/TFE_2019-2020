<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
      protected $table = 'events';
    protected $primaryKey = 'event_id';
    protected $fillable = ['titre','user_id','début','fin','description', 'color'];

    const DELETED_AT = 'date_supp';
    const CREATED_AT = "date_cree";
    const UPDATED_AT = "date_maj";

}
