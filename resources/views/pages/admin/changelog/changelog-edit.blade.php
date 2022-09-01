@section('title', 'Edit Changelog')
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Changelog') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Changelog</a></div>
            <div class="breadcrumb-item"><a href="{{ route('changelog') }}">Edit Changelog</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-changelog action="updateChangelog" :changelogId="request()->changelogId" />
    </div>
</x-app-layout>
