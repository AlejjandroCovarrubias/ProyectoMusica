<x-layout-gen>
    <title>Actualizar canciones</title>
    <div class="container" style="text-align: center;">
        <br><br>
        <h1>Subir musica</h1>
        <br><br>
        <form action="{{ route('canciones.update', $song->id) }}" method="POST" enctype="multipart/form-data" class="contact-from">
            <div class="row">
                @csrf
                @method('PATCH')
                <div class="col-md-6">
                    <label for="title" style="display: inline-block; text-align:left;">Titulo</label>
                    <input type="text" name="title" style="@error('title') border-color: red; @enderror" value="{{ old('title') ?? $song->title }}">
                </div>
                <br><br>
                <div class="col-md-6">
                    <label for="genre" style="padding-top:40px;display: inline-block; text-align:left;">Seleccione un genero</label>
                    <select name="genre" style="@error('genre') border-color: red; @enderror" value="{{ old('genre') ?? $song->genre }}">
                        <option value="">Opciones...</option>
                        <option value="Reggaeton">Reggaeton</option>
                        <option value="Rap">Rap</option>
                        <option value="Pop">Pop</option>
                        <option value="Techo">Techno</option>
                        <option value="Indie">Indie</option>
                        <option value="Rock">Rock</option>
                        <option value="Metal">Metal</option>
                        <option value="Clasica">Clasica</option>
                        <option value="Soul">Soul</option>
                        <option value="Funk">Funk</option>
                        <option value="Blues">Blues</option>
                        <option value="Reggaeton">Reggaeton</option>
                        <option value="Metal">Metal</option>
                        <option value="Country">Country</option>
                        <option value="Punk">Punk</option>
                        <option value="Salsa">Salsa</option>
                        <option value="Tango">Tango</option>
                        <option value="Jazz">Jazz</option>
                    </select>
                </div>
                <br><br>
                <div class="col-md-6">
                    <label for="image" style="display: inline-block; text-align:left;">Portada</label>
                    <input type="file" name="image" style="padding-left:180px; padding-top:15px;@error('image') border-color: red; @enderror;" accept="image/*" value="{{ old('image') }}">
                </div>
                <br><br>
                <div class="col-md-6">
                    <label for="mp3" style="display: inline-block; text-align:left;">Archivo</label>
                    <input type="file" name="mp3" style="padding-left:180px; padding-top:15px;@error('mp3') border-color: red; @enderror;" accept="audio/*" value="{{ old('mp3') }}">
                </div>
                <br><br><br><br><br><br>
                <input type="submit" value="Enviar" class="site-btn sb-c2">
                <br><br>
                <input type="hidden" name="clienteid" value="{{$cliente->id}}"> <!-- Esto queda validado en el back para evitar filtraciones -->
            </div>
        </form>
        @include('parcial.error-forms')
        <br><br>
    </div>
</x-layout-gen>