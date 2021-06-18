<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="table w-full p-2">
                        <table class="w-full border">
                            <thead>
                                <tr class="bg-gray-50 border-b">

                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.ID') }}
                                        </div>
                                    </th>
                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.First name') }}
                                        </div>
                                    </th>
                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.Email') }}
                                        </div>
                                    </th>
                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.Role') }}
                                        </div>
                                    </th>
                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.Actions') }}
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                        <td class="p-2 border-r">{{ $user->id }}</td>
                                        <td class="p-2 border-r">{{ $user->name }}</td>
                                        <td class="p-2 border-r">{{ $user->email }}</td>
                                        <td class="p-2 border-r">{{ $user->role }}</td>
                                        <td>
                                            @if(!(Auth::id()==$user->id))
                                                @if($user->status==0)
                                                <a href="{{ url('admin/users/ban', $user->id) }}"
                                                class="bg-red-500 p-2 rounded text-white hover:shadow-lg text-xs font-thin">{{ __('messages.Ban') }}</a>
                                                @else
                                                <a href="{{ url('admin/users/unban', $user->id) }}"
                                                class="bg-green-500 p-2 rounded text-white hover:shadow-lg text-xs font-thin">{{ __('messages.Unban') }}</a>

                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="paginate">
                            {{ $users->render() }}
                        </div>
                    </div>

                    <div class="table w-full p-2">
                        <table class="w-full border">
                            <thead>
                                <tr class="bg-gray-50 border-b">

                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.ID') }}
                                        </div>
                                    </th>
                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.Rating') }}
                                        </div>
                                    </th>
                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.Restaurant ID') }}
                                        </div>
                                    </th>
                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.User ID') }}
                                        </div>
                                    </th>
                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.Review') }}
                                        </div>
                                    </th>
                                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            {{ __('messages.Actions') }}
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                        <td class="p-2 border-r">{{ $review->id }}</td>
                                        <td class="p-2 border-r">{{ $review->rating }}</td>
                                        <td class="p-2 border-r">{{ $review->restaurant_id }}</td>
                                        <td class="p-2 border-r">{{ $review->user_id }}</td>
                                        <td class="p-2 border-r">{{ $review->review }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('review.destroy') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $review->id }}">
                                                <button id="{{ $review->id }}" type="submit"
                                                    class="text-gray-700">
                                                    <svg class="h-6 w-6 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>                                </button>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
