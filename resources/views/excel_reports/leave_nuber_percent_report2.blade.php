<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Leave 2</title>
    <style type="text/css">
        /* page{
            background: white;
        }

        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        } */

        /* @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        } */

        body {
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }
        h1 {
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            font-weight: bold;
        }

        .mb-4 {
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
 
       
        <table>
            <tr>
                <th colspan="12">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                    {{mmDateFormat($startYr,$startMonth)}}
                    မှ
                   {{mmDateFormat($endYr,$endMonth)}}
                   အထိ ခွင့်ခံစားမှု အနည်းအများအလိုက် ရာခိုင်နှုန်းဇယား
                </th> 
                
            </tr>
           
        </table>

    <table>
        <thead>
            <tr>
                <th style="font-weight:bold text-align:center">စဥ်</th>
                <th>ဌာနခွဲ</th>
                @foreach ($months as $month)
                    <th style="font-weight: bold; text-align: center;">
                        {!! '<br>' . mmDateFormat(explode('-', $month)[0], explode('-', $month)[1]) !!}
                    </th>
                    
                    
                    @endforeach
                <th style="font-weight:bold text-align:center">စုစုပေါင်း</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($divisions as $index=>  $division)
                   
            <tr>
             <td >     
                 {{en2mm($index+1)}}
             </td>   
             {{-- <td style="text-align:left">
                {{$division->name}}
             </td> --}}
             <td style="text-align:left; width: 200px;">
                {{$division->name}}
            </td>
            
             @foreach ($months as $YearMonth)
                     
             <td >
                 {{en2mm($division->leaveCount($division->id, $YearMonth ))}}
                 
             </td>
                 @endforeach
             
     
                 <td >
                    @php
                            $totalLeaveCount =  0 ;
                    foreach ($months as $YearMonth) {
                        $totalLeaveCount = $division->leaveCount($division->id, $YearMonth );

                    }
                            @endphp
                    {{en2mm($totalLeaveCount)}}
                </td>
         </tr>
                
            @endforeach
        </tbody>
    </table>

   
</body>
</html>
