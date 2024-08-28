<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-5 flex justify-end">
                        <a href="/employees/create">
                            <x-primary-button>
                                Create
                            </x-primary-button>
                        </a>
                    </div>

                    <div class="mb-5">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="px-3 py-1">Name</th>
                                    <th class="px-3 py-1">Factory</th>
                                    <th class="px-3 py-1">Email</th>
                                    <th class="px-3 py-1">Phone</th>
                                    <th class="px-3 py-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr class="even:bg-gray-100">
                                        <td class="px-3 py-1">{{ $row->fullname }}</td>
                                        <td class="px-3 py-1">{{ $row->factory?->factory_name }}</td>
                                        <td class="px-3 py-1">{{ $row->email }}</td>
                                        <td class="px-3 py-1">{{ $row->phone }}</td>
                                        <td class="px-3 py-1 text-center">
                                            <a href="/employees/edit/{{ $row->id }}">
                                                <x-primary-button>
                                                    Edit
                                                </x-primary-button>
                                            </a>
                                            <form class="inline-block" method="POST"
                                                action="{{ env('APP_URL') }}/employees/{{ $row->id }}">
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
</x-app-layout>
