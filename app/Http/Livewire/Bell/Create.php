<?php

namespace App\Http\Livewire\Bell;

use App\Models\Bell;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $file;
    public $name;
    public $showForm;

    public function mount()
    {
        $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.bell.create');
    }

    public function changeForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function store()
    {
        $this->validate([
            'name'=>'required|string',
            'file'=>'required|file|mimes:audio/mpeg,mpga,mp3,wav'
        ]);

        $file = $this->file->storeAs('public/sound', $this->name.'.mp3');
        $this->changeForm();
        $bell = Bell::create([
            'name'=>$this->name,
            'file'=>$file
        ]);
    }
}
