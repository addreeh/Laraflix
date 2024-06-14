<?php

namespace App\Livewire;

use Livewire\Component;

class UpvoteViewComponent extends Component
{

    public $request;

    protected $listeners = ['upvoteEvent' => 'incrementUpvotes'];

    public function mount($request)
    {
        $this->request = $request;
    }

    public function incrementUpvotes()
    {
        // Recargar el modelo para obtener el valor actualizado de upvotes
        $this->request->refresh();
    }

    public function render()
    {
        return view('livewire.upvote-view-component');
    }
}
