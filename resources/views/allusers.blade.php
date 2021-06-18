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
                                            <a href="#"
                                                class="bg-blue-500 p-2 rounded text-white hover:shadow-lg text-xs font-thin">{{ __('messages.Edit') }}</a>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
