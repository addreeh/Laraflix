<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class SearchFilmsComponent extends Component
{
    public $query = '';

    public function render()
    {
        $films = Movie::where('title', 'like', '%' . $this->query . '%')->get();

        return view('livewire.search-films-component', [
            'films' => $films
        ]);
    }
}
