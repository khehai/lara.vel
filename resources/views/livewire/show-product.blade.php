<div>
    <style>
        [x-cloak] { display: none; }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="antialiased">
        <div class="mx-4 py-4">
          <x-app.breadcrumbs :section='"Categories"' :url='"home"' :current="$product->category->name" />

          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">

            <div class="flex md:flex-row -mx-4">

                <div class="w-full md:w-1/2 px-4">

                    <div x-data="{ image: 1, current: @entangle('current') }" x-cloak>

                        <div class="h-64 md:h-80 rounded-lg mb-4">
                            <template x-for="j in {{ count($pictures) }}">
                                <div x-show="image === j" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                    <span class="text-5xl"><img src="{{ asset(Storage::url($pictures[$current]['url'])) }}" class="object-cover h-32 mt-2 w-60 text-center"></span>
                                </div>
                            </template>

                        </div>

                        <div class="flex -mx-2 mb-4">
                            <template x-for="i in {{ count($pictures) }}">
                                <div class="flex-1 px-2">
                                    <button x-on:click="image = i; current = i - 1" :class="{ 'ring-offset-2 ring-2 ring-indigo-500': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-white flex items-center justify-center">
                                    <span x-text="i" class="text-2xl"></span>
                                    </button>
                                </div>
                            </template>
                        </div>

                    </div>

                </div>

                <div class="w-full md:w-1/2 px-4">

                        <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{ $product->name }}</h2>
                        <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline">{{ $product->brand->name }}</a></p>

                        <div class="flex items-center space-x-4 my-4">

                        <div>
                            <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                            <span class="text-indigo-400 mr-1 mt-1">$</span>
                            <span class="font-bold text-indigo-600 text-3xl">{{ $product->price }}</span>
                            </div>
                        </div>

                        <div class="flex-1">
                            <p class="text-green-500 text-xl font-semibold">Save 12%</p>
                            <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p>
                        </div>

                        </div>

                        <p class="text-gray-500">{{ $product->description }}</p>

                        <div class="flex py-4 space-x-4">

                        <div class="relative">

                            <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">Qty</div>

                                <select class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1" wire:model="quantity">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>

                                <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>

                        </div>

                        <button wire:click="addToCart({{ $product->id }})" type="button" class="h-14 px-6 py-2 font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white">
                            Add to Cart
                        </button>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
