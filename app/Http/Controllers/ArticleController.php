<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Manager\ArticleManager;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    private $articleManager;

    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //Récupérer tous les articles
        //$articles = Article::all();

        //Article avec pagination
        $articles = Article::paginate(7);

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
        //$articles = DB::select('SELECT * from articles');
        
        //$articles = DB::select('SELECT * from articles WHERE id = 7');

        return view ('article.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();

        //Element ci-dessous intégrés dans article manager (il n'y a pas d'erreur sur $request)
        // Article::create([
        //     'title' => $request->input('title'),
        //     'subtitle' => $request->input('subtitle'),
        //     'content' => $request->input('content'),
        // ]);

        $this->articleManager->build(new Article(), $request);

        return redirect()->route('articles.index')->with('success', "L'article a bien été sauvegardé.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, Article $article)
    {

        $this->articleManager->build($article, $request);

        // Les éléments ci-dessous ont été factorisés dans un manager
        // $article->title = $request->input('title');
        // $article->subtitle = $request->input('subtitle');
        // $article->content = $request->input('content');
        // $article->save();

        return redirect()->route('articles.index')->with('success', "L'article a bien été modifié.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Article $article)
    {

        $article->delete();

        return redirect()->route('articles.index')->with('success', "L'article a bien été supprimé !");
    }
}
