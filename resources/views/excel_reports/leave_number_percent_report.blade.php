
{{-- <style type="text/css">
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
    .heading {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 8px;
        text-align: center;
    }
    .sub-heading {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 8px;
        text-align: center;
    }
    .table-container {
        width: 100%;
        border-radius: 8px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        text-align: center;
        padding: 8px;
    }
    th {
        font-weight: bold;
    }
    .note-container {
        display: flex;
        justify-content: flex-start;
        font-weight: bold;
        margin-top: 16px;
    }
    .note-label {
        width: 20%;
        margin-left: 40px;
    }
    .note-content {
        width: 60%;
    }

</style>
</head> --}}
<body>

    <div class="container">
        {{-- <h1 class="heading">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>ဌာနအလိုက်နေပြည်တော်သို့ပြောင်းရွေ့ရောက်ရှိအင်အားစာရင်း</h1>
        <h2 class="sub-heading">၂၀၂၄ ခုနှစ်၊ ဇွန်လ</h2> --}}
        
        <div class="table-container">
            {{-- @php
            dd($divisions);
            
        @endphp --}}
            <table class="">
                <tr>
                    <th colspan="12" style="font-weight:bold;">
                        ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                    </th> 
                </tr>
                <tr>
                    <th colspan="12" style="font-weight:bold;">
                        တိုင်းဒေသကြီး/ပြည်နယ်ညွှန်ကြားရေးမှူးရုံးများ
                    </th>
                </tr>
                <tr>
                    <th colspan="12" style="font-weight:bold;">
                        {{mmDateFormat($year,$month)}}အတွင်း ဝန်ထမ်းများ၏
                    </th>
                </tr>
                <tr>
                    <th colspan="12" style="font-weight:bold;">
                        ခွင့်ခံစားမှုအရေအတွက်နှင့်ရာခိုင်နှုန်း
                    </th>
                </tr>
                <tr>
                    <th colspan="12" style="font-weight:bold;">
                        ပူးတွဲ(၃)
                    </th>
                </tr>
            </table>


             <table>
                <thead>
                    <tr>
                        <th  style="font-weight:bold;">စဥ်</th>
                        <th  style="font-weight:bold;">ဌာနခွဲ</th>
                        <th  style="font-weight:bold;">ဝန်ထမ်း<br>အင်အား</th>
                        <th  style="font-weight:bold;">ခွင့်ယူသည့်<br>ဝန်ထမ်း<br>ဦးရေ</th>
                        <th  style="font-weight:bold;">ရှောင်တခင်ခွင့်<br>ရက်ပေါင်း</th>
                        <th  style="font-weight:bold;">လုပ်သက်ခွင့်<br>ရက်ပေါင်း</th>
                        <th  style="font-weight:bold;">မီးဖွားခွင့်/<br>သားပျက်ခွင့်</th>
                        <th  style="font-weight:bold;">ဆေးခွင့်<br>ရက်ပေါင်း</th>
                        <th  style="font-weight:bold;">လစာမဲ့ခွင့်</th>
                        <th  style="font-weight:bold;">ကြိုတင်<br>ပြင်ဆင်ခွင့်<br>ရက်ပေါင်း</th>
                        <th  style="font-weight:bold;">ကလေးပြုစု<br>စောင့်ရှောက်<br>ခွင့်ရက်ပေါင်း</th>
                        <th  style="font-weight:bold;">ခွင့်ယူသည့်<br>အင်အား<br>ရာခိုင်နှုန်း</th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach($divisions as $division)
                    
            
            
                    <tr>
                      <td class="border border-black text-center p-2">{{ $loop->index + 1 }}</td>
                      <td class="border border-black text-center p-2">{{ $division->name }}</td>
                      <td class="border border-black text-center p-2">{{ en2mm($division->staffs->count()) }}</td>
                      <td class="border border-black text-center p-2">{{ en2mm($division->leaveCount($division ,  $YearMonth)) }}</td>
                      @foreach($leave_types as $leave_type)
                      <td class="border border-black text-center p-2"> {{en2mm($division->leaveCountWithLeaveType($division->id, $YearMonth,$leave_type->id))}}</td>
                      @endforeach
                      <td class="border border-black text-center p-2">
                          {{ en2mm(number_format($division->staffCount > 0 ? ($division->leaveCount / $division->staffCount) * 100 : 0, 2)) }}%
                      </td>
                    </tr>
                    @endforeach
                    <tr class="font-bold">
                      <td class="border border-black text-center p-2"></td>
                      <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                      <td class="border border-black text-center p-2">{{ en2mm($totalStaffCount) }}</td>
                      <td class="border border-black text-center p-2">{{ en2mm($totalLeaveCount) }}</td>
                      @foreach($leave_types as $leave_type)
                      <td class="border border-black text-center p-2">{{ en2mm($totalLeaveTypeCounts[$leave_type->id] ?? 0) }}</td>
                      @endforeach
                      <td class="border border-black text-center p-2">
                          {{ en2mm(number_format($totalStaffCount > 0 ? ($totalLeaveCount / $totalStaffCount) * 100 : 0, 2)) }}%
                      </td>
                    </tr>
                  </tbody>
            </table>
        </div>
    </div>
