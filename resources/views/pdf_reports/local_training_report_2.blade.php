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
        h1 {
            font-size: 1.5em;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .colspan {
            background-color: #e0e0e0;
        }

        
    </style>
</head>
<body>
    <page size="A4">
        <h1>Local Training Report</h1>

        <table>
            <thead>
                <tr>
                    <th rowspan="2">စဥ်</th>
                    <th rowspan="2">အမည်</th>
                    <th rowspan="2">ရာထူး</th>
                    <th colspan="2" class="colspan">သွားရောက်သည့်ကာလ</th>
                    <th rowspan="2">ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲတတ်ရောက်ခဲ့သည့်နေရာ</th>
                    <th rowspan="2">တတ်ရောက်ခဲ့သည့်အကြောင်းအရာ</th>
                    <th rowspan="2">ပညာအရည်အချင်း</th>
                </tr>
                <tr>
                    <th>မှ</th>
                    <th>ထိ</th>
                </tr>
            </thead>
            {{-- <tbody>
                
                @foreach($staffs as $staff)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $staff->name}}</td>
                        <td>{{ $staff->current_rank->name}}</td>
                        @foreach($staff->abroads as $abroad)
                        <td>{{ $abroad->from_date}}</td>
                        <td>{{ $abroad->to_date}}</td>
                        @endforeach
                        @foreach($staff->trainings as $training)
                        <td>{{ $training->location}}</td>
                        <td>{{ $training->remark}}</td>
                        @endforeach
                        <td class="border border-black text-left p-1">
                            @foreach ($staff->staff_educations as $edu)
                                <div>
                                    <span>{{ $edu->education_group->name }}</span>
                                    <span>{{ $edu->education_type->name }}</span>
                                    <span>{{ $edu->education->name }}</span>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
            </tbody>  --}}

            <tbody>
                
                @foreach($staffs as $staff)
                        @php 
                            $abroadCount = $staff->abroads->count();
                            $trainingCount = $staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->count(); // Filter by training location
                            $educationCount = $staff->staff_educations->count();
                            $maxRows = max($abroadCount, $trainingCount, $educationCount); // Find the maximum count of related items
                        @endphp
                
                        @for ($i = 0; $i < $maxRows; $i++)
                            <tr>
                                @if($i == 0)
                                    <td rowspan="{{ $maxRows }}">{{ $loop->index + 1 }}</td>
                                    <td rowspan="{{ $maxRows }}">{{ $staff->name }}</td>
                                    <td rowspan="{{ $maxRows }}">{{ $staff->currentRank?->name }}</td>
                                @endif
                                <td class="border border-black text-left p-1">
                                    @if(isset($staff->staff_educations[$i]))
                                        <div>
                                            <span>{{ $staff->staff_educations[$i]->education_group->name }}</span>
                                            <span>{{ $staff->staff_educations[$i]->education_type->name }}</span>
                                            <span>{{ $staff->staff_educations[$i]->education->name }}</span>
                                        </div>
                                    @endif
                                </td>
                                <!-- Abroads -->
                                <td>
                                    {{ optional($staff->abroads[$i] ?? null)->from_date ?? '' }}
                                </td>
                                <td>
                                    {{ optional($staff->abroads[$i] ?? null)->to_date ?? '' }}
                                </td>
                
                                <!-- Trainings (filtered by training location) -->
                                <td>
                                    {{ optional($staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->values()[$i] ?? null)->location ?? '' }}
                                </td>
                                <td>
                                    {{ optional($staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->values()[$i] ?? null)->remark ?? '' }}
                                </td>
                
                                <!-- Staff Educations -->
                            
                                <td>
                                သင်တန်းအမျိုးအစား
                                </td>

                            </tr>
                        @endfor
                    @endforeach
            </tbody>
             

        
        </table>
         {{-- <p>{{ $letter_types->Where('id', $letter_type_id)?->name }}</p>   --}}
      

      
        
    </page>
        
        
</body>
</html>