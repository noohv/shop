<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 content-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($categories as $category)
                        {{ $category->name }}
                        <br>
                    @endforeach
                    <x-nav-link :href="route('category.create')" :active="request()->routeIs('category.create')">
                        {{ __('messages.Create Category') }}
                    </x-nav-link>
                    <div class="paginate">
                        {{ $categories->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
