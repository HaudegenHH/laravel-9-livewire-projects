<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;

    public string $search = '';

    // this will watch the query string "?search=" in the url
    // and whenever you change sth in the search, it will be reflected in the url
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    public function render()
    {
        $query = Product::query();
        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%");
        }

        return view('livewire.product-search', [
            'products' => $query->paginate(20)
        ]);
    }

    // updated hook
    public function updated($property) {

        if ($property === 'search') {
            $this->resetPage();
        }
    }

}
