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

        .container {
            width: 100%;
            margin-bottom: 20px;
        }

        h1 {
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #f0f0f0;
        }
        .container {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin-bottom: 16px;
}

.label-empty {
    width: 5%;
}

.label-title {
    width: 33%;
}

.label-equal {
    width: 5%;
}

.label-value {
    width: 60%;
}
.table-container {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            font-size: 14px;
        }

        th {
            background-color: #f3f4f6;
        }

        .empty-row {
            height: 30px; 
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
                                    <h1 style="color: black; font-weight: 600; font-size: 14px; margin: 0;"></h1>
                                </td>
                            </tr>
                        </table>
                        <table style="border: none;">
                            <tbody>
                                <tr>
                                    <td style="border: none; width: 5%;"></td>
                                    <td style="border: none; width: 35%;">အမည်</td>
                                    <td style="border: none; width: 5%;">-</td>
                                    <td style="border: none; width: 55%;"></td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ရာထူး</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">လ/ထညွှန်ကြား‌ရေးမှူး</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ခွင့်အမျိုးအစား</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">ဆေးခွင့်</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ခွင့်ယူသည့်ကာလ</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">၂၅-၂-၂၀၂၄ မှ ၂၄-၃-၂၀၂၄ ခွင့်(၂၉)ရက်</td>
                                </tr>
                                <tr>
                                    <td style="border: none;"></td>
                                    <td style="border: none;">ရုံးမိန့်</td>
                                    <td style="border: none;">-</td>
                                    <td style="border: none;">၃၈/၂၀၂၄</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="container">
                            <div class="header">
                                <h1></h1>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>စဉ်</th>
                                        <th>လ</th>
                                        <th>တာဝန်ချိန်ကာလ</th>
                                        <th>ခွင့်ယူသည့်ကာလ</th>
                                        <th>တာဝန်ချိန်ကာလအတွက် လစာငွေ</th>
                                        <th>မှတ်ချက်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>၁</td>
                                        <td>၂-၂၀၂၃</td>
                                        <td>၁</td>
                                        <td></td>
                                        <td>၃၂၀,၀၀၀.၀၀</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>၂</td>
                                        <td>၃-၂၀၂၃</td>
                                        <td>၁</td>
                                        <td></td>
                                        <td>၃၂၀,၀၀၀.၀၀</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>၃</td>
                                        <td>၄-၂၀၂၃</td>
                                        <td>၁</td>
                                        <td></td>
                                        <td>၃၂၀,၀၀၀.၀၀</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>၉</td>
                                        <td>၉-၂၀၂၃</td>
                                        <td>၂၄/၃၀</td>
                                        <td>၂၅-၉-၂၃မှ ၃၀-၉-၂၃ထိ</td>
                                        <td>၂၅၆,၀၀၀.၀၀</td>
                                        <td>ခွင့်(၆)ရက်</td>
                                    </tr>
                                    <tr>
                                        <td>၁၀</td>
                                        <td>၁၀-၂၀၂၃</td>
                                        <td>၀/၃၁</td>
                                        <td>၁-၁၀-၂၃မှ ၃၁-၁၀-၂၃ထိ</td>
                                        <td>-</td>
                                        <td>ခွင့်(၃၁)ရက်</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>၇+၂၄/၃၀</td>
                                        <td></td>
                                        <td>၂,၄၉၆,၀၀၀.၀၀</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                            <label class="label-empty"></label>
                            <label for="name" class="label-title">ပျှမ်းမျှလစာငွေ</label>
                            <label class="label-equal">=</label>
                            <label for="name" class="label-value">၂,၄၉၆,၀၀၀.၀၀ /၇+၂၄/၃၀=</label>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>၃-၂-၂၀၂၄</th>
                                        <th>၂၄-၂-၂၀၂၃</th>
                                        <th>တာဝန်(၂၄)ရက်</th>
                                        <th>၃၂၀,၀၀၀.၀၀</th>
                                        <th>၂၆၄,၈၂၇.၅၉</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>၅-၂-၂၀၂၄</td>
                                        <td>၂၉-၂-၂၀၂၃</td>
                                        <td>ခွင့် (၂၄)ရက်</td>
                                        <td>၁၆၀,၀၀၀.၀၀</td>
                                        <td>၁၂၃,၈၇၀.၉၇</td>
                                    </tr>
                                    <tr>
                                        <td>၆-၃-၂၀၂၄</td>
                                        <td>၂၄-၃-၂၀၂၃</td>
                                        <td>ခွင့် (၂၄)ရက်</td>
                                        <td>၁၆၀,၀၀၀.၀၀</td>
                                        <td>၁၂၃,၈၇၀.၉၇</td>
                                    </tr>
                                    <tr>
                                        <td>၇-၃-၂၀၂၄</td>
                                        <td>၃၁-၃-၂၀၂၃</td>
                                        <td>တာဝန် (၇)ရက်</td>
                                        <td>၃၂၀,၀၀၀.၀၀</td>
                                        <td>၇၂,၂၅၈.၀၆</td>
                                    </tr>
                                    <tr class="empty-row">
                                        <td colspan="3"></td>
                                        <td>ယခုလ(လစာ‌ငွေ)</td>
                                        <td>၄၈၈,၅၄၂.၈၃</td>
                                    </tr>
                                    <tr class="empty-row">
                                        <td colspan="3"></td>
                                        <td>မူရင်းလစာ</td>
                                        <td>၆၄၀,၀၀၀.၀၀</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="empty-row" colspan="2">ဒုတိယညွှန်ကြားရေးမှူး<br>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</td>
                                        <td class="empty-row"></td>
                                        <td>ခွင့်ဖြတ်ငွေ</td>
                                        <td>၁၅၁.၄၇၅.၁၇</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        
                        
                        
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </page>
</body>
</html>
