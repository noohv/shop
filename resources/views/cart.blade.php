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
    <script>
        // $id = 1
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // function deleteItem(e,id) {
        //     e.preventDefault();
        //     $(`#cart-${id}`).remove();
        //     price = $(`#price-${id}`).val();
        //     console.log(price);
        //     $('#totalPrice').text(price);

        //     fetch('http://online-catering.test/cart/' + id, {
        //         method: 'DELETE',
        //         headers: {
        //             'Content-type': 'application/json; charset=UTF-8', // Indicates the content
        //             'X-CSRF-TOKEN': CSRF_TOKEN,
        //         },
        //     })
        //     .then(resp => resp.json())
        //     .catch(err => 1)
        // }
        // $('#delete-' + $id).click(function (e) {
        //     $(`#cart-1`).remove();
        //     $('#totalPrice').text('0');
        //     e.preventDefault();
        //     fetch('http://online-catering.test/cart/' + $id, {
        //             method: 'DELETE',
        //             headers: {
        //                 'Content-type': 'application/json; charset=UTF-8', // Indicates the content
        //                 'X-CSRF-TOKEN': CSRF_TOKEN,
        //             },
        //         })
        //         .then(resp => resp.json())
        //         .catch(err => console.log(err))
        // })


        /* Do some other things*/

    </script>
    {{-- <script>
        $(document).ready(function () {
            checkFoodCount();

            function checkFoodCount() {
                if (!$('div[food-id]').length) {
                    $('#foodlist').text('Your cart is empty! :(');
                }
            }

            $(".btn-reserve").on('click', function (e) {
                var url = "{{ route('food.reserve') }}";
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var btn = $(this);
    $.ajax({
    type: "POST",
    url: url,
    data: { id: btn.attr('food-id'), _token: CSRF_TOKEN },
    success: function (data) {
    btn.closest('div').remove();
    checkFoodCount();
    },
    error: function (data) {
    console.log('Error:', data);
    }
    });
    })
    });
    </script> --}}
    {{-- <script>
        url = 'http://localhost:8000/';
        id = '1'
        fetch(`${url}cart/${id}`,{
            method : 'delete',
        })

    </script> --}}
</x-app-layout>
