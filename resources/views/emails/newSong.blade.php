<x-mail::message>
# Creaste una cancion para {{$owner}}

<x-mail::panel>
    Creaste la siguiente cancion:
    {{$song->title}}
    <img src="{{ asset('storage/' . $song->ubiPortada) }}">
</x-mail::panel>

</x-mail::message>