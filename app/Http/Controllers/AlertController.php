<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function create(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'message' => 'required|string',
            // Puedes añadir más validaciones según sea necesario
        ]);

        // Crea una nueva alerta
        Alert::create([
            'message' => $request->input('message'),
            // Asume que el campo 'expires_at' se establecerá por defecto en la base de datos
        ]);

        // Redirige a donde quieras después de crear la alerta
        return redirect()->back()->with('msg', 1);
    }

    public function delete($id = 0, Request $request)
    {
        $review = Alert::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('msg', 2);
    }
}
