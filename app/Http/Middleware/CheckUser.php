<?php

namespace App\Http\Middleware;

use App\Helpers\MainHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && auth()->user()->role != MainHelper::ROLE_USER) {
            abort(403, 'Bu sahifaga kirish huquqi yo\'q');
        }

        return $next($request);
    }
}
