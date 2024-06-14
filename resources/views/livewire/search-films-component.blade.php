<div>
    <input type="text" wire:model="query" placeholder="Buscar películas..." />

    <ul>
        @foreach ($films as $pelicula)
            <li>{{ $pelicula->titulo }}</li>
        @endforeach
    </ul>
</div>
