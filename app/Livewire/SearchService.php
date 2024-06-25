<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceCategory;

class SearchService extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $serviceId;

    public $serviceStatus;

    public $selectedCategory = null;

    public function mount()
    {
        $this->selectedCategory = request()->query('category', null);
    }

    public function updateServiceStatus(Service $service)
    {
        $this->serviceId = $service->id;
        $this->serviceStatus = !$service->status;

        $service->update(['status' => $this->serviceStatus]);
    }

    public function render()
    {
        $servicecategories = ServiceCategory::all();
        $services = Service::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedCategory, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-service', compact('servicecategories', 'services'));
    }
}
