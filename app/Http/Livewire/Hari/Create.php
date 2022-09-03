<?php

namespace App\Http\Livewire\Hari;

use App\Models\Day;
use Livewire\Component;

class Create extends Component
{

    public $showModal=false;
    public $name;

    public function render()
    {
        return view('livewire.hari.create');
    }

    public function modalShow()
    {
        $status = $this->showModal;
        $this->showModal = !$status;
    }

    public function addDay()
    {
        $this->validate([
            'name'=>'required'
        ]);

        $day = Day::create([
            'name'=>$this->name
        ]);

        $this->showModal = false;
        $this->emit('createDay', $day);
    }
}
