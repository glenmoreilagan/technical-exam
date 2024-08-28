<x-modal name="edit-employee" :show="$errors->any()" focusable>
    <form method="post" action="" class="p-6" id="edit-employee-form">
        @csrf
        @method('PUT')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit employee') }}
        </h2>

        {{-- <x-alert-component :type="'success'" :value="session('message')" /> --}}

        <div class="mt-6">
            <x-input-label for="firstname" value="{{ __('First Name') }}" />

            <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full"
                placeholder="{{ __('First Name') }}" />

            <x-input-error :messages="$errors->get('firstname')" />
        </div>

        <div class="mt-3">
            <x-input-label for="lastname" value="{{ __('Last Name') }}" />

            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full"
                placeholder="{{ __('Last Name') }}" />

            <x-input-error :messages="$errors->get('lastname')" />
        </div>

        <div class="mt-3">
            <x-input-label for="factory" value="{{ __('Factory') }}" />

            {{-- <x-text-input id="factory" name="factory" type="text" class="mt-1 block w-full"
            placeholder="{{ __('Factory') }}" /> --}}

            <select name="factory" id="factory"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full p-2">
                <option value="">Select Factory</option>
                @forelse ($factories as $factory)
                    <option value="{{ $factory->id }}">{{ $factory->factory_name }}</option>
                @empty
                @endforelse
            </select>

            <x-input-error :messages="$errors->get('factory')" />
        </div>

        <div class="mt-3">
            <x-input-label for="email" value="{{ __('Email') }}" />

            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                placeholder="{{ __('Email') }}" />

            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="mt-3">
            <x-input-label for="phone" value="{{ __('Phone No.') }}" />

            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                placeholder="{{ __('Phone No.') }}" />

            <x-input-error :messages="$errors->get('phone')" />
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
