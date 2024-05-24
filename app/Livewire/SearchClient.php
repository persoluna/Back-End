<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class SearchClient extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public function render()
    {
        $clients = Client::query()
            ->when($this->search, function ($query) {
                $query->Where('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-client', compact('clients'));
    }
}
