<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckForDeveloperAccountMiddleware
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
        if(auth()->id() == 1){
            return $next($request);
        }
        else{
            return redirect()->to(route('dashboard', ['lang' => 'eng']))
                ->with(['message' => translate('You must be developer'), 'type' => 'error']);
        }
    }
}
