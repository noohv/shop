<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Create Business') }}
        </h2>
    </x-slot>

    <x-form>
        <form method="POST" action="{{ action([App\Http\Controllers\RestaurantController::class, 'store']) }}" enctype="multipart/form-data">
            @csrf

            <!--Name -->
            <div>
                <x-label for="name" value="{{ __('messages.Name') }}" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus
                    :value="old('name')" />

                <x-validation-error class="mb-4" :errors="$errors" title="name" />
            </div>

            <!-- Description -->
            <div>
                <x-label for="description" value="{{ __('messages.Description') }}" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" required
                    :value="old('description')" />

                <x-validation-error class="mb-4" :errors="$errors" title="description" />
            </div>

            <div>
                <x-label for="city" value="{{ __('messages.City') }}" />

                <x-input id="city" class="block mt-1 w-full" type="text" name="city" required
                    :value="old('city')" />

                <x-validation-error class="mb-4" :errors="$errors" title="city" />
            </div>

            <div>
                <x-label for="image" value="{{ __('messages.Thumbnail') }}" />

                <x-input id="image" class="block mt-1 w-full" type="file" name="image" required
                    :value="old('city')" />

                <x-validation-error class="mb-4" :errors="$errors" title="image" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    Create
                </x-button>
            </div>
        </form>
    </x-form>
</x-app-layout>
