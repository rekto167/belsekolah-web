<?php

namespace App\Http\Livewire\Home;

use App\Models\Activity;
use App\Models\Day;
use App\Models\Schedule;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $sekarang;
    public $day_id;

    public function mount(){
        $this->sekarang = Carbon::now()->translatedFormat('l, d M Y');
    }

    public function render()
    {
        $schedules = Schedule::where('day_id', Carbon::now()->dayOfWeek)->get();
        return view('livewire.home.index', [
            'schedules'=>$schedules,
        ]);
    }
}
