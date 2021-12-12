<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
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
        $localId = "KiTRs1vPr0RDpnrQtnViYHtFaUU2";
        if($request->header('API_KEY') != $localId){
            return response()->json(['message'=>'Failed to load api key'], 401);
        }
        return $next($request);
    }
}
