<x-layout-gen>
    <div class="container" style="text-align:center;">
        <br><br>
        <h1>Actualizacion de datos</h1>
        <br>
        <form action="{{ route('cliente.update', $client->id) }}" method="POST" class="contact-from" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                @csrf
                <br>
                <div class="col-md-6">
                    <label for="username" style="display: inline-block; text-align:left;">Nombre artístico</label>
                    <input type="text" name="username" style="@error('username') color: red; @enderror" value="{{ old('username') ?? $client->username }}">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="email" style="display: inline-block; text-align:left;">Correo de contacto</label>
                    <input type="text" name="email" style="@error('email') color: red; @enderror" value="{{ old('email') ?? $client->email }}">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="twitter" style="display: inline-block; text-align:left;">Contacto Twitter</label>
                    <input type="text" name="twitter" style="@error('twitter') color: red; @enderror" value="{{ old('twitter') ?? $client->twitter }}">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="instagram" style="display: inline-block; text-align:left;">Contacto Instagram</label>
                    <input type="text" name="instagram" style="@error('instagram') color: red; @enderror" value="{{ old('instagram') ?? $client->instagram }}">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="facebook" style="display: inline-block; text-align:left;">Contacto Facebook</label>
                    <input type="text" name="facebook" style="@error('facebook') color: red; @enderror" value="{{ old('facebook') ?? $client->facebook }}">
                </div>
                <div class="col-md-6">
                    <label for="image" style="display: inline-block; text-align:left;">Tu imagen</label>
                    <input type="file" name="image" style="padding-left:180px; padding-top:15px;@error('image') border-color: red; @enderror;" accept="image/*">
                </div>
                <br><br>
                <label for="descrip">Cuéntanos sobre ti</label>
                <br>
                <textarea name="descrip" cols="40" rows="5" style="@error('descrip') color: red; @enderror">{{ old('descrip') ?? $client->descrip }}</textarea>
                <br>
                <input type="submit" value="Enviar">
                <br><br><br>
            </div>
        </form>
        e
    </div>
</x-layout-gen>