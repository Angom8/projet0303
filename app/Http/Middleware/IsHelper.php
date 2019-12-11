<?php

namespace App\Http\Middleware;
use Closure;
class IsHelper
{
    /**

     * Handle an incoming request.

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @return mixed

     */

    public function handle($request, Closure $next)
    {
        if(auth()->user()->type_utilisateur == 1 or auth()->user()->type_utilisateur == 2){

            return $next($request);

        }
        return redirect('home');

    }

}