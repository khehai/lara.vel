<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Brand') }}
            </h2>
            <a href="{{ route('admin.brands.create') }}">
                <x-jet-secondary-button class="ml-4">
                    {{ __('Create') }}
                </x-jet-secondary-button>
            </a>
        </div>
    </x-slot>

    <div class="relative min-h-screen flex">
        <x-admin.sidebar />
        <!-- content -->
        <div class="flex-1 p-10 text-2xl">

            <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}" class="py-4 px-10 max-w-7xl mx-auto">
            @csrf
            @method('PUT')

                <div class="px-10">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $brand->name)" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4 px-10">
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-jet-textarea
                        id="description"
                        name="description"
                        limit="255"
                        wire:model.defer="description"
                        :value="$brand->description"
                        placeholder="{{ __('Description') }}"
                        class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                    />

                </div>


                <x-jet-section-border />

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Update') }}
                    </x-jet-button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
