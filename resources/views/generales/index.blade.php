<x-layout-gen>
    <section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>Musica</span> para todos.</h2>
								<p>¿Quieres darte a conocer como artista?, ¿Quieres simplemente escuchar buena música de artistas de primera categoría? ¡Entonces únete a <b>MeloMusic</b>!</p>
                                @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/dashboard') }}" class="site-btn">Mi cuenta</a>
                                        @else
                                            <a href="{{ route('login') }}" class="site-btn">Iniciar sesion</a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="site-btn sb-c2">Registrate</a>
                                            @endif
                                        @endauth
                                @endif
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="img/hero-bg.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>Es </span> tu momento.</h2>
								<p>¿En algún momento soñaste con ser un artista? ¡Quizás esta pueda ser tu oportunidad de cumplirlo en <b>MeloMusic</b>! </p>
								@if (Route::has('login'))
                                        @auth
                                            <a href="{{ route('cliente.seleccion-cuenta', $clients=Auth::user() )}}" class="site-btn">Sube tu música</a>
                                            <a href="{{ route('cliente.create')}}" class="site-btn sb-c2">Registrate como artista</a>
                                        @endauth
                                @endif
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="img/hero-bg.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</x-layout-gen>