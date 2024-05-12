<x-layout-gen>
    <title>Registrar canciones</title>
    <div class="container" style="text-align: center;">
        <br><br>
        <h1>Subir musica</h1>
        <br><br>
        <form action="{{ route('song.relacion.client.song', $cliente->id) }}" method="POST" enctype="multipart/form-data" class="contact-from">
            <div class="row">
                @csrf
                <div class="col-md-6">
                    <label for="title" style="display: inline-block; text-align:left;">Titulo</label>
                    <input type="text" name="title" style="@error('title') border-color: red; @enderror">
                </div>
                <br><br>
                <div class="col-md-6">
                    <label for="genre" style="padding-top:40px;display: inline-block; text-align:left;">Seleccione un genero</label>
                    <select name="genre" style="@error('genre') border-color: red; @enderror">
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
                    <input type="file" name="image" style="padding-left:180px; padding-top:15px;@error('image') border-color: red; @enderror;" accept="image/*">
                </div>
                <br><br>
                <div class="col-md-6">
                    <label for="mp3" style="display: inline-block; text-align:left;">Archivo</label>
                    <input type="file" name="mp3" style="padding-left:180px; padding-top:15px;@error('mp3') border-color: red; @enderror;" accept="audio/*">
                </div>
                <label for="artista_dos" style="display: inline-block; text-align:left;">¿Es colaboración?, ingresa el nombre del artista:</label>
                <input type="text" name="artista_dos" style="@error('artista_dos') border-color: red; @enderror;">
                <br><br><br><br><br><br>
                <input type="submit" value="Enviar" class="site-btn sb-c2">
                <br><br>
            </div>
        </form>
        @include('parcial.error-forms')
        <br><br>
    </div>
</x-layout-gen>