<div class="">

    <div class="">
        <table class="">
            <tr>
                <th colspan="6" style="font-weight:bold">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                </th>
            </tr>
            <tr>
                <th colspan="6" style="font-weight:bold">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                </th>
            </tr>
            <tr>
                <th colspan="6" style="font-weight:bold">
                    နေပြည်တော်ရှိ အရာထမ်း/ အမှုထမ်း ဝန်ထမ်းအင်အားစာရင်း
                </th>
            </tr>
            <tr>
                <th colspan="6">
                    ရက်စွဲ၊ {{ formatDMYmm(\Carbon\Carbon::now()) }}
                </th>
            </tr>
        </table>
        <table>
            <thead>
                <tr>
                    <th style="font-weight:bold">စဥ်</th>
                    <th style="font-weight:bold">ရာထူး/အဆင့်</th>
                    <th style="font-weight:bold">အိမ်ထောင်သည်</th>
                    <th style="font-weight:bold">လူပျို</th>
                    <th style="font-weight:bold">အပျို</th>
                    <th style="font-weight:bold">စုစုပေါင်း</th>
                </tr>
            </thead>
            <tbody class="text-center h-8 p-2">
                @foreach ($first_payscales as $payscale)
                    <tr>
                        <td>{{ en2mm(++$count) }}</td>
                        <td style="white-space: normal; word-wrap: break-word;">
                            @foreach ($payscale->ranks as $rank)
                                {{ $rank->name1 ? $rank->name1 . ' / ' . $rank->name2 : $rank->name }}
                                @if (!$loop->last)
                                    @break
                                @endif
                            @endforeach
                        </td>
                        <td>{{ en2mm($payscale->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count()) }}
                        </td>
                        <td>{{ en2mm(
                            $payscale->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                        ) }}
                        </td>
                        <td>{{ en2mm(
                            $payscale->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                        ) }}
                        </td>

                        <td>


                            {{ en2mm($payscale->staff->where('current_division_id', 26)->count()) }}
                        </td>
                        <td>

                        </td>

                    </tr>
                @endforeach
                <tr class="font-bold">
                    <td></td>
                    <td style="font-weight:bold">အရာထမ်းပေါင်း</td>
                    <td style="font-weight:bold">
                        {{ en2mm(
                            $first_payscales->sum(
                                fn($p) => $p->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count(),
                            ),
                        ) }}
                    </td>

                    <td style="font-weight:bold">
                        {{ en2mm(
                            $first_payscales->sum(
                                fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                            ),
                        ) }}
                    </td>

                    <td style="font-weight:bold">
                        {{ en2mm(
                            $first_payscales->sum(
                                fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                            ),
                        ) }}
                    </td>
                    <td style="font-weight:bold">


                        {{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('current_division_id', 26)->count())) }}

                    </td>





                </tr>

                @foreach ($second_payscales as $payscale)
                    <tr>
                        <td>{{ en2mm(++$count) }}</td>
                        <td style="white-space: normal; word-wrap: break-word;">
                        @foreach ($payscale->ranks as $rank)
                                    @if($rank->name == 'အငယ်တန်းစာရေး')
                                    {{'အငယ်တန်းစာရေး / စာရင်းကိုင်(၄) / စက်ပြင်(၄)' }}
                                        @break
                                        @elseif($rank->name == 'ဒုတိယဦးစီးမှူး')
                                    {{'ဒုတိယဦးစီးမှူး / ဌာနခွဲစာရေး / စာရင်းကိုင်(၂)' }}
                                        @break
                                        @elseif($rank->name == 'ရုံးအုပ်')
                                    {{'ဦးစီးမှူး / ရုံးအုပ် / စာရင်းကိုင်(၁)' }}
                                        @break
                                    @else
                                        {{$rank->name}}
                                    @endif
                                        @if($rank->name == 'အကြီးတန်းစာ‌ရေး')
                                            {{'/ ဓါတ်ပုံကျွမ်းကျင်(၃) / ဗွီဒီယိုကျွမ်းကျင်(၃)' }}
                                        @endif
                                       
                                        @if (!$loop->last)
                                            {{'/'}}
                                        @endif
                                    @endforeach
                        </td>
                        <td>{{ en2mm($payscale->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count()) }}
                        </td>
                        <td>{{ en2mm(
                            $payscale->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                        ) }}
                        </td>
                        <td>{{ en2mm(
                            $payscale->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                        ) }}
                        </td>

                        <td>


                            {{ en2mm($payscale->staff->where('current_division_id', 26)->count()) }}
                        </td>
                        <td>

                        </td>

                    </tr>
                @endforeach
                <tr class="font-bold">
                    <td></td>
                    <td style="font-weight:bold">အမှုထမ်းပေါင်း</td>
                    <td>{{ en2mm(
                        $first_payscales->sum(
                            fn($p) => $p->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count(),
                        ),
                    ) }}
                    </td>

                    <td style="font-weight:bold">
                        {{ en2mm(
                            $first_payscales->sum(
                                fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                            ),
                        ) }}
                    </td>

                    <td style="font-weight:bold">
                        {{ en2mm(
                            $first_payscales->sum(
                                fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                            ),
                        ) }}
                    </td>


                    <td style="font-weight:bold">


                        {{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('current_division_id', 26)->count())) }}

                    </td>





                </tr>



                <tr class="font-bold">
                    <td></td>
                    <td style="font-weight:bold">စုစုပေါင်း</td>
                    <td style="font-weight:bold">
                        {{ en2mm(
                            $first_payscales->sum($payscale->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count()) +
                                $second_payscales->sum(
                                    $payscale->staff->where('current_division_id', 26)->where('marital_status_id', 6)->count(),
                                ),
                        ) }}
                    </td>


                    <td style="font-weight:bold">
                        {{ en2mm(
                            $first_payscales->sum(
                                fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                            ) +
                                $second_payscales->sum(
                                    fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 1)->count(),
                                ),
                        ) }}
                    </td>



                    <td style="font-weight:bold">
                        {{ en2mm(
                            $first_payscales->sum(
                                fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                            ) +
                                $second_payscales->sum(
                                    fn($p) => $p->staff->where('current_division_id', 26)->whereIn('marital_status_id', [1, 2, 3, 4, 5])->where('gender_id', 2)->count(),
                                ),
                        ) }}
                    </td>


                    <td style="font-weight:bold">
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
