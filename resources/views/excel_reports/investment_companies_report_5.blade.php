<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Investment Companies Report</title>
</head>
<body>
    <div class="">
        <div class="">

            <table class="">
                <tr>
                    <th colspan="5" style="font-weight:bold;">
                        ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                    </th>
                </tr>
                <tr>
                    <th colspan="5" style="font-weight:bold;">
                        ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                    </th>
                </tr>
                <tr>
                    <th colspan="5" style="font-weight:bold;">
                        ဝန်ထမ်းအင်အားစာရင်း
                    </th>
                </tr>

            </table>

            <table>
                <thead>
                    <tr>
                        <th style="font-weight:bold;">စဥ်</th>
                        <th style="font-weight:bold;">ရာထူး</th>
                        <th style="font-weight:bold;">ခွင့်ပြုအင်အား</th>
                        <th style="font-weight:bold;">ခန့်ပြီးအင်အား</th>
                        <th style="font-weight:bold;">လစ်လပ်အင်အား</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>၁</td>
                        <td>အမြဲတမ်းအတွင်းဝန်</td>
                        <td>၀</td>
                        <td>၀</td>
                        <td>၀</td>
                    </tr>


                    @php
                        $filteredPayscales = $payscales->filter(function ($payscale) {
                            $rankName = $payscale->ranks[0]->name;
                            return $rankName !== 'နေ့စား' && !Str::contains($rankName, 'နှင့် အဆင့်တူ');
                        });

                        $totalAllowedQty = $filteredPayscales->sum('allowed_qty');
                        $totalStaffCount = $filteredPayscales->sum(fn($payscale) => $payscale->staff->count());
                    @endphp
                    @php
                        $count = 1;
                    @endphp

                    @foreach ($filteredPayscales as $index => $payscale)
                        @php
                            $rankName = $payscale->ranks[0]->name;
                        @endphp

                        <tr>
                            <td>{{ en2mm(++$count) }}</td>
                            <td>
                                @if ($index == 0)
                                    {{ $rankName }} /<br> ဦးဆောင်ညွှန်ကြားရေးမှူးနှင့်အဆင့်တူ
                                @else
                                    {{ $rankName }}နှင့်အဆင့်တူ
                                @endif
                            </td>
                            <td>{{ en2mm($payscale->allowed_qty) }}</td>
                            <td>{{ en2mm($payscale->staff->count()) }}</td>
                            <td>
                                {{ en2mm($payscale->staff->count() - $payscale->allowed_qty) }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="2" style="font-weight: bold;">စုစုပေါင်း
                        </td>
                        <td style="font-weight:bold;">
                            {{ en2mm($totalAllowedQty) }}</td>
                        <td style="font-weight:bold;">
                            {{ en2mm($totalStaffCount) }}</td>
                        <td style="font-weight:bold;">
                            {{ en2mm($totalStaffCount - $totalAllowedQty) }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>