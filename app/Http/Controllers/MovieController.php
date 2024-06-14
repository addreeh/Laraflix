<?php

namespace App\Http\Controllers;

use App\Models\MovieUserFollow;
use App\Models\MovieUserView;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use App\Models\MovieReview;
use Illuminate\Support\Facades\Request;

class MovieController extends Controller
{
    public $isFollowing;
    public $isWatched;

    public function exportPdf($title)
    {
        $movie = Movie::where('title', $title)->first();

        if (!$movie) {
            // Manejar el caso en que la película no se encuentra
            // Por ejemplo, redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'La película no se encuentra');
        }

        $dompdf = new Dompdf();

        $html = view('pdf.index', compact('movie'))->render();
        $dompdf->loadHtml($html);
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->setPaper('A4', 'Portrait');

        $dompdf->render();

        // Envío el PDF generado al navegador
        return $dompdf->stream($movie->title . '-info.pdf');
    }


    public function search2(Request $request)
    {
        $query = $request->input('query');

        // Realiza la búsqueda de películas basada en el texto ingresado por el usuario
        $peliculas = Movie::where('title', 'like', '%' . $query . '%')->get();

        return response()->json($peliculas);
    }

    public function index()
    {
        $bannerFilms = Movie::take(2)->get();
        // $films = Movie::take(5)->get();

        $films = Movie::latest()->take(5)->get();

        $latestReviews = MovieReview::latest()->take(3)->get();

        $genres = DB::table('movies')->distinct()->pluck('genre');

        $filmsByGenre = [];

        $reviewsCountByMovie = [];

        foreach ($genres as $genre) {
            $filmsByGenre[$genre] = Movie::where('genre', $genre)->get();

            $reviewsCountByMovie[$genre] = Movie::where('genre', $genre)
                ->withCount('reviews')
                ->get()
                ->sum('reviews_count');
        }

        $followedMovies = [];

        if (Auth::user()) {
            $followedMovies = Auth::user()->followedMovies()->get();
        }

        $watchedMovies = [];

        if (Auth::user()) {
            $watchedMovies = Auth::user()->viewedMovies()->get();
        }

        $filmsByRating = DB::table('movie_reviews')
            ->select('movie_id', DB::raw('AVG(rating) as average_rating'))
            ->groupBy('movie_id')
            ->orderByDesc('average_rating')
            ->take(10)
            ->get();

        // Obtener los detalles completos de las películas basadas en las revisiones ordenadas por rating
        $filmsByRatingDetails = [];
        foreach ($filmsByRating as $review) {
            $movie = Movie::find($review->movie_id);
            if ($movie) {
                $movie->average_rating = $review->average_rating;
                $filmsByRatingDetails[] = $movie;
            }
        }

        return view('welcome', [
            'bannerFilms' => $bannerFilms,
            'films' => $films,
            'latestReviews' => $latestReviews,
            'genres' => $genres,
            'filmsByGenre' => $filmsByGenre,
            'reviewsCountByMovie' => $reviewsCountByMovie,
            'followedMovies' => $followedMovies,
            'watchedMovies' => $watchedMovies,
            'ratingFilms' => $filmsByRatingDetails,
        ]);
    }
    public function films()
    {
        $films = Movie::all();
        $genres = DB::table('movies')->distinct()->pluck('genre');

        return view('films.index', ['films' => $films, 'genres' => $genres]);
    }

    public function genre()
    {
        $films = Movie::all();
        $genres = DB::table('movies')->distinct()->pluck('genre');

        return view('films.genre', [
            'films' => $films,
            'genres' => $genres
        ]);
    }

    public function search()
    {
        $films = Movie::all();

        return view('films.search', [
            'films' => $films
        ]);
    }

    public function show(Movie $movie)
    {
        $movie = Movie::findOrFail($movie->id);

        $averageRating = round($movie->reviews->avg('rating'), 1); // Redondea a un decimal
        $userFollows = auth()->user()->followedMovies()->pluck('movies.id')->toArray();
        $userViews = auth()->user()->viewedMovies()->pluck('movies.id')->toArray();
        $reviews = MovieReview::where('movie_id', $movie->id)->take(2)->get();

        $isFollowing = MovieUserFollow::where('user_id', Auth::user()->id)
            ->where('movie_id', $movie->id)
            ->exists();

        $isWatched = MovieUserView::where('user_id', Auth::user()->id)
            ->where('movie_id', $movie->id)
            ->exists();



        return view('films.show', compact('movie', 'averageRating', 'userFollows', 'userViews', 'reviews', 'isFollowing', 'isWatched'));
    }

    public function toggleFollow($film)
    {
        // Verificar si el usuario ya sigue la película
        $isFollowing = MovieUserFollow::where('user_id', Auth::user()->id)
            ->where('movie_id', $film->id)
            ->exists();

        // Si el usuario ya sigue la película, dejar de seguir
        if ($isFollowing) {
            MovieUserFollow::where('user_id', Auth::user()->id)
                ->where('movie_id', $film->id)
                ->delete();
        }
        // Si el usuario no sigue la película, seguir
        else {
            MovieUserFollow::create([
                'user_id' => Auth::user()->id,
                'movie_id' => $film->id,
            ]);
        }

        // Actualizar el estado de seguimiento de la película
        $this->isFollowing = !$this->isFollowing;
    }

    public function toggleWatch($film)
    {
        // Verificar si el usuario ya sigue la película
        $isWatched = MovieUserView::where('user_id', Auth::user()->id)
            ->where('movie_id', $film->id)
            ->exists();

        // Si el usuario ya sigue la película, dejar de seguir
        if ($isWatched) {
            MovieUserView::where('user_id', Auth::user()->id)
                ->where('movie_id', $film->id)
                ->delete();
        }
        // Si el usuario no sigue la película, seguir
        else {
            MovieUserView::create([
                'user_id' => Auth::user()->id,
                'movie_id' => $film->id,
            ]);
        }

        // Actualizar el estado de seguimiento de la película
        $this->isWatched = !$this->isWatched;
    }
}


