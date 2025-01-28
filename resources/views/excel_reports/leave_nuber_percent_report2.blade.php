<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Leave Report</title>
    <style>
        body {
            font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
            margin: 0;
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
    <h1>
        ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
        {{ mmDateFormat($startYr, $startMonth) }} မှ {{ mmDateFormat($endYr, $endMonth) }} 
        အထိ ခွင့်ခံစားမှု အနည်းအများအလိုက် ရာခိုင်နှုန်းဇယား
    </h1>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>ဌာနခွဲ</th>
                    @foreach ($months as $month)
                        <th>{{ mmDateFormat(explode('-', $month)[0], explode('-', $month)[1]) }}</th>
                    @endforeach
                    <th>စုစုပေါင်း</th>
                </tr>
            </thead>
            <tbody>
               
                    <tr>
                        <td></td>
                        <td></td>
                       
                            <td>
                             
                            </td>
                      
                        <td>
                           
                        </td>
                    </tr>
              
            </tbody>
        </table>
  
</body>
</html>
