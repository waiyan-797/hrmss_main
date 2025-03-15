
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }

        .table-container {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
            text-align: center;
        }

        thead tr {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th colspan="5" class="text-center">
                        ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                    </th> 
                    <th class="text-right">ပုံစံ(၃)</th>
                </tr>
                <tr>
                    <th colspan="5" style="text-align:center">
                        ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                    </th>
                </tr>
                <tr>
                    <th colspan="5" style="text-align:center">
                        နေပြည်တော်တွင် တာဝန်ထမ်းဆောင်လျက်ရှိသည့် ဝန်ထမ်းအင်အားစာရင်း 
                    </th>
                </tr>
                <tr>
                    <th style="align:center">စဥ်</th>
                    <th style="align:center">အမည်/ရာထူး/ဌာန</th>
                    <th style="align:center">အိမ်ထောင်<br>ရှိ /မရှိ</th>
                    <th style="align:center">နေပြည်တော်တွင်နေထိုင်သည့်နေရပ်လိပ်စာ</th>
                    <th style="align:center">မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                <tr>
                    <td>{{ en2mm($loop->index + 1) }}</td>
                    <td>{{ $staff->name }}<br>{{ $staff->currentRank?->name }}<br>{{ $staff->current_department?->name }}</td>
                    <td>{{ $staff->marital_statuses?->name ? 'ရှိ' : 'မရှိ' }}</td>
                    <td>
                        {{ implode(', ', array_filter([
                            $staff->current_address_street,
                            $staff->current_address_ward,
                            $staff->current_address_township_or_town?->name,
                            $staff->current_address_region?->name
                        ])) }}
                    </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>





   
