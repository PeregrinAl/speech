<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        if (!Auth::check()) 
            return redirect('login'); //сбой проверки авторизации - иди на форму

        $user = Auth::user();

        if($user->isAdmin())
            return $next($request); // это пропуск дальше -ты админ - значет везде можно ходить

        foreach($role as $item) { // перебор ролей из списка

            if($user->hasRole($item))
                return $next($request); // это пропуск дальше - роль совпала
        }

        return redirect('403'); //тут страница с ошибкой должна быть
    }
}
