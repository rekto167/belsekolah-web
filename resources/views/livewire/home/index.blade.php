<div>
    <h1>Aplikasi Bel Sekolah</h1>
    <div wire:poll.1000ms>
        <input x-timeout:1000="$el.innerText=$moment().format('H:m')" wire:model="jam">
        <table class="border-collapse border border-slate-500 mt-3">
            <thead>
                <tr>
                    <th class="border border-slate-600 p-2">#</th>
                    <th class="border border-slate-600 p-2">Hari</th>
                    <th class="border border-slate-600 p-2">Jam</th>
                    <th class="border border-slate-600 p-2">Kegiatan</th>
                    <th class="border border-slate-600 p-2">Sound</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $item)
                    <tr>
                        <td class="border border-slate-700 p-2">{{ $loop->iteration }}</td>
                        <td class="border border-slate-700 p-2">{{ $item->day->name }}</td>
                        <td class="border border-slate-700 p-2">{{ $item->time }}</td>
                        <td class="border border-slate-700 p-2">{{ $item->activity->name }}</td>
                        <td class="border border-slate-700 p-2">
                            <audio controls>
                                <source src="{{ asset('/storage/sound/' . $item->activity->bell->name . '.mp3') }}"
                                    type="audio/mpeg">
                            </audio>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script type="text/javascript">
            let ONE_MINUTE = 60 * 1000;
            let jam = moment().format('H:m');
            let listAudio = document.querySelectorAll('audio');
            let jadwal = null;
            jadwal = @js($schedules);
            const showTime = () => {
                jam = moment().format('H:m');
                jadwal.map((e, i) => {
                    if (e.time == jam) {
                        listAudio[i].play();
                    }
                })
            }

            function repeatEvery(func, interval) {
                // Check current time and calculate the delay until next interval
                var now = new Date(),
                    delay = interval - now % interval;

                function start() {
                    // Execute function now...
                    func();
                    // ... and every interval
                    setInterval(func, interval);
                }

                // Delay execution until it's an even interval
                setTimeout(start, delay);
            }

            repeatEvery(showTime, ONE_MINUTE);
            // let listAudio = document.querySelectorAll('audio');
            // let jam = moment().format('H:m');
            // let jadwal = null
            // document.addEventListener('livewire:load', function() {
            //     jadwal = @js($schedules);
            //     jadwal.map((e, i) => {
            //         setInterval(() => {
            //             jam = moment().format('H:m')
            //             if (e.time == jam) {
            //                 listAudio[i].play();
            //             }
            //         }, 60000);
            //     })
            // })
        </script>
    </div>
