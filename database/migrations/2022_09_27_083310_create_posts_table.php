<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            //Las tablas a las que referencian las claves foraneas 
            //Tienen que estar creadas con fecha anterior a las que tienen las claves
            $table->engine = "InnoDB";      // Esto permite escribir Relaciones y Claves Foráneas 
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');     // Creamos la columna que hará de clave foránea
            $table->foreign('user_id')->references('id')->on('users');    // Definición de la clave foránea
            $table->unsignedBigInteger('forum_id');     // Creamos la columna que hará de clave foránea
            $table->foreign('forum_id')->references('id')->on('forums');    // Definición de la clave foránea
            $table->string('title');     		// Título del Post
            $table->text('description');    	// Descripción del Post
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
