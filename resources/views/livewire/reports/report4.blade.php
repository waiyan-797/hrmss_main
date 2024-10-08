<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>

            <h1 class="text-center text-sm font-bold">Report - 4</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရရှိသောဒီပလိုမာ/ဘွဲ့</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲ</th>
                        <th colspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကာလ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ</th>
                        <th colspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကာလ</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">မှ</th>
                        <th class="border border-black text-center p-2">ထိ</th>
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
                        @foreach($staff->trainings as $training)
                        <td class="border border-black text-center p-2">{{ $training->diploma_name}}
                           </td>
                        <td class="border border-black text-center p-2">{{ $training->training_type->name}}
                        </td>
                        <td class="border border-black text-center p-2">{{ $training->from_date}}</td>
                        <td class="border border-black text-center p-2">{{ $training->to_date}}</td>
                        @endforeach
                        @foreach($staff->abroads as $abroad)
                        <td class="border border-black text-center p-2">{{ $abroad->particular}}</td>
                        <td class="border border-black text-center p-2">{{ $abroad->from_date}}</td>
                        <td class="border border-black text-center p-2">{{ $abroad->to_date}}</td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        @endforeach
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>

        </div>
    </div>
</div>
