<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> 
             {{-- <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>  --}}
            <br><br>

            <div>
                <div class="w-1/3">
                    <x-select wire:model="letter_type_id" :values="$letter_types" placeholder="စာအဆင့်အတန်းရွေးပါ"
                        id="letter_type_id" name="letter_type_id" class="mt-11 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('letter_type_id')" />
                </div>


                <h1 class="font-bold text-center text-base">
                 
                    {{ is_null($selectedDivisionId) ? '' :  getDivisionBy($selectedDivisionId)->name 
       

                     }}

                   
                    
                </h1>
                <h1 class="font-bold text-center text-base">

                  {{  is_null($selectedDivisionId) ? '' : '  ဖွဲ့စည်းပုံ ၊ ခွင့်ပြု ၊ လစ်လပ်အင်အားစာရင်း'}}
                               
                    
                </h1>
               
               
                <x-select wire:model.live="selectedDivisionId" :values="$divisions" 
                placeholder='All'
    
    />
    <h1 class=" text-end ">
        ရက်စွဲ - {{getTdyDateInMyanmarYearMonthDay(2)}}
    </h1>


    

            </div>
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full border border-black">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-black text-center p-2">စဥ်</th>
                            <th class="border border-black text-center p-2">ရာထူးအမည်</th>
                            <th class="border border-black text-center p-2">ဖွဲ့စည်းပုံ</th>

                            <th class="border border-black text-center p-2">ခန့်ထားအင်အား</th>
                            <th class="border border-black text-center p-2">လစ်လပ်</th>
                            <th class="border border-black text-center p-2">မှတ်ချက် </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($first_payscales as $payscale)
                     
                            @foreach($payscale->ranks as $rank)
                             
                            <tr>
                                <td class="border border-black p-2">{{en2mm(++$count)}}</td>
                               
                                <td class="border border-black p-2">
                               
                                    {{ $rank->name }}
                             
                                </td>
                                <td class="border text-right border-black p-2"> 
                                    {{ en2mm ($rank->allowed_qty )}}
                                </td>

                                <td class="border border-black text-right  p-2"> 
                                    {{ en2mm ($rank->staffs->filter(function ($staff) {
                                        return $staff->current_division_id == 1;
                                    })->count())
                                     }}
                                    
                                </td>
                                <td class="border border-black p-2 text-right "> 
                                    {{ en2mm($rank->staffs->filter(function ($staff) {
                                        return $staff->current_division_id == 1;
                                    })->count() - $rank->allowed_qty)
                                     }}
                                    
                                </td>
                                <td class="border border-black p-2">

                                </td>

                            </tr>

                            @endforeach
                           
                           
                       
                
                    @endforeach
                    @foreach ($second_payscales as $payscale)
                     
                    @foreach($payscale->ranks as $rank)
                     
                    <tr>
                        <td class="border border-black p-2 ">{{en2mm(++$count)}}</td>
                       
                        <td class="border border-black p-2">
                       
                            {{ $rank->name }}
                     
                        </td>
                        <td class="border text-right border-black  p-2"> 
                            {{ en2mm ($rank->allowed_qty )}}
                        </td>

                        <td class="border border-black p-2 text-right"> 
                            {{ en2mm ($rank->staffs->filter(function ($staff) {
                                return $staff->current_division_id == 1;
                            })->count())
                             }}
                            
                        </td>
                        <td class="border border-black p-2 text-right" > 
                            {{ en2mm($rank->staffs->filter(function ($staff) {
                                return $staff->current_division_id == 1;
                            })->count() - $rank->allowed_qty)
                             }}
                            
                        </td>
                        <td class="border border-black p-2">

                        </td>

                    </tr>

                    @endforeach
                   
                   
               
        
            @endforeach


                        <tr class="font-bold">
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2">ပေါင်း</td>
                            <td class="border border-black text-right p-2">
                                {{
                                    en2mm(
                                        $first_payscales->sum(function($payscale) {
                                        return $payscale->ranks->sum(function($rank) {
                                            return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
                                        });
                                    }
                                    )
                                    +

                                    $second_payscales->sum(function($payscale) {
                                        return $payscale->ranks->sum(function($rank) {
                                            return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
                                        });
                                    }
                                    )
                                    )
                                }}
                            </td>
                            


                            <td class="border border-black text-right p-2">
                                {{
                                    en2mm(
                                        $first_payscales->sum(function($payscale) {
                                            return $payscale->ranks->sum(function($rank) {
                                                return $rank->staffs->filter(function($staff) {
                                                    return $staff->current_division_id == 1;
                                                })->count();
                                            });
                                        }) 
                                        +
                                        $second_payscales->sum(function($payscale) {
                                            return $payscale->ranks->sum(function($rank) {
                                                return $rank->staffs->filter(function($staff) {
                                                    return $staff->current_division_id == 1;
                                                })->count();
                                            });
                                        }) 

                                    )
                                }}
                            </td>
                            

                            <td class="border border-black text-right p-2">
                                {{
                                    en2mm(
                                     (   $first_payscales->sum(function($payscale) {
                                            return $payscale->ranks->sum(function($rank) {
                                                return $rank->staffs->filter(function($staff) {
                                                    return $staff->current_division_id == 1;
                                                })->count();
                                            });
                                        }) 
                                        +
                                        $second_payscales->sum(function($payscale) {
                                            return $payscale->ranks->sum(function($rank) {
                                                return $rank->staffs->filter(function($staff) {
                                                    return $staff->current_division_id == 1;
                                                })->count();
                                            });
                                        }) )
                                        -
                                        (
                                            $first_payscales->sum(function($payscale) {
                                        return $payscale->ranks->sum(function($rank) {
                                            return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
                                        });
                                    }
                                    )
                                    +

                                    $second_payscales->sum(function($payscale) {
                                        return $payscale->ranks->sum(function($rank) {
                                            return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
                                        });
                                    }
                                    )
                                        )
                                        // -


                                    )
                                }}
                            </td>




                         
                            
                        </tr>


                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
