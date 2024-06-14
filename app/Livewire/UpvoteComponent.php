<?php

namespace App\Livewire;

use App\Models\MovieRequest;
use Livewire\Component;

class UpvoteComponent extends Component
{

    public $request;


    public function upvote()
    {
        $request = MovieRequest::findOrFail($this->request);
        $request->upvotes++;
        $request->save();


        $this->dispatch('upvoteEvent');
    }
    public function render()
    {
        return view('livewire.upvote-component');
    }
}
