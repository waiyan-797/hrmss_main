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
            font-weight: bold;
            text-align: center;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 0.5rem;
            text-align: center;
        }

        td.text-left {
            text-align: left;
        }

        @media (min-width: 768px) {
            table {
                width: 100%;
            }
        }


        
    </style>
</head>
<body>
    <page size="A4">
        <h1>
            ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>နိုင်ငံခြားသွားရောက်ခဲ့သောအကြိမ်ရေစုစုပေါင်းနှင့်အကြောင်းအရာ
        </h1>
    
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>ရာထူး</th>
                    <th>သွားရောက်သည့်နိုင်ငံ</th>
                    <th>သင်တန်း</th>
                    <th>အခြား</th>
                    <th>စုစုပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($staffs as $staff)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $staff->name}}</td>
                        <td>{{ $staff->current_rank->name}}</td>
                        <td>
                            @foreach($staff->abroads as $abroad)
                                <span>{{ $abroad->country->name}}</span>
                            @endforeach
                        </td>
                        <td>{{ en2mm($staff->trainings->count()) }}   
                        </td>

                        <td>{{ en2mm($staff->abroads->count()) }}</td>

                        <td>
                            {{ en2mm($staff->trainings->count() + $staff->abroads->count()) }}
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    
    </page>
</body>
</html>

