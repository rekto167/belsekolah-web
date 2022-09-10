<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Activity;
use App\Models\Day;
use App\Models\Schedule;
use Livewire\Component;

class Create extends Component
{
    public $showBtnTambah;
    public $time;
    public $day_id;
    public $activity_id;

    public function mount(){
        $this->showBtnTambah = true;
    }

    public function render()
    {
        $days = Day::all();
        $activities = Activity::all();
        return view('livewire.jadwal.create',[
            'days' => $days,
            'activities' => $activities
        ]);
    }

    public function store(){
        $this->validate([
            'time' => 'required',
            'day_id' => 'required|integer',
            'activity_id' => 'required|integer'
        ]);

        $schedule = Schedule::create([
            'time' => $this->time,
            'day_id' => $this->day_id,
            'activity_id' => $this->activity_id
        ]);

        $this->emit('stored', $schedule);
    }

    public function changeButton(){
        $this->showBtnTambah = !$this->showBtnTambah;
    }
}
