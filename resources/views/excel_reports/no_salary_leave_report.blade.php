<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Salary List</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <page size="A4">
        <div style="width: 100%;">
            <div style="display: flex; justify-content: center; width: 100%; height: 83vh; overflow-y: auto;">
                <div style="width: 100%; margin: 0 auto; padding: 16px;">
                    <div style="width: 100%; padding: 16px;">
                        <table width="100%" style="border-collapse: collapse; border: none; margin-bottom: 20px;">
                           
                            <tr style="border: none;">
                                <td style="border:none; text-align: center; padding: 0; width: 100%">
                                    <h1 style="color: black; font-weight: 600; font-size: 14px; margin: 0;">ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>လစာမဲ့ ခွင့်လစာ တွက်ချက်မှုဇယား


                                    </h1>
                                </td>
                            </tr>
                        </table>
                        <table style="border: none;">
                            <tbody>
                                @foreach($leaves as $leave)
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;">အမည်</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $leave->staff->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ရာထူး</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $leave->staff->current_rank->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ခွင့်အမျိုးအစား</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $leave->leave_type->name ?? 'N/A' }}</td>
                                </tr>
                               
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ခွင့်ယူသည့်ကာလ</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;"> {{ \Carbon\Carbon::parse($leave->from_date)->format('Y-m-d') }} - {{ \Carbon\Carbon::parse($leave->to_date)->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ရုံးမိန့်</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $leave->order_no }}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ဖြတ်တောက်ရမည့်ခွင့်လစာ=၂၇၅,၀၀၀x(၄/၃၀)ရက်</td>
                                    <td style="border: none;">=</td>
                                    <td style="border: none;">
                                         
                            @php
                                if (!empty($leave->from_date) && !empty($leave->to_date)) {
                                    $fromDate = \Carbon\Carbon::parse($leave->from_date);
                                     $toDate = \Carbon\Carbon::parse($leave->to_date);
                                     $dateDifference = $fromDate->diffInDays($toDate) + 1;  
                                    } else {
                                        $dateDifference = 0;
                                    }
                                    @endphp
                                    {{ $leave->staff->current_salary/30*$dateDifference}}            

                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </page>
</body>
</html>
