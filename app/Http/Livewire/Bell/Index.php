<?php

namespace App\Http\Livewire\Bell;

use App\Models\Bell;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.bell.index',[
            'bells' => Bell::paginate(20)
        ]);
    }
}
