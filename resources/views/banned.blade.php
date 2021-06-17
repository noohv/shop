<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Banned') }}
        </h2>
    </x-slot>

    <div class="text-center h-full p-60 bg-red-500">
        <p class="text-8xl text-white">You are banned!</p>
        <p class="text-8xl text-white">:(</p>
    </div>

</x-app-layout>
