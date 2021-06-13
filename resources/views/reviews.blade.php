<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Reviews') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="mx-auto">
                    <div class="container px-5 mx-auto lg:px-24 lg:py-20">
                      <div class="flex flex-wrap -m-4">
                          @foreach ($reviews as $review)
                            <div class="p-4 mx-auto mb-6 lg:w-1/3 lg:mb-0">
                                <div class="h-full p-6 text-left bg-gray-100 rounded-xl">
                                    <a class="inline-flex items-center w-full mb-4">
                                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <div class="flex flex-col flex-grow pl-3">
                                        @foreach ($users as $user)
                                            @if ($user->id === $review->user_id)
                                              <h2 class="text-xs font-semibold tracking-widest text-black uppercase title-font"> {{$user->name}}</h2>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="pt-8 flex item-left mt-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if($review->rating >= $i)
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
                                    </a>
                                    <p class="text-base font-medium leading-relaxed text-blueGray-700 ">{{$review->review}} </p>
                                </div>
                            </div>
                          @endforeach

                        </div>
                    </div>
                </section>

            </div>
            <div class="paginate pt-4">
              {{ $reviews->render() }}
          </div>
        </div>
    </div>
</x-app-layout>
