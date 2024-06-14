<?php

namespace App\Livewire;

use App\Models\Movie;
use App\Models\MovieUserFollow;
use App\Models\MovieUserView;
use Dompdf\Dompdf;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class MoreInfoComponent extends Component
{

    public $film;
    public $isOpen;
    public $data;
    public $query;
    public $isFollowing;
    public $isWatched;

    public $similarFilms;
    public $currentRoute;


    public function mount($queryOrFilm)
    {
        $this->isOpen = false;

        if (is_string($queryOrFilm)) {
            // Si se proporciona una cadena (query), asigna directamente a $query
            $this->query = $queryOrFilm;
        } elseif (is_object($queryOrFilm) && $queryOrFilm instanceof Movie) {
            // Si se proporciona un objeto película, asigna a $film y extrae el título como $query
            $this->film = $queryOrFilm;
            $this->query = $this->film->title;
        } else {
            // Si no se proporciona una consulta válida o un objeto película válido, establece $query como vacío
            $this->query = '';
        }

        $this->isFollowing = MovieUserFollow::where('user_id', Auth::user()->id)
            ->where('movie_id', $this->film->id)
            ->exists();

        $this->isWatched = MovieUserView::where('user_id', Auth::user()->id)
            ->where('movie_id', $this->film->id)
            ->exists();

        $this->similarFilms = Movie::where('genre', $this->film->genre)
            ->where('id', '!=', $this->film->id) // Excluir la película actual
            ->take(3)
            ->get();
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

    public function openModal()
    {
        $this->isOpen = true;

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
        } catch (\Exception $e) {
            $this->data = [];
        }
    }
    public function formatRuntime($minutes)
    {
        $runtime = preg_replace('/[^0-9]/', '', $minutes);

        $minutes = intval($runtime);

        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        return "{$hours}h {$remainingMinutes}min";
    }

    public function formatYear($year)
    {
        $formattedDate = preg_replace('/[-–]/u', '', $year);

        return $formattedDate;
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
        return view('livewire.more-info-component');
    }
}
