<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Search books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">    
                    <div>
                        <x-label for="search" value="{{ __('messages.Search') }}" />

                        <x-input id="search" class="block mt-1 w-full" type="text" name="search" autofocus />
                    </div>

                    <div id="search-result">
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function () {
    $("#search").keyup(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var url = "{{ action([App\Http\Controllers\RestaurantController::class, 'search']) }}";
        $.post(url, { search: $('#search').val(), _token: CSRF_TOKEN }, function(data) {
            $('#search-result').html('');
            $.each(data, function(i, restaurant) {
                var c = '<p class="text-lg">\n\
                            <a href="/restaurant/'+restaurant.id+'">'+restaurant.name+' '+restaurant.id+'</a>\n\
                        </p>';
                 $('#search-result').append(c);
            });
        });
    })
});
</script>    
</x-app-layout>