<?php

namespace App\Http\Middleware;

use Closure;

class VerifiedWare
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
        if( ! empty(auth()->user()->email_verified_at)):

            if(auth()->user()->role ==  "admin"):
                return redirect('admin/dashboard');
            elseif(auth()->user()->role ==  "member"):
                return redirect('member/dashboard');
            else:
                return redirect('login')->with('error', "user role not defined");
            endif;

        endif;


        $response = $next($request);
        
        return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
    }
}
