<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Show Home View
     *
     * @return void
     */
    public function home(){
        return view('home');
    }

    /**
     * Display the list of articles
     *
     * @return void
     */
    public function index(){

        $articles = Article::paginate(4);
        return view('articles', [
            'articles' => $articles
        ]);
    }

    public function show(Article $article){
        // $article = Article::where('slug', $slug)->firstOrFail();
        
        return view ('article', [
            'article' => $article
        ]);
    }

}
