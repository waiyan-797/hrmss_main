<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Report 3</title>
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
            font-weight: bold;
            text-align: center;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .table-container {
            overflow-x: auto;
            margin: 0 auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px 12px;
            text-align: left;
            font-size: 0.875rem;
            border: 1px solid #ccc;
        }

        thead {
            background-color: #f2f2f2;
        }

        th {
            font-weight: 500;
            color: #555;
        }

        td {
            font-weight: 400;
            color: #666;
        }
    </style>
</head>
<body>
    <page size="A4">
        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br> (၁-၄-၂၀၂၄) ရက်နေ့၏ ဝန်ထမ်းများစာရင်း</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>ရာထူး</th>
                    <th>နိုင်ငံသားစိစစ်ရေးအမှတ်</th>
                    <th>မွေးသက္ကရာဇ်</th>
                    <th>အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ</th>
                    <th>လက်ရှိအဆင့်ရရက်စွဲ</th>
                    <th>ဌာနခွဲ</th>
                    <th>ပညာအရည်အချင်း</th>
                    <th>ပင်စင်ပြည့်သည့်နေ့စွဲ</th>
                    <th>မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ $loop->index + 1 }}</td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ $staff->name }}</td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ $staff->current_rank->name }}</td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ en2mm(Carbon\Carbon::parse($staff->join_date)->format('d-m-y')) }}</td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ en2mm(Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')) }}</td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ $staff->side_department->name }}</td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                            @foreach ($staff->staff_educations as $edu)
                                <div class="mb-2">
                                    <span class="font-semibold">{{ $edu->education_group->name }}</span> -
                                    <span>{{ $edu->education_type->name }}</span>,
                                    <span>{{ $edu->education->name }}</span>
                                </div>
                            @endforeach
                        </td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ en2mm(Carbon\Carbon::parse($staff->dob)->year + $pension_year->year) }}</td>
                        <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </page>
</body>
</html>
