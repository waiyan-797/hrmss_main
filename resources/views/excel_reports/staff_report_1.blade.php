{{-- <style type="text/css">
    page {
        background: white;
    }

    page[size="A4"] {
        width: 210mm;
        height: 297mm;
    }

    @media print {

        body,
        page {
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

    th,
    td {
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
</style> --}}


{{-- <h1>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1> --}}
{{-- (၂၄-၇-၂၀၂၄)ရက်နေ့ --}}
{{-- <h1> ညွှန်ကြားရေးမှူးများ၏ လက်ရှိဌာနသို့ ရောက်ရှိတာဝန်ထမ်းဆောင်သည့်စာရင်း</h1> --}}

<div class="table-container">
    <table class="">
        <tr>
            <th colspan="11" style="font-weight:bold;">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </th>
        </tr>
        <tr>
            <th colspan="11" style="font-weight:bold;">
                {{ mmDateFormat($year, $month) }}ရက်နေ့၏ အရာထမ်းများ၏ လက်ရှိဌာနသို့ ရောက်ရှိတာဝန်ထမ်းဆောင်သည့်စာရင်း
            </th>
        </tr>
        <tr>
            <th colspan="11">
                @php
                use Carbon\Carbon;
                @endphp
                {{formatDMYmm(Carbon::now())}}
            </th>
        </tr>
        {{-- <tr>
            <th colspan="26" style="font-weight:bold;">
                {{mmDateFormat($year, $month)}}
            </th>
        </tr> --}}
    </table>

    {{-- <table>
        <tr>
            <th colspan="12" rowspan="2">

                ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                {{-- (၂၄-၇-၂၀၂၄)ရက်နေ့
                ညွှန်ကြားရေးမှူးများ၏ လက်ရှိဌာနသို့ ရောက်ရှိတာဝန်ထမ်းဆောင်သည့်စာရင်း

            </th>
        </tr>
    </table> --}}

    <table>
        <thead>
            <tr class="bg-gray">
                <th>စဥ်</th>
                <th>အမည်</th>
                <th>ရာထူး</th>
                <th>နိုင်ငံသားစိစစ်ရေး<br>အမှတ်</th>
                <th>မွေးနေ့သက္ကရာဇ်</th>
                <th>အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>ရက်စွဲ</th>
                <th>လက်ရှိ<br>အဆင့်ရ<br>ရက်စွဲ</th>
                <th>လက်ရှိဌာန<br>ရောက်ရှိ<br>ရက်စွဲ</th>
                {{-- <th>နိုင်ငံ့ဝန်ထမ်း<br>နည်းဥပဒေ<br>၃၃အရ<br>သတ်မှတ်ချက်</th> --}}
                <th>ဌာနခွဲ</th>
                <th>ပညာအရည်အချင်း</th>
                <th>ပင်စင်ပြည့်သည့်နေ့စွဲ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
                <tr>
                    <td>{{ en2mm($loop->index + 1)}}
                    </td>
                    <td>{{ $staff->name }}
                    </td>
                    <td>{{ $staff->current_rank?->name }}</td>
                    <td>{{ $staff->nrc_region_id?->name . $staff->nrc_township_code?->name . '/' . $staff->nrc_sign?->name . '/' . $staff->nrc_code }}
                    </td>
                    <td>{{ en2mm(Illuminate\Support\Carbon::parse($staff->dob)->format('d-m-y')) }}
                    </td>
                    <td>{{ formatDMYmm($staff->join_date) }}
                        <br>
                        {{dateDiffYMDWithoutDays($staff->join_date, now())}}
                    </td>
                    <td>{{ formatDMYmm($staff->current_rank_date) }}
                        <br>
                        {{dateDiffYMDWithoutDays($staff->current_rank_date, now())}}
                    </td>
                    <td>{{ formatDMYmm($staff->current_rank_date) }}
                        <br>
                        {{dateDiffYMDWithoutDays($staff->current_rank_date, now())}}
                    </td>
                    {{-- <td> {{formatDMYmm($staff->postings->sortByDesc('from_date')->first()?->from_date)}}
                        <br>
                        {{dateDiffYMDWithoutDays($staff->postings->sortByDesc('from_date')->first()?->from_date, now())}}
                    </td> --}}
                    <td>
                        {{ $staff->current_division?->name }}
                    </td>
                    <td>
                        @foreach ($staff->staff_educations as $edu)
                            {{ $edu->education?->name }}
                        @endforeach
                    </td>
                    {{-- <td>{{ en2mm(Carbon\Carbon::parse($staff->dob)->year + $pension_year->year) }}</td> --}}
                    {{ formatDMYmm(Illuminate\Support\Carbon::parse($staff->dob)->addYears($pension)->format('d-m-Y')) }}</td>
                    <td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>