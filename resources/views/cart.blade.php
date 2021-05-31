<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="booklist" class="p-6 bg-white border-b border-gray-200">
                @isset($foods)
                @foreach ( $foods as $food )
                    <p class='text-lg' food-id="{{$food->id}}"> 
                        {{$food->name}}                   
                        $ {{$food->price}}                   
                    </p>
                @endforeach
                @endisset
                <br>
                </div>
            </div>
        </div>
    </div>
    <script>
$(document).ready(function () {
    checkBookCount();
    
    function checkBookCount() {
        if (!$('p[food-id]').length) {
            $('#foodlist').text('There is nothing in the cart!');
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
