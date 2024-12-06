<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Report 1</title>
    <style type="text/css">
        page{
            background: white;
        }

        page[size="A4-L"] {
            width: 400mm;
            height: 297mm;
            orientation: landscape;
            
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
        .table-container {
            overflow-x: auto;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            color: #4a4a4a;
        }

        thead {
            background-color: #f9f9f9;
            text-align: center;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            font-size: 12px;
            text-transform: uppercase;
            background-color: #f1f1f1;
            color: #333;
        }

        tbody td {
            text-align: center;
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: #121212;
                color: #e0e0e0;
            }

            .table-container {
                box-shadow: none;
            }

            table {
                color: #e0e0e0;
                border-color: #444;
            }

            thead {
                background-color: #333;
            }

            th {
                background-color: #444;
                color: #f1f1f1;
            }

            tbody td {
                border-color: #444;
            }
        }


        
    
    </style>
</head>
<body>
    <page size="A4-L"> 
       

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>စဥ်</th>
                        <th>ကွယ်လွန်ဝန်ထမ်းအမည်</th>
                        <th>တာဝန်ထမ်းဆောင်ခဲ့သည့်ရာထူး</th>
                        <th>စတင်အမှုထမ်းသောနေ့</th>
                        <th>အမှုထမ်းသက်ဆုံးခန်းတိုင်သည့်နေ့</th>
                        <th>လုပ်သက်</th>
                        <th>ကွယ်လွန်သည့်နေ့</th>
                        <th>မိသားစုပင်စင်ခံစားမည့်အမည်</th>
                        <th>ကွယ်လွန်သူသည်ပင်စင်စားဖြစ်လျှင်ပင်စင်ယူသောနေ့</th>
                        <th>ကွယ်လွန်သူနှင့်တော်စပ်ပုံ</th>
                        <th>မိသားစုပင်စင်ခံစားသည့်နေ့</th>
                        <th>ထုတ်ယူလိုသည့်ဘဏ်</th>
                        <th>ရရှိမည့်ပင်စင်လစာ/ဆုငွေ</th>
                        <th>ဆက်သွယ်ရန်လိပ်စာ/တယ်လီဖုန်းနံပါတ်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                            <tr>
                                <td>{{ $loop->index+1}}</td>
                                <td>{{ $staff->name}}</td>
                                <td>@foreach($staff->postings as $posting)
                                    {{ $posting->rank?->name}}
                                    @endforeach</td>
                                <td>{{ en2mm(Carbon\Carbon::parse($staff->join_date)->format('d-m-y')) }}</td>
                                <td>{{ en2mm(Carbon\Carbon::parse($staff->retire_date)->format('d-m-y')) }}</td>
                                <td>@php
                                    $currentDate = Carbon\Carbon::now();
                                    $rankDate = Carbon\Carbon::parse($staff->current_rank_date);
                                    $diff = $rankDate->diff($currentDate);
                                @endphp
                                {{ $diff->y == 0 ? '' : en2mm($diff->y) .' နှစ်'}} {{ $diff->m == 0 ? '' : en2mm($diff->m) .' လ' }} {{ $diff->d == 0 ? '' : en2mm($diff->d) .' ရက်' }}</td>
                                <td>{{ en2mm(Carbon\Carbon::parse($staff->date_of_death)->format('d-m-y')) }}</td>
                                <td>{{ $staff->family_pension_inheritor}}</td>
                                <td>{{ en2mm(Carbon\Carbon::parse($staff->retire_date)->format('d-m-y')) }}</td>
                                <td>{{ $staff->family_pension_inheritor_relation?->name}}</td>
                                <td>{{ en2mm(Carbon\Carbon::parse($staff->family_pension_date)->format('d-m-y')) }}</td>

                                <td>{{ $staff->pension_bank}}</td>
                                <td>{{ $staff->pension_salary}}၊{{ $staff->gratuity}}</td>
                                <td>{{ $staff->permanent_address_ward.'၊'.$staff->permanent_address_street.'၊'.$staff->permanent_address_township_or_town?->name.'၊'.$staff->permanent_address_region?->name }}၊{{ $staff->phone}}</td>
                            </tr>
                       @endforeach
                </tbody>
            </table>
        </div>
    </page>
</body>
</html>

