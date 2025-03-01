<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="font-bold text-center text-base mb-3">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏
                ၂၀၂၄ ခုနှစ်၊ မေလ<br>ဝန်ထမ်းအင်အား နှင့် လစာထုတ်ပေးမှုအခြေအနေ</h1>

            <table class="md:w-full mb-4">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာနှုန်း</th>
                        <th colspan="6" class="border border-black text-center p-2">(၃၁-၅-၂၀၂၄ ရက်နေ့ရှိအင်အားစာရင်း)
                        </th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ဖွဲ့စည်းပုံခွင့်ပြုအင်အား</th>
                        <th class="border border-black text-center p-2">ခန့်ထားအင်အား</th>
                        <th class="border border-black text-center p-2">မိမိဌာနမှ
                            လစာကျခံပြီး<br>အခြားဌာနမှ<br>တွဲဖက်အင်အား</th>
                        <th class="border border-black text-center p-2">မိမိဌာနမှ
                            လစာ<br>ကျခံခြင်းမရှိပဲအခြား<br>ဌာနသို့တွဲဖက်အင်အား</th>
                        <th class="border border-black text-center p-2">လစာထုတ်ပေးအင်အား</th>
                        <th class="border border-black text-center p-2">အမှန်တကယ်<br>ထုတ်ပေးခဲ့သည့်<br>လစာ(ကျပ်သန်း)
                        </th>
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
                        <td class="border border-black p-2">{{en2mm($payscale->staff->where('is_active', 1)->count())}}</td>
                        <td class="border border-black p-2"> {{en2mm($payscale->staff->where('is_active', 1)->where('side_department_id',1)->where('salary_paid_by',1)->count())}} </td>
                        <td class="border border-black p-2"> {{en2mm($payscale->staff->where('is_active', 1)->where('current_department_id',1)->where('side_department_id', '!=' , 1)->where('salary_paid_by','!=' , 1)->count())}} </td>
                        <td class="border border-black p-2"> {{en2mm($payscale->staff->where('is_active', 1)->where('salary_paid_by', 1)->count())}} </td>
                        <td class="border border-black p-2"> 
                            {{ en2mm($payscale->staff->sum(fn($each) =>  $each->salaries->last()?->actual_salary)) }}
                        </td>
                        
                    </tr>
                @endforeach
                <tr>
                    
                    <td class="border border-black p-2 font-semibold" colspan="2">{{$first_payscales[0]->staff_type->name}}စုစုပေါင်း</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('is_active', 1)->where('current_department_id',1)->count())) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('is_active', 1)->where('side_department_id',1)->where('salary_paid_by',1)->count())) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('is_active', 1)->where('current_department_id',1)->where('side_department_id', '!=' , 1)->where('salary_paid_by','!=' , 1)->count())) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('is_active', 1)->where('salary_paid_by', 1)->count())) }}</td>
                    <td class="border border-black p-2"> 
                        {{ en2mm($first_payscales->sum(fn($payscale)=>$payscale->staff->where('is_active', 1)->sum(fn($each) =>  $each->salaries->last()?->actual_salary)) ) }}
                    </td>
                    
                </tr>

                @foreach ($second_payscales as $payscale)
                    <tr>
                        <td class="border border-black p-2">{{$loop->index + 1}}</td>
                        <td class="border border-black p-2">{{$payscale->name}}</td>
                        <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                        <td class="border border-black p-2">{{en2mm($payscale->staff->where('current_department_id',1)->where('is_active', 1)->count())}}</td>

<td class="border border-black p-2"> {{en2mm($payscale->staff->where('side_department_id',1)->where('salary_paid_by',1)->where('is_active', 1)->count())}} </td>
                        <td class="border border-black p-2"> {{en2mm($payscale->staff->where('is_active', 1)->where('current_department_id',1)->where('side_department_id', '!=' , 1)->where('salary_paid_by','!=' , 1)->count())}} </td>
                        <td class="border border-black p-2"> {{en2mm($payscale->staff->where('is_active', 1)->where('salary_paid_by', 1)->count())}} </td> 
                        <td class="border border-black p-2"> 
                            {{ en2mm($payscale->staff->sum(fn($each) =>  $each->salaries->last()?->actual_salary)) }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class="border border-black p-2 font-semibold" colspan="2">{{$second_payscales[0]->staff_type->name}}စုစုပေါင်း</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('current_department_id',1)->where('is_active', 1)->count())) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('side_department_id',1)->where('salary_paid_by',1)->where('is_active', 1)->count())) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('current_department_id',1)->where('side_department_id', '!=' , 1)->where('is_active', 1)->where('salary_paid_by','!=' , 1)->count())) }}</td>
                    <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('salary_paid_by', 1)->count())) }}</td>
                    <td class="border border-black p-2"> 
                        {{ en2mm($second_payscales->sum(fn($payscale)=>$payscale->staff->where('is_active', 1)->sum(fn($each) =>  $each->salaries->last()?->actual_salary))  ) }}
                    </td>
                </tr>
                 
                {{-- w  --}}
                {{-- @foreach($salaries as $index => $salary) --}}
            <tr>
               
                <td class="border border-black text-center p-2 font-semibold " colspan="2">စုစုပေါင်း</td>
                <td class="border border-black p-2 font-semibold" >{{en2mm($TotalAllowQty)}}</td>
                <td class="border border-black p-2 font-semibold" >{{en2mm($currentStaffTotal)}}</td>
                <td class="border border-black p-2 font-semibold" >{{en2mm($totalStaffFromOthersDept)}}</td>
                <td class="border border-black p-2 font-semibold" >{{en2mm(  $totalStaffToOthersDept)}}</td>
                <td class="border border-black p-2 font-semibold" >{{en2mm(  $totalSalaryPaidStaff)}}</td>
                <td class="border border-black p-2 font-semibold" >
                    {{ en2mm($second_payscales->sum(fn($payscale)=>$payscale->staff->sum(fn($each) =>  $each->salaries->last()?->actual_salary))  + $first_payscales->sum(fn($payscale)=>$payscale->staff->sum(fn($each) =>  $each->salaries->last()?->actual_salary)) ) }}

                </td>
             

            </tr>
       

                </tbody>
            </table>

        </div>
    </div>
</div>
