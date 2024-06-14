<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Alert;
use App\Models\MovieRequest;
use App\Models\MovieReview;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function admin()
    {

        $currentUser = Auth::user();

        // Obtener todos los usuarios excepto el usuario actual
        $allUsers = User::where('id', '!=', $currentUser->id)->get();
        $reviews = MovieReview::with([
            'user',
            'movie'
        ])->get();

        $alerts = Alert::all();

        return view('admin.index', compact('allUsers', 'reviews', 'alerts'));
    }

    public function user()
    {
        $user = Auth::user();
        $followedMovies = $user->followedMovies()->get();
        $viewedMovies = $user->viewedMovies()->get();
        $reviewedMovies = $user->reviewedMovies()->get();

        return view('user.index', compact('user', 'followedMovies', 'viewedMovies', 'reviewedMovies'));
    }

    public function show(Request $request)
    {
        $user = Auth::user();

        return redirect()->back();
    }

    public function info(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->save();

        return redirect()->back()->with('status', 'profile-updated');
    }

    public function picture(Request $request)
    {
        $user = Auth::user();

        // Verifica si se ha subido una imagen
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');

            // Guarda la imagen en el almacenamiento (por ejemplo, en la carpeta "public")
            $path = $picture->store('public/images');

            // Actualiza el campo "picture" del usuario con la ruta de la imagen
            $path = Str::replaceFirst("public/", "storage/", $path);
            $user->picture = $path;
            $user->save();
        }
        return redirect()->back();
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
