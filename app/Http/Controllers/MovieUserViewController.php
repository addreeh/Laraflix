<?php

namespace App\Http\Controllers;

use App\Models\MovieUserView;
use Illuminate\Http\Request;

class MovieUserViewController extends Controller
{
    public function watched($id = 0, Request $request)
    {
        MovieUserView::create([
            'user_id' => auth()->user()->id,
            'movie_id' => $id,
        ]);
        return redirect('films/' . $id)->with('msg', 3);
    }

    public function unwatched($id = 0, Request $request)
    {
        // Eliminar el registro de la base de datos
        MovieUserView::where('user_id', auth()->user()->id)
            ->where('movie_id', $id)
            ->delete();

        // Establecer el mensaje
        return redirect('films/' . $id)->with('msg', 4);
    }
}
