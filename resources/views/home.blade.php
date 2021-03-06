<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Foods') }}
        </h2>
    </x-slot>

        <div id="msg" class="hidden alert alert-danger absolute bottom-0 right-0">
            <div class="text-center py-4 lg:px-4">
                <div class="p-2 bg-gray-800 items-center text-white leading-none lg:rounded-full flex lg:inline-flex"
                    role="alert">
                    <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">{{ __('messages.New') }}</span>
                    <span id="success" class="font-semibold mr-2 text-left flex-auto">{{ __('messages.Added To Cart') }}</span>
                </div>
            </div>
        </div>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div>
                            <div>
                                <form action="{{ route('food.index') }}" method="GET" role="search">
                
                                    <div class="m-2 align-end">
                                        <span>
                                            <x-input type="text" class="form-control mr-2" name="term" placeholder="Search foods" id="term" />
                                            <button type="submit" title="Search projects">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                  </svg>
                                            </button>
                                        </span>
                                        <a href="{{ route('food.index') }}" class=" mt-1">
                                            <span>
                                                <button type="button" title="Refresh page">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                      </svg>
                                                </button>
                                            </span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 items-center justify-center sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                        @foreach ($foods as $food)
                            <div class="py-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                                    <div class="w-1/3 bg-cover"
                                        style="background-image: url('{{ asset('images/'.$food->image) }}')">
                                    </div>
                                    <div class="w-2/3 p-4">
                                        <h1 class="text-gray-900 font-bold text-2xl">{{ $food->name }}</h1>
                                        <p class="mt-2 text-gray-600 text-sm">{{ $food->description }}</p>


                                        <div class="flex item-center justify-between mt-3">
                                            <h1 class="text-gray-700 font-bold text-xl">{{ $food->price }}???</h1>

                                        </div>
                                        <div class="w-24">
                                            <input id="{{$food->id}}" onKeyDown="return false" class="block rounded w-24 m-1 outline-none" type="number" name="quantity" value="1" min="1" max="10">
                                        </div>


                                            <button  type="submit" data-item_id="{{ $food->id }}" class="btnItemAdd px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded btn-reserve">
                                                {{ __('messages.add_cart') }}
                                            </button>

                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <div class="paginate">
                        {{ $foods->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click','.btnItemAdd', function(){
            var item_id = $(this).data('item_id');
            var item_qty = $("#"+item_id).val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                data:{item_id:item_id, item_qty:item_qty , _token:CSRF_TOKEN },
                url:'/cart-add',
                type:'post',
                success:function(){
                    $("#msg").removeClass("hidden").delay(3000).queue(function(){
                        $('#msg').addClass("hidden").dequeue();
                    });

                },error:function(err) {
                    alert('Error!');
                }
            });
        });

        $("[type='number']").keypress(function (evt) {
            evt.preventDefault();
        });
    </script>

</x-app-layout>
