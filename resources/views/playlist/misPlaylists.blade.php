<x-layout-gen>
    <title>Tus playlists</title>
    <section class="playlist-section spad">
        <div class="container-fluid">
			<div class="section-title">
				<h2>Playlists</h2>
			</div>                                  
			<div class="clearfix"></div>
                <div class="row playlist-area">
                    @foreach($playlist as $playlist) <!-- Necesito el id y titulo, es decir que todo -->
                        <div class="mix col-lg-3 col-md-4 col-sm-6 genres">
                            <div class="playlist-item">
                                <a href="{{route('playlist.show',$playlist->id)}}">
                                    <img src="{{asset('img/playlist-icons/ditto_playlist.gif')}}" alt="playlist_placeholder">
                                </a>
                                <h5>{{$playlist->title}}</h5>
                                <div class="songs-links" style="padding-top: 0px;">
                                    <a href="{{route('playlist.edit',$playlist->id)}}">
                                        <img src="{{asset('img/config-icons/config.png')}}" width="21px" height="20px">
                                    </a>
                                    <div style="display: inline-block; width: auto;">    
                                        <form action="{{ route('playlist.destroy', $playlist->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none; background: none; padding: 0; margin: 0; cursor: pointer;">
                                                <img src="{{asset('img/config-icons/delete.png')}}" width="21px" height="20px" style="padding-left: 0px;"> 
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
		</div>
    </section>
</x-layout-gen>