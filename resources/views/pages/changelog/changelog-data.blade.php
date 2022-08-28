@section('title', 'Data Changelog')
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Changelog') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Changelog</a></div>
            <div class="breadcrumb-item"><a href="{{ route('changelog') }}">Data Changelog</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="changelog" :model="$changelog" />
    </div>
</x-app-layout>
