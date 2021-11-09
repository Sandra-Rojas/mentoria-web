<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            //'posts' => Post::latest('published_at')->with(['category', 'author'])->filter()->get(),
            'posts' => Post::latest('published_at')
                        ->filter(request(['search']))
                        ->get(),
            'categories' => Category::all(),
            //'test'  => 'bla bla',
            //'posts' => collect([]), //simular que no hay data    
    
            //'posts' => Post::with('category')->get()
            //agrega orden, el ultimo en publicar encabeza listado de post
            //'posts' => Post::latest('published_at')
            //para que la consulta a la bd realice una precarga, y no consulte uno a uno los uusarios, se agrega arreglo con user
            //with es utilizado sólo cuando se llama estaticamente al modelo
            //    ->with('category')
            //->with(['category', 'user'])
        ]);

    }

    Public function show(Post $post) {    
        return view('post', [
         'post' => $post, 
        ]);
    }
}