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
                    @if (Auth::user()->role == "3" || (Auth::user()->role == "2" && $restaurant->user_id == Auth::id()))
                        <a href="#">Edit Restaurant</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
