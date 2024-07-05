<?php

namespace App\Livewire;

use App\Models\Benefit;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBenefit extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 10; // Number of items per page (default value)

    public function render()
    {
        $benefits = Benefit::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-benefit', compact('benefits'));
    }
}
