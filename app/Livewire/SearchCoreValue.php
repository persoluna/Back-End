<?php

namespace App\Livewire;

use App\Models\CoreValue;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCoreValue extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5;

    public $aboutpointId;

    public function render()
    {
        $corevalues = CoreValue::query()
            ->when($this->search, function ($query) {
                $query->where('Core_title', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-core-value', compact('corevalues'));
    }
}
