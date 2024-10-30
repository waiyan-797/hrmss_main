<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Finance Salary List</title>
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
            background-color: #f2f2f2;
        }
        .text-left {
            text-align: left;
        }
    </style>
</head>
<body>
    <page size="A4">
        <div style="width: 100%;">
            <div style="display: flex; justify-content: center; width: 100%; height: 83vh; overflow-y: auto;">
                <div style="width: 100%; margin: 0 auto; padding: 16px;">
                <h2 class="font-bold text-center text-sm mb-3">{{$startYr}} - {{$endYr}} ဘဏ္ဍာရေးနှစ်အတွက် လစာငွေထုတ်ယူမည့် စာရင်း</h2>

                    <div style="width: 100%; padding: 16px;">
                       
                        <table class="md:w-full mt-5 ">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                                    <th rowspan="2" class="border border-black text-center p-2">လအမည်</th>
                                    <th rowspan="2" class="border border-black text-center p-2">လက်ရှိလစာနှုန်း</th>
                                    <th rowspan="2" class="border border-black text-center p-2">ထောက်ပံ့ကြေး</th>
                                    <th rowspan="2" class="border border-black text-center p-2">အသက်အာမခံ<br>ဖြတ်တောက်ငွေ</th>
                                    <th colspan="2" class="border border-black text-center p-2">ခွင့်</th>
                                    <th rowspan="2" class="border border-black text-center p-2">ဝင်‌ငွေခွန်<br>ဖြတ်တောက်ငွေ</th>
                                    <th rowspan="2" class="border border-black text-center p-2">၂လစာချေးငွေ</th>
                                    <th rowspan="2" class="border border-black text-center p-2">အသားတင် လစာ</th>
                                    <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                                    
                                </tr>
                                <tr>
                                    <th class="border border-black text-center p-2">လုပ်သက်ခွင့်</th>
                                    <th class="border border-black text-center p-2">လစာမဲ့ခွင့်</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
        
                                @foreach ([$startYr , $endYr] as $year)
        
         @foreach (financeYear()[$loop->index] as $month)
                                  
         <tr>
            <td class="border border-black text-center p-2">
        
                {{en2mm(++$count )}}
            </td>
        
            <td class="border border-black text-center p-2">{{en2mm($month) . '/' . en2mm($year)}}</td>
           
            <td class="border border-black text-center p-2">
               
                                 
              
                {{  
                
              
                getSalary($month, $year)
                }}
            </td>
           
            <td class="border border-black text-center p-2">
                {{  
                
              
                getAddition($month, $year)
                    }}
            </td>
            <td class="border border-black text-center p-2">
                
        
                {{  
                
              
                getDeductionInsurance($month, $year)
                        }}
            </td>
            
            <td class="border border-black text-center p-2">
                {{
                getLeveTypeone($month, $year)
                }}
            </td>
            <td class="border border-black text-center p-2">
                {{
                    getLeveTypeTwo($month, $year)
                    }}
            </td>
           
            <td class="border border-black text-left p-1">   
                {{
                   getDeductionTax($month, $year)
                    }}
            </td>
            <td class="border border-black text-left p-1">   
                {{get2monthDeduction($month, $year)}}
            </td>
            <td class="border border-black text-left p-1">   
                {{
                    getNetActualSalary($month, $year)
                     }}
                
            </td>
           
            <td class="border border-black text-left p-1">   
            </td>
        </tr>
        
         @endforeach
        
                                @endforeach
                               
                                  </tbody>
                        </table>
                        
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </page>
</body>
</html>
