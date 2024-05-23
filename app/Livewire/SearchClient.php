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

    public $clientId;

    public $clientStatus;

    public function updateClientStatus(Client $client)
    {
        $this->clientId = $client->id;
        $this->clientStatus = !$client->status;

        $client->update(['status' => $this->clientStatus]);
    }

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
