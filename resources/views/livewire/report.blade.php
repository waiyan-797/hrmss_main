<div class="w-full overflow-y-auto">
    {{-- <div class="pb-5">
        <div class="shadow flex items-center h-[6vh] mt-6 mb-3">
            <div class="flex flex-wrap gap-1 text-sm font-arial text-center w-full">
                @foreach([
                    ['route_name' => 'report', 'name' => 'ဝန်ထမ်းရေးရာ'],
                    ['route_name' => 'attend_training', 'name' => 'သင်တန်းတတ်ရောက်'],
                    ['route_name' => 'pension', 'name' => 'ပင်စင်ကိစ္စ'],
                    ['route_name' => 'travel_abroad', 'name' => 'နိုင်ငံခြားသွားရောက်မှုများ'],
                    ['route_name' => 'employee_taking_leave', 'name' => 'ခွင့်ယူသည့်ဝန်ထမ်းစာရင်း'],
                    ['route_name' => 'staff_strength_list', 'name' => 'ဝန်ထမ်းအင်အားစာရင်း'],
                    ['route_name' => 'personnel_account', 'name' => 'ဝန်ထမ်းရေးရာ+ငွေစာရင်း'],
                    ['route_name' => 'finance', 'name' => 'ငွေစာရင်း'],
                    ['route_name' => 'employee_information', 'name' => 'ဝန်ထမ်းအချက်အလက်များ']
                ] as $route)
                    <div class="flex-1 min-w-32 mb-4">
                        <div class="inline-block p-4 text-green-600 rounded-none active min-w-32">
                            <a href="{{ route($route['route_name']) }}">
                                {{ $route['name'] }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <div class="flex justify-center items-center mb-4 mt-2"><br>
        <h2 class="text-xl font-bold text-gray-700">ဝန်ထမ်းရေးရာ Reports</h2>
       
    </div>

    <div class="overflow-x-auto mt-6 h-[80vh]">
        <table class="min-w-full overflow-y-scroll border-collapse border border-gray-200">
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
                            {{ en2mm($index + 1) }}
                        </td>
                        <td class="px-4 py-2 border border-gray-200 text-sm text-gray-700">
                          {{ 'PA' . str_pad($report['id'], 2, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-4 py-2 border border-gray-200 text-sm text-gray-700">
                            {{ $report['name'] }}
                        </td>
                        <td class="px-4 py-2 border border-gray-200 text-sm">
                            <a href="#"
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 focus:outline-none"
                                wire:click.prevent="showReport({{ $report['id'] }})">
                                <span>Show</span>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
