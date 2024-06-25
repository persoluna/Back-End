<?php

namespace App\Livewire;

use App\Models\AboutPoint;
use Livewire\Component;
use Livewire\WithPagination;

class SearchAboutPoint extends Component
{
     use WithPagination;

    public $search = '';

    public $perPage = 5;

    public $aboutpointId;
    public $aboutpointStatus;

    public function updateAboutPointStatus(AboutPoint $aboutpoint)
    {
        $this->aboutpointId = $aboutpoint->id;
        $this->aboutpointStatus = !$aboutpoint->status;

        $aboutpoint->update(['status' => $this->aboutpointStatus]);
    }

    public function render()
    {
        $aboutpoints = AboutPoint::query()
            ->when($this->search, function ($query) {
                $query->where('point', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-about-point', compact('aboutpoints'));
    }
}
