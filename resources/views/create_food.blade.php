<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Food') }}
        </h2>
    </x-slot>

    <x-form>
        <form method="POST" action="{{ action([App\Http\Controllers\FoodController::class, 'store']) }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" value="Name of the food" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus
                    :value="old('name')" />

                <x-validation-error class="mb-4" :errors="$errors" title="name" />
            </div>

            <!-- Description -->
            <div>
                <x-label for="description" value="Description" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" required
                    :value="old('description')" />

                <x-validation-error class="mb-4" :errors="$errors" title="description" />
            </div>

            <!-- Image path -->
            <div>
                <x-label for="image" value="Image" />

                <x-input id="image" class="block mt-1 w-full" type="text" name="image" required :value="old('image')" />

                <x-validation-error class="mb-4" :errors="$errors" title="image" />
            </div>


            <!-- Price -->
            <div>
                <x-label for="price" value="Price" />

                <x-input id="price" class="block mt-1 w-full" type="number" name="price" step=".01" required
                    :value="old('price')" />

                <x-validation-error class="mb-4" :errors="$errors" title="price" />
            </div>

            <!-- Food Category -->
            <div>
                <x-label for="category_id" value="Category" />

                <x-input id="category_id" class="block mt-1 w-full" type="number" name="category_id" required
                    :value="old('category_id')" />

                <x-validation-error class="mb-4" :errors="$errors" title="category_id" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    Create
                </x-button>
            </div>
        </form>
    </x-form>
</x-app-layout>
