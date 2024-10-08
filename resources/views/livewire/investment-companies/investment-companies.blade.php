<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">

            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>


            <div class="w-full mb-4">
                <h2 class="font-semibold text-base">ဦးစီးဌာန ၊ ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h2>
                <table class="w-full text-center">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border border-black">အမှတ်စဥ်</th>
                            <th class="p-2 border border-black">လစာနှုန်း (ကျပ်)</th>
                            <th class="p-2 border border-black">ခွင့်ပြုအင်အား</th>
                            <th class="p-2 border border-black">ကချင်</th>
                            <th class="p-2 border border-black">ကယား</th>
                            <th class="p-2 border border-black">ကရင်</th>
                            <th class="p-2 border border-black">ချင်း</th>
                            <th class="p-2 border border-black">မွန်</th>
                            <th class="p-2 border border-black">ရခိုင်</th>
                            <th class="p-2 border border-black">ရှမ်း</th>
                            <th class="p-2 border border-black">စစ်ကိုင်း</th>
                            <th class="p-2 border border-black">မန္တလေး</th>
                            <th class="p-2 border border-black">နေပြည်တော်</th>
                            <th class="p-2 border border-black">ရန်ကုန်</th>
                            <th class="p-2 border border-black">ရန်ကုန်ရုံးချုပ်</th>
                            <th class="p-2 border border-black">မကွေး</th>
                            <th class="p-2 border border-black">ပဲခူး</th>
                            <th class="p-2 border border-black">တနင်သာရီ</th>
                            <th class="p-2 border border-black">ဧရာဝတီ</th>
                            <th class="p-2 border border-black">စုစုပေါင်း</th>
                        </tr>
                    </thead>
                    <tbody class="text-center h-8 p-2">
                        @foreach ($first_payscales as $payscale)
                            <tr>
                                <td class="border border-black p-2">{{$loop->index + 1}}</td>
                                <td class="border border-black p-2">{{$payscale->name}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="border border-black p-2">{{en2mm($kachin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($kayah_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($kayin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($chin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mon_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($rakhine_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($shan_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($sagaing_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mdy_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($npt_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($ygn_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($head_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mag_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($tnty_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($aya_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($total_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-black p-2 font-semibold" colspan="2">{{$first_payscales[0]->staff_type->name}}စုစုပေါင်း</td>
                            <td class="border border-black p-2 font-semibold">{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kachin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kayah_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kayin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($head_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($total_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>

                        @foreach ($second_payscales as $payscale)
                            <tr>
                                <td class="border border-black p-2">{{$loop->index + 1}}</td>
                                <td class="border border-black p-2">{{$payscale->name}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="border border-black p-2">{{en2mm($kachin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($kayah_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($kayin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($chin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mon_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($rakhine_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($shan_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($sagaing_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mdy_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($npt_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($ygn_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($head_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mag_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($tnty_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($aya_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($total_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-black p-2 font-semibold" colspan="2">{{$second_payscales[0]->staff_type->name}}စုစုပေါင်း</td>
                            <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kachin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kayah_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kayin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($head_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($total_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
