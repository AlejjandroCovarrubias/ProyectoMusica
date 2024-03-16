<x-layout-gen>
    <div class="cointainer" style="text-align: center;">
        <br>
        <h1>Detalle del artista: <br><b>{{$client->username}}</b></h1>
        <br>
        <ul>
            <li>Nombre: {{ $client->username }}</li>
            <li>Email: {{$client->email}}</li>
            <li>Password: {{$client->password}}</li>
            <li>Descripcion: {{$client->descrip}}</li>
            <li>Creado a: {{$client->created_at}}</li>
            <li>Actualizado a: {{$client->updated_at}}</li>
            <br>
            <li><b>Informacion de contacto:</b></li>
            <br>
            <li>Twitter: {{$client->twitter}}</li>
            <li>Instagram: {{$client->instagram}}</li>
            <li>Facebook: {{$client->facebook}}</li>
        </ul>
    </div>
    <br><br>
</x-layout-gen>