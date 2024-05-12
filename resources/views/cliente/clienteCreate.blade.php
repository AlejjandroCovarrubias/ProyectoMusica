<x-layout-gen>
    <title>Registro de artista</title>
    <div class="container" style="text-align:center;">
        <br><br>
        <h1>Registro de artista</h1>
        <br>
        <p>¿Quieres compartir tus creaciones con más gente? Te animamos a que rellenes el formulario para que empieces a subir tu <a href="#">música.</a></p>
        <form action="{{ route('cliente.store') }}" method="POST" class="contact-from" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <br>
                <div class="col-md-6">
                    <label for="username" style="display: inline-block; text-align:left;">Nombre artístico</label>
                    <input type="text" name="username" style="@error('username') color: red; @enderror" value="{{ old('username') ?? Auth::user()->name }}">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="email" style="display: inline-block; text-align:left;">Correo de contacto</label>
                    <input type="text" name="email" style="@error('email') color: red; @enderror" value="{{ old('email') ?? Auth::user()->email }}">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="twitter" style="display: inline-block; text-align:left;">Contacto Twitter</label>
                    <input type="text" name="twitter" style="@error('twitter') color: red; @enderror" value="{{ old('twitter') }}">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="instagram" style="display: inline-block; text-align:left;">Contacto Instagram</label>
                    <input type="text" name="instagram" style="@error('instagram') color: red; @enderror" value="{{ old('instagram') }}">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="facebook" style="display: inline-block; text-align:left;">Contacto Facebook</label>
                    <input type="text" name="facebook" style="@error('facebook') color: red; @enderror" value="{{ old('facebook') }}">
                </div>
                <div class="col-md-6">
                    <label for="image" style="display: inline-block; text-align:left;">Tu imagen</label>
                    <input type="file" name="image" style="padding-left:180px; padding-top:15px;@error('image') border-color: red; @enderror;" accept="image/*">
                </div>
                <br><br>
                <label for="descrip">Cuéntanos sobre ti</label>
                <br>
                <textarea name="descrip" cols="40" rows="5" style="@error('descrip') color: red; @enderror">{{ old('descrip') }}</textarea>
                <br>
                <input type="submit" value="Enviar" class="site-btn sb-c2">
                <br><br><br>
            </div>
        </form>
        @include('parcial.error-forms')
        <br><br>
    </div>
</x-layout-gen>