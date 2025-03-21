<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Report 2</title>
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
            color:#000;
        }
        h1 {
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            margin-bottom: 16px;
        }
        .heading {
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 20px;
}

.table-container {
    overflow-x: auto;
}

.custom-table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ccc;
}

.custom-table th, .custom-table td {
    padding: 10px;
    text-align: left;
    font-size: 14px;
    border: 1px solid #ccc;
}

.custom-table th {
    background-color: #f0f0f0;
    font-weight: bold;
}

.custom-table tbody tr {
    border-bottom: 1px solid #ccc;
}

.custom-table tbody tr td {
    text-align: center;
    /* color: #666; */
}

    </style>
</head>
<body>
    <page size="A4">
        <h1 class="text-center mt-2 text-sm font-bold">
            ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
             {{-- {{mmDateFormat($year , $month )}}  --}} ရက်နေ့ 
            ညွှန်ကြားရေးမှူးများ၏ လက်ရှိဌာနသို့ ရောက်ရှိတာဝန်ထမ်းဆောင်သည့်စာရင်း</h1>

        <div class="table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>စဉ်</th>
                        <th>အမည်</th>
                        <th>ရာထူး</th>
                        <th>နိုင်ငံသားစိစစ်ရေးအမှတ်</th>
                        <th>မွေးသက္ကရာဇ်</th>
                        <th>အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ</th>
                        <th>လက်ရှိရာထူးရရက်စွဲ ရက်၊လ၊နှစ်</th>
                        <th>ဌာနခွဲ</th>
                        <th>ပညာအရည်အချင်း</th>
                        <th>ပင်စင်ပြည့်သည့်နေ့စွဲ</th>
                        <th>မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{en2mm($loop->index + 1)}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{$staff->name}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{$staff->current_rank?->name}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{en2mm($staff->nrc_region_id?->name . $staff->nrc_township_code?->name . '/' . $staff->nrc_sign?->name . '/' . $staff->nrc_code)}}
                            </td>
                            
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-Y'))}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{en2mm(Carbon\Carbon::parse($staff->join_date)->format('d-m-Y'))}}
                            </td>
                            {{-- <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{en2mm(Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y'))}}
                            </td> --}}
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{en2mm(Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-Y'))}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{$staff->current_department?->name}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                @foreach ($staff->staff_educations as $edu)
                                    <div style="margin-bottom: 8px;">
                                        <span style="font-weight: 600;">{{ $edu->education_group->name }}</span> -
                                        <span>{{ $edu->education_type?->name }}</span>,
                                        <span>{{ $edu->education->name }}</span>
                                    </div>
                                @endforeach
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </page>
</body>
</html>
