<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style type="text/css">
        page{
            background: white;
        }

        /* page[size="A4"] {
            width: 210mm;
            height: 297mm;
        } */
        page[size="A4 landscape"] {
            width: 800mm;
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

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            background-color: #f0f0f0;
        }

        .title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .letter_head_1{
            position: fixed;
            top: 0;
            width: 100%;
            text-align: center;
            padding: 5px;
        }
        .letter_head_2{
            position: fixed;
            right: 0;
            width: 100%; 
            text-align: right; 
            padding-bottom: 0;
        }
        .letter_footer{
            position: fixed; 
            bottom: 0; 
            width: 100%; 
            text-align: center; 
            padding: 10px;
        }
        .slide_right{
            text-align: right;
        }
    </style>
</head>
<body>
    {{-- <page size="A4"> --}}
        <page size="A4 landscape">
        <div class="container">
            <div class="letter_head_1">ကန့်သတ်<br>
                ၂
            </div>
            <div class="content">
                <div class="inner-content">
                    <div class="title">ဝန်ကြီးဌာန၊ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</div>
                    <div class="title">ဦးစီးဌာန ၊ ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</div>
                    <div  class="letter_head_2">ခွင့်ပြု</div>
                    {{-- <div class="title"></div> --}}
                    <table>
                        <thead>
                            <tr>
                                <th>အမှတ်စဉ်</th>
                                <th>လစာနှုန်း (ကျပ်)</th>
                                <th>ခွင့်ပြုအင်အား</th>
                                <th>ကချင်</th>
                                <th>ကယား</th>
                                <th>ကရင်</th>
                                <th>ချင်း</th>
                                <th>မွန်</th>
                                <th>ရခိုင်</th>
                                <th>ရှမ်း</th>
                                <th>စစ်ကိုင်း</th>
                                <th>မန္တလေး</th>
                                <th>နေပြည်တော်</th>
                                <th>ရန်ကုန်</th>
                                <th>ရန်ကုန်ရုံးချုပ်</th>
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
                                <td>{{en2mm(++$count)}}</td>
                                <td>{{$payscale->name}}</td>
                                <td class="slide_right">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="slide_right">{{en2mm($kachin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($kayah_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($kayin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($chin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($mon_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($rakhine_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($shan_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($sagaing_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($mdy_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($npt_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($ygn_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($head_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($mag_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($tnty_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($aya_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($total_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">{{$first_payscales[0]->staff_type->name}}ပေါင်း</td>
                            
                            <td class="slide_right">{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                            <td class="slide_right">
                                {{ en2mm($kachin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($kayah_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($kayin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($head_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($total_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>

                        @foreach ($second_payscales as $payscale)
                            <tr>
                                <td>{{en2mm(++$count)}}</td>
                                <td>{{$payscale->name}}</td>
                                <td class="slide_right">{{en2mm($payscale->allowed_qty)}}</td>
                                <td class="slide_right">{{en2mm($kachin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($kayah_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($kayin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($chin_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($mon_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($rakhine_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($shan_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($sagaing_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($mdy_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($npt_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($ygn_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($head_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($mag_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($pagu_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($tnty_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($aya_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                                <td class="slide_right">{{en2mm($total_staffs->where('payscale_id', $payscale->id)->count())}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">{{$second_payscales[0]->staff_type->name}}ပေါင်း</td>
                            <td class="slide_right">{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                            <td class="slide_right">
                                {{ en2mm($kachin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($kayah_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($kayin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($head_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td class="slide_right">
                                {{ en2mm($total_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="border border-black p-2 font-semibold" colspan="2">
                              ပေါင်း
                            </td>

                            <td style="text-align:right;">{{ en2mm( $first_payscales->sum('allowed_qty') +  $second_payscales->sum('allowed_qty')) }}</td>
                            <td style="text-align:right;">
                                {{ en2mm(
                                    $kachin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kachin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                    ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm(
                                    $kayah_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                    +
                                    $kayah_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()

                                    ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm(
                                    $kayin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count() + 
                                    $kayin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()

                                    ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($chin_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $chin_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($mon_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $mon_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($rakhine_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $rakhine_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($shan_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $shan_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($sagaing_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $sagaing_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($mdy_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $mdy_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($npt_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $npt_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($ygn_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $ygn_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($head_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $head_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($mag_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $mag_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($pagu_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $pagu_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($tnty_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $tnty_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
                                {{ en2mm($aya_staffs->whereIn('payscale_id', $second_payscales->pluck('id'))->count()
                                +
                                $aya_staffs->whereIn('payscale_id', $first_payscales->pluck('id'))->count()
                                ) }}
                            </td>
                            <td style="text-align:right;">
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

        <div class="letter_footer">
            ကန့်သတ်
        </div>
        
    </body>
</html>
