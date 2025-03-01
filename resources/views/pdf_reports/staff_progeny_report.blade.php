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

        h1 {
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            margin-bottom: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            text-align: center;
            background-color: #f2f2f2;
        }
        td.text-left {
            text-align: left;
        }



    </style>
</head>
<body>
    <page size="A4">
        <h1>
            ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>
            ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
            ဝန်ထမ်းများ၏ သားသမီးအရေအတွက် စာရင်း
           
        </h1>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">ဝန်ထမ်း၏အမည်/ရာထူး</th>
                    <th colspan="2">သား/သမီးအရေအတွက်</th>
                    <th rowspan="2">သား/သမီးအမည်</th>

                    <th rowspan="2">မှတ်ချက်</th>
                </tr>
                <tr>
                    <th>ကျား</th>
                    <th>မ</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $start=0;
                @endphp
                @foreach ($staffs as $staff)
                        <tr>
                            <td>{{ $start++ }}</td>
                            <td>{{ $staff->name  }}
                            <br>
                            
                                {{$staff->currentRank->name}}
                            
                            </td>
                            
                            <td>
                                {{ en2mm($staff->children->where('gender_id', 1)->count()) }}
                            </td>
                            <td>
                                {{ en2mm($staff->children->where('gender_id', 2)->count()) }}
                            </td>
                            <td>
                                
                                @foreach ($staff->children as $key => $child ) 
 {{$child->name}}
                                @endforeach
                                    
                                
                                
                                                            </td>
                                                            <td>
                                                             
                                                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </page>
</body>
</html>
