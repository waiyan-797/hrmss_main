<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Investment Companies13</h1>
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


            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black p-2 text-center">စဥ်</th>
                        <th class="border border-black p-2 text-left">အမည်/ရာထူး/ဌာန</th>
                        <th class="border border-black p-2 text-left">ရရှိခဲ့သည့်ဘွဲ့နှင့် အထူးပြုဘာသာရပ်</th>
                        <th class="border border-black p-2 text-left">တက္ကသိုလ်/ကျောင်း</th>
                        <th class="border border-black p-2 text-left">နိုင်ငံ</th>
                        <th class="border border-black p-2 text-left">ဘွဲ့ရရှိခဲ့သည့်နှစ်</th>
                        <th class="border border-black p-2 text-left">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black p-2 text-center"></td>
                        <td class="border border-black p-2 text-left"></td>
                        <td class="border border-black p-2 text-left"></td>
                        <td class="border border-black p-2 text-left"></td>
                        <td class="border border-black p-2 text-left"></td>
                        <td class="border border-black p-2 text-left"></td>
                        <td class="border border-black p-2 text-left"></td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
