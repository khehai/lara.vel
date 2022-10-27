<x-app-layout>
    <div class="relative min-h-screen flex">
        <x-sidebar />
        <div class="w-full h-full p-4 m-8 overflow-y-auto">
            <div class="flex items-center justify-center p-40 border-4 border-dotted">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
