<?php

namespace App\Http\Livewire\Aktifitas;

use App\Models\Activity;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $show;

    public function mount()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.aktifitas.create');
    }

    public function modalShow()
    {
        $status = $this->show;
        $this->show = !$status;
        session()->forget('message');
    }

    public function addActivity()
    {
        $this->validate([
            'name'=>'required|string'
        ]);

        $activity = Activity::create([
            'name' => $this->name
        ]);

        $this->show = false;
        $this->name=null;
        $this->emit('createdActivity', $activity);
    }
}
