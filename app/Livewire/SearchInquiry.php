<?php
namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class SearchInquiry extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $inquiryId;
    public $sortColumn = 'id';
    public $sortDirection = 'desc';
    public $timeFilter = 'all'; // New property for time filtering
    public $filterCounts = [];

    public function mount()
    {
        $this->updateFilterCounts();
    }

    public function updatedTimeFilter()
    {
        $this->updateFilterCounts();
    }

    private function updateFilterCounts()
    {
        $this->filterCounts = [
            'last_day' => DB::table('user_inquiries')->where('created_at', '>=', Carbon::now()->subDay())->count(),
            'last_week' => DB::table('user_inquiries')->where('created_at', '>=', Carbon::now()->subWeek())->count(),
            'last_month' => DB::table('user_inquiries')->where('created_at', '>=', Carbon::now()->subMonth())->count(),
        ];
    }

    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $inquiries = DB::table('user_inquiries')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile_number', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->timeFilter !== 'all', function ($query) {
                $date = $this->getDateFromFilter();
                $query->where('created_at', '>=', $date);
            })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.search-inquiry', compact('inquiries'));
    }

    private function getDateFromFilter()
    {
        switch ($this->timeFilter) {
            case 'last_day':
                return Carbon::now()->subDay();
            case 'last_week':
                return Carbon::now()->subWeek();
            case 'last_month':
                return Carbon::now()->subMonth();
            default:
                return null;
        }
    }
}