<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-sm mb-4">ရင်းနှီးမြှပ်နှံမှုနှင့်
                ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန 
                
                {{$staff->gender_id ==  1 ? "ဦိး" : "ဒေါ်" }}      {{$staff->name}}
                  
                <br>၏ <br> 
                {{mmDateFormat($year,$month)}}
                အတွက်
                လစာစာရင်းညှိနှုင်းခြင်း။ ...</h1>
                

                <div>
                    <select wire:model.live='staff_id'>
                 
                    @foreach ($staffs as $each)
                    <option value="{{$each->id}}">
                     
                        {{$each->gender_id ==  1 ? "ဦိး" : "ဒေါ်" }} {{$each->name}}
                    </option>
                @endforeach
                    
                    </select>
                    <input type="month" wire:model.live='monthSelect'> 
                </div>
    
            <table class="md:w-full text-sm">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာထုတ်ယူသည့် လ/နှစ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ထုတ်ယူရမည့်<br>လစာနှုန်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ထုတ်ပေးရမည့်<br>လစာနှုန်း</th>
                        <th class="border border-black text-center p-2">ထုတ်ယူခဲ့ပြီး<br>လစာနှုန်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ထုတ်ယူပြီး<br>လစာငွေ</th>
                        <th colspan="2" class="border border-black text-center p-2">ခြားနားလစာငွေ</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-left p-2">ပြား</th>
                        <th class="border border-black text-right p-2"></th>
                        <th class="border border-black text-right p-2">ကျပ်</th>
                        <th class="border border-black text-right p-2">ပြား</th>
                        <th class="border border-black text-right p-2">ကျပ်</th>
                        <th class="border border-black text-right p-2">ပြား</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-right p-2">၁</td>
                        <td class="border border-black text-left p-2">
                            <br> 
                                
                            {{ $startDateOfMonth}} မှ  
                            
                                {{ $incrementedDate->subDay()->toDateString()}} ထိ  
                            
                        {{$diffDaysFromStart}} ရက် 
                        @php 
                            $incrementedDate->addDay();
                        @endphp
                        
                        </td>
                        <td class="border border-black text-right p-2">
                       {{$lastActualSalary}}
                        </td>
                        <td class="border border-black text-right p-2">
                            {{floor($salaryRatePerDayBeforeIncrement)}}

                        </td>
                        <td class="border border-black text-right p-2">
                            {{($salaryRatePerDayBeforeIncrement - floor($salaryRatePerDayBeforeIncrement)) * 100}}

                            
                        </td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">
                            {{$lastActualSalary}}
                             </td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">{{floor($totalPaidAfterIncrement -  $salaryRatePerDayBeforeIncrement)}}</td>
                        <td class="border border-black text-right p-2"> {{  ( $totalPaidAfterIncrement - floor($totalPaidAfterIncrement))  - ($salaryRatePerDayBeforeIncrement -  floor($salaryRatePerDayBeforeIncrement))   }} </td>
                    </tr>
                    <tr class="">
                        <td class="border border-black text-right p-2">၂ </td>
                        <td class="border border-black text-right p-2">{{$incrementedDate->toDateString()}} မှ  {{$monthEnd }} ထိ</td>
                        <td class="border border-black text-right p-2">{{$this?->staff?->current_salary}}</td>
                        <td class="border border-black text-right p-2">{{floor($totalPaidAfterIncrement)}}</td>
                        <td class="border border-black text-right p-2">{{$totalPaidAfterIncrement - floor($totalPaidAfterIncrement)}}</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
