<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table='forums';
    
    protected $fillable=['id','name','description','slug'];


    //Relacion en la base de datos 1:M
    //Nombre de la funcion recomendado: nombre de lo que va a devolver y si es uno o mas resultados
    public function posts(){
    	return $this->hasMany(Post::class);
    }
    public function replies(){
    	return $this->hasManyThrough(Reply::class, Post::class);
    }

}
