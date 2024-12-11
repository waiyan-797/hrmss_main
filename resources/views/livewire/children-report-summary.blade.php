<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <h1 class="font-bold text-center text-base mb-4">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                ရှိ 
                 သား/သမီးများ၏အရေအတွက် စာရင်း
                
            </h1>


            
 <h1 class=" text-right ">
     ရက်စွဲ - {{getTdyDateInMyanmarYearMonthDay(2)}}
 </h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-left p-2">ရုံး/ဌာန</th>
                        <th colspan="2" class="border border-black text-left p-2">သား/သမီးအရေအတွက်</th>
                        <th rowspan="2" class="border border-black text-left p-2">စုစုပေါင်း</th>

                        <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">
ကျား 
                        </th>
                        <th class="border border-black text-center p-2">
                            မ
                        </th>
                    </tr>
                  
                </thead>
                <tbody>
                    @foreach ($divisionTypes as  $key=> $divisionType)
                    <tr>
                    <td class="border border-black text-center p-2">{{ en2mm($key + 1 ) }}</td>
                    <td class="border border-black text-left p-2">{{ $divisionType->name  }}

                        @if($key == 1 )
                        ညွှန်ကြားရေးမှုးရုံးများတွင်
                        @endif 
 
                        တွင်တာဝန်ထမ်းဆောင်နေသည့်မိသားစုဝင်သား/သမီးများ
   
                        </td>
                       
                        
                    
                        
                        <td class="border border-black text-center p-2">
                            {{ en2mm(
                                $divisionType->divisions->sum(function($division) {
                                    return $division->staffs->sum(function($staff) {
                                        return $staff->children->where('gender_id', 1)->count();
                                    });
                                })
                            ) }}
                        </td>
                        
                        <td class="border border-black text-center p-2">
                            {{ en2mm(
                                $divisionType->divisions->sum(function($division) {
                                    return $division->staffs->sum(function($staff) {
                                        return $staff->children->where('gender_id', 2 )->count();
                                    });
                                })
                            ) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm(
                                $divisionType->divisions->sum(function($division) {
                                    return $division->staffs->sum(function($staff) {
                                        return $staff->children->count();
                                    });
                                })
                            ) }}
                        </td>
                                  
                                                        <td class="border border-black text-left p-2">
                                                         
                                                        </td>
                </tr>
                    
                
                    @endforeach
                   
                    <tr>
                        <td class="border border-black text-center p-2">

                          
                        </td>
                        <td class="border border-black text-center p-2">

                            ပေါင်း
                        </td>
                        <td class="border border-black text-center p-2">
                          
                            {{ 
                                
                                $children->where('gender_id' , 1 )->count()
                    }}
                        </td>
                        
                        <td class="border border-black text-center p-2">
                          
                            {{ 
                                
                                $children->where('gender_id' , 1 )->count()
                    }}
                        </td>
                        <td class="border border-black text-center p-2">
                          
                            {{ 
                                
                                en2mm($children->count())
                    }}
                        </td>
                        <td class="border border-black text-center p-2">
                           
                        </td>


                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</div>
