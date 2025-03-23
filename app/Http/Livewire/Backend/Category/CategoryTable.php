<?php

namespace App\Http\Livewire\Backend\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;

    public $search = '';  // Search input
    public $sortField = 'id'; // Default sorting field
    public $sortDirection = 'asc'; // Default sorting order

    protected $paginationTheme = 'bootstrap'; // Use Tailwind by default or Bootstrap if needed

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
 
    public function render()
    {
        $categories = Category::where('category_name', 'like', '%' . $this->search . '%')
            ->orWhere('category_slug', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10); 
        return view('livewire.backend.category.category-table',compact('categories'));
    }
}
