<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Day;
use Livewire\Component;
use App\Models\Schedule;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $day_id;
    public $show;

    public function mount()
    {
        $this->show = false;
    }

    public function render()
    {
        if($this->day_id !== null)
        {
            $schedules = Schedule::where('day_id', $this->day_id)->paginate(20);
        } else {
            $schedules = Schedule::paginate(20);
        }
        $days = Day::all();
        return view('livewire.jadwal.index',[
            'schedules'=>$schedules,
            'days'=>$days,
        ]);
    }
}
