<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Religion Report</title>
    <style type="text/css">
        page{
            background: white;
        }e

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
        .report-title {
            font-weight: bold;
            text-align: center;
            font-size: 16px;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }

        th[rowspan="2"], th[colspan="2"] {
            text-align: center;
        }

        td.text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .mb-1 {
            margin-bottom: 5px;
        }     
    </style>
</head>
<body>
    <page size="A4">
        <h1 class="report-title">Religion Report</h1>

        <table>
            <thead>
                <tr>
                    <th rowspan="2" class="text-left">စဥ်</th>
                    <th rowspan="2" class="text-left">အမည်</th>
                    <th rowspan="2" class="text-left">ရာထူး</th>
                    <th colspan="2" class="text-left">ဗုဒ္ဓဘာသာ</th>
                    <th colspan="2" class="text-left">ခရစ်ယာန်ဘာသာ</th>
                    <th colspan="2" class="text-left">ဟိန္ဒူဘာသာ</th>
                    <th colspan="2" class="text-left">အစ္စလာမ်ဘာသာ</th>
                    <th colspan="2" class="text-left">အခြား</th>
                </tr>
                <tr>
                    <th class="text-left">ကျား</th>
                    <th class="text-left">မ</th>
                    <th class="text-left">ကျား</th>
                    <th class="text-left">မ</th>
                    <th class="text-left">ကျား</th>
                    <th class="text-left">မ</th>
                    <th class="text-left">ကျား</th>
                    <th class="text-left">မ</th>
                    <th class="text-left">ကျား</th>
                    <th class="text-left">မ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff)
                <tr>
                    <td>{{ $loop->index+1}}</td>
                    <td>{{ $staff->name}}</td>
                    <td>{{ $staff->currentRank?->name}}</td>

                    {{-- Buddhist --}}
                    <td>
                        @if($staff->religion_id==1 && $staff->gender_id==1)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>
                    <td>
                        @if($staff->religion_id==1 && $staff->gender_id==2)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>

                    {{-- Christian --}}
                    <td>
                        @if($staff->religion_id==2 && $staff->gender_id==1)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>
                    <td>
                        @if($staff->religion_id==2 && $staff->gender_id==2)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>

                    {{-- Hindu --}}
                    <td>
                        @if($staff->religion_id==3 && $staff->gender_id==1)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>
                    <td>
                        @if($staff->religion_id==3 && $staff->gender_id==2)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>

                    {{-- Islam --}}
                    <td>
                        @if($staff->religion_id==4 && $staff->gender_id==1)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>
                    <td>
                        @if($staff->religion_id==4 && $staff->gender_id==2)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>

                    {{-- Other Religion --}}
                    <td>
                        @if($staff->religion_id==5 && $staff->gender_id==1)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>
                    <td>
                        @if($staff->religion_id==5 && $staff->gender_id==2)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                          </svg>
                          
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </page>
</body>
</html>
