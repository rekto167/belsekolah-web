@extends('layouts.app')
@section('title', 'Jadwal')
@section('content')
    <div class="container">
        <a class="bg-cyan-300 hover:bg-cyan-500 text-dark hover:text-white p-2 font-semibold"
            href="{{ route('home') }}">Kembali</a>
        <livewire:jadwal.index />
    </div>
@endsection
