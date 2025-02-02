<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Parentt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        //role 
        if(Auth::user()->role==1){
            return redirect()->route('admin.dashboard');
        }
        
        if(Auth::user()->role==2){
            return redirect()->route('student.home');
        }
        if(Auth::user()->role==3){
            return $next($request);
            
        }
        if(Auth::user()->role==4){
            return redirect()->route('.home');
        }
    }
    }

