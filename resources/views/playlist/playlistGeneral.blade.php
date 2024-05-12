<x-layout-gen>
    <title>Musica de la gente</title>
    <section class="playlist-section spad">
        <div class="container-fluid">
			<div class="section-title">
				<h2>Playlists</h2>
			</div>                                  
			<div class="clearfix"></div>
                <div class="row playlist-area">
                    @foreach($playlist as $playlist)
                        <div class="mix col-lg-3 col-md-4 col-sm-6 genres">
                            <div class="playlist-item">
                                <a href="{{route('playlist.show',$playlist->id)}}">
                                    <img src="{{asset('img/playlist-icons/ditto_playlist.gif')}}" alt="playlist_placeholder">
                                </a>
                                <h5>{{$playlist->title}}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
		</div>
    </section>
</x-layout-gen>