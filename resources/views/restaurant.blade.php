<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        left: -9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Restaurant') }}
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <h1 class="text-4xl"> <b>{{ __('Name') }}:</b> {{ $restaurant->name }} </h1>
                    <br>
                    <p class="text-lg"><b>{{ __('Description') }}: </b>{{ $restaurant->description }}</p>
                    @auth
                        @if (Auth::user()->role == "3" || (Auth::user()->role == "2" && $restaurant->user_id == Auth::id()))
                        <a href="{{ url('restaurant/edit', $restaurant->id) }}"
                            class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                            type="button" aria-label="like">{{ __('messages.Edit Restaurant') }}</a>                        @endif
                    @endauth

                    <div class="grid grid-cols-3 items-center justify-center sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($foods as $food)
                        <div class="py-6">
                            <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="w-1/3 bg-cover"
                                    style="background-image: url('{{ asset('images/'.$food->image) }}')">
                                </div>
                                <div class="w-2/3 p-4">
                                    <h1 class="text-gray-900 font-bold text-2xl">{{ $food->name }}</h1>
                                    <p class="mt-2 text-gray-600 text-sm">{{ $food->description }}</p>


                                    <div class="flex item-center justify-between mt-3">
                                        <h1 class="text-gray-700 font-bold text-xl">{{ $food->price }}€</h1>

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

                    @auth
                    @if(Auth::user()->role == "1" or Auth::user()->role == "3")
                        @if ($hasReview==false and $hasOrder==true)
                        <h2 class="text-gray-800 text-center text-3xl font-semibold">{{ __('messages.Leave a review') }}</h2>
                        <form method="POST" action="{{ route('review.store',['id' => $restaurant->id ]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="py-3 sm:max-w-xl sm:mx-auto">
                                <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                                    <div class="bg-gray-200 rounded w-full flex flex-col items-center">

                                        <div class="flex flex-col items-center py-6 space-y-3">
                                        <span class="text-lg text-gray-800">{{ __('messages.Rating') }}</span>

                                        <div class="flex space-x-3">

                                            <div class="rate">
                                                <input type="radio" id="star5" name="rate" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="rate" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="rate" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="rate" value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="rate" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="w-3/4 flex flex-col">
                                        <textarea class="p-4 text-gray-500 rounded-xl h-20" name="description" id="description" rows="3"></textarea>
                                        <x-validation-error class="mb-4" :errors="$errors" title="description" />
                                        <button type="submit" class="py-3 my-8 text-lg bg-gray-800 rounded-xl text-white">{{ __('messages.Rate Now') }}</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                        @elseif($hasReview==true)
                        <h2 class="text-gray-800 text-center text-3xl font-semibold">{{ __('messages.Edit your review') }}</h2>
                        <form method="POST" action="{{ route('review.update',['id' => $restaurant->id ]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="py-3 sm:max-w-xl sm:mx-auto">
                                <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                                    <div class="bg-gray-200 rounded w-full flex flex-col items-center">

                                        <div class="flex flex-col items-center py-6 space-y-3">
                                        <span class="text-lg text-gray-800">{{ __('messages.Rating') }}</span>

                                        <div class="flex space-x-3">

                                            <div class="rate">
                                                <input type="radio" id="star5" name="rate" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="rate" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="rate" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="rate" value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="rate" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="w-3/4 flex flex-col">
                                        <textarea class="p-4 text-gray-500 rounded-xl h-20" name="description" id="description" rows="3"></textarea>
                                        <x-validation-error class="mb-4" :errors="$errors" title="description" />
                                        <button type="submit" class="py-3 my-8 text-lg bg-gray-800 rounded-xl text-white">{{ __('messages.Rate Now') }}</button>
                                    </div>

                                </div>
                            </div>
                        </form>

                        @endif
                    @endif
                    @endauth
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

        $('#addStar').change('.star', function(e) {
            $(this).submit();
        });
    </script>

</x-app-layout>
