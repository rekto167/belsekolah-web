@extends('layouts.app')
@section('title', 'Hari')
@section('content')
    <div class="container">
        <div class="container flex">
            <a href="{{ url()->previous() }}" class="bg-cyan-300 p-2 mb-3 text-dark font-semibold">Back</a>
        </div>
        <div class="container mt-5">
            <livewire:hari.create />
            <livewire:hari.index />
        </div>
    </div>
@endsection
