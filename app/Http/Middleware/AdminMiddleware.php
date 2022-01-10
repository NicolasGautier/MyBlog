<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /*Les étapes :
        - Créer AdminMiddleware
        - Dans Kernel.php, ajouter : 'admin' => \App\Http\Middleware\AdminMiddleware::class
        - Dans web.php, ajouter la route : Route::get('/admin/articles', [ArticleController::class, 'index'])->middleware('admin');
        */ 

        $user = Auth::user();
        if(!$user){
          return redirect()->route('login');      
        }

        if($user->role !== User::ADMIN_ROLE){
          return redirect()->route('login');
            
        }

        return $next($request);
    }
}
