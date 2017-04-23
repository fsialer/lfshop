<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name','fullname','dni','sex','email', 'password','type','active'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function profile(){
        return $this->hasOne('App\Profile');
    }
    
    public function orders(){
        return $this->hasMany('App\Order');
    }
    
    public static function filterAndPaginate($request){
        return User::full_name($request->name)->type($request->type)->orderBy('id','desc')->paginate();
    }
    public function admin(){
       return $this->type=='admin';
    }
    
    public function setPasswordAttribute($value){
        if(!empty($value)){
            $this->attributes['password']=Hash::make($value);
        }
    }
    
    public function scopeFull_name($query,$name){
         if(trim($name)!=""){
            return $query->where('fullname','LIKE',"%$name%");
        }
    }
    
    public function scopeType($query,$type){
        if($type!=""){
            return $query->where('type',$type);
        }
        
    }
  
}