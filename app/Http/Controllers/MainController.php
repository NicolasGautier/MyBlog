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
        $articles = Article::paginate(4);

        //Récupérer tous les articles
        // $articles = Article::all();

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
        // $articles = DB::table('articles')
        //       ->select('created_at', 'id')
        //       ->where('created_at', '>', now()->subDays(17))
        //       ->get();

        //LEFT JOIN (renvoie une valeur même si nul) Ce qui est entre parenthèses, c'est ce qu'il y a dans la bdd
        // $articles = Article::leftJoin('categories', 'categories.id', '=', 'articles.category_id')
        //                     ->select('articles.title as title', 'categories.label as label')
        //                     ->get();       
        
        // $articles = Article::leftJoin('categories', 'categories.id', '=', 'articles.category_id')
        //                     ->select('articles.*')
        //                     ->get();       
                            
        //équivalent en select = select `articles`.* from `articles` left join `categories` on `categories.id` = `articles.category_id`;
        

        //jointure multiple en ELOQUENT
        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();

        //jointures multiples en SQL
        
        // SELECT
        // i.num AS num,
        // i.title AS info,
        // i.total AS total,
        // client.name AS client,
        // i.inv_date AS date_facture,
        // i.payment AS date_paiement
        // FROM invoice AS i
        // INNER JOIN  quote ON i.quote_id = quote.id
        // INNER JOIN  project ON quote.project_id = project.id
        // INNER JOIN client ON project.client_id = client.id

        //sous requêtes Eloquent
//         $latestPosts = DB::table('posts')
//                    ->select('user_id', DB::raw('MAX(created_at) as last_post_created_at'))
//                    ->where('is_published', true)
//                    ->groupBy('user_id');

// $users = DB::table('users')
//         ->joinSub($latestPosts, 'latest_posts', function ($join) {
//             $join->on('users.id', '=', 'latest_posts.user_id');
//         })->get();

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
