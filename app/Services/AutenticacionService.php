<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AutenticacionService
{

    public function iniciarSesion($email, $password)
    {
        $usuario = User::where('email', $email)->first();

        if ($usuario && Hash::check($password, $usuario->password)) {
            $usuario->ultima_conexion = Carbon::now();
            $usuario->save();

            Auth::login($usuario);

            return true;
        }
        return false;
    }


    public function cerrarSesion()
    {
        Auth::logout();
    }
}
