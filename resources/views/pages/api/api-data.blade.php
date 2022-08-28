@section('title', 'Data Api')
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Api') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Api</a></div>
            <div class="breadcrumb-item"><a href="{{ route('api') }}">Data Api</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="api" :model="$api" />
    </div>
</x-app-layout>
