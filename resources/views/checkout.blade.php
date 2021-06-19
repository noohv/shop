<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Address') }}
        </h2>
    </x-slot>

    <x-form>
        <form method="POST" action="{{ action([App\Http\Controllers\OrderController::class, 'store']) }}">
            @csrf

            <!-- City -->
            <div>
                <x-label for="city" value="{{ __('messages.City') }}" />

                <x-input id="city" class="block mt-1 w-full" type="text" name="city" required autofocus
                    :value="old('city')" />

                <x-validation-error class="mb-4" :errors="$errors" title="city" />
            </div>

            <!-- Street -->
            <div>
                <x-label for="street" value="{{ __('messages.Street') }}" />

                <x-input id="street" class="block mt-1 w-full" type="text" name="street" required
                    :value="old('street')" />

                <x-validation-error class="mb-4" :errors="$errors" title="street" />
            </div>

            <!-- Number -->
            <div>
                <x-label for="number" value="{{ __('messages.Number') }}" />

                <x-input id="number" class="block mt-1 w-full" type="number" name="number" required :value="old('number')" />

                <x-validation-error class="mb-4" :errors="$errors" title="number" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('messages.Create') }}
                </x-button>
            </div>
        </form>
    </x-form>
</x-app-layout>
