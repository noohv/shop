<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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

                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            ID
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Name
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Email
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Role
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Action
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr class="bg-gray-50 text-center">
                    <td class="p-2 border-r">
                        
                    </td>
                    <td class="p-2 border-r">
                        <input type="text" class="border p-1">
                    </td>
                    <td class="p-2 border-r">
                        <input type="text" class="border p-1">
                    </td>
                    <td class="p-2 border-r">
                        <input type="text" class="border p-1">
                    </td>
                    <td class="p-2 border-r">
                        <input type="text" class="border p-1">
                    </td>
                    <td class="p-2">
                        <input type="text" class="border p-1">
                    </td>
                    
                    
                </tr> -->
                @foreach($users as $user)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">{{$user->id}}</td>
                    <td class="p-2 border-r">{{$user->name}}</td>
                    <td class="p-2 border-r">{{$user->email}}</td>
                    <td class="p-2 border-r">{{$user->role}}</td>
                    <td>
                        <a href="#" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                        <a href="#" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="paginate">
                        {{$users->render()}}
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

