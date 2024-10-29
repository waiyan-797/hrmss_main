<div class="w-full">
    <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
    <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
    <br><br>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
       
            <div class="md:w-full p-4">
                <h2 class="font-bold text-center text-sm mb-3">{{$startYr}} - {{$endYr}} ဘဏ္ဍာရေးနှစ်အတွက် လစာငွေထုတ်ယူမည့် စာရင်း</h2>
                <input type="number" min="2005" step="1" wire:model.live="endYr" />
                
                
{{--                 
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">အမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">ဦးရဲမင်းထက်</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ရာထူး</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">အငယ်တန်းစာရေး</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">လစာနှုန်း</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div> --}}
                <table class="md:w-full mt-5 ">
                    <thead>
                        <tr>
                            <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                            <th rowspan="2" class="border border-black text-center p-2">လအမည်</th>
                            <th rowspan="2" class="border border-black text-center p-2">လက်ရှိလစာနှုန်း</th>
                            <th rowspan="2" class="border border-black text-center p-2">ထောက်ပံ့ကြေး</th>
                            <th rowspan="2" class="border border-black text-center p-2">အသက်အာမခံ<br>ဖြတ်တောက်ငွေ</th>
                            <th colspan="2" class="border border-black text-center p-2">ခွင့်</th>
                            <th rowspan="2" class="border border-black text-center p-2">ဝင်‌ငွေခွန်<br>ဖြတ်တောက်ငွေ</th>
                            <th rowspan="2" class="border border-black text-center p-2">၂လစာချေးငွေ</th>
                            <th rowspan="2" class="border border-black text-center p-2">အသားတင် လစာ</th>
                            <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                            
                        </tr>
                        <tr>
                            <th class="border border-black text-center p-2">လုပ်သက်ခွင့်</th>
                            <th class="border border-black text-center p-2">လစာမဲ့ခွင့်</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp

                        @foreach ([$startYr , $endYr] as $year)

 @foreach (financeYear()[$loop->index] as $month)
                          
 <tr>
    <td class="border border-black text-center p-2">

        {{en2mm(++$count )}}
    </td>

    <td class="border border-black text-center p-2">{{en2mm($month) . '/' . en2mm($year)}}</td>
   
    <td class="border border-black text-center p-2">
       
                         
      
        {{  
        
        //    $salaries
        //                  ->whereYear('salary_month' , $year)
        //                  ->whereMonth('salary_month', 6)

        //                  ->sum('current_salary')
        getSalary($month, $year)
        }}
    </td>
   
    <td class="border border-black text-center p-2"></td>
    <td class="border border-black text-center p-2"></td>
    
    <td class="border border-black text-center p-2"></td>
    <td class="border border-black text-center p-2"></td>
   
    <td class="border border-black text-left p-1">   
    </td>
    <td class="border border-black text-left p-1">   
    </td>
    <td class="border border-black text-left p-1">   
    </td>
    <td class="border border-black text-left p-1">   
    </td>
</tr>

 @endforeach

                        @endforeach
                       
                          </tbody>
                </table>
                
               
                
              
                
               
            </div>
        </div>
    </div>