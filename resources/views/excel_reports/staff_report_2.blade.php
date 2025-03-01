<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        </head>
        <body>
            <div class="table-container">
                <table>
                    <tr>
                        <th colspan="11" style="font-weight:bold;">
                            ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                        </th>
                    </tr>
                    <tr>
                        <th colspan="11" style="font-weight:bold;">
                            {{formatDMYmm(Carbon\Carbon::now())}} ရက်နေ့၏ ဝန်ထမ်းများစာရင်း
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
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #4b5563;">
                                {{ formatDMYmm(Carbon\Carbon::parse($staff->dob)->addYears($pension)->format('d-m-Y')) }}
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </body>
</html>
    
