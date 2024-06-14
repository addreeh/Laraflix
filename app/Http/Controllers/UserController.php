<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Puedes agregar un mensaje de éxito o redireccionar a alguna página
        return redirect()->back()->with('msg', 2);
    }

    public function promote($id)
    {
        $user = User::findOrFail($id);

        // Cambiar el valor de la columna 'admin' a 1
        $user->admin = 1;
        $user->save();

        // Puedes agregar un mensaje de éxito o redireccionar a alguna página
        return redirect()->back()->with('msg', 3);
    }

    public function demote($id)
    {
        $user = User::findOrFail($id);

        // Cambiar el valor de la columna 'admin' a 1
        $user->admin = 0;
        $user->save();

        // Puedes agregar un mensaje de éxito o redireccionar a alguna página
        return redirect()->back()->with('msg', 4);
    }

}
