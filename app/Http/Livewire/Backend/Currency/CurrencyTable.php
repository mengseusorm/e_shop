<?php

namespace App\Http\Livewire\Backend\Currency;

use App\Models\Currency;
use Livewire\Component;
use Livewire\WithPagination;

class CurrencyTable extends Component
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
        $data = Currency::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('code', 'like', '%' . $this->search . '%')
            ->orWhere('symbol', 'like', '%' . $this->search . '%')
            ->orWhere('exchange_rate', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);   
        return view('livewire.backend.currency.currency-table',['currencies' => $data]);
    }
}
