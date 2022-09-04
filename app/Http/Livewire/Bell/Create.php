<?php

namespace App\Http\Livewire\Bell;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $file;
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
}
