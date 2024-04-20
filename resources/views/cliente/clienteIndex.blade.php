<x-layout-gen>
    <title>Registros de artistas</title>
    <br><br>
    <div class="container" style="text-align: center;">
        <br><br>
        <h2>Crea un registro <a href="{{route('cliente.create')}}">aqui</a></h2>
        <br>
        <h1>Registros obtenidos</h1>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Correo del cliente</th>
                    <th>Nombre de usuario</th>
                    <th>Correo electronico</th>
                    <th>Password</th>
                    <th>Descripcion</th>
                    <th>Creado/Actualizado</th>
                    <th>Twitter</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Funciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{Auth::user()->email}}</td>
                    <td>{{$client->username}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->password}}</td>
                    <td>{{$client->descrip}}</td>
                    <td>{{$client->created_at}} | {{$client->updated_at}}</td>
                    <td>{{$client->twitter}}</td>
                    <td>{{$client->facebook}}</td>
                    <td>{{$client->instagram}}</td>
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
        <br><br>  
    </div>
</x-layout-gen>