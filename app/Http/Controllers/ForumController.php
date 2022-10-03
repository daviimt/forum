<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    public function index(){
      //Utiliza el modelo forum
      //Muestra todos los registros de la tabla forum
      //Es como un SELECT * FROM forum;
		//$forums=Forum::all();
      //$forums = Forum ::latest()->paginate(5);
      $forums = Forum::with(['replies', 'posts'])->paginate(5);
        //Muestra un registro de la BD
  //  dd($forums[3]);
        //Mostrar todos los registros de la BD
       // dd($forums);

    return view('forums.index', compact('forums'));
	}

   public function show(Forum $forum)  // Con esto estamos inyectando el Foro completo
	{
      //with(['owner']) -> pide ejecutar la funcion owner ya que esta en el modelo de la tabla Post
      //devuelve la info del usuario de cada foro
      //Select * from user
		$posts = $forum->posts()->with(['owner'])->paginate(2);
      return view('forums.detail', compact('forum','posts'));
      dd($posts);
      
	}

}
