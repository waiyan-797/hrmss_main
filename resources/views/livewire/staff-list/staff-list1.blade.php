<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h2 class="font-semibold text-center">ရင်းနှီးမြှုပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h2>

            <h2 class="font-semibold text-center">
      
               {{$selsectedDivisionTypeId  == 1 ? ' ရုံးချုပ် ဌာနခွဲ' : ($selsectedDivisionTypeId  == 2 ? 'တိုင်းဒေသကြီး/ပြည်နယ်ညွှန်ကြားရေးမှူးရုံး' :  'ရုံးချုပ် ဌာနခွဲ နှင့် တိုင်းဒေသကြီး/ပြည်နယ်ညွှန်ကြား‌ရေးမှူးရုံး')  }} 
                
                များ၏ အရာထမ်း၊ အမှုထမ်းများစာရင်း
            
            </h2>

                    
                <x-select wire:model.live="selsectedDivisionTypeId" :values="$divisionTypes" 
                placeholder='All'
    
    />
    <h1 class=" text-right ">
        ရက်စွဲ - {{getTdyDateInMyanmarYearMonthDay(2)}}
    </h1>




            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">
                            ဌာနအမည်
                        </th>
                        
                        <th class="border border-black text-center p-2">အရာထမ်း</th>
                        <th class="border border-black text-center p-2">အမှုထမ်း</th>
                        <th class="border border-black text-center p-2">စုစုပေါင်း</th>
                        <th class="border border-black text-center p-2">နေ့စား</th>
                        <th class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                   
                </thead>
                <tbody>
                    
                    @foreach ($divisions as $division)
                        <tr>
                            <td class="border border-black text-center p-2">
                                {{ $loop->index + 1 }}
                            </td>
                            <td class="border border-black text-left p-2">{{ $division->name }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($division->staffs->filter(fn($staff) => $staff->currentRank &&
                                 $staff->currentRank->staff_type_id ==1 
                                 )->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 2)->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">{{ en2mm($division->staffs->count() )}}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 3)->count()) }}

                            </td>
                            <td class="border border-black text-center p-2"></td>

                        </tr>
                    @endforeach


                    <tr>
                        <td class="border border-black text-center p-2">



                        </td>
                        <td class="border border-black text-center p-2">
                            {{$selsectedDivisionTypeId  == 1 ? ' ရုံးချုပ်စုစုပေါင်း' : 'နယ်ရုံးခွဲ' }} 
                        </td>
                        
                    
                        
                    
                        
                        @php
                        $divisionStaffCount = $divisions->sum(function($division) {
                            
                            return $division->staffs->filter(function($staff) {
                                return $staff->currentRank && $staff->currentRank->staff_type_id == 1;
                            })->count();
                        });
                    @endphp

                    <td class="border border-black text-center p-2">
                        {{ en2mm($divisionStaffCount )}}
                    </td>
                    
                    @php
                    $secondPayscale = $divisions->sum(function($division) {
                        
                        return $division->staffs->filter(function($staff) {
                            return $staff->currentRank && $staff->currentRank->staff_type_id == 2;
                        })->count();
                    });
                @endphp

                <td class="border border-black text-center p-2">
                    {{ en2mm($secondPayscale )}}
                </td>
                
              

            <td class="border border-black text-center p-2">
                {{ en2mm($divisionStaffCount  + $secondPayscale)}}
            </td>
            


            @php
            $labour = $divisions->sum(function($division) {
                
                return $division->staffs->filter(function($staff) {
                    return $staff->currentRank && $staff->currentRank->staff_type_id ==3;
                })->count();
            });
        @endphp

        <td class="border border-black text-center p-2">
            {{ en2mm($labour )}}
        </td>
        <td class="border border-black text-center p-2">
            
        </td>




                    

                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
