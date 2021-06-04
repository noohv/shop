<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="foodlist" class="p-6 bg-white border-b border-gray-200">
                    @isset($foods)
                        @foreach( $items as $item )
                            <div id="cart-{{ $item->id }}">
                                <div class='text-lg inline-block' >
                                    {{ $item->name }}
                                    $ {{ $item->price }} x {{ $item->quantity }}
                                    <br>
                                </div>
                                <form class="inline-block" method="POST" action="{{ route('cart.destroy',['cart' => $item->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button food-id="{{ $item->id }}" id="{{ $item->id }}" type="submit"
                                        class="btn-reserve cursor-pointer inline-block" food-id="{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                        <br>
                        Total Price : <p id="totalPrice">{{ \Cart::getTotal() }}</p>
                    @endisset
                    <br>
                </div>
            </div>

            <div class="flex items-center justify-start mt-4">
                <a href="{{route('order.create')}}" class="ml-4">
                    Checkout
                </a>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
