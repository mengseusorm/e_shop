<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTable extends Component
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
        $products = Product::with('merchant')->with('category')->with('country')  
            ->where(function ($query) {
            $query->where('product_code', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('slug', 'like', '%' . $this->search . '%')
                ->orWhere('merchant_id', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orWhere('size', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('category_id', 'like', '%' . $this->search . '%')
                ->orWhere('country_code_id', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.backend.product.product-table', ['products' => $products]);
    }
}