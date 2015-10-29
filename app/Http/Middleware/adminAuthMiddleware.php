<?php

namespace App\Http\Middleware;

use Closure;
use Auth,Redirect;
class adminAuthMiddleware
{
	public function _construct(){
		$this->middleware('auth');
	}
	
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {	
		if(Auth::check()){
			if(Auth::user()->admin_id == 1){
				return $next($request);
			}
				return Redirect::back();
		}else{
			return Redirect::to('auth/login');
		}	


        
    }
}
