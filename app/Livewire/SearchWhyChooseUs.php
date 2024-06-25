<?php

namespace App\Livewire;

use App\Models\WhyChooseUs;
use Livewire\Component;
use Livewire\WithPagination;

class SearchWhyChooseUs extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page

    public $whychooseusId;
    public $whychooseusStatus;

    public function updateWhychooseusStatus(WhyChooseUs $application)
    {
        $this->applicationId = $application->id;
        $this->applicationStatus = !$application->status;

        $application->update(['status' => $this->applicationStatus]);
    }
    public function render()
    {
        $whychooseuses = WhyChooseUs::query()
            ->when($this->search, function ($query) {
                $query->where('why_title', 'like', '%' . $this->search . '%')
                    ->orWhere('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.search-why-choose-us', [
            'whychooseuses' => $whychooseuses,
        ]);
    }
}
