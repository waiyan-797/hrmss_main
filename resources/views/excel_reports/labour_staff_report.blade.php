<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 100%;
        margin-bottom: 20px;
    }

    h2 {
        font-weight: 600;
        font-size: 18px;
        text-align: center;
        margin: 20px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    thead tr {
        background-color: #f3f3f3;
    }

    th,
    td {
        padding: 8px;
        border: 1px solid black;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>

<div class="container">
    <tr>
        <th colspan="10" style="text-align: center">
            {{ $title }} နေ့စားဝန်ထမ်းအင်အားစာရင်း
        </th>
    </tr>
    <table>
        <thead>
            <tr>
                <th style="text-align:center">စဥ်</th>
                <th style="text-align:center">အမည်</th>
                <th style="text-align:center">ရာထူး/<br>တာဝန်ချထားမှု</th>
                <th style="text-align:center">နိုင်ငံသားစိစစ်ရေး<br>အမှတ်</th>
                <th style="text-align:center">မွေးနေ့<br>သက္ကရာဇ်</th>
                <th style="text-align:center">အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>ရက်စွဲ</th>
                <th style="text-align:center">ဌာနခွဲ</th>
                <th style="text-align:center">ပညာအရည်အချင်း</th>
                <th style="text-align:center">မှတ်ချက်</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $key => $staff)
                <tr>
                    <td>{{ en2mm($key + 1) }}</td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->currentRank?->name }}</td>
                    <td>{{ collect([$staff->nrc_region_id?->name, $staff->nrc_township_code?->name, $staff->nrc_sign?->name, en2mm($staff->nrc_code)])->filter()->implode('၊') }}
                    </td>
                    <td>{{ formatDMYmm($staff->dob) }}</td>
                    <td>{{ formatDMYmm($staff->join_date) }}</td>
                    <td>{{ $staff->current_division?->name }}</td>
                    <td>
                        @foreach ($staff->staff_educations as $education)
                            {{ $education->education?->name }}
                        @endforeach
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
