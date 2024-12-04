<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Report 2</title>
    <style type="text/css">
        page{
            background: white;
        }

        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        }

        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        }

        body {
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }
        .heading {
    font-weight: bold;
    text-align: center;
    font-size: 1rem;
    margin-bottom: 20px;
}

.staff-table {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto;
}

.staff-table th, .staff-table td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

.staff-table th {
    text-align: center;
    padding: 10px;
}

.staff-table td {
    padding: 8px;
}

.staff-table th:nth-child(1),
.staff-table th:nth-child(4),
.staff-table th:nth-child(6),
.staff-table th:nth-child(7),
.staff-table th:nth-child(8),
.staff-table td:nth-child(1),
.staff-table td:nth-child(4),
.staff-table td:nth-child(6),
.staff-table td:nth-child(7),
.staff-table td:nth-child(8) {
    text-align: center;
}

        
        
    </style>
</head>
<body>
    <page size="A4">
        <h1 class="heading">
            ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ
            ဝန်ထမ်းအင်အားစာရင်း
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
                @foreach ($staffs as $index=> $staff)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $staff->name }}၊
                                @foreach ($staff->postings as $posting)
                                    {{ $staff->rank?->name }}
                                @endforeach
                            </td>

                            <td>
                                {{ isset($staff->postings[0]) ? $staff->postings[0]->department->name : '' }}</td>
                            <td>
                                {{ en2mm($posting->from_date) }}<br>{{ en2mm($posting->to_date) }}</td>
                            <td>{{ $staff->side_department?->name }}</td>

                            <td>
                                {{ $posting->to_date
                                    ? en2mm(\Carbon\Carbon::parse($posting->to_date)->format('d-m-Y')) .
                                        ' - ' .
                                        en2mm(\Carbon\Carbon::now()->format('d-m-Y'))
                                    : 'No Date Range' }}
                                <br>
                            </td>
                            <td>
                                {{ en2mm(Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y')) }}
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    
    
    </page>
</body>
</html>
