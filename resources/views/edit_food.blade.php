<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Food') }}
        </h2>
    </x-slot>

    <x-form>
        <form method="POST" action="{{  route('food.update',['id' => $food->id ]) }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus
                value="{{$food->name}}" />

                <x-validation-error class="mb-4" :errors="$errors" title="name" />
            </div>

            <!-- Description -->
            <div>
                <x-label for="description" value="{{ __('Description') }}" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" required
                value="{{$food->description}}" />

                <x-validation-error class="mb-4" :errors="$errors" title="description" />
            </div>

            <!-- Image path -->
            <div>
                <x-label for="image" value="{{ __('Image') }}" />

                <x-input id="image" class="block mt-1 w-full" type="file" name="image" required value="{{$food->image}}" />

                <x-validation-error class="mb-4" :errors="$errors" title="image" />
            </div>


            <!-- Price -->
            <div>
                <x-label for="price" value="{{ __('Price') }}" />

                <x-input id="price" class="block mt-1 w-full" type="number" name="price" step=".01" required value="{{$food->price}}" />

                <x-validation-error class="mb-4" :errors="$errors" title="price" />
            </div>

            <div>
                <x-label for="category" value="{{ __('Category') }}" />

                <x-select id="category" class="block mt-1 w-full" name="category" :list='$categories' :value="old('category')"/>

                <x-validation-error class="mb-4" :errors="$errors" title="category" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </x-form>
</x-app-layout>
