<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>
</head>
<body>
    <h1>Creacion de cuenta</h1>
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username">
        <br>
        <br>
        <label for="email">Correo</label>
        <input type="text" name="email">
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password">
        <br>
        <br>
        <label for="descrip">Sobre ti</label>
        <br>
        <textarea name="descrip" cols="40" rows="5"></textarea>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>