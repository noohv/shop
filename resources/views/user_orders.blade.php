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
                    <div class="flex flex-col flex-grow max-w-md mx-auto">
                        
                        @foreach($orders as $order)
                        <div class="py-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                            <div class="flex flex-col max-w-md p-4 bg-white shadow-lg rounded-lg overflow-hidden">
                            <p>Order ID: {{$order->id}}</p>
                            @foreach($orderitems as $orderitem)
                                @if($orderitem->order_id == $order->id)
                                        <div class="w-2/3 p-4">
                                            <h1 class="text-gray-900 font-bold text-2xl">{{$orderitem->id}}</h1>
                                            <p>{{$order->created_at}}</p>
                                            <p class="mt-2 text-gray-600 text-sm">{{$orderitem->price}}</p>
                                        </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="paginate">
                        {{$orders->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>        
</x-app-layout>