<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;

class SearchStaff extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 5; // Number of items per page (default value)

    public $staffId;

    public $staffStatus;

    public function updateStaffStatus(Staff $staff)
    {
        $this->staffId = $staff->id;
        $this->staffStatus = !$staff->status;

        $staff->update(['status' => $this->staffStatus]);

        $this->dispatch('staff-status-updated', [
            'message' => 'Staff status updated successfully.',
        ]);
    }

    public function render()
    {
        $staffs = Staff::query()
        ->when($this->search, function ($query) {
            $query->where('staff_id', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('job_title', 'like', '%' . $this->search . '%');
        })
        ->latest()
        ->paginate($this->perPage);

        return view('livewire.search-staff', compact('staffs'));
    }
}
