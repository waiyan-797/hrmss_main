<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Staff Report 3</title>
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
            font-size: 16px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            font-weight: bold;
        }
        .bold {
            font-weight: bold;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <h1>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>           {{mmDateFormat($year,$month)}}  ၏<br>ခွင့်ခံစားမှုအရေအတွက်နှင့်ရာခိုင်နှုန်း</h1>

<table>
    <thead>
        <tr class="bold">
            <th>စဥ်</th>
            <th>ဌာနခွဲ</th>
            <th>ဝန်ထမ်းအင်အား</th>
            <th>ခွင့်ယူသည့်ဝန်ထမ်းဦးရေ</th>
            @foreach($leave_types as $leave_type)
                <th class="border border-black text-center p-2">{{ $leave_type->name}}</th>
                @endforeach
            <th>ခွင့်ယူသည့်အင်အားရာခိုင်နှုန်း</th>
        </tr>
    </thead>
    <tbody>
        @foreach($divisions as $division)


        <tr>
          <td class="border border-black text-center p-2">{{ $loop->index + 1 }}</td>
          <td class="border border-black text-center p-2">{{ $division->name }}</td>
          <td class="border border-black text-center p-2">{{ $division->staffs->count() }}</td>
          <td class="border border-black text-center p-2">{{ $division->leaveCount($division ,  $YearMonth) }}</td>
          @foreach($leave_types as $leave_type)
          <td class="border border-black text-center p-2"> {{$division->leaveCountWithLeaveType($division->id, $YearMonth,$leave_type->id)}}</td>
          @endforeach
          <td class="border border-black text-center p-2">
              {{ number_format($division->staffCount > 0 ? ($division->leaveCount / $division->staffCount) * 100 : 0, 2) }}%
          </td>
        </tr>
        @endforeach
        <tr class="font-bold">
          <td class="border border-black text-center p-2"></td>
          <td class="border border-black text-center p-2">စုစုပေါင်း</td>
          <td class="border border-black text-center p-2">{{ $totalStaffCount }}</td>
          <td class="border border-black text-center p-2">{{ $totalLeaveCount }}</td>
          @foreach($leave_types as $leave_type)
          <td class="border border-black text-center p-2">{{ $totalLeaveTypeCounts[$leave_type->id] ?? 0 }}</td>
          @endforeach
          <td class="border border-black text-center p-2">
              {{ number_format($totalStaffCount > 0 ? ($totalLeaveCount / $totalStaffCount) * 100 : 0, 2) }}%
          </td>
        </tr>
      </tbody>
</table>
    </page>
</body>
</html>
