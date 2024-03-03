<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buenas tardes</h1>
    <h2>Crea un registro <a href="{{route('cliente.create')}}">aqui</a></h2>
    <h1>Registros obtenidos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre de usuario</th>
                <th>Correo electronico</th>
                <th>Password</th>
                <th>Descripcion</th>
                <th>Creado/Actualizado</th>
                <th>Funciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->username}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->password}}</td>
                <td>{{$client->descrip}}</td>
                <td>{{$client->created_at}} | {{$client->updated_at}}</td>
                <td>
                    <a href="{{ route('cliente.show',$client->id) }}">Detalle</a>
                    <a href=" {{ route('cliente.edit', $client->id) }} ">Editar</a>
                    <form action="{{ route('cliente.destroy', $client->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>  
</body>
</html>