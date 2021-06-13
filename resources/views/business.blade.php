<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.My Business') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-4xl"> <b>{{ __('messages.Name') }}:</b> {{ $restaurant->name }} </h1>
                    <br>
                    <p class="text-lg"><b>{{ __('messages.Description') }}: </b>{{ $restaurant->description }}</p>
                </div>
                <h3 class="text-center p-3 font-bold">{{ __('messages.Food List') }}</h3>


                <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                      <th class="px-4 py-3">{{ __('messages.ID') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Name') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Category') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Price') }}</th>
                    </tr>

                    @foreach ($foodList as $food)
                        <tr class="bg-gray-100 border-b border-gray-200">
                        <td class="px-4 py-3">{{ $food->id }}</td>
                        <td class="px-4 py-3">{{ $food->name }}</td>
                        <td class="px-4 py-3">{{ $food->category_id }}</td>
                        <td class="px-4 py-3">{{ $food->price }}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="paginate m-2">
                    {{ $foodList->render() }}
                </div>

                <hr>

                <h3 class="text-center p-3 font-bold">{{ __('messages.Orders') }}</h3>

                <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                      <th class="px-4 py-3">{{ __('messages.Time') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Order ID') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Food ID') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Quantity') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Price') }}</th>
                    </tr>

                    @foreach ($orderItems as $item)
                        @foreach ($foods as $food )
                            @if ($item->foods_id == $food->id)
                                <tr class="bg-gray-100 border-b border-gray-200">
                                <td class="px-4 py-3">{{ $item->created_at }}</td>
                                <td class="px-4 py-3">{{ $item->order_id }}</td>
                                <td class="px-4 py-3">{{ $item->foods_id }}</td>
                                <td class="px-4 py-3">{{ $item->quantity }}</td>
                                <td class="px-4 py-3">{{ $item->price }}</td>
                                </tr>
                            @endif

                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>



