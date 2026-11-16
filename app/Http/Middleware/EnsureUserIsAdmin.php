<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário logado é admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Se não for admin, redireciona para o dashboard comum
        return redirect('/dashboard')->with(
            'error',
            'Acesso negado. Área exclusiva do administrador.'
        );
    }
}