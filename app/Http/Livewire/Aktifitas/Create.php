<?php

namespace App\Http\Livewire\Aktifitas;

use App\Models\Activity;
use App\Models\Bell;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $show;
    public $bell_id;

    public function mount()
    {
        $this->show = false;
    }

    public function render()
    {
        $bells = Bell::all();
        return view('livewire.aktifitas.create',[
            'bells'=>$bells,
        ]);
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
            'name' => $this->name,
            'bell_id' => $this->bell_id
        ]);

        $this->show = false;
        $this->name=null;
        $this->emit('createdActivity', $activity);
    }
}
