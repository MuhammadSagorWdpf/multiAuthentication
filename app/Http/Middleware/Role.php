<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
       $authRole=Auth::user()->role;
       switch($role){
       case 'admin':
        if($authRole==0)
        {
            return $next($request);
        }
        break;
        case 'doctor':
            if($authRole== 1)
            {
                return $next($request);
            }
            break;
        case 'user':
            if($authRole==2)
            {
                return $next($request);
            } 
            break;   
       }
       switch($authRole)
       {
        case 0:
            return redirect()->route('admindashboard');
        case 1:
            return redirect()->route('doctordashboard');
        case 2:
            return redirect()->route('userdashbaord');        
       }
       return redirect()->route('login');
    }
   
}
