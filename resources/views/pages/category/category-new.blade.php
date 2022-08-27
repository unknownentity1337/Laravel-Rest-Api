<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Create New Category') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Category</a></div>
            <div class="breadcrumb-item"><a href="{{ route('changelog') }}">Create New Category</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-category action="createCategory" />
    </div>
</x-app-layout>
