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
    <link rel="stylesheet" href="css/custom/login.css">
    <title>Iniciar Sesión - Casa Martínez</title>
</head>
<body>

	<div class="fondo-produccion">
		<form action="{{ route('login') }}" method="post">
			@csrf
			
			<div class="imgcontainer">
				<img src="/img/logo-prueba.jpg" alt="Avatar" class="avatar">
			</div>
			
			<div class="container">
				<label for="email"><b>E-MAIL</b></label>
				<input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Correo electrónico" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus name="email">

				@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			
			<div class="container">
				<label for="password"><b>CONTRASEÑA</b></label>
				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="contraseña">
				@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>

			<div class="container">
				<button type="submit" class="login">LOGIN</button>
				<!--
				<hr style="color: white !important; height: 3px; border-top: 1.5px solid rgba(255, 255, 255, 1);">
				<button type="submit" class="login">REGISTRARSE</button>
			-->
			</div>

			<div class="container">
				<label class="label-text">
					<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
				</label>
				<span class="psw">
					@if (Route::has('password.request'))
					<a href="{{ route('password.request') }}">
						{{ __('¿Olvidaste tu contraseña?') }}
					</a>
					@endif
				</span>
			</div>
			
			<div class="container">
				<span class="register">¿No tienes cuenta? <a href="/register"> Regístrate.</a></span>
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
						<li> | </li>
						<li><a href="">PREGUNTAS FRECUENTES</a></li>
					</ul>
				</div>
				<div>
					© 2020, casamartinez.mx, Todos los derechos reservados.
				</div>
			</center>	
		</div>

	</div>
</body>
</html>