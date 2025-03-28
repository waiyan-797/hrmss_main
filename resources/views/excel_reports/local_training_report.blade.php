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
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px 16px;
            border: 1px solid #d1d5db; 
            text-align: left;
        }

        thead {
            background-color: #f3f4f6; 
        }

        th {
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9fafb; 
        }

        tr:hover {
            background-color: #e5e7eb; 
        }

    </style>
</head>
<body>
    
    <page size="A4">
        <div class="table-container">
            <table class="min-w-full border border-black">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-center p-2">အမည်</th>
                        <th class="border border-black text-center p-2">ရာထူး</th>
                        <th class="border border-black text-center p-2">သင်တန်းအမည်</th>
                        <th class="border border-black text-center p-2">သင်တန်းကာလ(မှ)</th>
                        <th class="border border-black text-center p-2">သင်တန်းကာလ(အထိ)</th>
                        <th class="border border-black text-center p-2">သင်တန်းနေရာ/ဒေသ</th>
                        <th class="border border-black text-center p-2">သင်တန်းအမျိုးအစား</th>
                        <th class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                </thead>
               
                <tbody>

                    @foreach ($staffs as $staff)
                    @php $firstTraining = $staff?->trainings->whereIn('training_location_id', $trainingLocation == 3 ? null : $trainingLocation )->first(); @endphp
                    @if($firstTraining)
                        <tr>
                            <!-- First staff details row with first training -->
                            <td class="border border-black text-right p-1" rowspan="{{ $staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->count() }}">{{ $loop->index + 1 }}</td>
                            <td class="border border-black text-right p-1" rowspan="{{ $staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->count() }}">{{ $staff->name }}</td>
                            <td class="border border-black text-right p-1" rowspan="{{ $staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->count() }}">{{ $staff->currentRank->name }}</td>

                            <!-- First training record -->
                            <td class="border border-black text-center p-2">{{ $firstTraining->training_type->name }}</td>
                            <td class="border border-black text-center p-2">{{ $firstTraining->from_date }}</td>
                            <td class="border border-black text-center p-2">{{ $firstTraining->to_date }}</td>
                            <td class="border border-black text-center p-2">{{ $firstTraining->location }}</td>
                            <td class="border border-black text-center p-2">{{ $firstTraining->training_type?->name }}</td>

                            <td class="border border-black text-center p-2">
                                {{ $firstTraining->remark }}
                            </td>
                        </tr>

                        <!-- For remaining trainings, create new rows -->
                        @foreach($staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->skip(1) as $training)
                            <tr>
                                <td class="border border-black text-center p-2">{{ $training->training_type->name }}</td>
                                <td class="border border-black text-center p-2">{{ $training->from_date }}</td>
                                <td class="border border-black text-center p-2">{{ $training->to_date }}</td>
                                <td class="border border-black text-center p-2">{{ $training->location }}</td>
                                <td class="border border-black text-center p-2">{{ $training->training_type?->name }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ $training->remark }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    @endforeach
                    
                     
                                
                </tbody>

            </table>
           
        </div>
        
        
</body>
</html>