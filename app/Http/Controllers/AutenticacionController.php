<?php

namespace App\Http\Controllers;

use App\Services\RolService;
use Illuminate\Http\Request;
use App\Services\AutenticacionService;
use App\Http\Requests\IniciarSesionRequest;

class AutenticacionController extends Controller
{
    protected $autenticacionService;
    protected $rolService;

    public function __construct(AutenticacionService $autenticacionService, RolService $rolService)
    {
        $this->autenticacionService = $autenticacionService;
        $this->rolService = $rolService;
    }

    public function iniciarSesion(IniciarSesionRequest $request)
    {
        $credenciales = $request->only('email', 'password');

        if ($this->autenticacionService->iniciarSesion($credenciales['email'], $credenciales['password'])) {
            $user = auth()->user();

            if (!$user) {
                return back()->withErrors([
                    'error' => 'No se encontró el usuario autenticado.',
                ]);
            }

            if (!$user->rol) {
                return back()->withErrors([
                    'error' => 'El usuario no tiene un rol asignado.',
                ]);
            }

            return $this->rolService->redireccionarPorRol($user->rol);
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }


    public function cerrarSesion()
    {
        $this->autenticacionService->cerrarSesion();
        return redirect()->route('iniciar_sesion');
    }
}
