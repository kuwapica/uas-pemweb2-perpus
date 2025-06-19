<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Jika yang login adalah admin, redirect ke halaman buku admin
                if ($guard === 'admin') {
                    return redirect()->route('admin.buku');
                }

                // Jika yang login adalah mahasiswa (atau guard default 'web')
                // Redirect ke halaman daftar buku mahasiswa
                return redirect()->route('daftarbuku');
            }
        }
        return $next($request);
    }
}
