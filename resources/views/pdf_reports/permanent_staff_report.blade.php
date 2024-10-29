<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Salary List</title>
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
            font-size: 1.25rem;
            margin: 0.5rem 0;
        }
        h2 {
            text-align: center;
            font-size: 1rem;
            margin: 0.5rem 0;
        }
        .flex {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 1rem;
            padding: 0 4rem;
        }
        .flex p {
            margin: 0;
        }
        .flex .label {
            width: 20%;
            font-weight: bold;
        }
        .flex .dash {
            width: 5%;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 2rem;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 0.5rem;
        }
        th {
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <page size="A4">
        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
    <h2>အမြဲတမ်းဝန်ထမ်းအင်အားစာရင်း</h2>

    <div class="flex">
        <p class="label">အဖွဲ့အစည်း</p>
        <p class="dash">-</p>
        <p>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</p>
    </div>
    <div class="flex">
        <p class="label">ဝန်ကြီးဌာနအမည်</p>
        <p class="dash">-</p>
        <p>ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</p>
    </div>
    <table class="md:w-full mx-8 my-2">
        <thead>
            <tr class="font-bold">
                <th rowspan="3" class="border border-black text-center p-2">အမှတ်စဥ်</th>
                <th rowspan="3" class="border border-black text-center p-2">လစာနှုန်း(ကျပ်)</th>
                <th colspan="4" class="border border-black text-center p-2">၂၀၂၄-၂၀၂၅<br>{{ mmDateFormat($year,$month)}}  </th>
                <th rowspan="3" class="border border-black text-center p-2">
                    {{en2mm($day).'-'.en2mm($month).'-'.en2mm($year)}}<br>ရက်နေ့တွင်အမှန်<br>တကယ်ထုတ်ပေး<br>ရမည့်လစာငွေ<br>(ကျပ်သန်း)</th>
                <th rowspan="3" class="border border-black text-center p-2">မှတ်ချက်</th>
            </tr>
            <tr class="font-bold">
                <th rowspan="2" class="border border-black text-center p-2">ခွင့်ပြု</th>
                <th colspan="3" class="border border-black text-center p-2">ခန့်ပြီး</th>
            </tr>
            <tr class="font-bold">
                <th class="border border-black text-center p-2">ကျား</th>
                <th class="border border-black text-center p-2">မ</th>
                <th class="border border-black text-center p-2">ပေါင်း</th>
            </tr>
        </thead>
        <tbody>
            <tr class="font-bold">
                <td class="border border-black text-center p-2">၁</td>
                <td class="border border-black text-center p-2">၂</td>
                <td class="border border-black text-center p-2">၃</td>
                <td class="border border-black text-center p-2">၄</td>
                <td class="border border-black text-center p-2">၅</td>
                <td class="border border-black text-center p-2">၆</td>
                <td class="border border-black text-center p-2">၇</td>
                <td class="border border-black text-center p-2">၈</td>
            </tr>
           
            @foreach ($first_payscales as $payscale)
            <tr>
                <td class="border border-black p-2">{{en2mm($loop->iteration)}}</td>
                <td class="border border-black p-2">{{$payscale->name}}</td>
                <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                <td class="border border-black p-2">{{en2mm($payscale->staff->where('gender_id',1)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by' , 1)->count())}}</td>
                <td class="border border-black p-2"> {{en2mm($payscale->staff->where('gender_id',2)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count())}} </td>
                <td class="border border-black p-2"> {{en2mm($payscale->staff->where('is_active', 1)->where('current_department_id',1)->count())}} </td>
                <td class="border border-black p-2">
                    @php
                        $totalPaidForThisMonth = 0;
                    
                    @endphp
                 
                    @foreach($payscale->staff->where('is_active', 1)->where('salary_paid_by', 1) as $staff)
                        @php
                   

                       $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                        @endphp
                    @endforeach
                  
                    {{ en2mm($totalPaidForThisMonth) }}
                </td>
                <td class="border border-black p-2"> 
                    
                </td>
    
            </tr>
        @endforeach
            <tr class="font-bold">
                <td class="border border-black text-center p-2"></td>
                <td class="border border-black text-center p-2">အရာထမ်းပေါင်း</td>
                <td class="border border-black text-right p-2">{{ en2mm($first_payscales->sum(fn($p)=>$p->allowed_qty))}}</td>
                <td class="border border-black text-right p-2">{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where('gender_id',1)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>
                <td class="border border-black text-right p-2">{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where('gender_id',2)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>

                <td class="border border-black text-right p-2">{{en2mm($first_payscales->sum(fn($p)=>$p->staff->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>
              
              
                <td class="border border-black p-2">
                    @php
                        $totalPaidForThisMonth = 0;
                        
                    @endphp
                    @foreach($first_payscales as $payscale)
                    @foreach($payscale->staff->where('is_active', 1)->where('current_department_id',1)->where('salary_paid_by', 1) as $staff)
                        @php
                            $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                        @endphp
                    @endforeach
                    {{-- @php

                    $allTotalForFirstPayScales +=  $totalPaidForThisMonth;
                    @endphp --}}

                    @endforeach
                
                    {{ en2mm($totalPaidForThisMonth) }}
                </td>
           


                <td class="border border-black p-2"> 
                    
                </td>
                <td class="border border-black text-right p-2"></td>
            </tr>
          
            @foreach ($second_payscales as $payscale)
            <tr>
                <td class="border border-black p-2">{{en2mm($loop->iteration)}}</td>
                <td class="border border-black p-2">{{$payscale->name}}</td>
                <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                <td class="border border-black p-2">{{en2mm($payscale->staff->where('gender_id',1)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by' , 1)->count())}}</td>
                <td class="border border-black p-2"> {{en2mm($payscale->staff->where('gender_id',2)->where('current_department_id',1)->where('is_active', 1)->where('side_department_id',1)->where('salary_paid_by',1)->count())}} </td>
                <td class="border border-black p-2"> {{en2mm($payscale->staff->where('is_active', 1)->where('current_department_id',1)->count())}} </td>
                <td class="border border-black p-2">
                    @php
                        $totalPaidForThisMonth = 0;
                    @endphp
                
                    @foreach($payscale->staff->where('is_active', 1)->where('salary_paid_by', 1) as $staff)
                        @php
                            $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                        @endphp
                    @endforeach
                
                    {{ en2mm($totalPaidForThisMonth) }}
                </td>
                <td class="border border-black p-2"> 
                    
                </td>
                
            </tr>
        @endforeach
        <tr class="font-bold">
            <td class="border border-black text-center p-2"></td>
            <td class="border border-black text-center p-2">အမှုထမ်းစုစုပေါင်း	</td>
            <td class="border border-black text-right p-2">{{ en2mm($second_payscales->sum(fn($p)=>$p->allowed_qty))}}</td>
            <td class="border border-black text-right p-2">{{ en2mm($second_payscales->sum(fn($p)=>$p->staff->where('gender_id',1)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>
            <td class="border border-black text-right p-2">{{ en2mm($second_payscales->sum(fn($p)=>$p->staff->where('gender_id',2)->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>

            <td class="border border-black text-right p-2">{{en2mm($second_payscales->sum(fn($p)=>$p->staff->where('current_department_id',1)->where('is_active', 1)->where('salary_paid_by',1)->count()))}}</td>
           
            <td class="border border-black p-2">
                @php
                    $totalPaidForThisMonth = 0;
                    
                @endphp
                @foreach($second_payscales as $payscale)
                
                @foreach($payscale->staff->where('is_active', 1)->where('current_department_id',1)->where('salary_paid_by', 1) as $staff)
                
                    @php
                        $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                    @endphp
                @endforeach
                {{-- @php

                $allTotalForFirstPayScales +=  $totalPaidForThisMonth;
                @endphp --}}

                @endforeach
            
                {{ en2mm($totalPaidForThisMonth) }}
            </td>
            <td class="border border-black text-right p-2"></td>
        </tr>
            <tr class="font-bold">
                <td class="border border-black text-center p-2"></td>
                <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                <td class="border border-black text-right p-2">{{ en2mm($TotalAllowQty)}}</td>
                <td class="border border-black text-right p-2">

                    {{en2mm($currentMaleStaffTotal)}}
                </td>
                <td class="border border-black text-right p-2">{{en2mm($currentFeMaleStaffTotal)}}</td>
                <td class="border border-black text-right p-2">{{en2mm($currentMaleStaffTotal + $currentFeMaleStaffTotal)}}
                </td>
                <td class="border border-black  p-2">
                    @php
                        $totalPaidForThisMonth = 0;
                        
                    @endphp
                    @foreach($allPayScales as $payscale)
                    @foreach($payscale->staff->where('is_active', 1)->where('salary_paid_by', 1) as $staff)
                    {{-- @dd($staff) --}}
                        @php
                            $totalPaidForThisMonth += $staff->paidForThisMonth($dateRange);
                            
                        @endphp
                    @endforeach
                   

                    @endforeach
                
                    {{ en2mm($totalPaidForThisMonth) }}
                </td>
                <td class="border border-black text-right p-2"></td>
            </tr>
            
            <tr>
                <td class="border border-black text-center p-2"></td>
                <td class="border border-black text-center p-2">(၁လအတွက်လစာစရိတ်(ကျပ်သန်း))</td>
                <td class="border border-black text-center p-2">{{en2mm($maximumBudget)}}</td>
                <td class="border border-black text-center p-2"></td>
                <td class="border border-black text-center p-2"></td>
                <td class="border border-black text-center p-2"></td>
                <td class="border border-black text-center p-2"></td>
                <td class="border border-black text-center p-2">


                </td>
            </tr>
        </tbody>
    </table>

        
        <div style="margin-bottom: 16px; font-size: 13px;">
            <table width="100%" style="margin-bottom: 16px; border: none;">
                <tr style="border: none;">
                    <td style="border: none;">
                        <p style="margin: 0; font-size: 13px;">
                           
                        </p>
                    </td>
                </tr>
            </table>
            <table width="100%" style="border: none;">
                <tr>
                    <td width="150px" style="vertical-align: top; border: none;">
                        <table style="border: none; width: 100%; border-collapse: collapse;">
                            <tr>
                                <td style="font-size: 13px; border: none;">လက်မှတ် -</td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; border: none;">အမည် - </td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; border: none;">ရာထူး- </td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; border: none;"> ဆက်သွယ်ရန်ဖုန်း

                                    -</td>
                            </tr>
                        </table>
                    </td>
                  
                </tr>
            </table>
        </div>
        
    </page>
</body>
</html>

