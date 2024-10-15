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
            font-family: 'tharlon';
            font-size: 13px;
        }

        h1 {
            font-weight: bold;
            text-align: center;
            font-size: 1rem;
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

        td.text-left {
            text-align: left;
        }

        @media (min-width: 768px) {
            table {
                width: 100%;
            }
        }


        
    </style>
</head>
<body>
    <page size="A4">
        <h1>
            ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>နိုင်ငံခြားသွားရောက်ခဲ့သောအကြိမ်ရေစုစုပေါင်းနှင့်အကြောင်းအရာ
        </h1>
    
        <table class="md:w-full">
            <thead>
                <tr>
                    <th class="border border-black text-center p-2">စဥ်</th>
                    <th class="border border-black text-center p-2">အမည်</th>
                    <th class="border border-black text-center p-2">ရာထူး</th>
                    <th class="border border-black text-center p-2">သွားရောက်သည့်နိုင်ငံ</th>
                    <th class="border border-black text-center p-2">သင်တန်း</th>
                    <th class="border border-black text-center p-2">အခြား</th>
                    <th class="border border-black text-center p-2">စုစုပေါင်း</th>
                </tr>
            </thead>
            <<tbody>
                @foreach($staffs as $staff)
                    @php
                        // Get unique countries from both trainings and abroads
                        $allCountries = $staff->abroads->pluck('country_id')
                                        ->merge($staff->trainings->pluck('country_id'))
                                        ->unique();
            
                        // Calculate total counts
                        $totalTrainings = $staff->trainings->count();
                        $totalAbroads = $staff->abroads->count();
                        $totalOverall = $totalTrainings + $totalAbroads;
                    @endphp
                
                    @foreach($allCountries as $index => $countryId)
                    <tr>
                        
                        @if($index == 0)
                            <!-- Merge the first three columns for each staff -->
                            <td class="border border-black text-center p-2" rowspan="{{ $allCountries->count() }}">{{ $loop->parent->iteration }}</td>
                            <td class="border border-black text-left p-2" rowspan="{{ $allCountries->count() }}">{{ $staff->name }}</td>
                            <td class="border border-black text-center p-2" rowspan="{{ $allCountries->count() }}">{{ $staff->current_rank->name }}</td>
                        @endif
                        
                        <!-- Display country name -->
                        {{-- @dd($allCountries)
                        @dd($Allcountries->where('id',$countryId)->first()->name) --}}
                        {{-- <td class="border border-black text-center p-2">{{ $staff->abroads->firstWhere('country_id', $countryId)?->country?->name ?? $staff->trainings->firstWhere('country_id', $countryId)?->country?->name }}</td> --}}
                       
                        <td class="border border-black text-center p-2">{{ getCountryNameById($countryId)}}</td>


                        
                        <!-- Count for trainings in this country -->
                        <td class="border border-black text-center p-2">{{ en2mm($staff->trainings->where('country_id', $countryId)->count()) }}</td>
                        
                        <!-- Count for abroads in this country -->
                        <td class="border border-black text-center p-2">{{ en2mm($staff->abroads->where('country_id', $countryId)->count()) }}</td>
            
                        @if($index == 0)
                            <!-- Merge the final column for total -->
                            <td class="border border-black text-center p-2" rowspan="{{ $allCountries->count() }}">
                                {{ en2mm($totalOverall) }}
                            </td>
                        @endif
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
            
        </table>
    
    </page>
</body>
</html>

