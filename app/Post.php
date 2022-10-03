<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable=['id','user_id','forum_id','title','description'];
    //'forum_id es la clave foranea de la tabla post'
    public function forum(){
    	return $this->belongsTo(Forum::class, 'forum_id');
    }
    public function owner(){
    	return $this->belongsTo(User::class, 'user_id');
    }
    public function replies(){
    	return $this->hasMany(Reply::class);
    }
}
