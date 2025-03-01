<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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

        .container {
            width: 100%;
            margin-bottom: 16px;
        }
        .heading {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        }
        .sub-heading {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        }
        .table-container {
            width: 100%;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            font-weight: bold;
        }
        .note-container {
            display: flex;
            justify-content: flex-start;
            font-weight: bold;
            margin-top: 16px;
        }
        .note-label {
            /* width: 20%; */
            margin-left: 40px;
        }
        /* .note-content {
            width: 60%;
        } */

        .table_height{
            padding-bottom: 70px;
            vertical-align: top;
        }
    </style>
</head>
<body>
    <page size="A4">
        <div class="container">
            <h1 >ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
            <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>

            <div class="table-container">

            <table>
            <thead>
                <tr>
                    <th rowspan="2">စဉ်</th>
                    <th rowspan="2">ဦးစီးဌာန</th>
                    <th colspan="3">အမြဲတမ်းအတွင်းဝန်/<br>ညွှန်ကြားရေးမှူးချုပ်</th>
                    <th colspan="3">ဒုတိယအမြဲတမ်းအတွင်းဝန်/<br>ဒုတိယညွှန်ကြားရေးမှူးချုပ်</th>
                    <th colspan="3">လက်ထောက်အတွင်းဝန်/<br>ညွှန်ကြားရေးမှူး</th>
                    <th colspan="3">ဒုတိယညွှန်ကြားရေးမှူး</th>
                    <th colspan="3">လက်ထောက်<br>ညွှန်ကြားရေးမှူး</th>
                    <th colspan="3">ဦးစီးအရာရှိ</th>
                    <th colspan="3">အရာရှိပေါင်း</th>
                    <th colspan="3">အမှုထမ်းပေါင်း</th>
                    <th colspan="3">စုစုပေါင်း</th>
                </tr>
                <tr>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်အပ်</th>
                    <th>ပို/လို</th>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်အပ်</th>
                    <th>ပို/လို</th>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်အပ်</th>
                    <th>ပို/လို</th>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်အပ်</th>
                    <th>ပို/လို</th>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်အပ်</th>
                    <th>ပို/လို</th>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်အပ်</th>
                    <th>ပို/လို</th>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်အပ်</th>
                    <th>ပို/လို</th>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်အပ်</th>
                    <th>ပို/လို</th>
                    <th>ခွင့်ပြု</th>
                    <th>ခန့်အပ်</th>
                    <th>ပို/လို</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table_height">၁</td>
                    <td class="table_height">ရင်းနှီးမြှပ်နှံမှုနှင့်<br>ကုမ္ပဏီများ<br>ညွှန်ကြားမှုဦးစီးဌာန</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty - ($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty - ($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty - ($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty - ($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty - ($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty - ($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                    <td class="table_height">{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                    <td class="table_height">{{ en2mm($first_ranks->sum('staffs_count')) }}</td>
                    <td class="table_height">{{ en2mm(($first_ranks->sum('allowed_qty')) - $first_ranks->sum('staffs_count')) }}</td>
                    <td class="table_height">{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                    <td class="table_height">{{ en2mm($second_ranks->sum('staffs_count')) }}</td>
                    <td class="table_height">{{ en2mm(($second_ranks->sum('allowed_qty')) - $second_ranks->sum('staffs_count')) }}</td>
                    <td class="table_height">{{ en2mm($all_ranks->sum('allowed_qty')) }}</td>
                    <td class="table_height">{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                    <td class="table_height">{{ en2mm(($all_ranks->sum('allowed_qty')) - $all_ranks->sum('staffs_count')) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>စုစုပေါင်း</td>
                    <td>{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty - ($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty - ($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty - ($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty - ($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty - ($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty - ($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                    <td>{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($first_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm(($first_ranks->sum('allowed_qty')) - $first_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($second_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm(($second_ranks->sum('allowed_qty')) - $second_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm($all_ranks->sum('allowed_qty')) }}</td>
                    <td>{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                    <td>{{ en2mm(($all_ranks->sum('allowed_qty')) - $all_ranks->sum('staffs_count')) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
