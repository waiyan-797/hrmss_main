<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
             <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button> 
            <br><br>

            <div>



                <div class="w-1/3">
                    <x-select wire:model="letter_type_id" :values="$letter_types" placeholder="စာအဆင့်အတန်းရွေးပါ"
                        id="letter_type_id" name="letter_type_id" class="mt-11 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('letter_type_id')" />
                </div>



            </div>
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full border border-black">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-black text-center p-2">စဥ်</th>
                            <th class="border border-black text-center p-2">ရာထူး/အဆင့်</th>
                            <th class="border border-black text-center p-2">အိမ်ထောင်သည်</th>

                            <th class="border border-black text-center p-2">လူပျို</th>
                            <th class="border border-black text-center p-2">အပျို</th>
                            <th class="border border-black text-center p-2">စုစုပေါင်း </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($first_payscales as $payscale)
                        <tr>
                            <td class="border border-black p-2">{{en2mm($loop->iteration)}}</td>
                            <td class="border border-black p-2">
                                @foreach($payscale->ranks as $rank)
                                {{ $rank->name }}<br>
                            @endforeach
                            
                            </td>
                            <td class="border border-black p-2">{{en2mm($payscale->staff->where("current_division_id", 26)
                            ->where('marital_status_id' , 6 )->count()
                            )}}</td>
                              <td class="border border-black p-2">{{en2mm($payscale->staff->where("current_division_id", 26)
                                ->whereIn('marital_status_id' ,[1,2,3,4,5])->where('gender_id' , 1 )
                                ->count()
                                )}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->staff->where("current_division_id", 26)
                                    ->whereIn('marital_status_id' ,[ 1, 2,3,4,5])->where('gender_id' , 2 )
                                    ->count()
                                    )}}</td>
                           
                            <td class="border border-black p-2">
                               
                              
                                {{ en2mm($payscale->staff->where("current_division_id", 26)->count()) }}
                            </td>
                            <td class="border border-black p-2"> 
                                
                            </td>
                
                        </tr>
                    @endforeach
                        <tr class="font-bold">
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2">အရာထမ်းပေါင်း</td>
                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum(
                                        fn($p) => $p->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count(),
                                    ),
                                ) }}
                            </td>

                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum(
                                        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                                    ),
                                ) }}
                            </td>

                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum(
                                        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                                    ),
                                ) }}
                            </td>


                            <td class="border border-black p-2">


                                {{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('current_division_id', 26)->count())) }}

                            </td>





                        </tr>

<<<<<<< HEAD
                        @foreach ($second_payscales as $payscale)
                            <tr>
                                <td class="border border-black p-2">{{ en2mm($loop->iteration) }}</td>
                                <td class="border border-black p-2">{{ $payscale->name }}</td>
                                <td class="border border-black p-2">
                                    {{ en2mm($payscale->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count()) }}
                                </td>
                                <td class="border border-black p-2">
                                    {{ en2mm(
                                        $payscale->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                                    ) }}
                                </td>
                                <td class="border border-black p-2">
                                    {{ en2mm(
                                        $payscale->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                                    ) }}
                                </td>

                                <td class="border border-black p-2">


                                    {{ en2mm($payscale->staff->where('current_division_id', 26)->count()) }}
                                </td>


                            </tr>
                        @endforeach
=======
                          @foreach ($second_payscales as $payscale)
                        <tr>
                            <td class="border border-black p-2">{{en2mm($loop->iteration)}}</td>
                            <td class="border border-black p-2">
                                @foreach($payscale->ranks as $rank)
                                {{ $rank->name }}<br>
                            @endforeach
                            </td>
                            <td class="border border-black p-2">{{en2mm($payscale->staff->where("current_division_id", 26)
                            ->where('marital_status_id' , 6 )->count()
                            )}}</td>
                              <td class="border border-black p-2">{{en2mm($payscale->staff->where("current_division_id", 26)
                                ->whereIn('marital_status_id' ,[1,2,3,4,5])->where('gender_id' , 1 )
                                ->count()
                                )}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->staff->where("current_division_id", 26)
                                    ->whereIn('marital_status_id' ,[ 1, 2,3,4,5])->where('gender_id' , 2 )
                                    ->count()
                                    )}}</td>
                           
                            <td class="border border-black p-2">
                               
                              
                                {{ en2mm($payscale->staff->where("current_division_id", 26)->count()) }}
                            </td>
                            <td class="border border-black p-2"> 
                                
                            </td>
                
                        </tr>
                    @endforeach
>>>>>>> 4176855 (change paysacle name to rank name in npt3)
                        <tr class="font-bold">
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2">အရာထမ်းပေါင်း</td>
                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum(
                                        fn($p) => $p->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count(),
                                    ),
                                ) }}
                            </td>

                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum(
                                        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                                    ),
                                ) }}
                            </td>

                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum(
                                        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                                    ),
                                ) }}
                            </td>


                            <td class="border border-black p-2">


                                {{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('current_division_id', 26)->count())) }}

                            </td>





                        </tr>



                        <tr class="font-bold">
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum($payscale->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count()) +
                                        $second_payscales->sum(
                                            $payscale->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count(),
                                        ),
                                ) }}
                            </td>


                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum(
                                        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                                    ) +
                                        $second_payscales->sum(
                                            fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                                        ),
                                ) }}
                            </td>



                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum(
                                        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                                    ) +
                                        $second_payscales->sum(
                                            fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                                        ),
                                ) }}
                            </td>


                            <td class="border border-black text-right p-2">
                                {{ en2mm(
                                    $first_payscales->sum(
                                        $payscale->staff->where('current_division_id', 26)->count() +
                                            $second_payscales->sum($payscale->staff->where('current_division_id', 26)->count()),
                                    ),
                                ) }}



                            </td>
                        </tr>


                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
