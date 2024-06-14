<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieGenreComponent extends Component
{
    public $selectedGenre;


    public function render()
    {
        $movies = $this->selectedGenre ? Movie::where('genre', $this->selectedGenre)->get() : Movie::all();

        $genres = Movie::distinct()->pluck('genre')->toArray();

        return view('livewire.movie-genre-component', compact('movies', 'genres'));
    }
}
