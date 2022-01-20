<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
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
        $data = [
            ['name' => 'taro', 'mail' => 'taro@email'],
            ['name' => 'hanako', 'mail' => 'hanako@email'],
            ['name' => 'sachiko', 'mail' => 'sachiko@email']
        ];
        $request->merge(['data' => $data]);
        return $next($request);
    }
}
