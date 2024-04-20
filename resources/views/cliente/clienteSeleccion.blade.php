<x-layout-gen>
    <title>Registros de artistas</title>
    <br><br>
    <div class="container" style="text-align: center;">
        <br><br>
        <h2>Crea un registro <a href="{{route('cliente.create')}}">aqui</a></h2>
        <br>
        <h1>Gestionas estas cuentas:</h1>
        <br>
        <table border="1" style="margin-left:auto; margin-right:auto;">
            <thead>
                <tr>
                    <th>Correo del cliente</th>
                    <th>Nombre de usuario</th>
                    <th>Gesion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td style="padding: 30px;">{{Auth::user()->email}}</td>
                    <td style="padding: 30px;">{{$client->username}}</td>
                    <td style="padding: 30px;">
                    <a href=" {{ route('canciones.vista-general',$client->id) }} ">Subir cancion</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>  
    </div>
</x-layout-gen>