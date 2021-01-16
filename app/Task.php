<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    //
    public function r_user(){
        return $this->hasOne('App\User','id','r_user_id')->withDefault();
    }
    
    public function u_user(){
        return $this->hasOne('App\User','id','u_user_id')->withDefault();
    }
    
    public function task_statuses(){
    return $this->belongsTo('App\Task_status');
    }
    
}
