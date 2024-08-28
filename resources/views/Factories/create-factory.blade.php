<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Factories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('factories.store') }}" class="p-6">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Create factory') }}
                        </h2>

                        {{-- <x-alert-component :type="'success'" :value="session('message')" /> --}}

                        <div class="mt-6">
                            <x-input-label for="factory_name" value="{{ __('Factory Name') }}" />

                            <x-text-input id="factory_name" name="factory_name" type="text" class="mt-1 block w-full"
                                placeholder="{{ __('Factory Name') }}" />

                            <x-input-error :messages="$errors->create_error->get('factory_name')" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="location" value="{{ __('Location') }}" />

                            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                                placeholder="{{ __('Location') }}" />

                            <x-input-error :messages="$errors->create_error->get('location')" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="email" value="{{ __('Email') }}" />

                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                placeholder="{{ __('Email') }}" />

                            <x-input-error :messages="$errors->create_error->get('email')" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="website" value="{{ __('Website') }}" />

                            <x-text-input id="website" name="website" type="text" class="mt-1 block w-full"
                                placeholder="{{ __('Website') }}" />

                            <x-input-error :messages="$errors->create_error->get('website')" />
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-primary-button class="ms-3">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
