@extends('layouts.app')
@section('title', 'Aktifitas')
@section('content')
    <div class="container">
        <div class="container flex">
            <a href="{{ route('home') }}" class="bg-cyan-300 p-2 mb-3 text-dark font-semibold">Back</a>
        </div>
        <div class="container mt-5">
            <livewire:aktifitas.index />
        </div>
    </div>
@endsection
