<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Foods') }}
        </h2>
    </x-slot>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li class="alert-text">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-flow-row items-center sm:grid-cols-1 lg:grid-cols-3 gap-4">

                        @foreach($foods as $food)
                        <form method="POST" action="/cart">
                          @csrf
                          <div class="py-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                            <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                              <div class="w-1/3 bg-cover" style="background-image: url('{{$food->image}}')">
                              </div>
                              <div class="w-2/3 p-4">
                                <input type="text" name="name" value="{{ $food->name }}" hidden>
                                <h1 class="text-gray-900 font-bold text-2xl">{{$food->name}}</h1>
                                <p class="mt-2 text-gray-600 text-sm">{{$food->description}}</p>
                                <input type="text" name="description" value="{{ $food->description }}" hidden>
                                <div class="flex item-center justify-between mt-3">
                                  <h1 class="text-gray-700 font-bold text-xl">${{$food->price}}</h1>
                                  <input type="text" name="price" value="{{ $food->price }}" hidden>
                                  <input type="text" name="id" value="{{ $food->id }}" hidden>
                                  <input type="number" name="quantity"  min="1" max="5" class="h-20px w-30px">
                                  <x-button type="submit" food-id="{{$food->id}}" class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded btn-reserve">
                                    Add To Cart
                                  </x-button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                          @endforeach
                    </div>
                    <div class="paginate">
                        {{$foods->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
