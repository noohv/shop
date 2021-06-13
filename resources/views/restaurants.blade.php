<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Restaurants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
                <!-- component -->
                <div class="content m-2">
                    <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                        @foreach($restaurants as $restaurant)

                            <div class="flex flex-col">
                                <div class="bg-white shadow-md  rounded-3xl p-4">
                                    <div class="flex-none lg:flex">
                                        <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                                            <img src="{{ asset('images/'.$restaurant->image) }}"
                                                alt="Just a flower"
                                                class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                                        </div>
                                        <div class="flex-auto ml-3 justify-evenly py-2">
                                            <div class="flex flex-wrap ">
                                                <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                                    {{ __('messages.Restaurant') }}
                                                </div>
                                                <h2 class="flex-auto text-lg font-medium">{{ $restaurant->name }}</h2>
                                            </div>
                                            <p class="mt-3"></p>
                                            <div class="flex py-4  text-sm text-gray-600">
                                                <div class="flex-1 inline-flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                    </svg>
                                                    <p>{{ $restaurant->location }}</p>
                                                </div>
                                                <div class="flex-1 inline-flex items-center">

                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if($restaurant->rating >= $i)
                                                        <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                        </svg>
                                                        @else
                                                        <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                        </svg>
                                                        @endif

                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                            <div class="flex space-x-3 text-sm font-medium">
                                                <div class="flex-auto flex space-x-3">
                                                    <a href="{{ url('reviews', $restaurant->id) }}"
                                                        class="mb-2 md:mb-0 bg-white px-5 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full hover:bg-gray-100 inline-flex items-center space-x-2 ">
                                                        <span>{{ __('messages.Reviews') }}</span>
                                                    </a>
                                                </div>
                                                <a href="{{ url('restaurant', $restaurant->id) }}"
                                                    class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                                    type="button" aria-label="like">{{ __('messages.View Restaurant') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="paginate">
                        {{ $restaurants->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
