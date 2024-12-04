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

        page[size="A4"] {
            width: 210mm;
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
            margin-bottom: 1rem;
        }

        .title {
            font-weight: bold;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .table-container {
            width: 100%;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 0.5rem;
            text-align: center;
        }

        th {
            font-weight: bold;
        }

        thead th {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <page size="A4">
        <div class="container">
            <h1 class="title">ဦးစီးဌာန ၊ ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">စဉ်</th>
                            <th rowspan="2">လစာနှုန်း (ကျပ်)</th>
                            <th rowspan="2">ခန့်ပြီး</th>
                            <th colspan="2">ကချင်</th>
                            <th colspan="2">ကယား</th>
                            <th colspan="2">ကရင်</th>
                            <th colspan="2">ချင်း</th>
                            <th colspan="2">မွန်</th>
                            <th colspan="2">ရခိုင်</th>
                            <th colspan="2">ရှမ်း</th>
                            <th colspan="2">စစ်ကိုင်း</th>
                            <th colspan="2">မန္တလေး</th>
                            <th colspan="2">နေပြည်တော်</th>
                            <th colspan="2">ရန်ကုန်</th>
                            <th colspan="2">ရန်ကုန်ရုံးချုပ်</th>
                            <th colspan="2">မကွေး</th>
                            <th colspan="2">ပဲခူး</th>
                            <th colspan="2">တနင်သာရီ</th>
                            <th colspan="2">ဧရာဝတီ</th>
                            <th colspan="2">စုစုပေါင်း</th>
                        </tr>
                        <tr>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                            <th>ကျား</th>
                            <th>မ</th>
                        </tr>
                    </thead>
                    <tbody class="text-center h-8 p-2">
                        @foreach ($first_payscales as $payscale)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$payscale->name}}</td>
                                <td>{{en2mm($payscale->allowed_qty)}}</td>
                                <td>{{en2mm($kachin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kachin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kayah_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kayah_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kayin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kayin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($chin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($chin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mon_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mon_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($rakhine_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($rakhine_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($shan_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($shan_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($sagaing_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($sagaing_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mdy_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mdy_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($npt_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($npt_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($ygn_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($ygn_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($head_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($head_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mag_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mag_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($pagu_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($pagu_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($tnty_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($tnty_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($aya_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($aya_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($total_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($total_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">{{$first_payscales[0]->staff_type->name}}စုစုပေါင်း</td>
                            <td>{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                            <td>
                                {{ en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($head_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($head_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($total_staffs->where('gender_id', 1)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($total_staffs->where('gender_id', 2)->whereIn('payscale_id', $first_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>

                        @foreach ($second_payscales as $payscale)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$payscale->name}}</td>
                                <td>{{en2mm($payscale->allowed_qty)}}</td>
                                <td>{{en2mm($kachin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kachin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kayah_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kayah_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kayin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($kayin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($chin_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($chin_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mon_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mon_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($rakhine_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($rakhine_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($shan_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($shan_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($sagaing_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($sagaing_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mdy_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mdy_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($npt_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($npt_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($ygn_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($ygn_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($head_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($head_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mag_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($mag_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($pagu_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($pagu_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($tnty_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($tnty_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($aya_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($aya_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($total_staffs->where('gender_id', 1)->where('payscale_id', $payscale->id)->count())}}</td>
                                <td>{{en2mm($total_staffs->where('gender_id', 2)->where('payscale_id', $payscale->id)->count())}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">{{$second_payscales[0]->staff_type->name}}စုစုပေါင်း</td>
                            <td>{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                            <td>
                                {{ en2mm($kachin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kachin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayah_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayah_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($kayin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($chin_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($chin_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mon_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mon_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($rakhine_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($rakhine_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($shan_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($shan_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($sagaing_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($sagaing_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mdy_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mdy_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($npt_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($npt_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($ygn_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($ygn_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($head_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($head_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mag_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($mag_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($pagu_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($pagu_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($tnty_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($tnty_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($aya_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($aya_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($total_staffs->where('gender_id', 1)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                            <td>
                                {{ en2mm($total_staffs->where('gender_id', 2)->whereIn('payscale_id', $second_payscales->pluck('id'))->count()) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>
