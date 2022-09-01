@section('title', 'Edit Api')
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Api') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Api</a></div>
            <div class="breadcrumb-item"><a href="{{ route('api') }}">Edit Api</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-api action="updateApi" :apiId="request()->apiId" />
    </div>
</x-app-layout>
