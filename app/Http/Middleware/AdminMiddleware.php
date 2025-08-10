<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // چک کردن لاگین بودن با گارد admin
        if (auth()->guard('admin')->check()) {
            return $next($request);
        }

        // اگر لاگین نبود، به صفحه لاگین ادمین ریدایرکت کن
        return redirect()->route('admin.login'); // مطمئن شو این روت وجود داره یا اسمش رو تغییر بده
    }
}
