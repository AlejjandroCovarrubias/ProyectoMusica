<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion</title>
</head>
<body>
    <h1>Detalle del contenido</h1>
    <ul>
        <li>Nombre: {{ $client->username }}</li>
        <li>Email: {{$client->email}}</li>
        <li>Password: {{$client->password}}</li>
        <li>Descripcion: {{$client->descrip}}</li>
        <li>Creado a: {{$client->created_at}}</li>
        <li>Actualizado a: {{$client->updated_at}}</li> 
    </ul>
</body>
</html>