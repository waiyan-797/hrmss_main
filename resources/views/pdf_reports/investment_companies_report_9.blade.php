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

        .container {
            width: 100%;
            margin-bottom: 16px;
        }

        /* h1 {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        } */
        h1 {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .text-center {
            text-align: center;
        }

        .mb-2 {
            margin-bottom: 16px;
        }


        .table-container {
            width: 100%;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
        }

        th {
            background-color: #f3f3f3;
        }

        .text-left {
            text-align: left;
        }

        

    </style>
</head>
<body>
    <page size="A4">
        <div class="container">
        
            <h1 class="text-center mb-2">
                ၂၀၂၄-၂၀၂၅ ဘဏ္ဍာရေးနှစ်အတွင်း ဝန်ထမ်းအဖြစ်မှ ထုတ်ပစ်ခံရသော ဝန်ထမ်းများစာရင်း
            </h1>
            <h1 class="mb-2">
                ဝန်ထမ်းအဖွဲ့အစည်းအမည်၊ရင်းနှီးမြှုပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </h1>
    
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>စဥ်</th>
                            <th>အမည်နှင့်အမျိုးသားမှတ်ပုံတင်အမှတ်</th>
                            <th>မွေးနေ့သက္ကရာဇာ်</th>
                            <th class="text-left">(က)ရာထူး<br>(ခ)လစာနှုန်း<br>(ဂ)နောက်ဆုံးထုတ်လစာ</th>
                            <th>စတင်အမှုထမ်းသည့်နေ့</th>
                            <th>စတင်ကင်းကွာ/ပျက်ကွက်သည့်နေ့</th>
                            <th>ဝန်ထမ်းအဖြစ်မှထုတ်ပစ်/ရာထူးမှထုတ်ပယ်သည့်နေ့အမိန့်စာရက်စွဲ</th>
                            <th>လုပ်သက်</th>
                            <th>ဝန်ထမ်းအဖြစ်မှထုတ်ပစ်/ရာထူးမှထုတ်ပယ်ခံရသည့်အကြောင်းအရင်း</th>
                            <th>မှတ်ချက်</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>(က)</td>
                            <td>(ခ)</td>
                            <td>(ဂ)</td>
                            <td>(ဃ)</td>
                            <td>(င)</td>
                            <td>(စ)</td>
                            <td>(ဆ)</td>
                            <td>(ဇ)</td>
                            <td>(ဈ)</td>
                            <td>(ည)</td>
                        </tr>
                        @foreach($staffs as $staff)
                        <tr>
                            <td>{{ en2mm($loop->index+1)}}</td>
                            <td>{{ $staff->name}}၊{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</td>
                            <td>{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</td>
                            <td>{{ $staff->current_rank?->name}}၊{{ $staff->payscale?->name}}၊{{ $staff->current_salary}}</td>
                            <td>{{en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y'))}}</td>
                            <td>{{ $staff->lost_contact_from_date}}</td>
                            <td>{{ $staff->retire_date}}</td>
                            <td>
                                  @php
                                $join_date = Carbon\Carbon::parse($staff->join_date);
                                $join_date_duration = $join_date->diff(Carbon\Carbon::now());
                            @endphp
                            {{formatPeriodMM($join_date_duration->y, $join_date_duration->m, $join_date_duration->d)}}</td>
                            <td>{{ $staff->retire_remark}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    

</body>
</html>