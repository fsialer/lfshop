<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     protected $table="profiles";
    protected $fillable=['user_id','dni','type_phone','phone','address','sex'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
