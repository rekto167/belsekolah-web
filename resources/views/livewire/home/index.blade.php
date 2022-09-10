<div>
    <h1>Aplikasi Bel Sekolah</h1>

    <div class="bg-green-500 p-2 text-white">
        <p>Alarm</p>
    </div>
    <div wire:poll.1000ms>
        <div x-timeout:1000="$el.innerText=$moment().format('LTS')">
            <h3>{{ $sekarang }}</h3>
        </div>
    </div>
    <table class="border-collapse border border-slate-500 mt-3">
        <thead>
            <tr>
                <th class="border border-slate-600 p-2">#</th>
                <th class="border border-slate-600 p-2">Hari</th>
                <th class="border border-slate-600 p-2">Jam</th>
                <th class="border border-slate-600 p-2">Kegiatan</th>
            </tr>
            @foreach ($schedules as $item)
                <tr>
                    <td class="border border-slate-700 p-2">{{ $loop->iteration }}</td>
                    <td class="border border-slate-700 p-2">{{ $item->day->name }}</td>
                    <td class="border border-slate-700 p-2">{{ $item->time }}</td>
                    <td class="border border-slate-700 p-2">{{ $item->activity->name }}</td>
                </tr>
            @endforeach
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
