<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Business') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ( $restaurants as $restaurant )
                        @if($restaurant->user_id == $userID)
                                <h1 class="text-4xl"> <b>Name:</b>  "{{ $restaurant->name }}" </h1>
                                <br>
                                <p class="text-lg"><b>Description: </b>{{ $restaurant->description }}</p>
                                <x-nav-link :href="route('food')">
                                    {{ __('Create a food') }}
                                </x-nav-link>
            
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>