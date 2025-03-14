<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>လုပ်သက်မှတ်တွက်ချက်မှု</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
        .content {
            width: 90%;
            margin: 0 auto;
        }
        .staff-info {
            text-align: left;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .table-container {
            width: 100%;
            height: 80vh;
            overflow-y: auto;
            border: 1px solid black;
            padding: 10px;
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
    </style>
</head>
<body>
    {{-- <h1>ပြည်ထောင်စုရာထူးဝန်အဖွဲ့</h1>
    <h1>လုပ်သက်မှတ်တွက်ချက်မှု စနစ်သစ်</h1> --}}
    <tr>
        <th colspan="5" style="font-weight:bold;">
            ပြည်ထောင်စုရာထူးဝန်အဖွဲ့
        </th> 
    </tr>
    <tr>
        <th colspan="5" style="font-weight:bold;">
            လုပ်သက်မှတ်တွက်ချက်မှု စနစ်သစ်
        </th> 
    </tr>

    {{-- <div class="content">
        <div class="staff-info">အမည်။ {{ $staff->name }}</div>
        <div class="staff-info">ရာထူး။ {{ $staff->current_rank?->name }}</div>
    </div> --}}
    {{-- <tr>
        <th colspan="5" style="font-weight:bold; ">
            အမည်။ {{ $staff->name }}
        </th> 
    </tr>
    <tr>
        <th colspan="5" style="font-weight:bold;">
            ရာထူး။ {{ $staff->current_rank?->name }}
        </th> 
    </tr> --}}
    <tr>
        <th colspan="5" style="font-weight:bold; text-align: right;">
            အမည် -  {{ $staff->name }}
        </th> 
    </tr>
    <tr>
        <th colspan="5" style="font-weight:bold; text-align: right;">
            ရာထူး - {{ $staff->current_rank?->name }}
        </th> 
    </tr>
    

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th style="font-weight: bold;">စဥ်</th>
                    <th style="font-weight: bold;">ရာထူး</th>
                    <th style="font-weight: bold;">နှစ်</th>
                    <th style="font-weight: bold;">ရမှတ်</th>
                    <th style="font-weight: bold;">မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td>၁။</td>
                    <td>လက်ရှိရာထူး</td>
                    <td>{{ en2mm($first_promotion_points) }}</td>
                    <td>{{ en2mm($first_promotion_points*3) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>၂။</td>
                    <td>တစ်ဆင့်နိမ့်ရာထူး</td>
                    <td>{{ en2mm($second_promotion_points) }}</td>
                    <td>{{ en2mm($second_promotion_points*2) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>၃။</td>
                    <td>နောက်တစ်ဆင့်နိမ့်ရာထူး</td>
                    <td>{{ en2mm($third_promotion_points) }}</td>
                    <td>{{ en2mm($third_promotion_points*1) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>၄။</td>
                    <td>နောက်တစ်ဆင့်နိမ့်ရာထူးများ</td>
                    <td>{{ en2mm($fourth_promotion_points) }}</td>
                    <td>{{ en2mm($fourth_promotion_points*0.5) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>လုပ်သက်ပေါင်း</td>
                    <td>{{ en2mm($first_promotion_points+$second_promotion_points+$third_promotion_points+$fourth_promotion_points) }}</td>
                    <td>{{ en2mm($first_promotion_points*3+$second_promotion_points*2+$third_promotion_points*1+$fourth_promotion_points*0.5) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>လက်ကျန်လုပ်သက်</td>
                    <td>{{ en2mm(44-($first_promotion_points+$second_promotion_points+$third_promotion_points+$fourth_promotion_points)) }}</td>
                    <td>{{ en2mm((44 - ($first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points)) * 3) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>ဝန်ထမ်းရမှတ်</td>
                    <td></td>
                    <td>{{ en2mm(($first_promotion_points * 3 + $second_promotion_points * 2 + $third_promotion_points * 1 + $fourth_promotion_points * 0.5) * 100 / 
                        (($first_promotion_points * 3 + $second_promotion_points * 2 + $third_promotion_points * 1 + $fourth_promotion_points * 0.5) + 
                        ((44 - ($first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points)) * 3))) }}
                    </td>
                    <td></td>
                </tr> --}}

                <tr>
                    <td>၁။</td>
                    <td>လက်ရှိရာထူး</td>
                    <td>
                        {{ en2mm($first_promotion_points) }}
                    </td>
                    <td>   {{ en2mm($first_promotion_points*3) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>၂။</td>
                    <td>တစ်ဆင့်နိမ့်ရာထူး</td>
                    <td>
                        {{ en2mm($second_promotion_points) }}
                    </td>
                    <td> {{ en2mm($second_promotion_points*2) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>၃။</td>
                    <td>နောက်တစ်ဆင့်နိမ့်ရာထူး</td>
                    <td>{{ en2mm($third_promotion_points) }}</td>
                    <td>{{ en2mm($third_promotion_points*1) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>၄။</td>
                    <td>နောက်တစ်ဆင့်နိမ့်ရာထူးများ</td>
                    <td>  {{ en2mm($fourth_promotion_points) }}</td>
                    <td>{{ en2mm($fourth_promotion_points*0.5) }}</td>
                   
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>လုပ်သက်ပေါင်း</td>
                    <td> {{ en2mm($first_promotion_points+$second_promotion_points+$third_promotion_points+$fourth_promotion_points) }}</td>
                    <td>{{ en2mm($first_promotion_points*3+$second_promotion_points*2+$third_promotion_points*1+$fourth_promotion_points*0.5)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>လက်ကျန်လုပ်သက်</td>
                    <td>{{ en2mm(44-($first_promotion_points+$second_promotion_points+$third_promotion_points+$fourth_promotion_points)) }}</td>
                    <td>{{ en2mm((44 - ($first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points)) * 3) }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>ဝန်ထမ်းရမှတ်</td>
                    <td></td>
                    <td>
                        {{-- {{ en2mm(($first_promotion_points * 3 + $second_promotion_points * 2 + $third_promotion_points * 1 + $fourth_promotion_points * 0.5) * 100 / 
                        (($first_promotion_points * 3 + $second_promotion_points * 2 + $third_promotion_points * 1 + $fourth_promotion_points * 0.5) + 
                        ((44 - ($first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points)) * 3))) }} --}}
                        {{ en2mm(number_format((($first_promotion_points * 3 + $second_promotion_points * 2 + $third_promotion_points * 1 + $fourth_promotion_points * 0.5) * 100 / 
                            (($first_promotion_points * 3 + $second_promotion_points * 2 + $third_promotion_points * 1 + $fourth_promotion_points * 0.5) + 
                            ((44 - ($first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points)) * 3))), 2)) }}
                        
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
