

    {{-- <style type="text/css">
        page{
            background: white;
        }

         page[size="A4"] {
            width:297mm;
            height: 297mm;
        } 


        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        }

        body {
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }
        .container {
            width: 100%;
        }

        .header h1 {
            color: white;
            font-weight: bold;
            font-style: italic;
            font-family: Arial, sans-serif;
            background-color: #333;
            padding: 15px;
            margin: 0;
            text-align: center;
        }

        .content {
            display: flex;
            justify-content: center;
            width: 100%;
            height: calc(100vh - 80px);
            overflow-y: auto;
        }

        .inner-content {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .buttons {
            margin-bottom: 20px;
        }

        .buttons button {
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .buttons button:hover {
            background-color: #0056b3;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin-top: 20px;
        }

        th, td {
            /* border: 1px solid black; */
            padding: 10px;
        }

        th {
            background-color: #f0f0f0;
        }

        .title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }

        
    </style> --}}

    
        <div class="">
            <div class="">
                {{-- <table class="tabletitle">
                    <tr>
                        <th colspan="20" rowspan="2" >
                           
                            ဝန်ကြီးဌာန၊ ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>
                            ဦးစီးဌာန ၊ ရင်းနှီးမြှုပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                        </th>
                     
                    </tr>
                </table> --}}
                <table class="">
                    <tr>
                        <th colspan="20">
                            ကန့်သတ်
                        </th>
                    </tr>
                    <tr>
                        <th colspan="20">
                           ၂
                        </th>
                    </tr>
                </table>
                {{-- <tr>
                    <th colspan="20">
                        @php
                        use Carbon\Carbon;
                        @endphp
                        {{formatDMYmm(Carbon::now())}}
                    </th>
                </tr> --}}

                <table class="">
                    <tr>
                        <th colspan="10">
                            ဝန်ကြီးဌာန၊ ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                        </th>
                        <th colspan="10">
                            @php
                            use Carbon\Carbon;
                            @endphp
                            {{formatDMYmm(Carbon::now())}}
                        </th>
                    </tr>
                    <tr>
                        <th colspan="10">
                            ဦးစီးဌာန ၊ ရင်းနှီးမြှုပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                        </th>
                        <th colspan="10">
                            ခွင့်ပြု
                        </th>
                    </tr>
                </table>
                
                <div class="">
                    {{-- <div class="title">ဦးစီးဌာန ၊ ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</div> --}}

                    <table>
                        <thead>
                            <tr>
                                <th style="font-weight:bold;">အ<br>မှတ်<br>စဥ်</th>
                                <th style="font-weight:bold;">လစာနှုန်း (ကျပ်)</th>
                                <th style="font-weight:bold;">ခွင့်ပြု<br>အင်အား</th>
                                <th style="font-weight:bold;">ကချင်</th>
                                <th style="font-weight:bold;">ကယား</th>
                                <th style="font-weight:bold;">ကရင်</th>
                                <th style="font-weight:bold;">ချင်း</th>
                                <th style="font-weight:bold;">မွန်</th>
                                <th style="font-weight:bold;">ရခိုင်</th>
                                <th style="font-weight:bold;">ရှမ်း</th>
                                <th style="font-weight:bold;">စစ်ကိုင်း</th>
                                <th style="font-weight:bold;">မန္တလေး</th>
                                <th style="font-weight:bold;">နေပြည်<br>တော်</th>
                                <th style="font-weight:bold;">ရန်ကုန်</th>
                                <th style="font-weight:bold;">ရန်ကုန်<br>ရုံးချုပ်</th>
                                <th style="font-weight:bold;">မကွေး</th>
                                <th style="font-weight:bold;">ပဲခူး</th>
                                <th style="font-weight:bold;">တနင်္သာရီ</th>
                                <th style="font-weight:bold;">ဧရာဝတီ</th>
                                <th style="font-weight:bold;">စုစုပေါင်း</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td style="font-weight:bold;">၁</td>
                                <td style="font-weight:bold;">၂</td>
                                <td style="font-weight:bold;">၃</td>
                                <td style="font-weight:bold;">၄</td>
                                <td style="font-weight:bold;">၅</td>
                                <td style="font-weight:bold;">၆</td>
                                <td style="font-weight:bold;">၇</td>
                                <td style="font-weight:bold;">၈</td>
                                <td style="font-weight:bold;">၉</td>
                                <td style="font-weight:bold;">၁၀</td>
                                <td style="font-weight:bold;">၁၁</td>
                                <td style="font-weight:bold;">၁၂</td>
                                <td style="font-weight:bold;">၁၃</td>
                                <td style="font-weight:bold;">၁၄</td>
                                <td style="font-weight:bold;">၁၅</td>
                                <td style="font-weight:bold;">၁၆</td>
                                <td style="font-weight:bold;">၁၇</td>
                                <td style="font-weight:bold;">၁၈</td>
                                <td style="font-weight:bold;">၁၉</td>
                                <td style="font-weight:bold;">၂၀</td>
                            </tr>

                            @foreach ($first_payscales as $payscale)
                            <tr>
                                <td class="border border-black ">{{en2mm(++$count)}}</td>
                                <td class="border border-black ">{{$payscale->name}}</td>
                                <td class="border border-black ">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="border border-black ">{{en2mm($kachin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($kayah_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($kayin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($chin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($mon_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($rakhine_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($shan_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($sagaing_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($mdy_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($npt_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($ygn_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($head_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($mag_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($tnty_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($aya_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($total_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-black  font-semibold"></td>
                            <td style="font-weight:bold;">{{$first_payscales[0]->staff_type->name}}ပေါင်း</td>
                            
                            <td style="font-weight:bold;">{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                            <td style="font-weight:bold;">
                                {{ en2mm($kachin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($kayah_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($kayin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($head_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($total_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>

                        @foreach ($second_payscales as $payscale)
                            <tr>
                                <td class="border border-black ">{{en2mm(++$count)}}</td>
                                <td class="border border-black ">{{$payscale->name}}</td>
                                <td class="border border-black  text-center">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="border border-black ">{{en2mm($kachin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($kayah_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($kayin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($chin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($mon_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($rakhine_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($shan_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($sagaing_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($mdy_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($npt_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($ygn_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($head_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($mag_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($tnty_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($aya_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="border border-black ">{{en2mm($total_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border border-black  font-semibold"></td>
                            <td style="font-weight:bold;" >{{$second_payscales[0]->staff_type->name}}ပေါင်း</td>
                            <td style="font-weight:bold;">{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                            <td style="font-weight:bold;">
                                {{ en2mm($kachin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($kayah_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($kayin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($head_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td style="font-weight:bold;">
                                {{ en2mm($total_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>
                        {{-- <tr>
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
                        </tr> --}}
                        <tr>
                            <td class="border border-black  font-semibold"></td>
                            <td class="border border-black  font-semibold" style="font-weight:bold;">
                              ပေါင်း
                            </td>

                            <td style="font-weight:bold;" class="border border-black  font-semibold">{{ en2mm( $first_payscales->sum('allowed_qty') +  $second_payscales->sum('allowed_qty')) }}</td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm(
                                    $kachin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kachin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                    ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm(
                                    $kayah_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kayah_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()

                                    ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm(
                                    $kayin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count() + 
                                    $kayin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()

                                    ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $chin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $mon_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $rakhine_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $shan_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $sagaing_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $mdy_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $npt_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $ygn_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($head_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $head_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $mag_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $pagu_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $tnty_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $aya_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="font-weight:bold;" class="border border-black  font-semibold">
                                {{ en2mm($total_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $total_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>



                        </tr>

                        
                       
                        </tbody>
                    </table>

                    
                </div>
                {{-- <table>
                    <tr>
                        <th colspan="20" rowspan="4">
                            <br>
                            <br>
                            ကန့်သတ်
                            <br>
                        </th>
                    </tr>
                </table> --}}
            </div>
        </div>
   