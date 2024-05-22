<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;
use Livewire\WithPagination;

class SearchApplication extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $applicationId;
    public $applicationStatus;

    public function updateApplicationStatus(Application $application)
    {
        $this->applicationId = $application->id;
        $this->applicationStatus = !$application->status;

        $application->update(['status' => $this->applicationStatus]);
    }
    public function render()
    {
        $applications = Application::query()
            ->when($this->search, function ($query) {
                $query->where('application_title', 'like', '%' . $this->search . '%')
                    ->orWhere('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.search-application', compact('applications'));
    }
}
