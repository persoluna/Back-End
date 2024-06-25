<?php

namespace App\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SearchServiceCategory extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $servicecategoryId;

    public $servicecategoryStatus;

    public function updateServiceCategoryStatus(ServiceCategory $servicecategory)
    {
        $this->servicecategoryId = $servicecategory->id;
        $this->servicecategoryStatus = !$servicecategory->status;

        $servicecategory->update(['status' => $this->servicecategoryStatus]);
    }

    public function render()
    {
        $servicecategories = ServiceCategory::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-service-category', compact('servicecategories'));
    }
}
