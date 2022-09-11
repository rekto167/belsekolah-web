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
    public $jam;
    public $play;
    public $listJadwal;

    public function mount(){
        $this->sekarang = Carbon::now()->translatedFormat('l, d M Y');
        $this->play =false;
    }

    public function render()
    {
        $this->jam = Carbon::now()->format('H:i');
        $dayWeek = Carbon::now()->dayOfWeek;
        if($dayWeek == 0){
            $dayWeek = 7;
        }
        $schedules = Schedule::where('day_id', $dayWeek)->get();
        return view('livewire.home.index', [
            'schedules'=>$schedules,
        ]);
    }

    public function playkan(){
        $jadwal = $this->listJadwal;
        foreach($jadwal as $j){
            if($j->time == Carbon::now()->format('H:m')){
                $this->dispatchBrowserEvent('play', $j->id);
            }
        }
    }

    public function coba(){
        dd('coba');
    }
}
