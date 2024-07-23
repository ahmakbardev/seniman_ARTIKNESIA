<?php

namespace App\Livewire;

use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ExperienceList extends Component
{
    protected $listeners = ['experienceUpdated' => '$refresh'];

    public function render()
    {
        $experiences = Auth::user()->experiences;

        return view('livewire.experience-list', compact('experiences'));
    }

    public function deleteExperience($experienceId)
    {
        Experience::findOrFail($experienceId)->delete();
        $this->dispatch('experienceUpdated');
    }
}
