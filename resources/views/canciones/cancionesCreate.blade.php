<x-layout-gen>
    <title>Registrar canciones</title>
    <div class="container" style="text-align: center;">
        <br><br>
        <h1>Subir musica</h1>
        <br><br>
        <form action="{{ route('song.relacion.client.song', $cliente->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title" style="margin-left: 10px; display: inline-block; text-align:left;">Titulo</label>
            <input type="text" name="title" style="margin-left: 80px; @error('title') border-color: red; @enderror">
            <br><br>
            <label for="genre" style="display: inline-block; text-align:left;">Seleccione un genero</label>
            <select name="genre" style="margin-left: 35px; @error('genre') border-color: red; @enderror">
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
            <br><br>
            <label for="image" style="margin-left: 170px; display: inline-block; text-align:left;">Portada</label>
            <input type="file" name="image" style="margin-left: 60px; @error('image') border-color: red; @enderror">
            <br><br>
            <label for="mp3" style="margin-left: 170px; display: inline-block; text-align:left;">Archivo</label>
            <input type="file" name="mp3" style="margin-left: 60px; @error('image') border-color: red; @enderror">
            <br><br>
            <input type="submit" value="Enviar">
            <br><br>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br><br>
    </div>
</x-layout-gen>