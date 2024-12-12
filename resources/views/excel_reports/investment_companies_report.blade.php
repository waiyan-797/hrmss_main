

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

     

        <div class="container">
            <div class="content">
                <table class="tabletitle">
                    <tr>
                        <th colspan="20" rowspan="2">
                            ဝန်ကြီးဌာန၊ ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>
                            ဦးစီးဌာန ၊ ရင်းနှီးမြှုပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                            ခွင့်ပြု
                        </th>
                    </tr>
                </table>
                <div class="inner-content">
                    {{-- <div class="title">ဦးစီးဌာန ၊ ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</div> --}}

                    <table>
                        <thead>
                            <tr>
                                <th>အမှတ်စဥ်</th>
                                <th>လစာနှုန်း (ကျပ်)</th>
                                <th>ခွင့်ပြု<br>အင်အား</th>
                                <th>ကချင်</th>
                                <th>ကယား</th>
                                <th>ကရင်</th>
                                <th>ချင်း</th>
                                <th>မွန်</th>
                                <th>ရခိုင်</th>
                                <th>ရှမ်း</th>
                                <th>စစ်ကိုင်း</th>
                                <th>မန္တလေး</th>
                                <th>နေပြည်<br>တော်</th>
                                <th>ရန်ကုန်</th>
                                <th>ရန်ကုန်<br>ရုံးချုပ်</th>
                                <th>မကွေး</th>
                                <th>ပဲခူး</th>
                                <th>တနင်္သာရီ</th>
                                <th>ဧရာဝတီ</th>
                                <th>စုစုပေါင်း</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td>၁</td>
                                <td>၂</td>
                                <td class="slide_right">၃</td>
                                <td class="slide_right">၄</td>
                                <td class="slide_right">၅</td>
                                <td class="slide_right">၆</td>
                                <td class="slide_right">၇</td>
                                <td class="slide_right">၈</td>
                                <td class="slide_right">၉</td>
                                <td class="slide_right">၁၀</td>
                                <td class="slide_right">၁၁</td>
                                <td class="slide_right">၁၂</td>
                                <td class="slide_right">၁၃</td>
                                <td class="slide_right">၁၄</td>
                                <td class="slide_right">၁၅</td>
                                <td class="slide_right">၁၆</td>
                                <td class="slide_right">၁၇</td>
                                <td class="slide_right">၁၈</td>
                                <td class="slide_right">၁၉</td>
                                <td class="slide_right">၂၀</td>
                            </tr>

                            @foreach ($first_payscales as $payscale)
                            <tr>
                                <td class="border border-black p-2">{{en2mm(++$count)}}</td>
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
                            <td class="border border-black p-2 font-semibold"></td>
                            <td style="font-weight:bold;">{{$first_payscales[0]->staff_type->name}}ပေါင်း</td>
                            
                            <td>{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                            <td>
                                {{ en2mm($kachin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayah_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($head_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($total_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>

                        @foreach ($second_payscales as $payscale)
                            <tr>
                                <td class="border border-black p-2">{{en2mm(++$count)}}</td>
                                <td class="border border-black p-2">{{$payscale->name}}</td>
                                <td class="border border-black p-2 text-center">{{en2mm($payscale->allowed_qty)}}</td>
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
                            <td class="border border-black p-2 font-semibold"></td>
                            <td >{{$second_payscales[0]->staff_type->name}}ပေါင်း</td>
                            <td>{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                            <td>
                                {{ en2mm($kachin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayah_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($head_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
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
                            <td class="border border-black p-2 font-semibold"></td>
                            <td class="border border-black p-2 font-semibold" >
                              ပေါင်း
                            </td>

                            <td class="border border-black p-2 font-semibold">{{ en2mm( $first_payscales->sum('allowed_qty') +  $second_payscales->sum('allowed_qty')) }}</td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm(
                                    $kachin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kachin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                    ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm(
                                    $kayah_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kayah_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()

                                    ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm(
                                    $kayin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count() + 
                                    $kayin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()

                                    ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $chin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $mon_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $rakhine_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $shan_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $sagaing_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $mdy_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $npt_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $ygn_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($head_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $head_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $mag_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $pagu_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $tnty_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $aya_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td class="border border-black p-2 font-semibold">
                                {{ en2mm($total_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $total_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>



                        </tr>

                        
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
   