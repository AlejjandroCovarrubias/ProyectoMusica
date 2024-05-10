<x-layout-gen>
    <title>Control {{$cliente->username}}</title>
    <br><br>
    <div class="container" style="text-align:center;">
        <br>
        <h1>Registro de canciones para el usuario: <b>{{$cliente->username}}</b></h1>
        <p>Dentro de este menu podras controlar tu musica como artista, Bienvenido!</p>
        <br>
        <h2>Selecciona una opcion del siguiente menu:</h2>
        <br>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <a href="{{ route('canciones.registrar', $cliente->id) }}">
                    <button class="site-btn">Subir cancion</button>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="{{ route('canciones.DeleteShow', $cliente->id) }}">
                    <button class="site-btn">Eliminar canciones</button>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
            <a href="{{ route('canciones.EditShow', $cliente->id) }}" style="padding-right: 115px;">
                <button class="site-btn">Modificar canciones</button>
            </a>
            </div>
            <div class="col-lg-3 col-sm-6">
            <a href="{{ route('canciones.MisCanciones', $cliente->id ) }}">
                <button class="site-btn">Ver canciones</button>
            </a>
            </div>
        </div>
        


        <br><br><br>
    </div>
</x-layout-gen>