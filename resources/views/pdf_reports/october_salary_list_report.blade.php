<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>October Salary List</title>
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
        <h1 class="mb-4">ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>ဦးရဲမင်းသူ ( ဒုတိယဦးစီးမှူး ) ...၏...<br>......မတ်လ အတွက် လစာစာရင်းညှိနှုင်းခြင်း။ ...</h1>

    <table class="table-container">
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
                <th class="text-left">ပြား</th>
                <th></th>
                <th class="text-right">ကျပ်</th>
                <th class="text-right">ပြား</th>
                <th class="text-right">ကျပ်</th>
                <th class="text-right">ပြား</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>၁</td>
                <td class="border border-black text-left p-2">
                    <br>
                    {{ en2mm($startDateOfMonth) }} မှ {{ en2mm($incrementedDate->subDay()->toDateString()) }} ထိ
                    {{ en2mm($diffDaysFromStart) }} ရက်  
                     @php 
                        $incrementedDate->addDay();
                    @endphp 
                </td>
                <td>
                    {{ en2mm($lastActualSalary) }}
                </td>
                <td>
                    {{ en2mm(floor($salaryRatePerDayBeforeIncrement)) }}
                </td>
                <td>
                    {{ en2mm(($salaryRatePerDayBeforeIncrement - floor($salaryRatePerDayBeforeIncrement)) * 100) }}
                </td>
                <td></td>
                <td>
                    {{ en2mm($lastActualSalary) }}
                </td>
                <td></td>
                <td>{{ en2mm(floor($totalPaidAfterIncrement - $salaryRatePerDayBeforeIncrement)) }}</td>
                <td>{{ en2mm(($totalPaidAfterIncrement - floor($totalPaidAfterIncrement)) - ($salaryRatePerDayBeforeIncrement - floor($salaryRatePerDayBeforeIncrement))) }}</td>
            </tr>
            <tr>
                <td>၂ </td>
                <td>{{ en2mm($incrementedDate->toDateString()) }} မှ {{ en2mm($monthEnd) }} ထိ</td>
                <td>{{ en2mm($staff?->current_salary) }}</td>
                <td>{{ en2mm(floor($totalPaidAfterIncrement)) }}</td>
                <td>{{ en2mm($totalPaidAfterIncrement - floor($totalPaidAfterIncrement)) }}</td>
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

