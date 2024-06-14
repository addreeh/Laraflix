<?php

namespace App\Livewire;

use App\Models\MovieUserFollow;
use App\Models\MovieUserView;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ToggleComponent extends Component
{
    public $film;
    public $isFollowing;
    public $isWatched;

    public function mount($film)
    {
        $this->film = $film;

        $this->isFollowing = MovieUserFollow::where('user_id', Auth::user()->id)
            ->where('movie_id', $this->film->id)
            ->exists();

        $this->isWatched = MovieUserView::where('user_id', Auth::user()->id)
            ->where('movie_id', $this->film->id)
            ->exists();
    }


    public function toggleFollow()
    {
        // Verificar si el usuario ya sigue la película
        $isFollowing = MovieUserFollow::where('user_id', Auth::user()->id)
            ->where('movie_id', $this->film->id)
            ->exists();

        // Si el usuario ya sigue la película, dejar de seguir
        if ($isFollowing) {
            MovieUserFollow::where('user_id', Auth::user()->id)
                ->where('movie_id', $this->film->id)
                ->delete();
        }
        // Si el usuario no sigue la película, seguir
        else {
            MovieUserFollow::create([
                'user_id' => Auth::user()->id,
                'movie_id' => $this->film->id,
            ]);
        }

        // Actualizar el estado de seguimiento de la película
        $this->isFollowing = !$this->isFollowing;
    }

    public function toggleWatch()
    {
        // Verificar si el usuario ya sigue la película
        $isWatched = MovieUserView::where('user_id', Auth::user()->id)
            ->where('movie_id', $this->film->id)
            ->exists();

        // Si el usuario ya sigue la película, dejar de seguir
        if ($isWatched) {
            MovieUserView::where('user_id', Auth::user()->id)
                ->where('movie_id', $this->film->id)
                ->delete();
        }
        // Si el usuario no sigue la película, seguir
        else {
            MovieUserView::create([
                'user_id' => Auth::user()->id,
                'movie_id' => $this->film->id,
            ]);
        }

        // Actualizar el estado de seguimiento de la película
        $this->isWatched = !$this->isWatched;
    }
    public function render()
    {
        return view('livewire.toggle-component');
    }
}
