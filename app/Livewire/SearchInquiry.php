<?php
namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SearchInquiry extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;
    public $inquiryId;

    public function render()
    {
        $inquiries = DB::table('user_inquiries')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile_number', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.search-inquiry', compact('inquiries'));
    }
}