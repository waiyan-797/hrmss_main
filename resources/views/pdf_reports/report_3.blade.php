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
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 20px;
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
        th[colspan="2"] {
            text-align: center;
        }
        th[rowspan="2"] {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <page size="A4">
        <h1>Report - 3</h1>

    <table>
        <thead>
            <tr>
                <th rowspan="2">စဥ်</th>
                <th rowspan="2">အမည်</th>
                <th rowspan="2">ဝန်ထမ်းအမှတ်</th>
                <th rowspan="2">ရာထူး</th>
                <th rowspan="2">အသက်</th>
                <th rowspan="2">လက်ရှိရာထူးရသောလုပ်သက်</th>
                <th rowspan="2">လုပ်သက်</th>
                <th rowspan="2">ပညာအရည်အချင်း</th>
                <th rowspan="2">ကျား/မ</th>
                <th rowspan="2">လူမျိုး</th>
                <th rowspan="2">ကိုးကွယ်သည့်ဘာသာ</th>
                <th rowspan="2">ယခုနေထိုင်သည့်နေရပ်လိပ်စာ</th>
                <th rowspan="2">အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ</th>
                <th colspan="2">သားသမီးအရေအတွက်</th>
                <th rowspan="2">အိမ်ထောင်</th>
                <th rowspan="2">ကျန်းမာရေးအခြေအနေ</th>
                <th rowspan="2">သွေးအုပ်စု</th>
                <th rowspan="2">အရပ်အမြင့်</th>
                <th rowspan="2">ဝါသနာပါသောအားကစား</th>
                <th rowspan="2">သီးခြားတတ်ကျွမ်းသောဘာသာ</th>
            </tr>
            <tr>
                <th>ကျား</th>
                <th>မ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->staff_no }}</td>
                    <td>{{ $staff->current_rank->name }}</td>
                    <td>{{ Carbon\Carbon::parse($staff->dob)->age }} years</td>
                    <td>{{ en2mm(Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')) }}</td>
                    <td>{{ Carbon\Carbon::parse($staff->current_rank_date)->age }} years</td>
                    <td>
                        @foreach ($staff->staff_educations as $edu)
                            <div class="mb-2">
                                <span class="font-semibold">{{ $edu->education_group->name }}</span> -
                                <span>{{ $edu->education_type->name }}</span>,
                                <span>{{ $edu->education->name }}</span>
                            </div>
                        @endforeach
                    </td>
                    <td>{{ $staff->gender->name }}</td>
                    <td>{{ $staff->ethnic->name }}</td>
                    <td>{{ $staff->religion->name }}</td>
                    <td>{{ $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_district->name.'/'.$staff->current_address_township_or_town->name }}</td>
                    <td>{{ $staff->permanent_address_street.'/'.$staff->permanent_address_ward.'/'.$staff->permanent_address_region->name.'/'.$staff->permanent_address_district->name.'/'.$staff->permanent_address_township_or_town->name }}</td>
                    <td>{{ $staff->children->where('gender_id', 1)->count() }}</td>
                    <td>{{ $staff->children->where('gender_id', 2)->count() }}</td>
                    <td>{{ $staff->spouse_name != null ? 'ရှိ' : 'မရှိ'}}</td>
                    <td>{{ $staff->health_condition }}</td>
                    <td>{{ $staff->blood_type->name }}</td>
                    <td>{{ $staff->height_feet.'/'.$staff->height_inch  }}</td>
                    <td>{{ $staff->habit }}</td>
                    <td>
                        @foreach ($staff->staff_languages as $lang)
                            <div class="mb-2">
                                <span class="font-semibold">{{ $lang->language->name }}</span>
                            </div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </page>
</body>
</html>
