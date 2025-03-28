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
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }

        h1 {
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
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
        th[rowspan="2"] {
            vertical-align: middle;
        }
        th[colspan="2"] {
            text-align: center;
        }
        th, td {
            text-align: center;
        }
    </style>
</head>
<body>
    <page size="A4">
        <h1>Foreign Training Report</h1>

    <table>
        <thead>
            <tr>
                <th rowspan="2">စဥ်</th>
                <th rowspan="2">အမည်</th>
                <th rowspan="2">ရာထူး</th>
                <th colspan="2">သွားရောက်သည့်ကာလ</th>
                <th rowspan="2">သွားရောက်သည့်နိုင်ငံ</th>
                <th rowspan="2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ</th>
                <th rowspan="2">ထောက်ပံ့သည့်အဖွဲ့အစည်း</th>
                <th rowspan="2">မှတ်ချက်</th>
            </tr>
            <tr>
                <th>မှ</th>
                <th>ထိ</th>
            </tr>
        </thead>
        <tbody>
           
            @php 
                        $serialNumber = 1;  // Initialize serial number counter
                    @endphp

                    @foreach($staffs as $staff)
                        @if($staff->abroads->isNotEmpty()) 
                            @php 
                                $abroadCount = $staff->abroads->count();
                            @endphp
                    
                            @foreach ($staff->abroads as $index => $abroad)
                                <tr>
                                    @if($index == 0)
                                        <td class="border border-black text-center p-2" rowspan="{{ $abroadCount }}">{{ $serialNumber++ }}</td> <!-- Use and increment serialNumber -->
                                        <td class="border border-black text-center p-2" rowspan="{{ $abroadCount }}">{{ $staff->name }}</td>
                                        <td class="border border-black text-center p-2" rowspan="{{ $abroadCount }}">{{ $staff->current_rank->name }}</td>
                                    @endif
                                    
                                    <td class="border border-black text-center p-2">{{ $abroad->from_date }}</td>
                                    <td class="border border-black text-center p-2">{{ $abroad->to_date }}</td>
                                    <td class="border border-black text-center p-2">{{ $abroad->country->name }}</td>
                                    <td class="border border-black text-center p-2">{{ $abroad->particular }}</td>
                                    <td class="border border-black text-center p-2">{{ $abroad->sponser }}</td>
                
                                    @if($index == 0)
                                        <td class="border border-black text-center p-2" rowspan="{{ $abroadCount }}"></td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
        </tbody>
    </table>

        
    
    </page>
</body>
</html>

