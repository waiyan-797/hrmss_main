<div class="p-4 h-[83vh] overflow-y-auto">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" wire:model="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                {{ $isEditMode ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>

    <div class="mt-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($divisions as $index => $division)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index+1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $division->name }}</td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <button wire:click="edit({{ $division->id }})" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                            <button wire:click="delete({{ $division->id }})" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $divisions->links() }}
        </div>
    </div>
</div>