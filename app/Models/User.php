<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($password){   
        $this->attributes['password'] = bcrypt($password);
    }
    public function post(){
        
        return $this->belongsTo('App\Models\Post','usernya','id');    
    } 
    public function tb_judul(){
        return $this->belongsTo('App\Models\Judul');    
    } 
}