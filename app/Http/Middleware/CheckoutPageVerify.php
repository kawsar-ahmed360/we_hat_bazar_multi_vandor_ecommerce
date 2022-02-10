<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cart;
class CheckoutPageVerify
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
        $count = count(Cart::content());
        if ($count<=0) {
            return redirect('/');
        }
        return $next($request);

    }
}
