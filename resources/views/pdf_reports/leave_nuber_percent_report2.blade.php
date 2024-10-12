<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Leave 2</title>
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
    
    <page size="A4">
        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>        
            {{mmDateFormat($startYr,$startMonth)}}
            မှ
           {{mmDateFormat($endYr,$endMonth)}}
           အထိ ခွင့်ခံစားမှု အနည်းအများအလိုက် ရာခိုင်နှုန်းဇယား</h1>

    <table>
        <thead>
            <tr>
                <th>စဥ်</th>
                <th>ဌာနခွဲ</th>
                @foreach ($months as $month)
                            
                
                    <th class="border border-black text-center p-2"> {{en2mm(explode('-' ,$month)[0])}}<br>{{en2mm(explode('-' ,$month)[1])}}</th>

                    @endforeach
                <th>စုစုပေါင်း</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($divisions as  $division)
                   
            <tr>
             <td class="border border-black text-center p-2">     
                 {{$division->id}}
             </td>   
             <td class="border border-black text-center p-2">
                {{$division->name}}
             </td>
             @foreach ($months as $YearMonth)
                     
             <td class="border border-black text-center p-2">
                 {{$division->leaveCount($division->id, $YearMonth )}}
                 
             </td>


                 @endforeach
             
     
             <td class="border border-black text-center p-2"></td>
         </tr>
                
            @endforeach
        </tbody>
    </table>

    </page>
</body>
</html>
