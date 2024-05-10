<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="SolMusic HTML Template">
	<meta name="keywords" content="music, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section clearfix">
		<a href="index.html">
			<img src="{{asset('logo/Meloetta_logo.png')}}" width="100" style="padding-top: 15px;" alt="logo-meloetta"> 
		</a>
		<ul class="main-menu">
			<li><a href="/">Inicio</a></li>
			<li><a href="#">Playlists</a>
				<ul class="sub-menu">
					<li><a href="#">Por genero</a></li>
					<li><a href="#">Por fecha</a></li>
					<li><a href="#">Por usuario</a></li>
					<li><a href="#">Por nombre</a></li>
				</ul>
			</li>
            <li><a href="{{route('cliente.create')}}">Registrate como artista</a></li>
			@if(Auth::user())
				<li><a href="{{route('cliente.seleccion-cuenta', $clients=Auth::user() )}}">Subir canciones</a></li>
			@endif
			@if (Route::has('login'))
                    @auth
						<li><a href="#">Opciones de cuenta</a>
						<ul class="sub-menu">
							@if(Auth::user()->clients())
								<li><a href="#">Mis perfiles de artista</a></li>
							@endif
							<li><a href="{{ route('profile.show') }}">Mi cuenta</a></li>
							<form method="POST" action="{{ route('logout') }}">
								@csrf
								<li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); this.closest('form').submit(); document.getElementById('logout').submit();">Salir</a></li>
							</form>
						</ul>
                    @else
						<li><a href="#">Registrate/Inicia</a>
						<ul class="sub-menu">
							<li><a href="{{ route('login') }}">Iniciar sesion</a></li>
							@if (Route::has('register'))
								<li><a href="{{ route('register') }}">Registrarse</a></li>
							@endif
						</ul>
                    @endauth
            	@endif
			</li>
		</ul>
	</header>
	<!-- Header section end -->

    {{$slot}}

	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-7 order-lg-2">
					<div class="row">
						<div class="col-sm-4">
							<div class="footer-widget">
								<h2>Sobre nosotros</h2>
								<ul>
									<li><a href="#">Historia</a></li>
									<li><a href="#">Vision</a></li>
                                    <li><a href="#">Legal</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="footer-widget">
								<h2>Canciones</h2>
								<ul>
									<li><a href="#">Por genero</a></li>
									<li><a href="#">Por nombre</a></li>
									<li><a href="#">Ultimas agregadas</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="footer-widget">
								<h2>Playlists</h2>
								<ul>
									<li><a href="#">Por genero</a></li>
									<li><a href="#">Por nombre</a></li>
									<li><a href="#">Ultimas agregadas</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-5 order-lg-1">
					<img src="img/logo.png" alt="">
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->
	
	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/mixitup.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<!-- Audio Player and Initialization -->
	<script src="{{asset('js/jquery.jplayer.min.js')}}"></script>
	<script src="{{asset('js/jplayerInit.js')}}"></script>

	</body>
</html>