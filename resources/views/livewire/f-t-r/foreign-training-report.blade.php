<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Foreign Training Report</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="text-center text-sm font-bold mb-2">Foreign Training Report</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th colspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကာလ</th>
                        <th rowspan="2" class="border border-black text-center p-2">သွားရောက်သည့်နိုင်ငံ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ထောက်ပံ့သည့်အဖွဲ့အစည်း</th>
                        <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">မှ</th>
                        <th class="border border-black text-center p-2">ထိ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-center p-2">{{ $loop->index+1}}</td>
                        <td class="border border-black text-center p-2">{{ $staff->name}}</td>
                        <td class="border border-black text-center p-2">{{ $staff->current_rank->name}}</td>
                        @foreach ($staff->abroads as $abroad)
                        <td class="border border-black text-center p-2">{{$abroad->from_date}}</td>
                        <td class="border border-black text-center p-2">{{$abroad->to_date}}</td>
                        <td class="border border-black text-center p-2">{{$abroad->country->name}}</td>
                        <td class="border border-black text-center p-2">{{$abroad->particular}}</td>
                        <td class="border border-black text-center p-2">{{$abroad->sponser}}</td>
                        <td class="border border-black text-center p-2"></td>
                @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
