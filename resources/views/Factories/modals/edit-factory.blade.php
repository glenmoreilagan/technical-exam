<x-modal name="edit-factory" :show="$errors->any() || request('q')" focusable>
    <form method="POST" action="{{ route('factories.update', [request('q')]) }}" class="p-6" id="edit-factory-form">
        @csrf
        @method('PUT')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit factory') }}
        </h2>

        {{-- <x-alert-component :type="'success'" :value="session('message')" /> --}}

        <div class="mt-6">
            <x-input-label for="factory_name" value="{{ __('Factory Name') }}" />

            <x-text-input id="factory_name" name="factory_name" type="text" class="mt-1 block w-full"
                placeholder="{{ __('Factory Name') }}" />

            <x-input-error :messages="$errors->get('factory_name')" />
        </div>

        <div class="mt-3">
            <x-input-label for="location" value="{{ __('Location') }}" />

            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                placeholder="{{ __('Location') }}" />

            <x-input-error :messages="$errors->get('location')" />
        </div>

        <div class="mt-3">
            <x-input-label for="email" value="{{ __('Email') }}" />

            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                placeholder="{{ __('Email') }}" />

            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="mt-3">
            <x-input-label for="website" value="{{ __('Website') }}" />

            <x-text-input id="website" name="website" type="text" class="mt-1 block w-full"
                placeholder="{{ __('Website') }}" />

            <x-input-error :messages="$errors->get('website')" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
