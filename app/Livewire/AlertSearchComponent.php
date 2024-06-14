<?php

namespace App\Livewire;

use App\Models\Alert;
use Livewire\Component;
use Illuminate\Support\Collection;

class AlertSearchComponent extends Component
{
    public $query = '';
    public $sortField = 'expires_at';
    public $sortAsc = true;

    public function updateSearch($value)
    {
        $this->query = $value;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $alerts = Alert::where('message', 'like', '%' . $this->query . '%')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->orderBy('expires_at', 'desc')
            ->get();

        return view('livewire.alert-search-component', [
            'alerts' => $alerts
        ]);
    }
}
