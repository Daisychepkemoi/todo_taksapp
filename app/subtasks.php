<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subtasks extends Model
{
	protected $fillable = [
        'subtask_name', 'datedue',
    ];
 public function subtasks()
     { 
        return $this->belongsTo(Tasks::class);
     }
     public function users()
     { 
        return $this->HasMany(subtasks::class);
     }   //
}
