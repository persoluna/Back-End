<?php

namespace App\Livewire;

use App\Models\Achievement;
use Livewire\Component;
use Livewire\WithPagination;

class SearchAchievement extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5;

    public $achievementId;
    public $achievementStatus;

    public function updateAchievementStatus(Achievement $achievement)
    {
        $this->achievementId = $achievement->id;
        $this->achievementStatus = !$achievement->status;

        $achievement->update(['status' => $this->achievementStatus]);
    }

    public function render()
    {
        $achievements = Achievement::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.search-achievement', compact('achievements'));
    }
}
