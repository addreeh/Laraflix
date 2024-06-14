<?php

namespace App\Http\Controllers;

use App\Models\MovieReview;
use Illuminate\Http\Request;

class MovieReviewController extends Controller
{
    public function edit($id = 0, Request $request)
    {
        $review = MovieReview::findOrFail($id);



        $comment = $request->input('review-comment');
        $rating = $request->input('review-rating');

        $review->comment = $comment;
        $review->rating = $rating;

        $review->save();

        return redirect('user')->with('msg', 1);
    }

    public function delete($id = 0, Request $request)
    {
        $review = MovieReview::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('msg', 2);

    }
    public function review(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string',
        ]);

        // Crear una nueva revisión de película
        $review = new MovieReview();
        $review->user_id = auth()->user()->id; // Suponiendo que estás utilizando autenticación de usuarios
        $review->movie_id = $request->movie_id; // Asegúrate de tener un campo hidden en tu formulario para enviar el ID de la película
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        // Redirigir a alguna parte de tu aplicación después de almacenar la revisión
        return redirect('films/' . $request->movie_id)->with('msg', 5);
    }
}
