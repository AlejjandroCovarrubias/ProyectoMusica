<x-layout-gen>
    <title>Crear playlist</title>
    <div class="container" style="text-align: center;">
        <br><br>
        <h1>Crear playlist</h1>
        <br><br>
        <form action="{{route('playlist.store')}}" method="POST" class="contact-from">
            <div class="row">
                @csrf
                <label for="title" style="display: inline-block; text-align:left;">Titulo</label>
                <input type="text" name="title" style="@error('title') border-color: red; @enderror" value="{{ old('title') }}">
                <label for="descrip" style="display: inline-block; text-align:left;">Descripcion</label>
                <textarea name="descrip" cols="40" rows="5" style="@error('descrip') color: red; @enderror">{{ old('descrip') }}</textarea>
                <label for="canciones">Selecciona algunas canciones:</label>
            </div>
                <section class="songs-section">
                    @foreach ($songs as $song)
                        <div class="song-item">
                            <div class="song-item">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="song-info-box">
                                            <img src="{{ asset('storage/' . $song->ubiPortada) }}">
                                            <div class="song-info">
                                                @foreach($song->client()->get() as $cliente)
                                                    <h4><a href="{{route('cliente.show',$cliente->id)}}" target="_blank">{{$cliente->username}}</a></h4>
                                                @endforeach
                                                <p>{{$song->title}},{{$song->genre}}</p>
                                                <div class="owl-dots">
                                                    <input type="checkbox" name="selected_songs[]" value="{{ $song->id }}">
                                                </div>
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
            </select>
            <input type="submit" value="Enviar" class="site-btn sb-c2">
            <br><br><br>
        </form>
        @include('parcial.error-forms')
    </div>
</x-layout-gen>