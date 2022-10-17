<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $table='posts';
    protected $fillable=['id','user_id','forum_id','title','description','slug'];
    //'forum_id es la clave foranea de la tabla post'

    protected static function boot() {
        parent::boot();

        static::creating(function($post) {
            if( ! App::runningInConsole() ) {
                $post->user_id = auth()->id();
                $post->slug = str_slug($post->title,'-');
            }
        });

        static::deleting(function($post) {
            if( ! App()->runningInConsole() ) {
                if($post->replies()->count()) {
                    $post->replies()->delete();
                }
            }
        });
    
    }

    public function getRouteKeyName() {
        return 'slug';
    }
    public function forum(){
    	return $this->belongsTo(Forum::class, 'forum_id');
    }
    public function owner(){
    	return $this->belongsTo(User::class, 'user_id');
    }
    public function replies(){
    	return $this->hasMany(Reply::class);
    }

    public function isOwner() {
        return $this->owner->id === auth()->id();
        // También es posible ponerlo de la siguiente forma
        // return $this->owner == auth()->user();
    }
    
}
