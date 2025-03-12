<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Table</title>
    <style>
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            text-align: left;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <tr>
            <th colspan="9" style="text-align: center">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန								

            </th>
        </tr>
        <tr>
            <th colspan="9" style="text-align: center">
                အသက် {{ en2mm($age ?? '') }}
                @switch($signID)
                    @case('all') အားလုံး @break
                    @case('between') နှစ်ကြား @break
                    @case('>') နှစ်အထက် @break
                    @case('=') နှစ် @break
                    @case('<') နှစ်အောက် @break
                    @default
                @endswitch
                 ဝန်ထမ်းများ၏အမည်စာရင်း
            </th>
        </tr>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>ရာထူး</th>
                    <th>မွေးသက္ကရာဇ်</th>
                    <th>အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ</th>
                    <th>လက်ရှိအဆင့်ရရက်စွဲ</th>
                    <th>ဌာနခွဲ</th>
                    <th>ပညာအရည်အချင်း</th>
                    <th>မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ en2mm($loop->index + 1) }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->currentRank?->name }}</td>
                        @php
                            $dob = \Carbon\Carbon::parse($staff->dob);
                            $diff = $dob->diff(\Carbon\Carbon::now());
                            $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                        @endphp
                        <td>
                            {{ formatDMYmm($staff->dob) }}<br>
                            {{ en2mm($age) }}
                        </td>
                        @php
                            $join_date = \Carbon\Carbon::parse($staff->join_date);
                            $diff = $join_date->diff(\Carbon\Carbon::now());
                            $age = $diff->y . ' နှစ်၊ '  . $diff->m . ' လ';
                        @endphp
                        <td>
                            {{ formatDMYmm($staff->join_date) }}<br>
                            {{ en2mm($age) }}
                        </td>
                        @php
                            $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
                            $diff = $current_rank_date->diff(\Carbon\Carbon::now());
                            $age =  $diff->y . ' နှစ်၊ ' . $diff->m . ' လ';
                        @endphp
                        <td>
                            {{ formatDMYmm($staff->current_rank_date)}}<br>
                            {{ en2mm($age) }}
                        </td>
                        <td>{{ $staff->current_division?->name }}</td>
                        @php
                            $educationNames = $staff->staff_educations
                                ->map(fn($edu) => $edu->education?->name)
                                ->implode(', ');
                        @endphp
                        <td>{{ $educationNames }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
