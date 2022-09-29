<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Users Management') }}</h2>
    </x-slot>
    <div class="relative min-h-screen flex">
        <x-admin.sidebar></x-admin.sidebar>

        <div class="flex-col p-10 text-2xl">
            <livewire:users-table
                seachable="name, email"
                exportable
            />
        </div>
    </div>

</x-app-layout>
