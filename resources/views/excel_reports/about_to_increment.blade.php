<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
          width: 100%;
          border-collapse: collapse;
        }
        thead th {
          background-color: #f3f4f6;
          font-size: 12px;
          font-weight: bold;
          text-align: left;
          padding: 12px;
          border-bottom: 2px solid #e5e7eb;
        }
        tbody td {
          font-size: 14px;
          padding: 12px;
          border-bottom: 1px solid #e5e7eb;
          color: #4b5563;
        }
        tbody tr:hover {
          background-color: #f9fafb;
        }
        .checkbox-cell {
          text-align: center;
        }
      </style>
</head>
<body>
    <table>
    <tr>
        <th colspan="8" style="text-align: center">
          နှစ်တိုးတိုးတော့မည့်သူများစာရင်း
        </th>
    </tr>
</table>
    <div>
        <table>
          <thead>
            <tr>
              <th>စဉ်</th>
              <th>အမည်</th>
              <th>ရာထူး</th>
              <th>ဌာနခွဲ</th>
              <th>နောက်ဆုံးနှစ်တိုး<br>တိုးသည့်အကြိမ်</th>
              <th>နောက်ဆုံးနှစ်တိုး<br>တိုးသည့်နေ့</th>
              <th>လစာမဲ့ခွင့်ရက်</th>
              <th>နောက်တစ်ကြိမ်<br>နှစ်တိုးတိုးမည့်နေ့</th>
            </tr>
          </thead>
          <tbody>
           
            @if($staffs && count($staffs) > 0)
            @foreach ($staffs as $staff)
                <tr>
                    <td>{{ en2mm($loop->index+1)}}</td>
                    <td>{{ $staff->staff_name }}</td>
                    <td>{{ $staff->rank_name }}</td>
                    <td>{{ $staff->division_name }}</td>
                    <td>{{ en2mm($staff->increment_time) }}</td>
                    <td>{{ formatDMYmm($staff->last_increment_date) }}</td>
                    <td>{{ en2mm($staff->leave_days) }}</td>
                    <td>{{ formatDMYmm($staff->coming_increment_date) }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">No staff data available.</td>
            </tr>
        @endif
          </tbody>
        </table>
      </div>
      
</body>
</html>