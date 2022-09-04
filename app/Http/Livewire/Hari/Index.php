<?php

namespace App\Http\Livewire\Hari;

use App\Models\Day;
use Livewire\Component;

class Index extends Component
{
    public $listeners = [
        'createDay' => 'handleCreateDay'
    ];

    public $showModalEdit;
    public $nameDtl;

    public function mount()
    {
        $this->showModalEdit = false;
    }

    public function render()
    {
        $days = Day::all();
        return view('livewire.hari.index',[
            'days'=>$days
        ]);
    }

    public function handleCreateDay($data)
    {
        session()->flash('message', 'Berhasil tambah hari.');
    }

    public function deleteSession()
    {
        session()->forget('message');
    }

    public function deleteIt($id)
    {
        $day = Day::find($id);
        $day->delete();
        session()->flash('message', 'Berhasil dihapus.');
    }

    public function changeShow()
    {
        $status = $this->showModalEdit;
        $this->showModalEdit = !$status;
    }

    public function openModalEdit($id)
    {
        $status = $this->showModalEdit;
        $this->showModalEdit = !$status;
        $day = Day::find($id);
        $this->nameDtl = $day->name;
    }

    public function editDay($id)
    {
        $day = Day::find($id);
        $day->name = $this->nameDtl;
        $day->save();
        $status = $this->showModalEdit;
        $this->showModalEdit = !$status;
        session()->flash('message', 'Berhasil diupdate.');
    }
}
