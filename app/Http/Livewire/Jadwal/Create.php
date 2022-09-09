<?php

namespace App\Http\Livewire\Jadwal;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $days = Days::all();
        return view('livewire.jadwal.create');
    }
}
