<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Judul extends Model
{
    protected $table = 'tb_judul';
    //
    public function tb_users(){
        return $this->belongsTo('App\Models\User', 'user_judul');
        
    }
    public function dp_1nya(){

        return $this->belongsTo('App\Models\User', 'dp_1');
        
     }
    public function dp_2nya(){

         return $this->belongsTo('App\Models\User','dp_2');
        
     }
}

