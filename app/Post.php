<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'category_id', 'content', 'featured'];

    public function category()
    {

    	return	$this->belongsTo('Apps\Category');
    }
}
