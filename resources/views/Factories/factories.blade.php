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
                    <div class="mb-5 flex justify-end">
                        <x-primary-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'create-new-factory')">
                            Create
                        </x-primary-button>
                    </div>

                    <div class="mb-5">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="px-3 py-1">Name</th>
                                    <th class="px-3 py-1">Location</th>
                                    <th class="px-3 py-1">Email</th>
                                    <th class="px-3 py-1">Website</th>
                                    <th class="px-3 py-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr class="even:bg-gray-100">
                                        <td class="px-3 py-1">{{ $row->factory_name }}</td>
                                        <td class="px-3 py-1">{{ $row->location }}</td>
                                        <td class="px-3 py-1">{{ $row->email }}</td>
                                        <td class="px-3 py-1">{{ $row->website }}</td>
                                        <td class="px-3 py-1">
                                            <x-primary-button x-data=""
                                                onclick="handleEdit({{ $row }})"
                                                dataAttributes="rowId = {{ $row->id }}"
                                                x-on:click.prevent="$dispatch('open-modal', 'edit-factory')">
                                                Edit
                                            </x-primary-button>
                                            <form class="inline-block" method="POST"
                                                action="{{ env('APP_URL') }}/factories/{{ $row->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type='submit'>Delete</x-danger-button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center" id="texx">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="text-xs">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Factories.modals.create-new-factory')
    @include('Factories.modals.edit-factory')
</x-app-layout>

<script>
    const BASE_URL = '{{ env('APP_URL') }}';

    const handleEdit = (data) => {
        $("#edit-factory-form").prop('action', `${BASE_URL}/factories/${data.id}`)
        $("#edit-factory-form #factory_name").val(data.factory_name);
        $("#edit-factory-form #location").val(data.location);
        $("#edit-factory-form #email").val(data.email);
        $("#edit-factory-form #website").val(data.website);
    }
</script>
