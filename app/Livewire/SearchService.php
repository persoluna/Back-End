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

    public $perPage = 30; // Number of items per page (default value)

    public $serviceId;

    public $serviceStatus;

    public $selectedCategory = null;

    public $metaTagsFilter = 'all';

    public function mount()
    {
        $this->selectedCategory = request()->query('category', null);
        $this->metaTagsFilter = request()->query('meta_tags', 'all');
    }

    public function updateServiceStatus(Service $service)
    {
        $this->serviceId = $service->id;
        $this->serviceStatus = !$service->status;

        $service->update(['status' => $this->serviceStatus]);
    }

    public function hasMetaTags($product)
    {
        return !empty($product->meta_tags);
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
            ->when($this->metaTagsFilter === 'complete', function ($query) {
                $query->whereNotNull('meta_tags'); // Filter for services with meta tags
            })
            ->when($this->metaTagsFilter === 'incomplete', function ($query) {
                $query->whereNull('meta_tags'); // Filter for services without meta tags
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.search-service', [
            'services' => $services,
            'servicecategories' => $servicecategories,
            'hasMetaTags' => function($service) {
                return $this->hasMetaTags($service);
            }
        ]);
    }
}
