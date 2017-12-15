<?php

namespace App\Http\Middleware;

use Closure,Auth;

class CheckAdmin
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
        if(Auth::check()&&Auth::user()->admin==1){
            // Nếu đã chứng thực và level ==1 (là admin)
            return $next($request);
        }else{
            return redirect('/');
            // Nếu không phải chuyển hướng về trang chủ
        }
        return $next($request);
    }
}
