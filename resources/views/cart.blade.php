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
                @foreach ( $foods as $food )
                    <p class='text-lg' food-id="{{$food->id}}"> 
                        {{$food->name}}                   
                        $ {{$food->price}}
                        <button class="btn-reserve" food-id="{{ $food->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>  
                        <br>                  
                    </p>
                @endforeach
                @endisset
                <br>
                </div>
            </div>
            
            <div class="flex items-end justify-end mt-4">
                <a id="checkout" href="{{route('home')}}" class="ml-4">
                    {{_('Checkout')}}
                </a>    
            </div>

    </div>
    <script>
        $(document).ready(function () {
            checkFoodCount();
            
            function checkFoodCount() {
                if (!$('p[food-id]').length) {
                    $('#foodlist').text('Your cart is empty! :(');
                    $("#checkout").removeAttr("href");
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
                        btn.closest('p').remove();
                        checkFoodCount();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            })
        });        
    </script>      
</x-app-layout>
