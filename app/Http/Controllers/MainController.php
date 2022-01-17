<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

        //Article avec pagination
        //$articles = Article::paginate(4);

        //Récupérer tous les articles
        //$articles = Article::all();

        //Trouver un article avec un id
        //$articles = Article::find(1);

        //Trouver un article avec un id ou envoyer une 404
        //$articles = Article::findOrFail(1);

        //Trouver un article en utilisant une autre colonne
        //$articles = Article::where('title', 'Nemo qui temporibus enim')->first();

        //Trouver un article en utilisant une autre colonne ou envoyer une 404
        //$articles = Article::where('title', 'Nemo qui temporibus enim')->firstOrFail();

        //----------------------QUERY BUILDER------------------------//
        //SELECT:
        //$articles = DB::select('SELECT * from articles'); sans querry builder
        
        //QB recherche dans un tableau par l'ID et avoir toutes les datas
        // $articles = DB::table('articles')
        //     ->where('id', 7)
        //     ->get();

        //QB recherche dans un tableau par l'ID et avoir uniquement le content
        // $articles = DB::table('articles')
        //     ->select('content')
        //     ->where('id', 7)
        //     ->get();

        //QB recherche des posts créés avant aujourd'hui
        // $articles = DB::table('articles')
        //      ->select('created_at')
        //      ->where('created_at', '<', now()->subDay())
        //      ->get();

        //QB recherche des posts créés avant aujourd'hui
        //  $articles = DB::table('articles')
        //       ->select('created_at')
        //       ->where('created_at', '<', now()->subDay())
        //       ->get();

        //QB recherche des posts créés avant aujourd'hui ou autre
        // $articles = DB::table('articles')
        //         ->select('title')
        //       ->where('created_at', '>', now()->subDay())
        //       ->orWhere('id', 7)
        //       ->get();

        //QB recherche des posts créés entre aujourd'hui et il y a tant de jours
        $articles = DB::table('articles')
              ->select('created_at', 'id')
              ->where('created_at', '>', now()->subDays(17))
              ->get();

        dd($articles );

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
