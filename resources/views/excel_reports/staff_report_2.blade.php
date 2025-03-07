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
                            ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                        </th>
                    </tr>
                    <tr>
                        <th colspan="11" style="font-weight:bold;">
                            {{formatDMYmm(Carbon\Carbon::now())}} ရက်နေ့၏ ဝန်ထမ်းများစာရင်း
                        </th>
                    </tr>
                </table>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="font-weight:bold;">စဉ်</th>
                            <th style="font-weight:bold;">အမည်</th>
                            <th style="font-weight:bold;">ရာထူး</th>
                            <th style="font-weight:bold;">နိုင်ငံသားစိစစ်ရေး<br>အမှတ်</th>
                            <th style="font-weight:bold;">မွေးသက္ကရာဇ်</th>
                            <th style="font-weight:bold;">အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>ရက်စွဲ</th>
                            <th style="font-weight:bold;">လက်ရှိ<br>အဆင့်ရ<br>ရက်စွဲ</th>
                            <th style="font-weight:bold;">ဌာနခွဲ</th>
                            <th style="font-weight:bold;">ပညာအရည်အချင်း</th>
                            <th style="font-weight:bold;">ပင်စင်ပြည့်<br>သည့်နေ့စွဲ</th>
                            <th style="font-weight:bold;">မှတ်ချက်</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                                {{en2mm($loop->index + 1)}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                                {{$staff->name}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                                {{$staff->current_rank?->name}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                                {{en2mm($staff->nrc_region_id?->name . $staff->nrc_township_code?->name . '/' . $staff->nrc_sign?->name . '/' . $staff->nrc_code)}}
                            </td>
            
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                                {{formatDMYmm($staff->dob)}}
                                <br>
                                {{dateDiffYMDWithoutDays($staff->dob, now())}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                            {{formatDMYmm($staff->government_staff_started_date)}}
                                    <br>
                                    {{dateDiffYMDWithoutDays($staff->government_staff_started_date, now())}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                            {{formatDMYmm($staff->postings->sortByDesc('from_date')
                                    ->slice(1, 1)
                                    ->first()?->from_date)}}
                                    <br>
                                    {{dateDiffYMDWithoutDays(Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('j-n-Y') , now())}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                                {{$staff->current_division?->nick_name}}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                                @foreach ($staff->staff_educations as $key => $edu)
                                    <div style="margin-bottom: 8px;">
                                        <span>{{ $edu->education?->name }}</span>
                                        @if($key > 0)
                                        ,
                                        @endif
                                    </div>
                                @endforeach
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;">
                                {{ formatDMYmm(Carbon\Carbon::parse($staff->dob)->addYears($pension)->format('d-m-Y')) }}
                            </td>
                            <td style="padding: 8px 16px; text-align: center; font-size: 0.875rem; color: #000000; font-weight: normal;"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </body>
</html>
