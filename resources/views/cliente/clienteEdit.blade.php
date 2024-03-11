<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Informacion</h1>
    <form action="{{ route('cliente.update', $client->id) }}" method="POST">
        @csrf   
        @method('PATCH')
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" value="{{ old('username') ?? $client->username }}">
        <br>
        <br>
        <label for="email">Correo</label>
        <input type="text" name="email" value="{{ old('email') ?? $client->email }}">
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password">
        <br>
        <br>
        <label for="twitter" style="display: inline-block; text-align:left;">Contacto Twitter</label>
        <input type="text" name="twitter" style="margin-left: 82px;">
        <br>
        <label for="instagram" style="display: inline-block; text-align:left;">Contacto Instagram</label>
        <input type="text" name="instagram" style="margin-left: 58px;">
        <br>
        <label for="facebook" style="display: inline-block; text-align:left;">Contacto Facebook</label>
        <input type="text" name="facebook" style="margin-left: 62px;">
        <label for="descrip">Sobre ti</label>
        <br>
        <textarea name="descrip" cols="40" rows="5">{{ old('descrip') ?? $client->descrip }}</textarea>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>