<?php

namespace App\Livewire;

use App\Models\JenisKarya;
use Livewire\Component;

class JenisKaryaSelector extends Component
{
    public $selectedJenisKarya;

    protected $rules = [
        'selectedJenisKarya' => 'required', // Add validation rule for selected jenis karya
    ];

    public function render()
    {
        $jenisKaryaOptions = JenisKarya::all();

        return view('livewire.jenis-karya-selector', compact('jenisKaryaOptions'));
    }

    public function jenisKaryaSelected($selectedJenisKarya)
    {
        $this->validate(); // Validate the selected jenis karya
        $this->dispatch('jenisKaryaSelected', $selectedJenisKarya);
    }
}