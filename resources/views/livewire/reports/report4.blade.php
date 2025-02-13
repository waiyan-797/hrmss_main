<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>

            <h1 class="text-center text-sm font-bold">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                </h1>
                <h1 class="text-center text-sm font-bold">
                    ပြည်ပသို့ သွားရောက်ခဲ့မှုမှတ်တမ်း
                    </h1><br>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th colspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကာလ</th>
                        <th rowspan="2" class="border border-black text-center p-2">သွားရောက်သည့်နိုင်ငံ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ထောက်ပံ့သည့်အဖွဲ့အစည်း
                            </th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">မှ</th>
                        <th class="border border-black text-center p-2">ထိ</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($staffs as $staff)
                        @php
                            $maxRows = max($staff->trainings->count(), $staff->abroads->count());
                        @endphp
                
                        @for($i = 0; $i < $maxRows; $i++)
                        <tr>
                            @if($i == 0)
                                <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ en2mm($loop->index + 1) }}</td>
                                <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $staff->name }}</td>
                                <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $staff->currentRank?->name }}</td>
                            @endif
                            @if(isset($staff->abroads[$i]))
                            <td class="border border-black text-center p-2">{{ formatDMYmm($staff->abroads[$i]->from_date )}}</td>
                            <td class="border border-black text-center p-2">{{ formatDMYmm($staff->abroads[$i]->to_date) }}</td>  
                             <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->countries->pluck('name')->unique()->join(', ')}}</td>
                            <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->particular }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->sponser }}</td> 
                            @else
                                
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td> 
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td> 
                            @endif
                        </tr>
                        @endfor
                    @endforeach 

                </tbody>
                
            </table>

        </div>
    </div>
</div>
