<x-layout-gen>
    <title>Playlist: {{$playlist->title}}</title>
    <br><br><br>
    <section class="songs-section">
		<div class="container">
            <div class="section-title">
                <h1>{{$playlist->title}}</h1>
                <br>
                <p>{{$playlist->descrip}}</p>
            </div>
        @foreach ($playlist->song()->get() as $song) <!-- Necesito el id, titulo, ubicacion de .jpeg y mp3, en pocas palabras todo -->
            <div class="song-item">
                <div class="song-item">
                     <div class="row">
                        <div class="col-lg-4">
                            <div class="song-info-box">
                                 <img src="{{ asset('storage/' . $song->ubiPortada) }}">
                                    <div class="song-info">
                                        @foreach($song->client()->select('clients.id','clients.username')->get() as $cliente) <!-- Necesito solo el id y el nombre -->
                                            <h4><a href="{{route('cliente.show',$cliente->id)}}" target="_blank">{{$cliente->username}}</a></h4>
                                        @endforeach
                                       <p>{{$song->title}},{{$song->genre}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single_player_container">
                                    <div class="single_player">
                                        <div class="jp-jplayer jplayer" data-ancestor=".jp_container_{{$song->id}}" data-url="{{ asset('storage/' . $song->ubiCancion) }}"></div>
                                            <div class="jp-audio jp_container_{{$song->id}}" role="application" aria-label="media player">
                                                <div class="jp-gui jp-interface">
                                                    <!-- Player Controls -->
                                                    <div class="player_controls_box">
                                                        <button class="jp-play player_button" tabindex="0"></button>
                                                        <button class="jp-stop player_button" tabindex="0"></button>
                                                </div>
                                                    <!-- Progress Bar -->
                                                <div class="player_bars">
                                                <div class="jp-progress" style="pointer-events: none;" >
                                                        <div class="jp-seek-bar">
                                                            <div>
                                                                <div class="jp-play-bar"><div class="jp-current-time" role="timer" aria-label="time">0:00</div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
</x-layout-gen>