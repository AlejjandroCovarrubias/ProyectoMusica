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
	<link rel="stylesheet" href=" {{asset('css/bootstrap.min.css')}}"/>
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
		<a href="index.html" class="site-logo">
			<img src="img/logo.png" alt=""> 
		</a>
		<div class="header-right">
			<div class="user-panel">
				@if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Mi cuenta</a>
						<form method="POST" action="{{ route('logout') }}" x-data>
							@csrf
							<a href="{{ url('/logout') }}"
								onclick="event.preventDefault();
								this.closest('form').submit();
								document.getElementById('logout').submit();">
							Salir de la sesion
							</a>
						</form>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar sesion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrarse</a>
                        @endif
                    @endauth
                </div>
            	@endif
			</div> 
		</div>
		<ul class="main-menu">
			<li><a href="{{route('cliente.index')}}">Inicio</a></li>
			<li><a href="#">Playlists</a>
				<ul class="sub-menu">
					<li><a href="#">Por genero</a></li>
					<li><a href="#">Por fecha</a></li>
					<li><a href="#">Por usuario</a></li>
					<li><a href="#">Por nombre</a></li>
				</ul>
			</li>
			<li><a href="#">Mis playlists</a></li>
            <li><a href="{{route('cliente.create')}}">Registrate como artista</a></li>
			<li><a href="{{route('cliente.seleccion-cuenta', $clients=Auth::user() )}}">Subir canciones</a></li>
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

	</body>
</html>