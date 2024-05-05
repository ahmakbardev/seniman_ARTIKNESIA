<?php

namespace App\Livewire;

use App\Models\Subkategori;
use Livewire\Component;

class SubkategoriSelector extends Component
{
    public $selectedJenisKarya;
    public $selectedSubKategori;
    public $subkategoriOptions = [];

    protected $listeners = ['jenisKaryaSelected'];

    protected $rules = [
        'selectedJenisKarya' => 'required', // Add validation rule for selected jenis karya
    ];

    public function render()
    {
        return view('livewire.sub-kategori-selector');
    }

    public function jenisKaryaSelected($selectedJenisKarya)
    {
        $this->selectedJenisKarya = $selectedJenisKarya;
        $this->validate(); // Validate the selected jenis karya
        $this->loadSubkategoriOptions();
    }

    public function loadSubkategoriOptions()
    {
        if ($this->selectedJenisKarya) {
            $subkategoris = Subkategori::where('jenis_karya_id', $this->selectedJenisKarya)->get();
            $this->subkategoriOptions = $subkategoris;
        } else {
            $this->subkategoriOptions = [];
        }
    }

    public function subkategoriSelected($selectedSubkategori)
    {
        $this->selectedSubKategori = $selectedSubkategori;
        $this->dispatch('subkategoriSelected', $selectedSubkategori);
    }
}