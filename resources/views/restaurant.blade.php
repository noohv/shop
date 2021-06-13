<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restaurant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-4xl"> <b>{{ __('Name') }}:</b> {{ $restaurant->name }} </h1>
                    <br>
                    <p class="text-lg"><b>{{ __('Description') }}: </b>{{ $restaurant->description }}</p>
                    @auth
                        @if (Auth::user()->role == "3" || (Auth::user()->role == "2" && $restaurant->user_id == Auth::id()))
                        <a href="#">Edit Restaurant</a>
                        @endif
                    @endauth
                    <form method="POST" action="{{ route('review.store',['id' => $restaurant->id ]) }}" enctype="multipart/form-data">
                    @csrf
                        <div class="py-3 sm:max-w-xl sm:mx-auto">
                          <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                            <div class="px-12 py-5">
                              <h2 class="text-gray-800 text-3xl font-semibold">Your opinion matters to us!</h2>
                            </div>
                            <div class="bg-gray-200 w-full flex flex-col items-center">
                              <div class="flex flex-col items-center py-6 space-y-3">
                                <span class="text-lg text-gray-800">How was quality of the call?</span>
                                <div class="flex space-x-3">
                                    <input min="1" max="5" id="rating" class="block mt-1 w-full" type="number" name="rating" />
                                    <x-validation-error class="mb-4" :errors="$errors" title="rating" />
                                </div>
                              </div>
                              <div class="w-3/4 flex flex-col">
                                <input id="description" name="description" rows="3" class="p-4 text-gray-500 rounded-xl resize-none">
                                <x-validation-error class="mb-4" :errors="$errors" title="description" />
                                <button type="submit" class="py-3 my-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white">Rate now</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
