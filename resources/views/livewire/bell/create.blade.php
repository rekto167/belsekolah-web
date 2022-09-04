<div class="mt-3">
    <button type="button" class="bg-cyan-300 hover:bg-cyan-500 hover:text-white text-dark p-2 font-semibold"
        wire:click="changeForm">Tambah</button>
    @if ($showForm == true)
        <div class="container">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Nama Audio</label>
                    <input type="text" class="border border-gray-200 p-2 rounded flex"
                        placeholder="contoh: Audio Jam Pertama" wire:model="name">
                </div>
                <div class="mb-3">
                    <label>File Audio</label>
                    <input type="file" class="border border-gray-200 p-2 rounded flex"
                        placeholder="contoh: Audio Jam Pertama" wire:model="file">
                </div>
                <button type="button"
                    class="bg-slate-300 text-dark hover:bg-slate-500 hover:text-white font-semibold p-2"
                    wire:click="changeForm">Batal</button>
                <button type="submit"
                    class="bg-cyan-300 text-dark hover:bg-cyan-500 hover:text-white font-semibold p-2">Simpan</button>
            </form>
        </div>
    @endif
</div>
