<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
     public function task()
     { 
        return $this->belongsTo(Users::class);
     }
     public function subtasks()
     { 
        return $this->HasMany(subtasks::class);
     }
}
