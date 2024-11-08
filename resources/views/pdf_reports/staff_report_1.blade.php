<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 1</title>
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

        h1 {
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
            font-size: 0.875rem;
            font-weight: 500;
            color: #555;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            font-weight: 600;
        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

        .bg-gray {
            background-color: #f2f2f2;
        }


        
    </style>
</head>
<body>
    <page size="A4">
        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>(၂၄-၇-၂၀၂၄)ရက်နေ့ ညွှန်ကြားရေးမှူးများ၏ လက်ရှိဌာနသို့ ရောက်ရှိတာဝန်ထမ်းဆောင်သည့်စာရင်း</h1>

        <div class="table-container">
            <table>
                <thead>
                    <tr class="bg-gray">
                        <th>စဥ်</th>
                        <th>အမည်</th>
                        <th>ရာထူး</th>
                        <th>နိုင်ငံသားစိစစ်ရေးအမှတ်</th>
                        <th>မွေးနေ့သက္ကရာဇ်</th>
                        <th>အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ</th>
                        <th>လက်ရှိအဆင့်ရရက်စွဲ</th>
                        <th>လက်ရှိဌာနရောက်ရှိရက်စွဲ</th>
                        <th>ဌာနခွဲ</th>
                        <th>ပညာအရည်အချင်း</th>
                        <th>ပင်စင်ပြည့်သည့်နေ့စွဲ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                            <tr>
                                <td>{{ $loop->index+1}}
                                </td>
                                <td>{{ $staff->name }}
                                </td>
                                <td>{{ $staff->current_rank?->name }}</td>
                                <td>{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}
                                </td>
                                <td>{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}
                                </td>
                                <td>{{ en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')) }}</td>
                                <td>{{ en2mm(\Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')) }}</td>
                                <td>{{en2mm(Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y'))}}</td>
                                <td>{{ $staff->side_department->name }}</td>
                                <td>@foreach ($staff->staff_educations as $edu)
                                    <div class="mb-2">
                                        <span class="font-semibold">{{ $edu->education_group->name }}</span> -
                                        <span>{{ $edu->education_type->name }}</span>,
                                        <span>{{ $edu->education->name }}</span>
                                    </div>@endforeach</td>
                                <td>{{ en2mm(Carbon\Carbon::parse($staff->dob)->year + $pension_year->year) }}</td>
                            </tr>
                            @endforeach
                </tbody>
            </table>
        </div>
    
    </page>
</body>
</html>
