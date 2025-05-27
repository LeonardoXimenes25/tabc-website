<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckFilamentRole
{

    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna sudah login dan memiliki peran 'admin' atau 'sekretaris'
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'majelis'])) {
            return $next($request); // Lanjutkan request jika peran sesuai
        }

        // Jika peran tidak sesuai, redirect ke halaman home dengan pesan error
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke panel admin.');

        // Atau, kamu bisa mengembalikan response Forbidden (status code 403):
        // abort(403, 'Anda tidak memiliki akses ke panel admin.');
    }
}