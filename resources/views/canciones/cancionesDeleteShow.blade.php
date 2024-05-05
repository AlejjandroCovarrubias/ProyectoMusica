<x-layout-gen>
<table class="table">
        <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Reproducir</th>
            <th>Foto</th>
            <th>Eliminar</th>
            <th>Prueba</th>
        </tr>
        @foreach ($songs as $song)
            <tr>
                <td>{{ $song->title }}</td>
                <td>{{ $song->genre }}</td>
                <td>
                    <audio controls style="padding-right: 50px;">
                       <source src="{{ asset('storage/' . $song->first()->ubiCancion) }}" type="audio/mpeg">
                    </audio>   
                </td>
                <td>
                    <img src="{{ asset('storage/' . $song->first()->ubiPortada) }}" width="200px" style="padding-left: 50px;">
                </td>
                <td>
                    <form action="{{ route('canciones.destroy', $song->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar" class="site-btn" style="text-align:center;">
                    </form>
                </td>
                <td>
                    {{ $song->id }}
                    {{ $cliente->id}}
                </td>
            </ul>
            </tr>
        @endforeach
    </table>
</x-layout-gen>