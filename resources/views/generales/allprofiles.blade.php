<x-layout-gen>
    @foreach($clients as $client)
        <section class="songs-details-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="song-details-box">
                                <h3>Mis redes</h3>
                                <ul>
                                    @if($client->twitter)
                                        <li><strong>Twitter:</strong><a href="https://www.twitter.com/{{$client->twitter}}" target="_blank"><span>{{$client->twitter}}</span></a></li>
                                    @endif
                                    @if($client->facebook)
                                        <li><strong>Facebook:</strong><a href="https://www.facebook.com/{{$client->facebook}}" target="_blank"><span>{{$client->facebook}}</span></a></li>
                                    @endif
                                    @if($client->instagram)
                                        <li><strong>Twitter:</strong><a href="https://www.instagram.com/{{$client->instagram}}" target="_blank"><span>{{$client->instagram}}</span></a></li>
                                    @endif
                                    @if($client->email)
                                        <li><strong>Para mayor contacto:</strong><span>{{$client->email}}</span></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="song-details-box">
                                        <h3>Sobre el artista</h3>
                                        <div class="artist-details">
                                        <img src="{{ asset('storage/' . $client->ubiFoto) }}">
                                            <div class="ad-text">
                                                <h5>{{$client->username}}</h5>
                                                <span>Artista</span>
                                                <p>{{$client->descrip}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="song-details-box">
                                            <h3>Mis ultimas canciones</h3>
                                        </div>
                                        <section class="songs-section">
                                            @foreach ($client->song()->orderBy('created_at','desc')->take(2)->get() as $song) 
                                                <div class="container">
                                                    <h1></h1>
                                                    <div class="song-item">
                                                            <div class="song-item">
                                                                <div class="row">
                                                                    <div class="col-xl-5 col-lg-12 col-md-5">
                                                                        <div class="song-info-box">
                                                                            <img src="{{ asset('storage/' . $song->ubiPortada) }}">
                                                                            <div class="song-info">
                                                                                <h4>{{$song->title}}</h4>
                                                                                <p>{{$song->genre}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-7 col-lg-12 col-md-7">
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
                                                </div>
                                            @endforeach
                                        </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <br><br>
    @endforeach
</x-layout-gen>