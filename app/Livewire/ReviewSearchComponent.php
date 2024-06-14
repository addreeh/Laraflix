<?php

namespace App\Livewire;

use App\Models\MovieReview;
use Livewire\Component;

class ReviewSearchComponent extends Component
{
    public $query = '';
    public $sortField = 'updated_at';
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
        $reviews = MovieReview::whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->query . '%')
                ->orWhere('email', 'like', '%' . $this->query . '%');
        })->orWhereHas('movie', function ($query) {
            $query->where('title', 'like', '%' . $this->query . '%');
        })
            ->orWhere('rating', 'like', '%' . $this->query . '%')->orWhere('rating', 'like', '%' . $this->query . '%')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->orderBy('updated_at', 'desc')
            ->get();

        return view('livewire.review-search-component', [
            'reviews' => $reviews
        ]);
    }

}
