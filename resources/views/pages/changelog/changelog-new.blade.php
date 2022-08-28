@section('title', 'Create Changelog')
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Create New Changelog') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Changelog</a></div>
            <div class="breadcrumb-item"><a href="{{ route('changelog') }}">Create New Changelog</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-changelog action="createChangelog" />
    </div>
</x-app-layout>
