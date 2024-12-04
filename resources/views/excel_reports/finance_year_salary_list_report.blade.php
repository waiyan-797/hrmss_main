<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Finance Year Salary List</title>
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
            display: flex;
            justify-content: center;
            width: 100%;
            height: 83vh;
            overflow-y: auto;
        }

        .content {
            width: 100%;
            margin: 0 auto;
            padding: 16px;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .mb-3 {
            margin-bottom: 12px;
        }

        .text-right {
            text-align: right;
        }

    </style>
</head>
<body>
    <page size="A4">
        <div class="container">
            <div class="content">
                <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
                    <div class="w-full mx-auto px-3 py-4">
                        
                        <h1 class="font-bold text-center text-sm mb-3">ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
                        <h2 class="font-bold text-center text-sm mb-3">{{$startYr}} - {{$endYr}} ခု ဘဏ္ဍာရေးနှစ်လစာ</h2>
                        <input type="number" min="2005" step="1" wire:model.live="endYr" />
            
                        <table class="md:w-full">
                            <thead>
                                <tr>
                                    <th class="border border-black text-center p-2">စဥ်</th>
                                    <th class="border border-black text-center p-2">GivenName</th>
                                    <th class="border border-black text-center p-2">ရာထူး</th>
                                    <th class="border border-black text-center p-2">January</th>
                                    <th class="border border-black text-center p-2">February</th>
                                    <th class="border border-black text-center p-2">March</th>
                                    <th class="border border-black text-center p-2">April</th>
                                    <th class="border border-black text-center p-2">May</th>
                                    <th class="border border-black text-center p-2">June</th>
                                    <th class="border border-black text-center p-2">July</th>
                                    <th class="border border-black text-center p-2">August</th>
                                    <th class="border border-black text-center p-2">September</th>
                                    <th class="border border-black text-center p-2">October</th>
                                    <th class="border border-black text-center p-2">November</th>
                                    <th class="border border-black text-center p-2">December</th>
                                    <th class="border border-black text-center p-2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Ranks as $rank)
                                    @foreach($rank->staffs as $staff)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td> 
                                            <td>{{ $staff->gener_id ? 'U' : 'Daw' }}</td> 
                                            <td>{{ $staff->currentRank->name }}</td>
            
                               @for ($i = 1; $i <= 12; $i++)
                               <td>{{$staff->salaries()->whereMonth('salary_month', $i)->whereYear('salary_month', $endYr)->first()?->actual_salary}}</td>
                                   
                               @endfor
            
                                      
                                        </tr>
                                    @endforeach
                                    @if($rank->staffs->isNotEmpty())
            
            
                                    <tr>
                                        <td>
                                            {{ 
                                                $rank->staffs->sum(fn($staff) => 
                                                    $staff->salaries()
                                                        
                                                        ->whereYear('salary_month', $endYr)
                                                        ->first()?->actual_salary ?? 0 
                                                ) 
                                            }}
                                        </td>
                                    </tr>
                                    
                                     @endif 
                               
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>        </div>
        </div>
    
    </page>
</body>
</html>
