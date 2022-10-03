<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    protected $fillable = ['user_id', 'post_id', 'reply'];

    // Para poder acceder al Foro desde esta tabla crearemos un atributo extra
    protected  $appends = ['forum'];

    public function post(){
    	return $this->belongsTo(Post::class, 'post_id');
    }

    public function autor(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    // Y aquí definimos el Atributo extra
    // Para hacer eso, la función debe comenzar por "get"
    // y finalizar por "Attribute" (y lo de en medio CamelCase)
    public function getForumAttribute() {
    	return $this->post->forum;
    }

}
