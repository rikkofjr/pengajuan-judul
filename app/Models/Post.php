<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'tb_posts';
    protected $fillable = [
        'title', 'isi', 'usernya', 'categorynya'
    ];
    public function users(){
        
        return $this->belongsTo('App\Models\User','usernya','id');
        
    } 
    public function category(){
        
        return $this->belongsTo('App\Models\Category','usernya','id');
        
    } 
}
