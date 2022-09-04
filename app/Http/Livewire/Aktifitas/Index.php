<?php

namespace App\Http\Livewire\Aktifitas;

use App\Models\Activity;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $listeners = [
        'createdActivity' => 'handleCreated'
    ];

    public $nameDtl;
    public $show;

    public function mount()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.aktifitas.index',[
            'activities' => Activity::paginate(5)
        ]);
    }

    public function handleCreated($data)
    {
        session()->flash('message', 'Tambah aktifitas berhasil.');
    }

    public function deleteSession()
    {
        session()->forget('message');
    }

    public function openModalEdit($id)
    {
        $this->show = true;
        $activity = Activity::find($id);
        $this->nameDtl = $activity->name;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function updateActivity($id)
    {
        $activity = Activity::find($id);
        $activity->name = $this->nameDtl;
        $activity->save();
        $this->closeModal();
        session()->flash('message', 'Data berhasil update.');
    }

    public function deleteIt($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        session()->flash('message', 'Data berhasil dihapus.');
    }
}
