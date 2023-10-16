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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!auth()->check()) {
        //     return redirect('/login');
        // }
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $user = User::where('email', $email)->first();
        // if ($user && Hash::check($password, $user->password))
        // {

        // }
   


        $user = Auth::user();

        if ($user && $user->status == 1) {
            // Admin user, redirect to admin dashboard
            return redirect()->route('admin.dashboard');
        } else {
            // Normal user, proceed with the request
            return $next($request);
        }
        
        
    }
    
}

