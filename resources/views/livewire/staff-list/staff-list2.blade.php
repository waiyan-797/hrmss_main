<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်/ရာထူး/ဌာန</th>
                        <th class="border border-black text-center p-2">လက်ရှိရာထူး</th>
                        <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                        <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                        <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                        <th class="border border-black text-center p-2">စူစုပေါင်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">၁</th>
                        <th class="border border-black text-center p-2">၂</th>
                        <th class="border border-black text-center p-2">၃</th>
                        <th class="border border-black text-center p-2">၄</th>
                        <th class="border border-black text-center p-2">၇</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-center p-2">{{ $loop->index+1}}</td>
                        <td class="border border-black text-center p-2">{{ $staff->name}}၊{{ $staff->current_rank->name}}၊{{ $staff->side_department->name}}</td>
                        <td class="border border-black text-center p-2">{{ $staff->current_rank->name}}</td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
