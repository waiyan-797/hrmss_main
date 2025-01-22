
    {{-- <style type="text/css">
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
    color: #666;
}

    </style> --}}

        {{-- <h1 class="heading">
            ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
        </h1> --}}

        <div class="table-container">

            <table>
                <tr>
                    <th colspan="11" style="font-weight:bold;">
                        ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                    </th>
                </tr>
                <tr>
                    <th colspan="11" style="font-weight:bold;">
                        @php
                        use Carbon\Carbon;
                        @endphp
                        {{formatDMYmm(Carbon::now())}} ရက်နေ့၏ ဝန်ထမ်းများစာရင်း  
                        {{-- {{ mmDateFormat($year, $month) }} --}}
                    </th>
                </tr>
            </table>

            <table class="custom-table">
                <thead>
                    <tr>
                        <th>စဉ်</th>
                        <th>အမည်</th>
                        <th>ရာထူး</th>
                        <th>နိုင်ငံသားစိစစ်ရေး<br>အမှတ်</th>
                        <th>မွေးသက္ကရာဇ်</th>
                        <th>အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>ရက်စွဲ</th>
                        <th>လက်ရှိ<br>အဆင့်ရ<br>ရက်စွဲ</th>
                        <th>ဌာနခွဲ</th>
                        <th>ပညာအရည်အချင်း</th>
                        <th>ပင်စင်ပြည့်<br>သည့်နေ့စွဲ</th>
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
                            {{formatDMYmm($staff->dob)}}
                        </td>
                        <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                            {{formatDMYmm($staff->join_date)}}
                            <br>
                            {{dateDiffYMDWithoutDays($staff->join_date , now())}}
                        </td>
                        {{-- <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                            {{en2mm(Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y'))}}
                        </td> --}}
                        <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                            {{formatDMYmm($staff->current_rank_date)}}
                            <br>
                            {{dateDiffYMDWithoutDays($staff->current_rank_date , now())}}
                        </td>
                        <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                            {{$staff->current_department?->name}}
                        </td>
                        <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                            @foreach ($staff->staff_educations as $edu)
                                <div style="margin-bottom: 8px;">
                                    {{-- <span style="font-weight: 600;">{{ $edu->education_group->name }}</span> - --}}
                                    {{-- <span>{{ $edu->education_type?->name }}</span>, --}}
                                    <span>{{ $edu->education?->name }}</span>
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
    
