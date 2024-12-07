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
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f3f4f6;
}

.page-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

.page {
    width: 8.5in; 
    height: 14in; 
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    border: 1px solid #ccc;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th[rowspan="2"] {
            vertical-align: middle;
        }
        th[colspan="3"] {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        thead th {
            padding: 12px;
        }
        tbody td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <page size="A4">
        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">ဦစီးဌာန</th>
                    <th colspan="3">အမြဲတမ်းအတွင်းဝန်/<br>ညွှန်ကြားရေးမှူးချုပ်</th>
                    <th colspan="3">ဒုတိယအမြဲတမ်းအတွင်းဝန်/<br>ဒုတိယညွှန်ကြားရေးမှူးချုပ်</th>
                    <th colspan="3">လက်ထောက်အတွင်းဝန်/<br>ညွှန်ကြားရေးမှူး</th>
                    <th colspan="3">ဒုတိယညွှန်ကြားရေးမှူး</th>
                    <th colspan="3">လက်ထောက်<br>ညွှန်ကြားရေးမှူး</th>
                    <th colspan="3">ဦးစီးအရာရှိ</th>
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
                    <td>၁</td>
                    <td>ရင်းနှီးမြှပ်နှံမှုနှင့်<br>ကုမ္ပဏီများ<br>ညွှန်ကြားမှုဦးစီးဌာန</td>
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
</body>
</html>
