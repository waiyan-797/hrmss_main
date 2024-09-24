<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
            font-family: 'tharlon';
            font-size: 13px;
        }
        h1 {
            font-size: 1.5em;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .colspan {
            background-color: #e0e0e0;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <h1>Local Training Report</h1>

        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">အမည်</th>
                    <th rowspan="2">ရာထူး</th>
                    <th colspan="2" class="colspan">သွားရောက်သည့်ကာလ</th>
                    <th rowspan="2">ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲတတ်ရောက်ခဲ့သည့်နေရာ</th>
                    <th rowspan="2">တတ်ရောက်ခဲ့သည့်အကြောင်းအရာ</th>
                    <th rowspan="2">ပညာအရည်အချင်း</th>
                </tr>
                <tr>
                    <th>မှ</th>
                    <th>ထိ</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($staffs as $staff)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $staff->name}}</td>
                        <td>{{ $staff->current_rank->name}}</td>
                        @foreach($staff->abroads as $abroad)
                        <td>{{ $abroad->from_date}}</td>
                        <td>{{ $abroad->to_date}}</td>
                        @endforeach
                        @foreach($staff->trainings as $training)
                        <td>{{ $training->location}}</td>
                        <td>{{ $training->remark}}</td>
                        @endforeach
                        <td class="border border-black text-left p-1">
                            @foreach ($staff->staff_educations as $edu)
                                <div>
                                    <span>{{ $edu->education_group->name }}</span>
                                    <span>{{ $edu->education_type->name }}</span>
                                    <span>{{ $edu->education->name }}</span>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        
    </page>
        
        
</body>
</html>