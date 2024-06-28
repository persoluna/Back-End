<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPage extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5; // Number of items per page (default value)

    public $menuId;

    public $menuStatus;

    public function updateMenuStatus(Menu $menu)
    {
        $this->menuId = $menu->id;
        $this->menuStatus = !$menu->status;

        $menu->update(['status' => $this->menuStatus]);
    }

    public function render()
    {
        $menus = Menu::query()
            ->when($this->search, function ($query) {
                $query->where('page_name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->orderBy('priority', 'asc')
            ->paginate($this->perPage);
        return view('livewire.search-page', compact('menus'));
    }
}
