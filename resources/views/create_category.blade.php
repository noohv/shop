<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>
    
    <x-form>
    <form method="POST" action="{{ action([App\Http\Controllers\CategoryController::class, 'store']) }}">
        @csrf

        <!-- First Name -->
        <div>
            <x-label for="name" value="Name of Restaurant" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus :value="old('name')"/>
            
            <x-validation-error class="mb-4" :errors="$errors" title="name"/>
        </div>

        <!-- Last Name -->
        <div>
            <x-label for="description" value="Description" />

            <x-input id="description" class="block mt-1 w-full" type="text" name="description" required :value="old('description')"/>

            <x-validation-error class="mb-4" :errors="$errors" title="description"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                Create
            </x-button>
        </div>
    </form>
    </x-form>
</x-app-layout>