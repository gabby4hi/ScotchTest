<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $fillable = ['user_id','avatar', 'facebook','youtube','about'];
    public function user(){
    	$this->belongTo('App\User');
    }
}
