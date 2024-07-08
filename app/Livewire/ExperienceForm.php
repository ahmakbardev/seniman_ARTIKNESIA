<?php

namespace App\Livewire;

use App\Models\Experience;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExperienceForm extends Component
{
    use WithFileUploads;

    public $experienceId;
    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $selectedProvince;
    public $selectedCity;
    public $role;
    public $achievements;
    public $media = [];
    public $existingMedia = [];
    public $provinces = [];
    public $cities = [];
    public $newMediaPreviews = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'selectedProvince' => 'required',
        'selectedCity' => 'required',
        'role' => 'nullable|string|max:100',
        'achievements' => 'nullable|string',
        'media.*' => 'nullable|image|max:1024', // 1MB Max per file
    ];

    public function mount($experienceId = null)
    {
        $this->provinces = Provinsi::all();

        if ($experienceId) {
            $experience = Experience::findOrFail($experienceId);
            $this->experienceId = $experience->id;
            $this->title = $experience->title;
            $this->description = $experience->description;
            $this->start_date = $experience->start_date;
            $this->end_date = $experience->end_date;
            $this->role = $experience->role;
            $this->achievements = $experience->achievements;
            $this->existingMedia = json_decode($experience->media, true) ?? [];

            $locationParts = explode(', ', $experience->location);
            if (count($locationParts) == 2) {
                $provinceName = $locationParts[1];
                $province = Provinsi::where('nama', $provinceName)->first();
                $this->selectedProvince = $province ? $province->id : null;

                $cityName = $locationParts[0];
                $city = Kota::where('nama', $cityName)->first();
                $this->selectedCity = $city ? $city->id : null;

                $this->loadCities();
            }
        }
    }

    public function loadCities()
    {
        if ($this->selectedProvince) {
            $this->cities = Kota::where('provinsi_id', $this->selectedProvince)->get();
        } else {
            $this->cities = [];
        }
    }

    public function removeMedia($index)
    {
        unset($this->existingMedia[$index]);
        $this->existingMedia = array_values($this->existingMedia); // Reindex array
    }

    public function updatedMedia()
    {
        $this->newMediaPreviews = [];
        foreach ($this->media as $file) {
            $this->newMediaPreviews[] = $file->temporaryUrl();
        }
    }

    public function save()
    {
        $this->validate();

        $location = Kota::find($this->selectedCity)->nama . ', ' . Provinsi::find($this->selectedProvince)->nama;

        $mediaFiles = $this->existingMedia;
        foreach ($this->media as $file) {
            $mediaFiles[] = $file->store('media', 'public');
        }

        $experienceData = [
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'location' => $location,
            'role' => $this->role,
            'achievements' => $this->achievements,
            'media' => json_encode($mediaFiles),
        ];

        if ($this->experienceId) {
            $experience = Experience::findOrFail($this->experienceId);
            $experience->update($experienceData);
        } else {
            Auth::user()->experiences()->create($experienceData);
        }

        $locale = app()->getLocale();
        return redirect("/$locale/seniman/profile")->with('success', 'Experience saved successfully.');
    }

    public function render()
    {
        return view('livewire.experience-form');
    }
}
