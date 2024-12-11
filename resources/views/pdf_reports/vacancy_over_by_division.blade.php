 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacancy Report</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #f8f8f8;
        }
        div {
            font-size: 14px; 
            text-align: center;
        }
        div {
            font-size: 15px;
            text-align: center;
        }
        h6{
            font-size: 15px;
            text-align: right;
        }

    </style>
</head>
<body>
    <div class="overflow-x-auto mt-6">
        <h6>ရက်စွဲ - {{getTdyDateInMyanmarYearMonthDay(2)}}</h6>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>ရာထူးအမည်</th>
                    <th>ဖွဲ့စည်းပုံ</th>

                    <th>ခန့်ထားအင်အား</th>
                    <th>လစ်လပ်</th>
                    <th>မှတ်ချက် </th>
                </tr>
            </thead>

            <tbody>
              
                @php
        $count = 0; 
    @endphp

    @foreach ($first_payscales as $payscale)
        @foreach ($payscale->ranks as $rank)
            <tr>
                <td>{{ en2mm(++$count) }}</td>
                <td>{{ $rank->name }}</td>
                <td>{{ en2mm($rank->allowed_qty) }}</td>
                <td>{{ en2mm($rank->staffs->filter(fn($staff) => $staff->current_division_id == 1)->count()) }}</td>
                <td>{{ en2mm($rank->staffs->filter(fn($staff) => $staff->current_division_id == 1)->count() - $rank->allowed_qty) }}</td>
                <td></td>
            </tr>
        @endforeach
    @endforeach

    @foreach ($second_payscales as $payscale)
        @foreach ($payscale->ranks as $rank)
            <tr>
                <td>{{ en2mm(++$count) }}</td>
                <td>{{ $rank->name }}</td>
                <td>{{ en2mm($rank->allowed_qty) }}</td>
                <td>{{ en2mm($rank->staffs->filter(fn($staff) => $staff->current_division_id == 1)->count()) }}</td>
                <td>{{ en2mm($rank->staffs->filter(fn($staff) => $staff->current_division_id == 1)->count() - $rank->allowed_qty) }}</td>
                <td></td>
            </tr>
        @endforeach
    @endforeach
    <tr class="font-bold">
        <td></td>
        <td>ပေါင်း</td>
        <td>
            {{
                en2mm(
                    $first_payscales->sum(function($payscale) {
                    return $payscale->ranks->sum(function($rank) {
                        return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
                    });
                }
                )
                +

                $second_payscales->sum(function($payscale) {
                    return $payscale->ranks->sum(function($rank) {
                        return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
                    });
                }
                )
                )
            }}
        </td>
        


        <td>
            {{
                en2mm(
                    $first_payscales->sum(function($payscale) {
                        return $payscale->ranks->sum(function($rank) {
                            return $rank->staffs->filter(function($staff) {
                                return $staff->current_division_id == 1;
                            })->count();
                        });
                    }) 
                    +
                    $second_payscales->sum(function($payscale) {
                        return $payscale->ranks->sum(function($rank) {
                            return $rank->staffs->filter(function($staff) {
                                return $staff->current_division_id == 1;
                            })->count();
                        });
                    }) 

                )
            }}
        </td>
        

        <td>
            {{
                en2mm(
                 (   $first_payscales->sum(function($payscale) {
                        return $payscale->ranks->sum(function($rank) {
                            return $rank->staffs->filter(function($staff) {
                                return $staff->current_division_id == 1;
                            })->count();
                        });
                    }) 
                    +
                    $second_payscales->sum(function($payscale) {
                        return $payscale->ranks->sum(function($rank) {
                            return $rank->staffs->filter(function($staff) {
                                return $staff->current_division_id == 1;
                            })->count();
                        });
                    }) )
                    -
                    (
                        $first_payscales->sum(function($payscale) {
                    return $payscale->ranks->sum(function($rank) {
                        return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
                    });
                }
                )
                +

                $second_payscales->sum(function($payscale) {
                    return $payscale->ranks->sum(function($rank) {
                        return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
                    });
                }
                )
                    )
                   


                )
            }}
        </td>
        <td></td>




     
        
    </tr> 



            </tbody>

        </table>
        <div>အတွင်းရေး</div>
    </div>
</body>
</html> 
