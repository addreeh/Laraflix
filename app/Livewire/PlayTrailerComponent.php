<?php

namespace App\Livewire;

use Alaouy\Youtube\Facades\Youtube;
use GuzzleHttp\Client;
use Livewire\Component;

class PlayTrailerComponent extends Component
{
    public $film;

    public $isOpen = false;

    public $videoId = "";

    public $results;

    public $data;

    public function mount($film)
    {
        $this->film = $film;
    }

    public function openModal()
    {
        try {
            $apiKey = '6f3543ef';
            $baseUrl = 'https://www.omdbapi.com/';

            $client = new Client();

            $response = $client->request('GET', $baseUrl, [
                'query' => [
                    't' => $this->film,
                    'apikey' => $apiKey
                ]
            ]);

            $body = $response->getBody();
            $this->data = json_decode($body);

            try {
                // Realiza la búsqueda del tráiler utilizando el nombre de la película
                $this->results = Youtube::searchVideos($this->film . ' trailer');

                // Verificar si $this->results es un array
                if (is_array($this->results)) {
                    $primerResultado = $this->results[0];
                    // echo "Kind: " . $primerResultado->kind . "\n";
                    // echo "ETag: " . $primerResultado->etag . "\n";
                    // echo "Video ID: " . $primerResultado->id->videoId . "\n";
                    $this->videoId = $primerResultado->id->videoId;
                }
                $this->isOpen = true;

            } catch (\Exception $e) {
                $this->data = [];
                $this->isOpen = true;

            }

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
        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.play-trailer-component');
    }
}
