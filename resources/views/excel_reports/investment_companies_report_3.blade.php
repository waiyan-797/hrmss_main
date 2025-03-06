<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="">
        <table class="">
            <tr>
                <th colspan="6" style="font-weight:bold">  
                    ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                </th>
            </tr>
            <tr>
                <th colspan="6" style="font-weight:bold">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                </th>
            </tr>
            <tr>
                <th colspan="6" style="font-weight:bold;">
                    {{mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day))}}ရက်နေ့ရှိ ဝန်ထမ်းအင်အားစာရင်း
                </th>
            </tr>
        </table>

        <table>
            <thead>
                <tr>
                    <th style="font-weight:bold;">စဥ်</th>
                    <th style="font-weight:bold;">ရာထူးအမည်</th>
                    <th style="font-weight:bold;">လစာနှုန်း (ကျပ်)</th>
                    <th style="font-weight:bold;">ခွင့်ပြု <br> အင်အား</th>
                    <th style="font-weight:bold;">ခန့်ပြီး <br> အင်အား</th>
                    <th style="font-weight:bold;">လစ်လပ် <br> အင်အား</th>
                </tr>
            </thead>
            <tbody>
                <tr></tr>
                @foreach ($first_ranks as $rank)
                <tr>
                    <td>{{en2mm(++$count)}}</td>
                    <td>{{$rank->name}}</td>
                    <td>{{$rank->payscale?->name}}</td>
                    <td>{{en2mm($rank->allowed_qty)}}</td>
                    <td>{{en2mm($rank->staffs->count())}}</td>
                    <td>{{en2mm($rank->staffs->count() - $rank->allowed_qty)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="font-weight:bold;">{{$first_ranks[0]->staff_type->name}}စုစုပေါင်း</td>
                    <td style="font-weight:bold;">{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                    <td style="font-weight:bold;">{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                    <td style="font-weight:bold;">{{ en2mm( $first_ranks->sum(fn($rank) => $rank->staffs->count()) - $first_ranks->sum('allowed_qty')) }}</td>
                </tr>
                @foreach ($second_ranks as $rank)
                    <tr>
                        <td>{{en2mm(++$count)}}</td>
                        <td>{{$rank->name}}</td>
                        <td>{{$rank->payscale->name}}</td>
                        <td>{{en2mm($rank->allowed_qty)}}</td>
                        <td>{{en2mm($rank->staffs->count())}}</td>
                        <td>{{en2mm($rank->staffs->count() - $rank->allowed_qty)}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="font-weight:bold;">{{$second_ranks[0]->staff_type->name}}စုစုပေါင်း</td>
                    <td style="font-weight:bold;">{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                    <td style="font-weight:bold;">{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                    <td style="font-weight:bold;">{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count()) - $second_ranks->sum('allowed_qty')) }}</td>
                </tr>

                <tr>
                    <td class="border border-black p-2 " colspan="3" style="font-weight:bold;">စုစုပေါင်း</td>
                    <td class="border border-black p-2 " style="font-weight:bold;">{{ en2mm($first_ranks->sum('allowed_qty') + $second_ranks->sum('allowed_qty')) }}</td>
                    <td class="border border-black p-2 " style="font-weight:bold;">{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count()) + $second_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                    <td class="border border-black p-2 " style="font-weight:bold;">{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count()) - $second_ranks->sum('allowed_qty') + $first_ranks->sum(fn($rank) => $rank->staffs->count()) - $first_ranks->sum('allowed_qty')) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>




        