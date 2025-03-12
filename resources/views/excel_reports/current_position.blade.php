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
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            
        }
    </style>
</head>
<body>
    <div class="table-container">
        <tr>
            <th colspan="9" style="text-align: center; font-weight: bold;">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန								

            </th>
        </tr>
        <tr>
            <th colspan="9" style="text-align: center; font-weight: bold;">
                လက်ရှိရာထူး၏လုပ်သက်အလိုက်ဝန်ထမ်းများစာရင်း
            </th>
        </tr>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>ရာထူး</th>
                    <th>မွေးသက္ကရာဇ်</th>
                    <th>အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>ရက်စွဲ</th>
                    <th>လက်ရှိ<br>အဆင့်ရ<br>ရက်စွဲ</th>
                    <th>ဌာနခွဲ</th>
                    <th>ပညာအရည်အချင်း</th>
                    <th>မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ en2mm($loop->index+1) }}</td>
                        <td>{{ $staff->name }}</td>
                        <td >{{ $staff->currentRank?->name }}</td>
                        @php
                            $dob = \Carbon\Carbon::parse($staff->dob);
                            $diff = $dob->diff(\Carbon\Carbon::now());
                            $age =   $diff->y . ' နှစ်၊'  . $diff->m . ' လ';
                        @endphp
                        <td>{{formatDMYmm($staff->dob) }}<br>{{ en2mm($age) }}</td>
                        @php
                            $government_staff_started_date = \Carbon\Carbon::parse($staff->government_staff_started_date);
                            $diff = $government_staff_started_date->diff(\Carbon\Carbon::now());
                            $age =  $diff->y . ' နှစ်၊ ' . $diff->m . ' လ';
                        @endphp
                        <td>{{ formatDMYmm($staff->government_staff_started_date) }}<br>{{ en2mm($age) }}</td>
                        @php
                            $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
                            $diff = $current_rank_date->diff(\Carbon\Carbon::now());
                            $age =  $diff->y . ' နှစ် ' .  $diff->m . ' လ';
                        @endphp
                        <td>{{ formatDMYmm($staff->current_rank_date) }}<br>{{ en2mm($age) }}</td>
                        <td>{{ $staff->current_division?->name }}</td>
                        @php
                            $educationNames = $staff->staff_educations
                                ->map(fn($edu) => $edu->education?->name)
                                ->implode(', ');
                        @endphp
                        <td style="white-space: normal; word-wrap: break-word;">{{ $educationNames }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>