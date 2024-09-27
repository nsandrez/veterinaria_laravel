<?php

namespace App\Services;


class RolService
{

    public function redireccionarPorRol($rol)
    {
        switch ($rol) {
            case 'Veterinario':
                return view('cargando')->with('rutaRedireccion', route('inicio.dashboard_vet'));
            case 'Administrador':
                return view('cargando')->with('rutaRedireccion', route('inicio.dashboard_admin'));
            case 'Test':
                return view('cargando')->with('rutaRedireccion', route('inicio.dashboard_test'));
            default:
                return redirect()->route('iniciar_sesion');
        }
    }
}
