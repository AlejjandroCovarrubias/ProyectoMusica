<x-layout-gen>
    <title>Registro de artista</title>
    <div class="container" style="text-align:center;">
        <br><br>
        <h1>Registro de artista</h1>
        <br>
        <p>¿Quieres compartir tus creaciones con más gente? Te animamos a que rellenes el formulario para que empieces a subir tu <a href="#">música.</a></p>
        <form action="{{ route('cliente.store') }}" method="POST">
            @csrf
            <br>
            <label for="username" style="display: inline-block; text-align:left;">Nombre artístico</label>
            <input type="text" name="username" style="margin-left: 80px;">
            <br><br>
            <label for="email" style="display: inline-block; text-align:left;">Correo de contacto</label>
            <input type="text" name="email" style="margin-left: 62px;">
            <br><br>
            <label for="password" style="display: inline-block; text-align:left;">Password</label>
            <input type="password" name="password" style="margin-left: 138px;">
            <br>
            <label for="twitter" style="display: inline-block; text-align:left;">Contacto Twitter</label>
            <input type="text" name="twitter" style="margin-left: 82px;">
            <br>
            <label for="instagram" style="display: inline-block; text-align:left;">Contacto Instagram</label>
            <input type="text" name="instagram" style="margin-left: 58px;">
            <br>
            <label for="facebook" style="display: inline-block; text-align:left;">Contacto Facebook</label>
            <input type="text" name="facebook" style="margin-left: 62px;">
            <br><br>
            <label for="descrip">Cuéntanos sobre ti</label>
            <br>
            <textarea name="descrip" cols="40" rows="5" style="margin-left: 5px;"></textarea>
            <br>
            <input type="submit" value="Enviar">
            <br><br><br>
        </form>
    </div>
</x-layout-gen>