<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks';
    protected $primaryKey = "id";
    protected $fillable = ['name', 'description', 'task_date', 'task_end', 'color'];
}
