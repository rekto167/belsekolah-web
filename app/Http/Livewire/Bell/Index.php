<?php

namespace App\Http\Livewire\Bell;

use App\Models\Bell;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $listeners = [
        'createBell' => 'handleBell'
    ];
    public $show;

    public function render()
    {
        return view('livewire.bell.index',[
            'bells' => Bell::paginate(20)
        ]);
    }

    public function handleBell($data)
    {
        session()->flash('message', 'Data berhasil ditambah.');
    }

    public function deleteIt($id)
    {
        $bell = Bell::find($id);
        $file = File::delete('storage/sound/'.$bell->name.'.mp3');
        $bell->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }

    public function deleteSession()
    {
        session()->forget('message');
    }
}
