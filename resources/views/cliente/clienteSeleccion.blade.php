<x-layout-gen>
    <title>Registros de artistas</title>
    <br><br>
    <div class="container" style="text-align: center;">
        <br><br>
        <h2>Crea un registro <a href="{{route('cliente.create')}}">aqui</a></h2>
        <br>
        <h1>Gestionas estas cuentas:</h1>
        <br>
        <div class="row">
            @foreach($clients as $client)
            <div class="col-lg-3 col-sm-6">
                <div class="premium-item">
                    <a href=" {{ route('canciones.vista-general',$client->id) }} ">
                        <img src="{{asset('img/acceder_perfil.gif')}}">
                    </a>
                    <h4>{{$client->username}}</h4>
                </div>
                <div class="songs-links" style="padding-top: 0px;">
                    <a href="{{route('cliente.edit',$client->id)}}">
                        <img src="{{asset('img/config-icons/config.png')}}" width="21px" height="20px">
                    </a>
                    <a href="{{route('cliente.show',$client->id)}}">
                        <img src="{{asset('img/config-icons/view_item.png')}}" width="21px" height="20px">
                    </a>
                    <form action="{{ route('cliente.destroy', $client->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background: none; padding: 0; margin: 0; cursor: pointer;">
                             <img src="{{asset('img/config-icons/delete.png')}}" width="21px" height="20px" style="padding-left: 0px;"> 
                        </button>
                    </form>
                </div>
            </div>
            @endforeach    
        </div>  
    </div>
    <br><br><br>
</x-layout-gen>