<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Local Training Report</h1>
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
                            <th class="px-4 py-2 border border-gray-300">ရာထူး</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းအမည်</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းကာလ(မှ)</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းကာလ(အထိ)</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းနေရာ/ဒေသ</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းအမျိုးအစား</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainings as $key=>$training )
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td></td>
                            <td>{{ $training->name }}</td>
                            <td></td>
                            <td>{{ $training->name }}</td>
                            <td>{{ $training->from_date }}</td>
                            <td>{{ $training->to_date }}</td>
                            <td>{{ $training->location }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

