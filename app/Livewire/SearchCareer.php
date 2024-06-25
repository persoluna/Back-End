<?php

namespace App\Livewire;

use App\Models\Career;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCareer extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5;  // Number of items per page

    public $careerId;
    public $careerStatus;

    public function updateCareerStatus(Career $career)
    {
        $this->careerId = $career->id;
        $this->careerStatus = !$career->status;

        $career->update(['status' => $this->careerStatus]);
    }

    public function render()
    {
        $careers = Career::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('requirement', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-career', compact('careers'));
    }
}
