<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class ToolsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = User::where('level','=',3)->get();
        if (count($data) >= 1) {
            return $next($request);   
        }
        return redirect()->route('admin.create');
    }
}
