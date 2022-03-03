<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRegistrationStep
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
        if (auth()->user()->registration_step == 1) {
            return redirect()->route('register', ['registration_step' => 2]);
        } else if (auth()->user()->registration_step == 2) {
            return redirect()->route('register', ['registration_step' => 3]);
        } else if (auth()->user()->registration_step == 3) {
            return redirect()->route('register', ['registration_step' => 4]);
        } else {
            return $next($request);
        }
    }
}
