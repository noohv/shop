<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Foods') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div id="errors" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <div class="text-center py-4 lg:px-4">
                        <div class="p-2 bg-gray-800 items-center text-white leading-none lg:rounded-full flex lg:inline-flex"
                            role="alert">
                            <span
                                class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error!</span>
                            <span class="font-semibold mr-2 text-left flex-auto">{{ $error }}</span>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('message'))
        <div id="success" class="alert alert-danger">
            <div class="text-center py-4 lg:px-4">
                <div class="p-2 bg-gray-800 items-center text-white leading-none lg:rounded-full flex lg:inline-flex"
                    role="alert">
                    <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">new</span>
                    <span class="font-semibold mr-2 text-left flex-auto">{{ $message }}</span>
                </div>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3 items-center justify-center sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                        @foreach ($foods as $food)
                            <form method="POST" action="/cart">
                                @csrf
                                <div
                                    class="py-6  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                    <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                                        <div class="w-1/3 bg-cover"
                                            style="background-image: url('{{ $food->image }}')">
                                        </div>
                                        <div class="w-2/3 p-4">
                                            <input type="hidden" class="id" name="id" value="{{ $food->id }}" hidden>
                                            <input type="hidden" class="name" name="name" value="{{ $food->name }}" hidden>
                                            <input type="hidden" class="description" name="description" value="{{ $food->description }}"
                                                hidden>
                                            <input type="hidden" class="price" name="price" value="{{ $food->price }}" hidden>

                                            <h1 class="text-gray-900 font-bold text-2xl">{{ $food->name }}</h1>
                                            <p class="mt-2 text-gray-600 text-sm">{{ $food->description }}</p>


                                            <div class="flex item-center justify-between mt-3">
                                                <h1 class="text-gray-700 font-bold text-xl">${{ $food->price }}</h1>

                                            </div>
                                            <div class="w-24">
                                                <input class="block rounded w-24 m-1 outline-none" type="number" name="quantity" value="1" min="1" max="5">
                                            </div>


                                                <x-button class="addCart" type="submit" food-id="{{ $food->id }}"
                                                    class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded btn-reserve">
                                                    Add To Cart
                                                </x-button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
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
        setTimeout(function() {
            $('#errors').remove();
            $('#success').remove();
        }, 5000);
    </script>

</x-app-layout>
