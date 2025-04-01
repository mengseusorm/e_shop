<?php

namespace App\Http\Livewire\Backend\Merchant;

use App\Models\Merchant;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MerchantTable extends Component
{
    use WithPagination;

    public $search = '';  // Search input
    public $sortField = 'merchants.id'; // Default sorting field
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
        $merchants = DB::table('countrie_codes')
            ->join('merchants', 'countrie_codes.id', '=', 'merchants.country_code_id')
            ->select('countrie_codes.*','merchants.*')
            ->where('merchant_name', 'like', '%' . $this->search . '%')
                ->orWhere('type', 'like', '%' . $this->search . '%')
                ->orWhere('country_code_id', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->orWhere('phone_number', 'like', '%' . $this->search . '%')
                ->orWhere('dob', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10); 
        return view('livewire.backend.merchant.merchant-table',compact('merchants')); 
    }
}
