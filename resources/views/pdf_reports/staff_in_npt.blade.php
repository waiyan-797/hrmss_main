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

       
        page[size="A4 portrait"] {
            width: 210mm;
            height: 297mm;
        }


        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        } */

        body {
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }

        .container {
            width: 100%;
            margin-bottom: 16px;
        }

        .header-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        }

        .table-container {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
        }

        table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        thead tr {
            background-color: #f3f4f6;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
        }

        tbody tr td {
            height: 32px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
        <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>စဥ်</th>
                        <th>အမည်/ရာထူး/ဌာန</th>
                        <th>အိမ်ထောင်ရှိ /မရှိ</th>
                        <th>နေပြည်တောင်တွင်နေထိုင်သည့်နေရပ်လိပ်စာ</th>
                        <th>မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody class="text-center h-8 p-2">
                    @foreach($staffs as $staff)
                        <tr>
                            <td 
                            >{{ en2mm($loop->index + 1) }}</td>
                            <td 
                            >{{ $staff->name }}</td>


                            <td 
                            >{{ $staff->isInRs()  ? 'ရှိ' : 'မရှိ'}}</td>

                            <td 
                            >{{getAddress( $staff->current_address_street , $staff->current_address_ward , $staff->current_address_township_or_town_id  ,$staff->current_address_region_id) }}</td>
                        </tr>

                        
                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>




   
