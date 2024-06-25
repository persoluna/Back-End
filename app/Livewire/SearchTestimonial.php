<?php

namespace App\Livewire;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class SearchTestimonial extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $testimonialId;
    public $testimonialStatus;

    public function updateTestimonialStatus(Testimonial $testimonial)
    {
        $this->testimonialId = $testimonial->id;
        $this->testimonialStatus = !$testimonial->status;

        $testimonial->update(['status' => $this->testimonialStatus]);
    }
    public function render()
    {
        $testimonials = Testimonial::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.search-testimonial', compact('testimonials'));
    }
}
