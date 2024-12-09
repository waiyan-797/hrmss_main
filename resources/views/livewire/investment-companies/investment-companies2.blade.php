<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>

            <div class="md:w-full mb-4">
                <h1 class="font-semibold text-base mb-2">ဝန်ကြီးဌာန၊ရင်းနှီးမြုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                </h1>
                <h1 class="font-semibold text-base mb-2">ဦးစီးဌာန ၊ ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                </h1>

                <div class="w-full rounded-lg">
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">လစာနှုန်း (ကျပ်)</th>
                                <th rowspan="2" class="border border-black text-center p-2">ခန့်ပြီး</th>
                                <th colspan="2" class="border border-black text-center p-2">ကချင်</th>
                                <th colspan="2" class="border border-black text-center p-2">ကယား</th>
                                <th colspan="2" class="border border-black text-center p-2">ကရင်</th>
                                <th colspan="2" class="border border-black text-center p-2">ချင်း</th>
                                <th colspan="2" class="border border-black text-center p-2">မွန်</th>
                                <th colspan="2" class="border border-black text-center p-2">ရခိုင်</th>
                                <th colspan="2" class="border border-black text-center p-2">ရှမ်း</th>
                                <th colspan="2" class="border border-black text-center p-2">စစ်ကိုင်း</th>
                                <th colspan="2" class="border border-black text-center p-2">မန္တလေး</th>
                                <th colspan="2" class="border border-black text-center p-2">နေပြည်တော်</th>
                                <th colspan="2" class="border border-black text-center p-2">ရန်ကုန်</th>
                                <th colspan="2" class="border border-black text-center p-2">ရန်ကုန်ရုံးချုပ်</th>
                                <th colspan="2" class="border border-black text-center p-2">မကွေး</th>
                                <th colspan="2" class="border border-black text-center p-2">ပဲခူး</th>
                                <th colspan="2" class="border border-black text-center p-2">တနင်သာရီ</th>
                                <th colspan="2" class="border border-black text-center p-2">ဧရာဝတီ</th>
                                <th colspan="2" class="border border-black text-center p-2">စုစုပေါင်း</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center h-8 p-2">
                            @foreach ($first_payscales as $payscale)
                                <tr>
                                    <td class="border border-black p-2">{{en2mm($loop->index + 1)}}</td>
                                    <td class="border border-black p-2">{{$payscale->name}}</td>
                                    <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                    <td class="border border-black p-2">{{en2mm($kachin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kachin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kayah_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kayah_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kayin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kayin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($chin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($chin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mon_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mon_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($rakhine_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($rakhine_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($shan_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($shan_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($sagaing_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($sagaing_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mdy_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mdy_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($npt_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($npt_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($ygn_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($ygn_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($head_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($head_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mag_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mag_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($pagu_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($pagu_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($tnty_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($tnty_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($aya_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($aya_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($total_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($total_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="2">{{$first_payscales[0]->staff_type->name}}စုစုပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($head_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($head_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($total_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($total_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                            </tr>

                            @foreach ($second_payscales as $payscale)
                                <tr>
                                    <td class="border border-black p-2">{{en2mm($loop->index + 1)}}</td>
                                    <td class="border border-black p-2">{{$payscale->name}}</td>
                                    <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                    <td class="border border-black p-2">{{en2mm($kachin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kachin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kayah_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kayah_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kayin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($kayin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($chin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($chin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mon_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mon_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($rakhine_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($rakhine_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($shan_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($shan_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($sagaing_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($sagaing_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mdy_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mdy_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($npt_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($npt_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($ygn_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($ygn_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($head_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($head_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mag_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($mag_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($pagu_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($pagu_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($tnty_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($tnty_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($aya_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($aya_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($total_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm($total_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="2">{{$second_payscales[0]->staff_type->name}}စုစုပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($head_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($head_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($total_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($total_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                                </td>
                            </tr>



                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="2">ပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum('allowed_qty') + $first_payscales->sum('allowed_qty')) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count() + $kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count() + $kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                    ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                    ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                    ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                    ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                    ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $head_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $head_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $head_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $head_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $total_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $total_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                                <td class="border border-black p-2 font-semibold">
                                    {{ en2mm(
                                        $total_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                        +
                                        $total_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                        ) }}
                                </td>
                            </tr>

                            {{-- @foreach ($third_payscales as $payscale)
                            <tr>
                                <td class="border border-black p-2"></td>
                                <td class="border border-black p-2">{{$payscale->name}}</td>
                                <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="border border-black p-2">{{en2mm($kachin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($kachin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($kayah_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($kayah_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($kayin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($kayin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($chin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($chin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mon_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mon_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($rakhine_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($rakhine_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($shan_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($shan_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($sagaing_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($sagaing_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mdy_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mdy_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($npt_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($npt_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($ygn_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($ygn_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($head_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($head_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mag_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($mag_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($pagu_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($pagu_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($tnty_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($tnty_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($aya_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($aya_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($total_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black p-2">{{en2mm($total_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                            </tr>
                        @endforeach --}}
                        <tr>
                            <td class="border border-black p-2 font-semibold" colspan="2">{{$third_payscales[0]->staff_type->name}}</td>
                            <td class="border border-black p-2 font-semibold">{{ en2mm($third_payscales->sum('allowed_qty')) }}</td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($head_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($head_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($total_staffs->where('gender_id', 1)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($total_staffs->where('gender_id', 2)->whereIn('payscale_id', $third_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>



                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
