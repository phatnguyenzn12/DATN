<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // dd(Auth::user()->type);
        $allowRoles = explode('|', $roles);
        if(Auth::user()->type == 0){
            return redirect()->route('auth.login')->with('failed','Tài khoản chưa xác thực email');
        }
        else if (in_array(Auth::user()->getStrType(), $allowRoles)) {
            return $next($request);
        }
        
        return redirect()->route('client');
    }
}
