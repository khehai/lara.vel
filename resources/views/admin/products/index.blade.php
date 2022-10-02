<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Products Management') }}</h2>
            <a href="{{ route('admin.products.create') }}">
                <x-jet-secondary-button class="ml-4">
                    {{ __('Create') }}
                </x-jet-secondary-button>
            </a>
        </div>

    </x-slot>
    <div class="relative min-h-screen flex">
        <x-admin.sidebar></x-admin.sidebar>

        <div class="flex-col p-10 text-2xl">
            <livewire:products-table
                seachable="name"
                exportable
            />
        </div>
    </div>

</x-app-layout>
