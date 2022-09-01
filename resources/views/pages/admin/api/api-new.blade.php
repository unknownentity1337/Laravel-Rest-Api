@section('title', 'Create Api')
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Create New Api') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Api</a></div>
            <div class="breadcrumb-item"><a href="{{ route('api') }}">Create New Api</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-api action="createApi" />
    </div>
</x-app-layout>
