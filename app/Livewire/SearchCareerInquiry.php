<?php

namespace App\Livewire;

use App\Models\CareerInquiry;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCareerInquiry extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5;

    public $careerinquiryId;

    public function render()
    {
        $careerinquiries = CareerInquiry::query()
        ->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('mobile_number', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        })
        ->latest()
        ->paginate($this->perPage);
        return view('livewire.search-career-inquiry', compact('careerinquiries'));
    }
}
