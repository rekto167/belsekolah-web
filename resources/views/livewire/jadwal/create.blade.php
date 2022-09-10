<div class="mb-3">
    <div class="mb-3">
        <button
            class="bg-cyan-300 text-dark hover:bg-cyan-500 hover:text-white p-2 font-semibold @if ($showBtnTambah == false) hidden @endif"
            wire:click="changeButton">Tambah</button>
    </div>
    <div class="container @if ($showBtnTambah == true) hidden @endif ">
        <form wire:submit.prevent="store">
            <div class="mb-3">
                <label>Jam</label>
                <input type="time"
                    class="border @error('time')
                    border-red-500
                @enderror p-2 rounded flex"
                    placeholder="contoh: 00:00" wire:model="time">
                @error('time')
                    <span class="text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Hari</label>
                <select
                    class="border p-2 rounded flex @error('day_id')
                border-red-500
            @enderror"
                    wire:model="day_id">
                    <option selected>---Pilih hari---</option>
                    @foreach ($days as $day)
                        <option value="{{ $day->id }}">
                            {{ $day->name }}</option>
                    @endforeach
                </select>
                @error('day_id')
                    <span class="text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Kegiatan</label>
                <select
                    class="border p-2 rounded flex @error('activity_id')
                border-red-500
                @enderror"
                    wire:model="activity_id">
                    <option selected>---Pilih aktifitas---</option>
                    @foreach ($activities as $activity)
                        <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                    @endforeach
                </select>
                @error('activity_id')
                    <span class="text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="button" class="bg-slate-300 text-dark hover:bg-slate-500 hover:text-white font-semibold p-2"
                wire:click="changeButton">Batal</button>
            <button type="submit"
                class="bg-cyan-300 text-dark hover:bg-cyan-500 hover:text-white font-semibold p-2">Simpan</button>
        </form>
    </div>
</div>
