<div>
    <style>
        [x-cloak] { display: none; }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="antialiased">
      <div class="mx-4 py-4">
        <x-app.breadcrumbs :section='"Shop"' :url="'shopping.cart'" :current='"Shopping Cart"' />

        <div class="flex justify-center py-4 my-6">
          <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <div class="flex-1">
              <table class="w-full text-sm lg:text-base" cellspacing="0">
                <thead>
                  <tr class="h-12 uppercase">
                    <th class="hidden md:table-cell"></th>
                    <th class="text-left">Product</th>
                    <th class="lg:text-right text-left pl-5 lg:pl-0">
                      <span class="lg:hidden" title="Quantity">Qtd</span>
                      <span class="hidden lg:inline">Quantity</span>
                    </th>
                    <th class="hidden text-right md:table-cell">Unit price</th>
                    <th class="text-right">Total price</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($cartItems as $item)
                    <tr>
                        <td class="hidden pb-4 md:table-cell">
                          <a href="#">
                            <img src="{{ asset(Storage::url($item['attributes']['image'])) }}" class="w-20 rounded" alt="Thumbnail">
                          </a>
                        </td>
                        <td>
                            <a href="#">
                              <p class="mb-2 md:ml-4">{{ $item['name'] }}</p>
                            </a>
                          </td>
                          <td class="justify-center md:justify-end md:flex mt-6">
                            <div class="w-30 h-10">
                                <div class="relative flex flex-row w-full h-8">
                            <livewire:cart-update :item="$item" :key="$item['id']" />
                        </div>
                    </div>
                          </td>
                          <td class="hidden text-right md:table-cell">
                            <span class="text-sm lg:text-base font-medium">
                              {{ number_format($item['price'], 2) }}€
                            </span>
                          </td>
                          <td class="text-right">
                            <span class="text-sm lg:text-base font-medium">
                                {{ number_format($item['price']*$item['quantity'], 2) }}€
                            </span>
                          </td>
                          <td class="text-right">
                              <button class="mr-2 mt-1 lg:mt-2" wire:click.prevent="remove('{{ $item['id'] }}')">
                                <x-app.trash-alt />
                              </button>
                          </td>
                        </tr>
                    @empty
                        <h4>Not items yet</h4>
                    @endforelse
                </tbody>
              </table>
              <hr class="pb-6 mt-6">
              <div class="my-4 mt-6 -mx-2 lg:flex">
                <div class="lg:px-2 lg:w-1/2">
                  <div class="p-4 bg-gray-100 rounded-full">
                    <h1 class="ml-2 font-bold uppercase">Coupon Code</h1>
                  </div>
                  <div class="p-4">
                    <p class="mb-4 italic">If you have a coupon code, please enter it in the box below</p>
                    <div class="justify-center md:flex">
                      <form action="" method="POST">
                          <div class="flex items-center w-full h-13 pl-3 bg-white bg-gray-100 border rounded-full">
                            <input type="coupon" name="code" id="coupon" placeholder="Apply coupon" value="90off"
                                    class="w-full bg-gray-100 outline-none appearance-none focus:outline-none active:outline-none"/>
                              <button type="submit" class="text-sm flex items-center px-3 py-1 text-white bg-indigo-800 rounded-full outline-none md:px-4 hover:bg-indigo-700 focus:outline-none active:outline-none">
                                <svg aria-hidden="true" data-prefix="fas" data-icon="gift" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z"/></svg>
                                <span class="font-medium">Apply coupon</span>
                              </button>
                          </div>
                      </form>
                    </div>
                  </div>
                  <div class="p-4 mt-6 bg-gray-100 rounded-full">
                    <h1 class="ml-2 font-bold uppercase">Instruction for seller</h1>
                  </div>
                  <div class="p-4">
                    <p class="mb-4 italic">If you have some information for the seller you can leave them in the box below</p>
                    <textarea class="w-full h-24 p-2 bg-gray-100 rounded"></textarea>
                  </div>
                </div>
                <div class="lg:px-2 lg:w-1/2">
                  <div class="p-4 bg-gray-100 rounded-full">
                    <h1 class="ml-2 font-bold uppercase">Order Details</h1>
                  </div>
                  <div class="p-4">
                    <p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you have entered</p>
                      <div class="flex justify-between border-b">
                        <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                          Subtotal
                        </div>
                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                          {{ \Cart::getSubTotal() }}€
                        </div>
                      </div>
                        <div class="flex justify-between pt-4 border-b">
                          <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-gray-800">
                            <form action="" method="POST">
                              <button type="submit" class="mr-2 mt-1 lg:mt-2">
                                <x-app.trash-alt />
                              </button>
                            </form>
                            Coupon "90off"
                          </div>
                          <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-700">
                            -133,944.77€
                          </div>
                        </div>
                        <div class="flex justify-between pt-4 border-b">
                          <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                            New Subtotal
                          </div>
                          <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                            14,882.75€
                          </div>
                        </div>
                        <div class="flex justify-between pt-4 border-b">
                          <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                            Tax
                          </div>
                          <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                            2,976.55€
                          </div>
                        </div>
                        <div class="flex justify-between pt-4 border-b">
                          <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                            Total
                          </div>
                          <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                            17,859.3€
                          </div>
                        </div>
                      <a href="{{ route('checkout.index') }}">
                        <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-indigo-800 rounded-full shadow item-center hover:bg-indigo-700 focus:shadow-outline focus:outline-none">
                          <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                          <span class="ml-2 mt-5px">Procceed to checkout</span>
                        </button>
                      </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
