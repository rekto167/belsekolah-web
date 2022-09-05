<div>
    <div class="container">
        <a href="{{ route('home') }}"
            class="bg-cyan-300 hover:bg-cyan-500 text-dark hover:text-white p-2 font-semibold mb-3">Kembali</a>
        <livewire:bell.create />
        @if (Session::has('message'))
            <div class="bg-green-500 p-2 text-white mb-3 flex justify-between">
                <div class="flex justify-self-start align-middle">
                    <div class="font-bold mr-3">
                        {{-- <h1>Sukses!</h1> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </div>
                    <div>
                        <p>{{ session('message') }}</p>
                    </div>
                </div>
                <div>
                    <button class="self-end" wire:click="deleteSession">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
        <div class="container mt-3">
            <table class="border-collapse border border-slate-500">
                <thead>
                    <tr>
                        <th class="border border-slate-600 p-2">#</th>
                        <th class="border border-slate-600 p-2">Nama</th>
                        <th class="border border-slate-600 p-2">Audio</th>
                        <th class="border border-slate-600 p-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bells as $bell)
                        <tr>
                            <td class="border border-slate-700 p-2">{{ $loop->iteration }}</td>
                            <td class="border border-slate-700 p-2">{{ $bell->name }}</td>
                            <td class="border border-slate-700 p-2">
                                <audio controls>
                                    <source src="{{ asset('/storage/sound/' . $bell->name . '.mp3') }}"
                                        type="audio/mpeg">
                                </audio>
                            </td>
                            <td class="border border-slate-700 p-2">
                                <button type="button" class="bg-red-500 p-2 text-white"
                                    wire:click="deleteIt({{ $bell->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                                <button type="button" class="bg-green-500 p-2 text-white"
                                    wire:click="openModalEdit({{ $bell->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                </button>
                                {{-- modal --}}
                                <div class="relative z-10 @if ($show == false) hidden @endif"
                                    aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                                    <div class="fixed inset-0 z-10 overflow-y-auto">
                                        <div
                                            class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                            <form wire:submit.prevent="updatebell({{ $bell->id }})">
                                                <div
                                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                        <h1 class="font-bold">Edit Aktifitas</h1>
                                                        <div class="flex flex-row">
                                                            <label class="block">
                                                                <span
                                                                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                                                                    Nama Aktifitas
                                                                </span>
                                                                <input type="text"s wire:model="nameDtl"
                                                                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                                                    placeholder="contoh: Jam Pertama" />
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                        <button type="submit"
                                                            class="inline-flex w-full justify-center rounded-md border border-transparent bg-cyan-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                                            Simpan
                                                        </button>
                                                        <button type="button"
                                                            class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                                            wire:click="closeModal">Batal
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $bells->links() }}
            </table>
        </div>
    </div>
</div>
