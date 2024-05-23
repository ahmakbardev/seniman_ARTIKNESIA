<?php

namespace App\Livewire;

use App\Models\Karya;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTableList extends Component
{
    use WithPagination;

    public $search = '';
    public $locale;

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->locale = app()->getLocale();
    }

    public function render()
    {
        // Mengambil semua produk dari pengguna yang sedang masuk beserta nama subkategori dengan pagination
        $products = Karya::with('subkategori')
            ->where('user_id', auth()->id()) // Filter berdasarkan user yang sedang login
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(5);

        return view('livewire.product-table-list', compact('products'));
    }


    public function gotoPage($page)
    {
        $this->page = $page;
        $this->render();
    }

    public function setSearch($value)
    {
        // Update the search value
        $this->search = $value;

        // Reset pagination when search changes
        $this->gotoPage(1);
    }

    public function updatedSearch()
    {
        // Check if the search input is empty, then update it to "show all data"
        if (empty($this->search)) {
            $this->setSearch('');
        }
    }
}
