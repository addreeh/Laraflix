<?php

namespace App\Http\Controllers;

use App\Mail\RequestAccepted;
use App\Mail\RequestCreated;
use App\Mail\RequestRejected;
use App\Models\Movie;
use App\Models\MovieRequest;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MovieRequestController extends Controller
{
    public function create(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'request' => 'required|string',
            // Puedes añadir más validaciones según sea necesario
        ]);

        $user = Auth::user();

        // Crea una nueva solicitud
        $movieRequest = MovieRequest::create([
            'title' => $request->input('request'),
            'user_id' => $user->id,
        ]);

        Mail::to('admin@laraflix.com')->send(new RequestCreated($movieRequest));



        // Redirige a donde quieras después de crear la alerta
        return redirect()->back()->with('msg', 3);
    }
    public function delete($id)
    {
        $request = MovieRequest::findOrFail($id);
        $request->delete();

        return redirect()->back()->with('msg', 2);
    }
    public function approve(Request $request, $id)
    {
        $title = $request->input('title');
        $request = MovieRequest::findOrFail($id);

        try {

            Mail::to($request->user->email)->send(new RequestAccepted($request));

            try {
                $existingMovie = Movie::where('title', $title)->first();

                if ($existingMovie) {
                    return redirect()->back()->with('msg', 4);
                }

                $apiKey = '6f3543ef';
                $baseUrl = 'https://www.omdbapi.com/';
                $client = new Client();
                $response = $client->request('GET', $baseUrl, [
                    'query' => [
                        't' => $title,
                        'apikey' => $apiKey
                    ]
                ]);
                $body = $response->getBody();

                $jsonBody = json_decode($body);

                $movie = new Movie();
                $movie->title = $jsonBody->Title;
                $movie->release_year = preg_replace('/[^0-9]/', '', $jsonBody->Year);
                $movie->director = $jsonBody->Director != 'N/A' ? $jsonBody->Director : 'No director provided';
                $movie->description = $jsonBody->Plot != 'N/A' ? $jsonBody->Plot : 'No description available';
                $movie->genre = $jsonBody->Genre;
                $movie->poster = $jsonBody->Poster;

                // Obtener la fecha actual
                $movie->created_at = now();
                $movie->updated_at = now();

                $movie->save();

                $request->status = "approved";
                $request->save();

                return redirect()->back()->with('msg', 1);

            } catch (\Exception $e) {
                $this->data = [];
                return redirect()->back()->with('msg', 4);
            }
        } catch (\Exception $e) {
            $this->data = [];
            return redirect()->back()->with('msg', 4);
        }
    }


    public function reject($id)
    {
        $request = MovieRequest::findOrFail($id);

        $request->status = "rejected";
        $request->save();

        try {
            Mail::to($request->user->email)->send(new RequestRejected($request));
        } catch (\Exception $e) {
            $this->data = [];
            return redirect()->back()->with('msg', 4);
        }

        return redirect()->back()->with('msg', 1);
    }

    public function pending($id)
    {
        $request = MovieRequest::findOrFail($id);

        $request->status = "pending";
        $request->save();

        return redirect()->back()->with('msg', 1);
    }


    public function index()
    {
        $requests = MovieRequest::all();
        return view('requests.index', compact('requests'));
    }
}
