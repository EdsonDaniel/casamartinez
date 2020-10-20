<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('/css/custom/bootstrap.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;1,400&family=Markazi+Text&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/fonts/style.css">
    <link rel="stylesheet" href="/css/custom/login.css">
    <title>Restablecer Contraseña - Casa Martínez</title>
</head>
<body>
    <div class="fondo-produccion">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            
            <div class="imgcontainer">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h1 style="padding-top: 60px;" id="home"><a href="/">CASA MARTÍNEZ</a></h1>
                <h3 >Restablecer contraseña</h3>
            </div>
            
            <div class="container">
                <label for="email"><b>E-MAIL:</b></label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Correo electrónico" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus name="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="container">
                <button type="submit" class="login">Enviar enlace por e-mail</button>
                <!--
                <hr style="color: white !important; height: 3px; border-top: 1.5px solid rgba(255, 255, 255, 1);">
                <button type="submit" class="login">REGISTRARSE</button>
            -->
            </div>

            <div class="container">
                <p>Te enviaremos por e-mail un enlace para que puedas reestablecer tu contraseña.</p>
            </div>
        </form>

        <div class="footer">
            <center>
                <div>
                    <ul>
                        <li><a href="">CONDICIONES DE USO</a></li>
                        <li> | </li>
                        <li><a href="">AYUDA</a></li>
                        <li> | </li>
                        <li><a href="">AVISO DE PRIVACIDAD</a></li>                                             
                    </ul>
                </div>
                <div>
                    © 2020, <a href="/">casamartinez.mx,</a> Todos los derechos reservados.
                </div>
            </center>   
        </div>

    </div>
</body>
</html>
