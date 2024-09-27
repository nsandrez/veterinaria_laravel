@extends('layout.app')

@section('title', 'Dashboard Veterinario')

@section('contenido-vet')
    <h2 class="text-3xl font-semibold">Bienvenido, {{ auth()->user()->name }}</h2>
    <p class="text-lg text-muted-foreground">Aquí tienes un resumen rápido de la actividad de tu clínica.</p>
    <br>
@endsection
