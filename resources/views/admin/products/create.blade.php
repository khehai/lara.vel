<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Product') }}
            </h2>
            <a href="{{ route('admin.products.create') }}">
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

            @if ($errors->any())
                <div class="alert alert-danger text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif

            <form method="POST" action="{{ route('admin.products.store') }}" class="py-4 px-10 max-w-7xl mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="flex item-center justify-between mt-4">
                <div class="w-full px-10"
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />

                    @error('name')
                    <div class="alert alert-danger text-red-500">
                            {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="w-full px-10"
                    <x-jet-label for="price" value="{{ __('Price') }}" />
                    <x-jet-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus autocomplete="price" />
                </div>
            </div>

            <div class="mt-4 px-10"
                    <x-jet-label for="details" value="{{ __('Details') }}" />
                    <x-jet-input id="details" class="block mt-1 w-full" type="text" name="details" :value="old('details')" required autofocus autocomplete="details" />
                    @error('details')
                    <div class="alert alert-danger text-red-500">
                            {{ $message }}
                    </div>
                    @enderror
            </div>

            <div class="flex item-center justify-between mt-4">
                <div class="w-full px-10"
                    <x-jet-label for="category_id" value="{{ __('Category') }}" />
                    <x-form.select id="category_id" class="block mt-1 w-full" name="category_id" :value="old('category_id')" required autofocus autocomplete="category_id" :options=$categories/>
                </div>
                <div class="w-full px-10"
                    <x-jet-label for="brand_id" value="{{ __('Brand') }}" />
                     <x-form.select id="brand_id" class="block mt-1 w-full" name="brand_id" :value="old('brand_id')" required autofocus autocomplete="brand_id"  :options=$brands />
                </div>
            </div>

             <div class="mt-4 px-10">
                  <label class="block text-sm font-medium text-gray-700">Cover picture</label>
                  <x-form.upload name="cover" :value="old('cover', '')" />
            </div>


            <x-jet-section-border />

            <div class="mt-4 px-10">
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-jet-textarea
                        id="description"
                        name="description"
                        limit="255"
                        wire:model.defer="description"
                        :value="old('description')"
                        placeholder="{{ __('Description') }}"
                        class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                    />

                </div>

                <div class="mt-4 px-5">
                    <x-jet-label value="{{ __('Select status') }}" />

                    <div class="flex items-center justify-between mt-4 px-10">
                        @foreach($status as $key => $value)
                          <div class="flex items-center mb-4">
                            <input id="status-{{$value}}" type="radio" name="status" value="{{$value}}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" checked="false">
                            <label for="status-{{$value}}" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                              {{$key}}
                            </label>
                          </div>
                        @endforeach
                    </div>
                </div>

                <x-jet-section-border />

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Create') }}
                    </x-jet-button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
