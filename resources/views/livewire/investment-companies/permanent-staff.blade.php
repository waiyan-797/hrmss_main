<div class="w-full">
    <div class="md:w-full h-[83vh] overflow-y-auto">
        <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

        <h1 class="font-bold text-center text-base my-2">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
        <h2 class="text-center text-base mb-2">အမြဲတမ်းဝန်ထမ်းအင်အားစာရင်း</h2>
        <div class="flex justify-start space-x-4 mb-2 px-16">
            <p class="md:w-1/5">အဖွဲ့အစည်း</p>
            <p class="md:w-6">-</p>
            <p>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</p>
        </div>
        <div class="flex justify-start space-x-4 px-16">
            <p class="md:w-1/5">ဝန်ကြီးဌာနအမည်</p>
            <p class="md:w-6">-</p>
            <p>ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</p>
        </div>
        <div class="mt-7 mb-3 ms-7">
            <input type="date" wire:model.live="dateRange">
        </div>>
        <table class="md:w-full mx-8 my-2">
            <thead>
                <tr class="font-bold">
                    <th rowspan="3" class="border border-black text-center p-2">အမှတ်စဥ်</th>
                    <th rowspan="3" class="border border-black text-center p-2">လစာနှုန်း(ကျပ်)</th>
                    <th colspan="4" class="border border-black text-center p-2">၂၀၂၄-၂၀၂၅<br>{{ mmDateFormat($year,$month)}}  </th>
                    <th rowspan="3" class="border border-black text-center p-2">
                        {{en2mm($day).'-'.en2mm($month).'-'.en2mm($year)}}<br>ရက်နေ့တွင်အမှန်<br>တကယ်ထုတ်ပေး<br>ရမည့်လစာငွေ<br>(ကျပ်သန်း)</th>
                    <th rowspan="3" class="border border-black text-center p-2">မှတ်ချက်</th>
                </tr>
                <tr class="font-bold">
                    <th rowspan="2" class="border border-black text-center p-2">ခွင့်ပြု</th>
                    <th colspan="3" class="border border-black text-center p-2">ခန့်ပြီး</th>
                </tr>
                <tr class="font-bold">
                    <th class="border border-black text-center p-2">ကျား</th>
                    <th class="border border-black text-center p-2">မ</th>
                    <th class="border border-black text-center p-2">ပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                <tr class="font-bold">
                    <td class="border border-black text-center p-2">၁</td>
                    <td class="border border-black text-center p-2">၂</td>
                    <td class="border border-black text-center p-2">၃</td>
                    <td class="border border-black text-center p-2">၄</td>
                    <td class="border border-black text-center p-2">၅</td>
                    <td class="border border-black text-center p-2">၆</td>
                    <td class="border border-black text-center p-2">၇</td>
                    <td class="border border-black text-center p-2">၈</td>
                </tr>
               
                @foreach ($first_payscales as $payscale)
                <tr>
                    <td class="border border-black p-2">{{en2mm($loop->iteration)}}</td>
                    <td class="border border-black p-2">{{$payscale->name}}</td>
                    <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                    <td class="border border-black p-2">{{en2mm($payscale->staff->where('gender_id',1)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by' , 1)->count())}}</td>
                    <td class="border border-black p-2"> {{en2mm($payscale->staff->where('gender_id',2)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count())}} </td>
                    <td class="border border-black p-2"> {{en2mm($payscale->staff->where('is_active', 1)->where('current_department_id',1)->count())}} </td>
                    <td class="border border-black p-2">
                        @php
                            $totalPaidForThisMonth = 0;
                        
                        @endphp
                     
                        @foreach($payscale->staff->where('is_active', 1)->where('salary_paid_by', 1) as $staff)
                       
                            @php
                       

                           $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                            @endphp
                        @endforeach
                      
                        {{ en2mm($totalPaidForThisMonth) }}
                    </td>
                    <td class="border border-black p-2"> 
                        
                    </td>
        
                </tr>
            @endforeach
                <tr class="font-bold">
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">အရာထမ်းပေါင်း</td>
                    <td class="border border-black text-right p-2">{{ en2mm($first_payscales->sum(fn($p)=>$p->allowed_qty))}}</td>
                    <td class="border border-black text-right p-2">{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where('gender_id',1)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>
                    <td class="border border-black text-right p-2">{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where('gender_id',2)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>

                    <td class="border border-black text-right p-2">{{en2mm($first_payscales->sum(fn($p)=>$p->staff->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>
                  
                  
                    <td class="border border-black p-2">
                        @php
                            $totalPaidForThisMonth = 0;
                            
                        @endphp
                        @foreach($first_payscales as $payscale)
                        @foreach($payscale->staff->where('is_active', 1)->where('current_department_id',1)->where('salary_paid_by', 1) as $staff)
                            @php
                                $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                            @endphp
                        @endforeach
                       

                        @endforeach
                    
                        {{ en2mm($totalPaidForThisMonth) }}
                    </td>
               


                    <td class="border border-black p-2"> 
                        
                    </td>
                    <td class="border border-black text-right p-2"></td>
                </tr>
              
                @foreach ($second_payscales as $payscale)
                <tr>
                    <td class="border border-black p-2">{{en2mm($loop->iteration)}}</td>
                    <td class="border border-black p-2">{{$payscale->name}}</td>
                    <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                    <td class="border border-black p-2">{{en2mm($payscale->staff->where('gender_id',1)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by' , 1)->count())}}</td>
                    <td class="border border-black p-2"> {{en2mm($payscale->staff->where('gender_id',2)->where('current_department_id',1)->where('is_active', 1)->where('side_department_id',1)->where('salary_paid_by',1)->count())}} </td>
                    <td class="border border-black p-2"> {{en2mm($payscale->staff->where('is_active', 1)->where('current_department_id',1)->count())}} </td>
                    <td class="border border-black p-2">
                        @php
                            $totalPaidForThisMonth = 0;
                        @endphp
                    
                        @foreach($payscale->staff->where('is_active', 1)->where('salary_paid_by', 1) as $staff)
                            @php
                                $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                            @endphp
                        @endforeach
                    
                        {{ en2mm($totalPaidForThisMonth) }}
                    </td>
                    <td class="border border-black p-2"> 
                        
                    </td>
                    
                </tr>
            @endforeach
            <tr class="font-bold">
                <td class="border border-black text-center p-2"></td>
                <td class="border border-black text-center p-2">အမှုထမ်းစုစုပေါင်း	</td>
                <td class="border border-black text-right p-2">{{ en2mm($second_payscales->sum(fn($p)=>$p->allowed_qty))}}</td>
                <td class="border border-black text-right p-2">{{ en2mm($second_payscales->sum(fn($p)=>$p->staff->where('gender_id',1)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>
                <td class="border border-black text-right p-2">{{ en2mm($second_payscales->sum(fn($p)=>$p->staff->where('gender_id',2)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>

                <td class="border border-black text-right p-2">{{en2mm($second_payscales->sum(fn($p)=>$p->staff->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>
               
                <td class="border border-black p-2">
                    @php
                        $totalPaidForThisMonth = 0;
                        
                    @endphp
                    @foreach($second_payscales as $payscale)
                    
                    @foreach($payscale->staff->where('is_active', 1)->where('current_department_id',1)->where('salary_paid_by', 1) as $staff)
                    
                        @php
                            $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                        @endphp
                    @endforeach

                    @endforeach
                
                    {{ en2mm($totalPaidForThisMonth) }}
                </td>
                <td class="border border-black text-right p-2"></td>
            </tr>
                <tr class="font-bold">
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                    <td class="border border-black text-right p-2">{{ en2mm($TotalAllowQty)}}</td>
                    <td class="border border-black text-right p-2">

                        {{en2mm($currentMaleStaffTotal)}}
                    </td>
                    <td class="border border-black text-right p-2">{{en2mm($currentFeMaleStaffTotal)}}</td>
                    <td class="border border-black text-right p-2">                        {{en2mm($currentMaleStaffTotal + $currentFeMaleStaffTotal)}}
                    </td>
                    <td class="border border-black  p-2">
                        @php
                            $totalPaidForThisMonth = 0;
                            
                        @endphp
                        @foreach($allPayScales as $payscale)
                        @foreach($payscale->staff->where('is_active', 1)->where('salary_paid_by', 1) as $staff)
                        {{-- @dd($staff) --}}
                            @php
                                $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                                
                            @endphp
                        @endforeach
                       
    
                        @endforeach
                    
                        {{ en2mm($totalPaidForThisMonth) }}
                    </td>
                    <td class="border border-black text-right p-2"></td>
                </tr>
                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">(၁လအတွက်လစာစရိတ်(ကျပ်သန်း))</td>
                    <td class="border border-black text-center p-2">{{en2mm($maximumBudget)}}</td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">a</td>
                    <td class="border border-black text-center p-2">


                    </td>
                </tr>

                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">(၁နှစ်အတွက်လစာစရိတ်(ကျပ်သန်း))</td>
                    <td class="border border-black text-center p-2">{{en2mm($maximumBudget * 12 )}}</td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">


                    </td>
                </tr>

                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">(၁လအတွက်ချီးမြှင့်ငွေ(ကျပ်သန်း))</td>
                    <td class="border border-black text-center p-2">{{en2mm($maximumBudget)}}</td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">


                    </td>
                </tr>

                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">(၁နှစ်အတွက်ချီးမြှင့်ငွေ(ကျပ်သန်း))</td>
                    <td class="border border-black text-center p-2">{{en2mm($maximumBudget)}}</td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">


                    </td>
                </tr>

                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">(၁လအတွက်ဒေသစရိတ်(ကျပ်သန်း))</td>
                    <td class="border border-black text-center p-2">{{en2mm($maximumBudget)}}</td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">


                    </td>
                </tr>

                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">(၁နှစ်အတွက်ဒေသစရိတ်(ကျပ်သန်း))</td>
                    <td class="border border-black text-center p-2">{{en2mm($maximumBudget)}}</td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">


                    </td>
                </tr>

                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">(၁လအတွက်ထောက်ပံကြေး(ကျပ်သန်း))</td>
                    <td class="border border-black text-center p-2">{{en2mm($maximumBudget)}}</td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">


                    </td>
                </tr>

                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">(၁နှစ်အတွက်ထောက်ပံကြေး(ကျပ်သန်း))</td>
                    <td class="border border-black text-center p-2">{{en2mm($maximumBudget)}}</td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">


                    </td>
                </tr>



            </tbody>
        </table>

        <div class="flex flex-col ml-96 mt-12">
            <div class="flex flex-row mb-2">
                <p class="md:w-1/5">လက်မှတ်</p>
                <p class="md:w-5">၊</p>
                <p></p>
            </div>

            <div class="flex flex-row mb-2">
                <p class="md:w-1/5">အမည်</p>
                <p class="md:w-5">၊</p>
                <p>ဒေါ်နှင်းစုမွန်
                </p>
            </div>

            <div class="flex flex-row mb-2">
                <p class="md:w-1/5">ရာထူး</p>
                <p class="md:w-5">၊</p>
                <p>လက်ထောက်ညွှန်ကြားရေးမှူး</p>
            </div>

            <div class="flex flex-row mb-2">
                <p class="md:w-1/5">ဖုန်းနံပါတ်</p>
                <p class="md:w-5">၊</p>
                <p></p>
            </div>
        </div>

    </div>
</div>
