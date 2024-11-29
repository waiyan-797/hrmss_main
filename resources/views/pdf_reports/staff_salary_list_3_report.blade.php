<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Salary List3</title>
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
        .title {
            font-weight: bold;
            text-align: center;
            font-size: 14px;
            margin-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 16px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        
       
    </style>
</head>
<body>
    <page size="A4">
        <h1 class="title">
            နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်<br>ရင်းနှီးမြှပ်နှံမှုနှင့်
            နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏
        </h1>
        <h2 class="title">လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့် အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်<br>ဝန်ထမ်းဦးရေနှင့်
            စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်(၃၁-၅-၂၀၂၄)
        </h2>
    
        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">လစာနှုန်း</th>
                    <th rowspan="2">ရာထူးအဆင့်</th>
                    <th colspan="2">အမြဲတမ်းအတွင်းဝန်<br>ချီးမြှင့်ငွေ</th>
                    <th colspan="2">အခြားချီးမြှင့်ငွေ/စရိတ်</th>
                    <th colspan="2">ရက္ခာစရိတ်</th>
                    <th colspan="2">စုစုပေါင်း</th>
                </tr>
                <tr>
                    <th>ဝန်ထမ်းဦးရေ</th>
                    <th>ချီးမြှင့်ငွေပေါင်း<br>(ကျပ်သန်း)</th>
                    <th>ဝန်ထမ်းဦးရေ</th>
                    <th>ချီးမြှင့်ငွေပေါင်း<br>(ကျပ်သန်း)</th>
                    <th>ဝန်ထမ်းဦးရေ</th>
                    <th>ချီးမြှင့်ငွေပေါင်း<br>(ကျပ်သန်း)</th>
                    <th>ဝန်ထမ်းဦးရေ</th>
                    <th>ချီးမြှင့်ငွေပေါင်း<br>(ကျပ်သန်း)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payscales->where('staff_type_id', 1) as $payscale)
                <tr>
                    <td>{{ en2mm($loop->index + 1) }} </td>
                    <td>{{ en2mm($payscale->name ?? 0) }}</td>
                    <td>{{en2mm($payscale->similiar_rank ?? 0) }}</td>
                    <td>
                        {{ en2mm($payscale->staff_count_addition_education ?? 0) }}</td>
                    <td>{{ en2mm($payscale->addition_education ?? 0) }}
                    </td>
                    <td>{{ en2mm($payscale->staff_count_addition ?? 0) }}
                    </td>
                    <td>{{ en2mm($payscale->addition ?? 0) }}</td>
                    <td>
                        {{ en2mm($payscale->staff_count_addition_ration ?? 0) }}</td>
                    <td>{{ en2mm($payscale->addition_ration ?? 0) }}</td>
                    <td>
                        {{ en2mm($payscale->staff_count_addition_education ?? (0 + $payscale->staff_count_addition ?? (0 + $payscale->staff_count_addition_ration ?? 0))) }}
                    </td>
                    <td>

                        {{ en2mm($payscale->addition_education ?? (0 + $payscale->addition ?? (0 + $payscale->addition_ration ?? 0))) }}

                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>အရာထမ်းပေါင်း</td>
                <td>-</td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_education)) }}
                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_education)) }}
                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_ration)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_ration)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_education) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_ration)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_education) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_ration)) }}

                </td>
            </tr>
            @foreach ($payscales->where('staff_type_id', 2) as $payscale)
                <tr>
                    <td>{{ en2mm($loop->index + 1) }} </td>
                    <td>{{ en2mm($payscale->name ?? 0 )}}</td>
                    <td>{{ en2mm($payscale->similiar_rank ?? 0) }}</td>
                    <td>
                        {{ en2mm($payscale->staff_count_addition_education ?? 0) }}</td>
                    <td>{{ en2mm($payscale->addition_education ?? 0) }}
                    </td>
                    <td>{{ en2mm($payscale->staff_count_addition ?? 0) }}
                    </td>
                    <td>{{ en2mm($payscale->addition ?? 0) }}</td>
                    <td>
                        {{ en2mm($payscale->staff_count_addition_ration ?? 0) }}</td>
                    <td>{{ en2mm($payscale->addition_ration ?? 0) }}</td>
                    <td>
                        {{ en2mm($payscale->staff_count_addition_education ?? (0 + $payscale->staff_count_addition ?? (0 + $payscale->staff_count_addition_ration ?? 0))) }}
                    </td>
                    <td>

                        {{ en2mm($payscale->addition_education ?? (0 + $payscale->addition ?? (0 + $payscale->addition_ration ?? 0))) }}

                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>အမှုထမ်းပေါင်း</td>
                <td>-</td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_education)) }}
                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_education)) }}
                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_ration)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_ration)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_education) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_ration)) }}

                </td>
                <td>
                    {{ en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_education) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_ration)) }}

                </td>
            </tr>
            </tbody>
        </table>
    
        
        <div style="margin-bottom: 16px; font-size: 13px;">
            <table width="100%" style="margin-bottom: 16px; border: none;">
                <tr style="border: none;">
                    <td style="border: none;">
                        <p style="margin: 0; font-size: 13px;">
                           
                        </p>
                    </td>
                </tr>
            </table>
            <table width="100%" style="border: none;">
                <tr>
                    <td width="150px" style="vertical-align: top; border: none;">
                        <table style="border: none; width: 100%; border-collapse: collapse;">
                            <tr>
                                <td style="font-size: 13px; border: none;">လက်မှတ် -</td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; border: none;">အမည် - </td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; border: none;">ရာထူး- </td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; border: none;"> ဆက်သွယ်ရန်ဖုန်း

                                    -</td>
                            </tr>
                        </table>
                    </td>
                  
                </tr>
            </table>
        </div>
        
    </page>
</body>
</html>

