<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Other Qualification Report</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- @include('table', [
                'data_values' => $ethnic_types,
                'modal' => 'modals/ethnic_modal',
                'id' => $ethnic_type_id,
                'title' => 'Ethnic',
                'search_id' => 'ethnic_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ]) --}}

            <h1 class="font-bold text-center text-base mb-1">Other Qualification Report</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">ရရှိသောဒီပလိုမာ/ဘွဲ့</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-right p-1">1</td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
