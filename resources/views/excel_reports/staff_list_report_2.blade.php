<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Report 2</title>
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
            font-size: 16px;
            margin-bottom: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .p-2 {
            padding: 10px;
        }

        .border-black {
            border-color: black;
        }

        thead tr:first-child th {
            vertical-align: middle;
        }

        tbody td {
            height: 40px;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <table class="md:w-full">
            <thead>
                <tr>
                    <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                    <th rowspan="2" class="border border-black text-center p-2">အမည်/ရာထူး/ဌာန</th>
                    <th class="border border-black text-center p-2">လက်ရှိရာထူး</th>
                    <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                    <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                    <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                    <th class="border border-black text-center p-2">စူစုပေါင်း</th>
                </tr>
                <tr>
                    <th class="border border-black text-center p-2">၁</th>
                    <th class="border border-black text-center p-2">၂</th>
                    <th class="border border-black text-center p-2">၃</th>
                    <th class="border border-black text-center p-2">၄</th>
                    <th class="border border-black text-center p-2">၇</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-black text-center p-2">{{ en2mm(1) }}</td>
                    <td class="border border-black text-center p-2">{{ $staff->name }}</td>
                    <td class="border border-black text-center p-2">{{ $first_promotion ? $first_promotion->rank->name : '' }}</td>
                    <td class="border border-black text-center p-2">{{ $second_promotion ? $second_promotion->rank->name : '' }}</td>
                    <td class="border border-black text-center p-2">{{ $third_promotion ? $third_promotion->rank->name : '' }}</td>
                    <td class="border border-black text-center p-2">{{ $fourth_promotion ? $fourth_promotion->rank->name : '' }}</td>
                    <td class="border border-black text-center p-2"></td>
                </tr>
                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">{{ $staff->currentRank->name }}</td>
                    <td class="border border-black text-center p-2">{{ $first_promotion ? en2mm(formatDMY($first_promotion->promotion_date)) .' မှ '. en2mm(formatDMY($today)) .' ထိ ' : '' }}</td>
                    <td class="border border-black text-center p-2">{{ $second_promotion ? en2mm(formatDMY($second_promotion->promotion_date)) .' မှ '. en2mm(formatDMY(\Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) .' ထိ ' : '' }}</td>
                    <td class="border border-black text-center p-2">{{ $third_promotion ? en2mm(formatDMY($third_promotion->promotion_date)) .' မှ '. en2mm(formatDMY(\Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) .' ထိ ' : '' }}</td>
                    <td class="border border-black text-center p-2">{{ $fourth_promotion ? en2mm(formatDMY($fourth_promotion->promotion_date)) .' မှ '. en2mm(formatDMY(\Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) .' ထိ ' : '' }}</td>
                    <td class="border border-black text-center p-2"></td>
                </tr>
                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">{{ $staff->current_department->name }}</td>
                    <td class="border border-black text-center p-2">{{ $first_promotion ? dateDiffYMD($first_promotion->promotion_date, $today) : '' }}</td>
                    <td class="border border-black text-center p-2">{{ $second_promotion ? dateDiffYMD($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay()) : '' }}</td>
                    <td class="border border-black text-center p-2">{{ $third_promotion ? dateDiffYMD($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay()) : '' }}</td>
                    <td class="border border-black text-center p-2">{{ $fourth_promotion ? dateDiffYMD($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay()) : '' }}</td>
                    <td class="border border-black text-center p-2"></td>
                </tr>
                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">{{ en2mm($first_promotion_points) }}</td>
                    <td class="border border-black text-center p-2">{{ en2mm($second_promotion_points) }}</td>
                    <td class="border border-black text-center p-2">{{ en2mm($third_promotion_points) }}</td>
                    <td class="border border-black text-center p-2">{{ en2mm($fourth_promotion_points) }}</td>
                    <td class="border border-black text-center p-2">{{ en2mm($total_points) }}</td>
                </tr>
            </tbody>
        </table>
    </page>
</body>
</html>
