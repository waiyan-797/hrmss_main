<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF Report 15</title>
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
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-center {
            text-align: center;
        }


        
        
    </style>
</head>
<body>
    <page size="A4">
        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>စဥ်</th>
                        <th>အမည်</th>
                        <th>ရာထူး</th>
                        <th>နိုင်ငံသားစိစစ်ရေးအမှတ်</th>
                        <th>ဌာနခွဲ</th>
                        <th>မွေးသက္ကရာဇ်</th>
                        <th>အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ</th>
                        <th>တစ်ဆင့်နိမ့်ရာထူးရရက်စွဲ ရက်၊လ၊နှစ်</th>
                        <th>လက်ရှိရာထူးရရက်စွဲ ရက်၊လ၊နှစ်</th>
                        <th>ပညာအရည်အချင်း</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="text-center">{{ $staff->name }}</td>
                            <td class="text-center">{{ $staff->current_rank->name }}</td>
                            <td class="text-center">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                            <td class="text-center">{{ $staff->side_department->name }}</td>
                            <td class="text-center">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                            <td class="text-center">{{ en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')) }}</td>
                            <td class="text-center">{{ en2mm(Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y')) }}</td>
                            <td class="text-center">{{ en2mm(\Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')) }}</td>
                            <td class="text-center">
                                @foreach ($staff->staff_educations as $edu)
                                    <div>
                                        <span class="font-semibold">{{ $edu->education_group->name }}</span> -
                                        <span>{{ $edu->education_type->name }}</span>,
                                        <span>{{ $edu->education->name }}</span>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
    
    </page>
</body>
</html>
