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
                    <form method="POST" action="{{ route('factories.update', [$data->id]) }}" class="p-6"
                        id="edit-factory-form">
                        @csrf
                        @method('PUT')

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Edit factory') }}
                        </h2>

                        {{-- <x-alert-component :type="'success'" :value="session('message')" /> --}}

                        <div class="mt-6">
                            <x-input-label for="factory_name" value="{{ __('Factory Name') }}" />

                            <x-text-input value="{{ $data->factory_name }}" id="factory_name" name="factory_name"
                                type="text" class="mt-1 block w-full" placeholder="{{ __('Factory Name') }}" />

                            <x-input-error :messages="$errors->get('factory_name')" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="location" value="{{ __('Location') }}" />

                            <x-text-input value="{{ $data->location }}" id="location" name="location" type="text"
                                class="mt-1 block w-full" placeholder="{{ __('Location') }}" />

                            <x-input-error :messages="$errors->get('location')" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="email" value="{{ __('Email') }}" />

                            <x-text-input value="{{ $data->email }}" id="email" name="email" type="email"
                                class="mt-1 block w-full" placeholder="{{ __('Email') }}" />

                            <x-input-error :messages="$errors->get('email')" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="website" value="{{ __('Website') }}" />

                            <x-text-input value="{{ $data->website }}" id="website" name="website" type="text"
                                class="mt-1 block w-full" placeholder="{{ __('Website') }}" />

                            <x-input-error :messages="$errors->get('website')" />
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
