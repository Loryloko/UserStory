<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Gestisce dinamicamente il redirect dopo che l'utente ha fatto il Login
     */
    public function toResponse($request)
    {
        if (Auth::user()->is_revisor) {
            return redirect()->route('revisor.index');
        }

        return redirect()->route('announcements.create');
    }
}
