<?php

namespace App\Livewire;

use App\Models\QualityControl;
use Livewire\Component;
use Livewire\WithPagination;

class SearchQualityControl extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5;  // Number of items per page

    public $qualitycontrolId;
    public $qualitycontrolStatus;

    public function render()
    {
        $qualitycontrols = QualityControl::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-quality-control', compact('qualitycontrols'));
    }
}
