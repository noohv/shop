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

                <div class="text-center">
                    <a href="{{url('food/create')}}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg class="h-6 w-6 text-black"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                        <span>{{ __('messages.Create') }}</span>
                    </a>

                </div>
                <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                      <th class="px-4 py-3">{{ __('messages.ID') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Name') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Category') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Price') }}</th>
                      <th class="px-4 py-3">{{ __('messages.Actions') }}</th>
                    </tr>

                    @foreach ($foodList as $food)
                        <tr class="bg-gray-100 border-b border-gray-200">
                        <td class="px-4 py-3">{{ $food->id }}</td>
                        <td class="px-4 py-3">{{ $food->name }}</td>
                        <td class="px-4 py-3">{{ $food->category_id }}</td>
                        <td class="px-4 py-3">{{ $food->price }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-3">
                                <div>
                                    <form method="POST" action="{{ route('food.destroy') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $food->id }}">
                                        <button id="{{ $food->id }}" type="submit"
                                            class="text-gray-700">
                                            <svg class="h-6 w-6 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>                                </button>
                                        </button>
                                    </form>
                                </div>
                                <div>
                                    <a href="{{ url('food-edit', $food->id) }}"
                                        class="text-gray-700 ">
                                        <svg class="h-6 w-6 text-black"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>
                                    </a>
                                </div>

                            </div>
                        </td>
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



