@props(['product'])

<div class="m-4 mb-0 md:w-1/2 lg:w-1/3 xl:w-1/4 p-2">
  <div class="w-full lg:max-w-lg px-4 lg:px-0">

    <div class="p-3 bg-white rounded shadow-md">
      <div class="relative w-full mb-3 h-62 lg:mb-0">
        <div class="absolute top-0 right-0 flex flex-col p-3">
          <span class="text-red-800 cursor-pointer hover:text-red-500">
             <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " fill="none" viewBox="0 0 24 24"
            stroke="white"><path stroke-linecap="round" fill="red" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
          </span>
        </div>
        <img src="{{ $product->cover }}" alt="{{ $product->name }}"
        class="object-cover h-48 w-96 rounded">
              </div>

               <div class="flex-auto p-2 justify-evenly">
                <div class="flex flex-wrap ">
                  <div class="flex items-center justify-between w-full min-w-0 ">

                    <h2 class="mr-auto text-lg cursor-pointer hover:text-gray-900 font-semibold">{{ \Illuminate\Support\Str::limit($product->name, 25, $end='...') }}</h2>

                    <div class="mt-1 text-xl font-semibold">${{ $product->price }}</div>
                  </div>
                </div>
                <div class="mt-4">
                    <button class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-900 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                      <span class="text-white">Add to Cart</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
