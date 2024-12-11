
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .heading {
            font-weight: bold;
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        /* .staff-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .staff-table th, .staff-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .staff-table th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        } */
    </style>
    <h1 class="heading">
        ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ<br>ဝန်ထမ်းအင်အားစာရင်း
    </h1>

    <table class="staff-table">
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>အမည်/ရာထူး</th>
                <th>မူလဌာန</th>
                <th>ခုနှစ်<br>မှ-ထိ</th>
                <th>ပြောင်းရွေ့ဌာန</th>
                <th>ခုနှစ်<br>မှ-ထိ</th>
                <th>လက်ရှိဌာန<br>ရောက်ရှိ ရက်စွဲ</th>
                <th>မှတ်ချက်</th>
            </tr>
        </thead>
        <tbody>
            @php
                $start = 1;
            @endphp

            @foreach ($staffs as $staff)
                @php
                    $latestPosting = $staff->postings->sortByDesc('from_date')->first();
                @endphp
                <tr>
                    <td class="text-center">{{ en2mm($start++) }}</td>
                    <td>
                        {{ $staff->name }} <br>
                        {{ $staff->currentRank?->name }}
                    </td>
                    <td>
                        {{ $staff->postings->first()?->department->name ?? '' }}
                        (
                        {{ $staff->postings->first()?->division?->nick_name ?? '' }}
                        )
                    </td>
                    <td>
                        @if ($staff->postings->isNotEmpty())
                            @php
                                $firstPosting = $staff->postings->first();
                            @endphp
                            {{ en2mm($firstPosting->from_date ? \Carbon\Carbon::parse($firstPosting->from_date)->format('d-m-Y') : '') }} မှ<br>
                            {{ en2mm($firstPosting->to_date ? \Carbon\Carbon::parse($firstPosting->to_date)->format('d-m-Y') : '') }} ထိ
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @foreach($staff->postings->slice(1, $staff->postings->count() - 2) as $oldPost)
                            {{ $oldPost->department?->name ?? '' }}
                            ({{ $oldPost->division?->nick_name ?? '' }})<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($staff->postings->slice(1, $staff->postings->count() - 2) as $oldPost)
                            {{ $oldPost->from_date ? en2mm(\Carbon\Carbon::parse($oldPost->from_date)->format('d-m-Y')) : '' }} မှ 
                            {{ $oldPost->to_date ? en2mm(\Carbon\Carbon::parse($oldPost->to_date)->format('d-m-Y')) : '' }} ထိ<br>
                        @endforeach
                    </td>
                    <td>
                        {{ $latestPosting->division?->nick_name ?? '' }}<br>
                        {{ $latestPosting?->from_date ? en2mm(\Carbon\Carbon::parse($latestPosting->from_date)->format('d-m-Y')) : '' }}
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>










