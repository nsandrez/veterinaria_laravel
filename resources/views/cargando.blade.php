<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesando...</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @section('css')
    @stop
</head>
<style>
    .center-screen {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
    }

    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border-left-color: #000;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>

<body>
    <div class="center-screen">
        <div class="content">
            <div class="spinner"></div>
            <h1>Procesando... Por favor espera.</h1>
        </div>
    </div>

    <script>
        const rutaRedireccion = "{{ $rutaRedireccion }}";
        const exito = "{{ isset($exito) ? $exito : '' }}";

        setTimeout(function() {
            let urlFinal = `${rutaRedireccion}`;

            if (exito !== '') {
                urlFinal += `?exito=${exito}`;
            }

            window.location.href = urlFinal;
        }, 3000);
    </script>

    @section('js')
    @endsection
</body>

</html>
