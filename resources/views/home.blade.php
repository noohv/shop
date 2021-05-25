<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Foods') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-flow-row items-center sm:grid-cols-1 lg:grid-cols-3 gap-4">
                    
                        @foreach($foods as $food)
                        <div class="py-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                            <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                              <div class="w-1/3 bg-cover" style="background-image: url('{{$food->image}}')">
                              </div> 
                              <div class="w-2/3 p-4">
                                <h1 class="text-gray-900 font-bold text-2xl">{{$food->name}}</h1>
                                <p class="mt-2 text-gray-600 text-sm">{{$food->description}}</p>
                                <div class="flex item-center mt-2">
                                  <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                  </svg>
                                  <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                  </svg>
                                  <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                  </svg>
                                  <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                  </svg>
                                  <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"/>
                                  </svg>
                                </div>
                                <div class="flex item-center justify-between mt-3">
                                  <h1 class="text-gray-700 font-bold text-xl">${{$food->price}}</h1>
                                  <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Add to Card</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>