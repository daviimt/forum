<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Forum extends Model
{
    protected $table='forums';
    
    protected $fillable=['id','name','description','slug'];

    protected static function boot() {
        parent::boot();

        static::creating(function($forum) {
            if( ! App::runningInConsole() ) {
                $forum->slug = str_slug($forum->name , "-");
            }
        });
    }

    //Relacion en la base de datos 1:M
    //Nombre de la funcion recomendado: nombre de lo que va a devolver y si es uno o mas resultados
    public function getRouteKeyName() {
        return 'slug';
    }
    public function posts(){
    	return $this->hasMany(Post::class);
    }
    public function replies(){
    	return $this->hasManyThrough(Reply::class, Post::class);
    }

}
