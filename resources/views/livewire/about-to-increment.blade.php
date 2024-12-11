<div class="p-6 bg-gray-100 min-h-screen w-full">
    <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
    <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
    <br><br>
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
        <x-date-picker wire:model.live="startDate" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
        <x-date-picker wire:model.live="endDate" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        နှစ်တိုးအကြိမ်အရေအတွက်
                    </th>

                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
Increment Date
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if($staffs)
                    @foreach ($staffs as $staff)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $staff->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $staff->current_increment_time }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">

                                {{$staff->promotionDate }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('staff_increment', $staff->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                    Increment
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center text-sm text-gray-500">
                            No staff data available.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
