<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Pension List</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- @include('table', [
                'data_values' => $townships,
                'modal' => 'modals/township_modal',
                'id' => $township_id,
                'title' => 'Report',
                'search_id' => 'township_search',
                'columns' => ['No', 'Name', 'District', 'Action'],
                'column_vals' => ['name', 'district'],
            ]) --}}
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border border-gray-300">စဥ်</th>
                            <th class="px-4 py-2 border border-gray-300">အမည်</th>
                            <th class="px-4 py-2 border border-gray-300">တာဝန်ထမ်းဆောင်ခဲ့သည့်ရာထူး</th>
                            <th class="px-4 py-2 border border-gray-300">တာဝန်ထမ်းဆောင်ခဲ့သည့်ဌာနခွဲ</th>
                            <th class="px-4 py-2 border border-gray-300">မွေးနေ့သက္ကရာဇ်</th>
                            <th class="px-4 py-2 border border-gray-300">စုစုပေါင်းလုပ်သက်</th>
                            <th class="px-4 py-2 border border-gray-300">ပင်စင်အမျိုးအစား</th>
                            <th class="px-4 py-2 border border-gray-300">ပင်စင်ခံစားသည့် ရက်စွဲ</th>
                            <th class="px-4 py-2 border border-gray-300">ပင်စင်လစာ</th>
                            <th class="px-4 py-2 border border-gray-300">ဆုငွေ</th>
                            <th class="px-4 py-2 border border-gray-300">ထုတ်ွံယူသည့်ဘဏ်</th>
                            <th class="px-4 py-2 border border-gray-300">ပင်စင်ရုံး၏ ခွင့်ပြုမိန့်</th>
                            <th class="px-4 py-2 border border-gray-300">ဆက်သွယ်ရန်လိပ်စာ/တယ်လီဖုန်းနံပါတ်</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->index }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->id_number }}</td>
                                <td>{{ $item->dob }}</td>
                                <td>{{ $item->join_date }}</td>
                                <td>{{ $item->current_grade_date }}</td>
                                <td>{{ $item->current_department_date }}</td>
                                <td>{{ $item->department_branch }}</td>
                                <td>{{ $item->qualification }}</td>
                                <td>{{ $item->retirement_date }}</td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>

        </div>
    </div>
</div>

