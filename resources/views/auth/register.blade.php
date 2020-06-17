<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/custom/bootstrap.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Markazi+Text&family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fonts/style.css">
    <link rel="stylesheet" href="css/custom/register.css">
    <title>Registrarse - Casa Martínez</title>
</head>
<body>

    <div class="fondo-produccion">
      
        <h3>CREAR CUENTA</h3>    
      
        <div class="contenedor">

            <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="contain">
                <label for="name"><b>NOMBRE(S):</b></label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text" id="name" value="{{ old('name') }}" required autocomplete="given-name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="contain">
                <label for="last_name"><b>APELLIDOS:</b></label>
                <input id="last_name" type="text" name="last_name" class="form-control" required autocomplete="family-name">
            </div>

            <div class="contain">
                <label for="email"><b>E-MAIL:</b></label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="contain">
                <label for="password"><b>CONTRASEÑA:</b></label>
                <input id="password" type="password" placeholder="Contraseña" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" >
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="contain">
                <label for="password-confirm"><b>CONFIRMAR LA CONTRASEÑA:</b></label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma la Contraseña">
            </div>

            <div class="contain">
                <button type="submit" class="login">REGISTRARSE</button>
                <!--
                <hr style="color: white !important; height: 3px; border-top: 1.5px solid rgba(255, 255, 255, 1);">
                <button type="submit" class="login">REGISTRARSE</button>
            -->
            </div>

            <div class="contain" style="text-align: center;">
                <span class="psw">
                    ¿Ya tienes cuenta? 
                    <a href="/login">
                        {{ __('Inicia sesión.') }}
                    </a>
                </span>
            </div>
        </form>


        <div class="footer">
            <center>
                <div>
                    <ul>
                        <li><a href="">CONDICIONES DE USO</a></li>
                        <li> | </li>
                        <li><a href="">AVISO DE PRIVACIDAD</a></li>
                        <li> | </li>
                        <li><a href="">AYUDA</a></li>
                    </ul>
                </div>
                <div>
                    © 2020, casamartinez.mx, Todos los derechos reservados.
                </div>
            </center>   
        </div>
    
    </div>

    </div>
</body>
</html>