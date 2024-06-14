<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieSearchComponent extends Component
{
    public $searchTerm;

    public function render()
    {
        $movies = [];

        if ($this->searchTerm) {
            // Filtrar las películas por título que coincida parcialmente con el término de búsqueda
            $movies = Movie::where('title', 'like', '%' . $this->searchTerm . '%')->get();
        } else {
            // Obtener todas las películas si no hay término de búsqueda
            $movies = Movie::all();
        }

        return view('livewire.movie-search-component', [
            'movies' => $movies
        ]);
    }
}
