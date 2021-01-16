<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_status extends Model
{
    //
    public function task(){
    return $this->hasMany('App\Task');
    }
}
