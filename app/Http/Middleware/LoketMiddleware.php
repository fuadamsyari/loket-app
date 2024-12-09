<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Loket;

class LoketMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $loket = Loket::where('user_id', Auth::id())->first();
            if ($loket) {
                // Menyimpan ke session
                session(['loket_id' => $loket->id]);
            }
        }

        return $next($request);
    }
}
