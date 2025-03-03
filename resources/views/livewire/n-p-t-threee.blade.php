<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>

            <h1 class="font-semibold text-base mb-2 text-center">
                ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
            <h1 class="font-semibold text-base mb-2 text-center">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h2 class="font-semibold text-base mb-2 text-center">နေပြည်တော်ရှိ အရာထမ်း / အမှုထမ်း ဝန်ထမ်းအင်အားစာရင်း
            </h2>

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
                            <th class="border border-black text-center p-2">စဉ်</th>
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
                                                    <td class="border border-black p-2 text-center">{{en2mm(++$count)}}</td>
                                                    <td class="border border-black p-2 text-start">
                                                        @foreach($payscale->ranks as $rank)
                                                            {{ $rank->name1 ? $rank->name1 . '/' . $rank->name2 : $rank->name }}
                                                            @if (!$loop->last)
                                                                {{ "/" }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="border border-black p-2 text-center">{{en2mm(
                                $payscale->staff->where("current_division_id", 26)
                                    ->where('marital_status_id', 6)->count()
                            )}}</td>
                                                    <td class="border border-black p-2 text-center">{{en2mm(
                                $payscale->staff->where("current_division_id", 26)
                                    ->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)
                                    ->count()
                            )}}</td>
                                                    <td class="border border-black p-2 text-center">{{en2mm(
                                $payscale->staff->where("current_division_id", 26)
                                    ->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)
                                    ->count()
                            )}}</td>

                                                    <td class="border border-black p-2 text-center">


                                                        {{ en2mm($payscale->staff->where("current_division_id", 26)->count()) }}
                                                    </td>

                                                </tr>
                        @endforeach
                        <tr class="font-bold">
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2">အရာထမ်းပေါင်း</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm(
    $first_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count(),
    ),
) }}
                            </td>

                            <td class="border border-black text-center p-2">
                                {{ en2mm(
    $first_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
    ),
) }}
                            </td>

                            <td class="border border-black  p-2 text-center">
                                {{ en2mm(
    $first_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
    ),
) }}
                            </td>


                            <td class="border border-black p-2 text-center">


                                {{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('current_division_id', 26)->count())) }}

                            </td>





                        </tr>

                        @foreach ($second_payscales as $payscale)
                                                <tr>
                                                    <td class="border border-black p-2 text-center">{{en2mm(++$count)}}</td>
                                                    <td class="border border-black p-2">
                                                        @foreach($payscale->ranks as $rank)
                                                            {{ $rank->name }} 
                                                            @if (!$loop->last)
                                                                {{ "/" }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="border border-black p-2 text-center">{{en2mm(
                                $payscale->staff->where("current_division_id", 26)
                                    ->where('marital_status_id', 6)->count()
                            )}}</td>
                                                    <td class="border border-black p-2 text-center">{{en2mm(
                                $payscale->staff->where("current_division_id", 26)
                                    ->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)
                                    ->count()
                            )}}</td>
                                                    <td class="border border-black p-2 text-center">{{en2mm(
                                $payscale->staff->where("current_division_id", 26)
                                    ->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)
                                    ->count()
                            )}}</td>

                                                    <td class="border border-black p-2 text-center">


                                                        {{ en2mm($payscale->staff->where("current_division_id", 26)->count()) }}
                                                    </td>
                                                    {{-- <td class="border border-black p-2">

                                                    </td> --}}

                                                </tr>
                        @endforeach
                        <tr class="font-bold">
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2">အမှုထမ်းပေါင်း</td>
                            <td class="border border-black  p-2 text-center">
                                {{ en2mm(
    $first_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count(),
    ),
) }}
                            </td>

                            <td class="border border-black  p-2 text-center">
                                {{ en2mm(
    $first_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
    ),
) }}
                            </td>

                            <td class="border border-black  p-2 text-center">
                                {{ en2mm(
    $first_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
    ),
) }}
                            </td>


                            <td class="border border-black p-2 text-center">


                                {{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('current_division_id', 26)->count())) }}

                            </td>





                        </tr>



                        <tr class="font-bold">
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm(
    $first_payscales->sum($payscale->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count()) +
    $second_payscales->sum(
        $payscale->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count(),
    ),
) }}
                            </td>


                            <td class="border border-black text-center p-2">
                                {{ en2mm(
    $first_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
    ) +
    $second_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
    ),
) }}
                            </td>



                            <td class="border border-black text-center p-2">
                                {{ en2mm(
    $first_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
    ) +
    $second_payscales->sum(
        fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
    ),
) }}
                            </td>


                            <td class="border border-black text-center p-2">
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