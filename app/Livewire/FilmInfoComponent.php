<?php

namespace App\Livewire;

use App\Models\Movie;
use App\Models\MovieUserFollow;
use App\Models\MovieUserView;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class FilmInfoComponent extends Component
{
    public $film;
    public $isOpen;
    public $data;
    public $query;
    public $isFollowing;
    public $isWatched;

    public $similarFilms;

    public $currentRoute;


    // public function mount($query)
    // {
    //     $this->isOpen = false;

    //     $this->query = $query;
    // }
    public function mount($queryOrFilm)
    {
        $this->isOpen = false;

        if (is_string($queryOrFilm)) {
            // Si se proporciona una cadena (query), asigna directamente a $query
            $this->query = $queryOrFilm;
        } elseif (is_object($queryOrFilm) && $queryOrFilm instanceof Movie) {
            // Si se proporciona un objeto película, asigna a $film y extrae el título como $query
            $this->film = $queryOrFilm;
            $this->query = $queryOrFilm->title;
        } else {
            // Si no se proporciona una consulta válida o un objeto película válido, establece $query como vacío
            $this->query = '';
        }

        if ($queryOrFilm === "Fight Club")
            $this->film = Movie::where('id', 14)->first();
        else if ($queryOrFilm === "Inception")
            $this->film = Movie::where('id', 1)->first();
        else if ($queryOrFilm === "The Shawshank Redemption")
            $this->film = Movie::where('id', 2)->first();
        else if ($queryOrFilm === "The Godfather")
            $this->film = Movie::where('id', 3)->first();
        else if (
            $queryOrFilm === "The Dark Knight"
        )
            $this->film = Movie::where('id', 4)->first();
        else
            $this->film = Movie::where('id', 20)->first();



        if (Auth::user()) {
            $this->isFollowing = MovieUserFollow::where('user_id', Auth::user()->id)
                ->where('movie_id', $this->film->id)
                ->exists();

            $this->isWatched = MovieUserView::where('user_id', Auth::user()->id)
                ->where('movie_id', $this->film->id)
                ->exists();
        }

        $this->similarFilms = Movie::where('genre', "Sci-Fi")->where('id', '!=', $this->film->id)->take(3)->get();

        $this->currentRoute = Route::current()->getName();

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

        if (Auth::user()) {
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
        }

        // Actualizar el estado de seguimiento de la película
        $this->isWatched = !$this->isWatched;
    }

    public function openModal()
    {
        try {
            $apiKey = '6f3543ef';
            $baseUrl = 'https://www.omdbapi.com/';

            $client = new Client();

            $response = $client->request('GET', $baseUrl, [
                'query' => [
                    't' => $this->query,
                    'apikey' => $apiKey
                ]
            ]);

            $body = $response->getBody();
            $this->data = json_decode($body);

            $this->isOpen = true;

        } catch (\Exception $e) {
            $this->data = [];
            $this->isOpen = true;

        }
    }

    public function formatRuntime($minutes)
    {
        // Extraer los números de la cadena de tiempo de ejecución
        $runtime = preg_replace('/[^0-9]/', '', $minutes);

        // Convertir la cadena numérica a un entero
        $minutes = intval($runtime);

        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        return "{$hours}h {$remainingMinutes}min";
    }




    public function closeModal()
    {
        $this->isOpen = false;



        if ($this->currentRoute === 'welcome') {
            return redirect()->route('welcome');
        }
    }


    public function render()
    {
        return view('livewire.film-info-component');
    }
}
