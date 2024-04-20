<x-layout-gen>
    <title>Cancion {{$song->title}}</title>
    <br><br>
    <div class="container" style="text-align:center;">
        <h1>{{$song->title}}</h1>
        <div class="row" style="margin: auto; width: 50%; padding: 20px;">
            <ul>
                <li>Titulo: <b>{{ $song->title }}</b></li>
                <br>
                <li>Genero: <b>{{$song->genre}}</b></li>  
                <br><br><br>
                <audio controls style="padding-right: 50px;">
                        <source src="{{ asset('storage/' . $song->first()->ubiCancion) }}" type="audio/mpeg">
                </audio>
            </ul>
            <img src="{{ asset('storage/' . $song->first()->ubiPortada) }}" width="200px" style="padding-left: 50px;">
        </div>
    </div>
</x-layout-gen>
