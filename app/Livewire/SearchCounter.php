<?php

namespace App\Livewire;

use App\Models\Counter;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCounter extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 5; // Number of items per page (default value)

    public $counterId;

    public $counterStatus;

    public function updateCounterStatus(Counter $counter)
    {
        $this->counterId = $counter->id;
        $this->counterStatus = !$counter->status;

        $counter->update(['status' => $this->counterStatus]);

        $this->dispatch('counter-status-updated', [
            'message' => 'Counter status updated successfully.',
        ]);
    }

    public function render()
    {
        $counters = Counter::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('number', 'like', '%' . $this->search . '%')
                    ->orWhere('alt_tag', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.search-counter', compact('counters'));
    }
}
