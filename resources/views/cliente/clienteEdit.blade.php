<x-layout-gen>
    <div class="container" style="text-align:center;">
        <br><br>
        <h1>Actualizacion de datos</h1>
        <br>
        <form action="{{ route('cliente.update', $client->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <br>
            <label for="username" style="display: inline-block; text-align:left;">Nombre artístico</label>
            <input type="text" name="username" style="margin-left: 80px; @error('username') border-color: red; @enderror" value="{{ old('username') ?? $client->username }}">
            <br><br>
            <label for="email" style="display: inline-block; text-align:left;">Correo de contacto</label>
            <input type="text" name="email" style="margin-left: 62px; @error('email') border-color: red; @enderror" value="{{ old('email') ?? $client->email }}">
            <br><br>
            <label for="password" style="display: inline-block; text-align:left;">Password</label>
            <input type="password" name="password" style="margin-left: 138px; @error('password') border-color: red; @enderror">
            <br>
            <label for="twitter" style="display: inline-block; text-align:left;">Contacto Twitter</label>
            <input type="text" name="twitter" style="margin-left: 82px; @error('twitter') border-color: red; @enderror" value="{{ old('twitter') ?? $client->twitter }}">
            <br>
            <label for="instagram" style="display: inline-block; text-align:left;">Contacto Instagram</label>
            <input type="text" name="instagram" style="margin-left: 58px; @error('instagram') border-color: red; @enderror" value="{{ old('instagram') ?? $client->instagram }}">
            <br>
            <label for="facebook" style="display: inline-block; text-align:left;">Contacto Facebook</label>
            <input type="text" name="facebook" style="margin-left: 62px; @error('facebook') border-color: red; @enderror" value="{{ old('facebook') ?? $client->facebook }}">
            <br><br>
            <label for="descrip">Cuéntanos sobre ti</label>
            <br>
            <textarea name="descrip" cols="40" rows="5" style="margin-left: 5px; @error('descrip') border-color: red; @enderror">{{ old('descrip') ?? $client->descrip }}</textarea>
            <br>
            <input type="submit" value="Enviar">
            <br><br><br>
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
    </div>
</x-layout-gen>