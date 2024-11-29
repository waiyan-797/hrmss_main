<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Report 3</title>
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
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th[rowspan="2"] {
            vertical-align: middle;
        }

        th[colspan="2"] {
            text-align: center;
        }

        th, td {
            vertical-align: middle;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <h1>Report - 4</h1>

    <table>
        <thead>
            <tr>
                <th rowspan="2">စဥ်</th>
                <th rowspan="2">အမည်</th>
                <th rowspan="2">ရာထူး</th>
                <th rowspan="2">ရရှိသောဒီပလိုမာ/ဘွဲ့</th>
                <th rowspan="2">ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲ</th>
                <th colspan="2">သွားရောက်သည့်ကာလ</th>
                <th rowspan="2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ</th>
                <th colspan="2">သွားရောက်သည့်ကာလ</th>
            </tr>
            <tr>
                <th>မှ</th>
                <th>ထိ</th>
                <th>မှ</th>
                <th>ထိ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
                @php
                    // Get the max number of rows needed (either from trainings or abroads)
                    $maxRows = max($staff->trainings->count(), $staff->abroads->count());
                @endphp
        
                @for($i = 0; $i < $maxRows; $i++)
                <tr>
                    @if($i == 0)
                        <!-- Merge the first three columns for each staff -->
                        <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $loop->index + 1 }}</td>
                        <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $staff->name }}</td>
                        <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $staff->current_rank->name }}</td>
                    @endif
        
                    <!-- Training information -->
                    @if(isset($staff->trainings[$i]))
                        <td class="border border-black text-center p-2">{{ $staff->trainings[$i]->diploma_name }}</td>
                        <td class="border border-black text-center p-2">{{ $staff->trainings[$i]->training_type->name }}</td>
                        <td class="border border-black text-center p-2">{{ $staff->trainings[$i]->from_date }}</td>
                        <td class="border border-black text-center p-2">{{ $staff->trainings[$i]->to_date }}</td>
                    @else
                        <!-- Empty cells if no training data -->
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                    @endif
        
                    <!-- Abroad information -->
                    @if(isset($staff->abroads[$i]))
                        <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->particular }}</td>
                        <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->from_date }}</td>
                        <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->to_date }}</td>
                    @else
                        <!-- Empty cells if no abroad data -->
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                    @endif
                </tr>
                @endfor
            @endforeach
        </tbody>
        
    </table>


    </page>
</body>
</html>
