<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>March Salary List</title>
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
            font-family: 'tharlon';
            font-size: 13px;
        }
        h1 {
            font-weight: bold;
            text-align: center;
            font-size: 14px;
            margin-bottom: 16px;
        }

        .table-container {
            width: 100%;
            margin: 0 auto;
            font-size: 12px;
            border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .table-container th {
            font-weight: bold;
        }

        .table-container th[rowspan="2"] {
            vertical-align: middle;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        
       
    </style>
</head>
<body>
    <page size="A4">
        <h1 class="font-bold text-center text-sm mb-4">ရင်းနှီးမြှပ်နှံမှုနှင့်
            ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br> {{$staff?->gender_id ==  1 ? "ဦိး" : "ဒေါ်" }}    {{$staff?->name}}( {{$staff?->currentRank->name}} )  ၏<br> {{mmDateFormat($year, $month)}}
            လစာစာရင်းညှိနှုင်းခြင်း။ ...</h1>
            

    
            <table class="md:w-full text-sm">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာထုတ်ယူသည့် လ/နှစ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ထုတ်ယူရမည့်<br>လစာနှုန်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ထုတ်ပေးရမည့်<br>လစာနှုန်း</th>
                        <th class="border border-black text-center p-2">ထုတ်ယူခဲ့ပြီး<br>လစာနှုန်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ထုတ်ယူပြီး<br>လစာငွေ</th>
                        <th colspan="2" class="border border-black text-center p-2">ခြားနားလစာငွေ</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-left p-2">ပြား</th>
                        <th class="border border-black text-right p-2"></th>
                        <th class="border border-black text-right p-2">ကျပ်</th>
                        <th class="border border-black text-right p-2">ပြား</th>
                        <th class="border border-black text-right p-2">ကျပ်</th>
                        <th class="border border-black text-right p-2">ပြား</th>
                    </tr>
                </thead>

                @php
                // Calculate total values
                $totalPaid = $totalPaidBeforePromotons + $totalPaidAfterPromotion;
            
                // Get the integer and decimal parts
                $integerPart = floor($totalPaid);
                $decimalPart = $totalPaid - $integerPart;
            @endphp
            
                <tbody>
                    <tr>
                        <td class="border border-black text-right p-2">၁</td>
                            {{-- လစာထုတ်ယူသည့် လ/နှစ် --}}

                        <td class="border border-black text-left p-2">
                            ၁-{{ en2mm(explode('-', $monthsSelect)[1]) }}-{{ en2mm(explode('-', $monthsSelect)[0]) }}
                            <br> မှ
                            @if($promotionDate)
                                {{ en2mm(explode('-', $promotionDate)[2]) }}-{{ en2mm(explode('-', $promotionDate)[1]) }}-{{ en2mm(explode('-', $promotionDate)[0]) }}
                                <br> {{ en2mm($dayPaidSalaryBeforePromotions) }} ရက်
                            @endif
                        </td>
                        <td class="border border-black text-right p-2">
                            
                            {{$lastActualSalary}}
                        </td>
                        <td class="border border-black text-right p-2">{{floor($totalPaidBeforePromotons)  }}</td>
                        <td class="border border-black text-right p-2">{{$totalPaidBeforePromotons - floor($totalPaidBeforePromotons)  }}</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">
                            
                            {{floor($lastActualSalary)}}
                        </td>
                        <td class="border border-black text-right p-2">{{$lastActualSalary - floor($lastActualSalary)  }}</td>  
                        <td class="border border-black text-right p-2">{{  floor($totalPaid - $totalPaidBeforePromotons)  }}</td>
                        <td class="border border-black text-right p-2">{{ -floor( $totalPaid - $totalPaidBeforePromotons ) + ( $totalPaid - $totalPaidBeforePromotons )  }}</td>                    </tr>

                    <tr>
                        <td class="border border-black text-right p-2">၂</td>
                        <td class="border border-black text-left p-2">
                            @if($promotionDate)
                                {{ en2mm(explode('-', ++$promotionDate)[2]) }}-{{ en2mm(explode('-', $promotionDate)[1]) }}-{{ en2mm(explode('-', $promotionDate)[0]) }}
                                <br> မှ
                                <br> {{ en2mm(explode('-', $lastDay)[2]) }}-{{ en2mm(explode('-', $lastDay)[1]) }}-{{ en2mm(explode('-', $lastDay)[0]) }}
                                <br>ထိ
                                <br> {{ en2mm($dayPaidSalaryAfterPromotions) }} ရက်
                            @endif
                        </td>
                        <td class="border border-black text-right p-2">{{$staff?->current_salary}}</td>
                        <td class="border border-black text-right p-2">{{floor($totalPaidAfterPromotion)}}</td>
                        <td class="border border-black text-right p-2">{{$totalPaidAfterPromotion - floor($totalPaidAfterPromotion)}}</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>

                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                      
                    </tr>
                    <tr class="font-bold">
                        <td class="border border-black text-right p-2">total </td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>

                        @php
    // Calculate total values
    $totalPaid = $totalPaidBeforePromotons + $totalPaidAfterPromotion;

    // Get the integer and decimal parts
    $integerPart = floor($totalPaid);
    $decimalPart = $totalPaid - $integerPart;
@endphp

<td class="border border-black text-right p-2">
    {{ $integerPart }}
</td>
<td class="border border-black text-right p-2">
    {{ sprintf('%.10f', $decimalPart) }} 
</td>

                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">

                           
                        </td>
                        <td class="border border-black text-right p-2"></td>
                    </tr>
                </tbody>
            </table>
    </page>
</body>
</html>

