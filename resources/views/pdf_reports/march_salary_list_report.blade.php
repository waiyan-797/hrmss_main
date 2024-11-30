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
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }
        h1 {
            font-weight: bold;
            text-align: center;
            font-size: 0.875rem;
            margin-bottom: 1rem; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem; 
        }
        th, td {
            border: 1px solid black;
            padding: 0.5rem;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
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
        .form-group {
            margin-bottom: 1rem;
        }
        select, input[type="month"] {
            padding: 0.5rem;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <page size="A4">
        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
            {{$staff?->gender_id == 1 ? "ဦိး" : "ဒေါ်"}} {{$staff?->name}} ({{$staff?->currentRank->name}}) ၏<br>
            {{mmDateFormat($year, $month)}} လစာစာရင်းညှိနှုင်းခြင်း။
        </h1>
        
        <div class="form-group">
            <select wire:model.live='staff_id'>
                @foreach ($staffs as $staff)
                    <option value="{{$staff->id}}">
                        {{$staff->gender_id == 1 ? "ဦိး" : "ဒေါ်"}} {{$staff->name}}
                    </option>
                @endforeach
            </select>
            <input type="month" wire:model.live='monthsSelect'>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">လစာထုတ်ယူသည့် လ/နှစ်</th>
                    <th rowspan="2">ထုတ်ယူရမည့်<br>လစာနှုန်း</th>
                    <th colspan="2">ထုတ်ပေးရမည့်<br>လစာနှုန်း</th>
                    <th>ထုတ်ယူခဲ့ပြီး<br>လစာနှုန်း</th>
                    <th colspan="2">ထုတ်ယူပြီး<br>လစာငွေ</th>
                    <th colspan="2">ခြားနားလစာငွေ</th>
                </tr>
                <tr>
                    <th>ကျပ်</th>
                    <th>ပြား</th>
                    <th></th>
                    <th>ကျပ်</th>
                    <th>ပြား</th>
                    <th>ကျပ်</th>
                    <th>ပြား</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPaid = $totalPaidBeforePromotons + $totalPaidAfterPromotion;
                    $integerPart = floor($totalPaid);
                    $decimalPart = $totalPaid - $integerPart;
                @endphp
                <tr>
                    <td>၁</td>
                    <td class="text-left">
                        ၁-{{ en2mm(explode('-', $monthsSelect)[1]) }}-{{ en2mm(explode('-', $monthsSelect)[0]) }}<br> မှ
                        @if($promotionDate)
                            {{ en2mm(explode('-', $promotionDate)[2]) }}-{{ en2mm(explode('-', $promotionDate)[1]) }}-{{ en2mm(explode('-', $promotionDate)[0]) }}<br>
                            {{ en2mm($dayPaidSalaryBeforePromotions) }} ရက်
                        @endif
                    </td>
                    <td class="text-right">{{en2mm($lastActualSalary)}}</td>
                    <td class="text-right">{{en2mm(floor($totalPaidBeforePromotons))}}</td>
                    <td class="text-right">{{en2mm($totalPaidBeforePromotons - floor($totalPaidBeforePromotons))}}</td>
                    <td class="text-right"></td>
                    <td class="text-right">{{en2mm(floor($lastActualSalary))}}</td>
                    <td class="text-right">{{en2mm($lastActualSalary - floor($lastActualSalary))}}</td>
                    <td class="text-right">{{en2mm(floor($totalPaid - $totalPaidBeforePromotons))}}</td>
                    <td class="text-right">{{en2mm(-floor($totalPaid - $totalPaidBeforePromotons) + ($totalPaid - $totalPaidBeforePromotons))}}</td>
                </tr>
                <tr>
                    <td>၂</td>
                    <td class="text-left">
                        @if($promotionDate)
                            {{ en2mm(explode('-', $promotionDate)[2]) }}-{{ en2mm(explode('-', $promotionDate)[1]) }}-{{ en2mm(explode('-', $promotionDate)[0]) }}<br> မှ
                            <br> {{ en2mm(explode('-', $lastDay)[2]) }}-{{ en2mm(explode('-', $lastDay)[1]) }}-{{ en2mm(explode('-', $lastDay)[0]) }}<br>ထိ
                            <br> {{ en2mm($dayPaidSalaryAfterPromotions) }} ရက်
                        @endif
                    </td>
                    <td class="text-right">{{en2mm($staff?->current_salary)}}</td>
                    <td class="text-right">{{en2mm(floor($totalPaidAfterPromotion))}}</td>
                    <td class="text-right">{{en2mm($totalPaidAfterPromotion - floor($totalPaidAfterPromotion))}}</td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                </tr>
                <tr class="font-bold">
                    <td>total</td>
                    <td></td>
                    <td></td>
                    <td class="text-right">{{ en2mm($integerPart) }}</td>
                    <td class="text-right">{{ en2mm(sprintf('%.10f', $decimalPart)) }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
    </page>
</body>
</html>

