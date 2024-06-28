<?php

namespace App\Livewire;

use App\Models\Infrastructure;
use Livewire\Component;
use Livewire\WithPagination;

class SearchInfrastructure extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5;  // Number of items per page

    public $infrastructureId;
    public $infrastructureStatus;

    public function render()
    {
        $infrastructures = Infrastructure::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-infrastructure', compact('infrastructures'));
    }
}
