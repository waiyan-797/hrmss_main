<div class=" w-full bg-white shadow-md rounded-lg">
    <div class="flex justify-center items-center mb-4 mt-2">
        <h2 class="text-xl font-bold text-gray-700">ဝန်ထမ်းအချက်အလက်များ Reports</h2>
    </div>
    <div class="overflow-x-auto mt-6 h-[80vh]">
        <table class="min-w-full border-collapse border overflow-y-scroll border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border border-gray-200 text-left text-sm font-semibold text-gray-600">
                        No
                    </th>
                    <th class="px-4 py-2 border border-gray-200 text-left text-sm font-semibold text-gray-600">
                        CodeNo
                    </th>
                    <th class="px-4 py-2 border border-gray-200 text-left text-sm font-semibold text-gray-600">
                        Report Name
                    </th>
                    <th class="px-4 py-2 border border-gray-200 text-left text-sm font-semibold text-gray-600">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $index => $report)
                    <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-4 py-2 border border-gray-200 text-sm text-gray-700">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-4 py-2 border border-gray-200 text-sm text-gray-700">
                            {{ 'E' . str_pad($report['id'], 2, '0', STR_PAD_LEFT) }}
                          </td>
                        <td class="px-4 py-2 border border-gray-200 text-sm text-gray-700">
                            {{ $report['name'] }}
                        </td>
                        <td class="px-4 py-2 border border-gray-200 text-sm">
                            <button
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 focus:outline-none"
                                wire:click="showReport({{ $report['id'] }})"
                            >
                                Show
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>

