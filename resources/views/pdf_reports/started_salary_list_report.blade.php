s<!DOCTYPE html>
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
                                    <h1 style="color: black; font-weight: 600; font-size: 14px; margin: 0;">ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>စတင်ခန့်ထားသည့်ဝန်ထမ်းများ၏လစာတွက်ချက်မှု

                                    </h1>
                                </td>
                            </tr>
                        </table>
                        <table style="border: none;">
                            <tbody>
                                @foreach($staffs as $staff)
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;">အမည်</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;">{{ $staff->name}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ရာထူး</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->current_rank->name}}</td>
                                </tr>
                               
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">စတင်ထမ်းဆောင်သည့်နေ့</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">{{ $staff->join_date}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ရုံးမိန့်</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">၃၈/၂၀၂၄</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ဖေဖော်ဝါရီလ လစာ</td>
                                    <td style="border: none;">=</td>
                                    <td style="border: none;">{{ en2mm($staff->current_salary*(25/29))}}</td>
                                </tr>
                                @foreach($salaries as $salary)
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ဖေဖော်ဝါရီလ အပိုထောက်ပံ့ငွေ</td>
                                    <td style="border: none;">=</td>
                                    <td style="border: none;">{{ en2mm($salary->addition)}}</td>
                                </tr>
                                @endforeach
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
