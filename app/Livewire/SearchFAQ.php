<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;
use Livewire\WithPagination;

class SearchFAQ extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5;

    public $FAQId;

    public $FAQStatus;

    public function updateFAQStatus(FAQ $faq)
    {
        $this->FAQId = $faq->id;
        $this->FAQStatus = !$faq->status;

        $faq->update(['status' => $this->FAQStatus]);
    }

    public function render()
    {
        $faqs = FAQ::query()
            ->when($this->search, function ($query) {
                $query->where('question', 'like', '%'. $this->search . '%')
                    ->orWhere('answer', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-f-a-q', compact('faqs'));
    }
}
