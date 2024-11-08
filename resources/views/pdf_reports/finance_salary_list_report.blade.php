<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Finance Salary List</title>
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
        .container {
            display: flex;
            justify-content: center;
            width: 100%;
            height: 83vh;
            overflow-y: auto;
        }
        .content {
            width: 100%;
            padding: 16px;
            box-sizing: border-box;
        }

        .title {
            font-weight: bold;
            text-align: center;
            font-size: 14px;
            margin-bottom: 12px;
        }
        input[type="number"] {
            display: block;
            margin: 0 auto;
            padding: 4px;
            font-size: 14px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        th[rowspan="2"] {
            vertical-align: middle;
        }
        td.text-left {
            text-align: left;
            padding: 4px;
        }
    </style>
</head>
<body>
    <page size="A4">
       
        <div class="container">
            <div class="content">
                <h2 class="title">{{ $startYr }} - {{ $endYr }} ဘဏ္ဍာရေးနှစ်အတွက် လစာငွေထုတ်ယူမည့် စာရင်း</h2>
                <input type="number" min="2005" step="1" wire:model.live="endYr" />
                <table>
                    <thead>
                        <tr>
                            <th rowspan="2">စဥ်</th>
                            <th rowspan="2">လအမည်</th>
                            <th rowspan="2">လက်ရှိလစာနှုန်း</th>
                            <th rowspan="2">ထောက်ပံ့ကြေး</th>
                            <th rowspan="2">အသက်အာမခံ<br>ဖြတ်တောက်ငွေ</th>
                            <th colspan="2">ခွင့်</th>
                            <th rowspan="2">ဝင်‌ငွေခွန်<br>ဖြတ်တောက်ငွေ</th>
                            <th rowspan="2">၂လစာချေးငွေ</th>
                            <th rowspan="2">အသားတင် လစာ</th>
                            <th rowspan="2">မှတ်ချက်</th>
                        </tr>
                        <tr>
                            <th>လုပ်သက်ခွင့်</th>
                            <th>လစာမဲ့ခွင့်</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp
                        @foreach ([$startYr, $endYr] as $year)
                            @foreach (financeYear()[$loop->index] as $month)
                                <tr>
                                    <td>{{ en2mm(++$count) }}</td>
                                    <td>{{ en2mm($month) . '/' . en2mm($year) }}</td>
                                    <td>{{ en2mm(getSalary($month, $year)) }}</td>
                                    <td>{{ en2mm(getAddition($month, $year)) }}</td>
                                    <td>{{ en2mm(getDeductionInsurance($month, $year)) }}</td>
                                    <td>{{ en2mm(getLeveTypeone($month, $year)) }}</td>
                                    <td>{{ en2mm(getLeveTypeTwo($month, $year)) }}</td>
                                    <td class="text-left">{{ en2mm(getDeductionTax($month, $year)) }}</td>
                                    <td class="text-left">{{ en2mm(get2monthDeduction($month, $year)) }}</td>
                                    <td class="text-left">{{ en2mm(getNetActualSalary($month, $year)) }}</td>
                                    <td class="text-left"></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
    </page>
</body>
</html>
