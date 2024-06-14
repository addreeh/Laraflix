<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserSearchComponent extends Component
{
    public $query = '';



    public function updateSearch($value)
    {
        $this->query = $value;
    }
    public function render()
    {
        $currentUser = Auth::user();

        $users = User::where('id', '!=', $currentUser->id)
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->query . '%')
                    ->orWhere('email', 'like', '%' . $this->query . '%')
                    ->orWhere('surname', 'like', '%' . $this->query . '%')
                    ->orWhere('username', 'like', '%' . $this->query . '%');
            })
            ->get();

        return view('livewire.user-search-component', [
            'users' => $users
        ]);
    }
}
