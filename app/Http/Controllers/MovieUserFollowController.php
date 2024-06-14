<?php

namespace App\Http\Controllers;

use App\Models\MovieUserFollow;
use Illuminate\Http\Request;

class MovieUserFollowController extends Controller
{
    public function follow($id = 0, Request $request)
    {
        MovieUserFollow::create([
            'user_id' => auth()->user()->id,
            'movie_id' => $id,
        ]);
        return redirect('films/' . $id)->with('msg', 1);
    }

    public function unfollow($id = 0, Request $request)
    {
        // Eliminar el registro de la base de datos
        MovieUserFollow::where('user_id', auth()->user()->id)
            ->where('movie_id', $id)
            ->delete();

        // Establecer el mensaje
        return redirect('films/' . $id)->with('msg', 2);
    }
}
