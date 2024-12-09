
       
        <style>
            body {
                font-family: 'Pyidaungsu', sans-serif !important;
                font-size: 13px;
            }
        
            .table-container {
                width: 100%;
                border-radius: 8px;
                overflow: hidden;
            }
        
            table {
                width: 100%;
                text-align: center;
                border-collapse: collapse;
                table-layout: fixed; /* Ensures equal-width columns */
            }
        
            th, td {
                padding: 8px;
                border: 1px solid black; /* Black border */
                word-wrap: break-word; /* Prevent overflow */
            }
        
            th {
                background-color: #f3f4f6;
                font-weight: bold;
            }
        
            thead tr {
                background-color: #f3f4f6;
            }
        
            tbody tr td {
                height: 32px;
            }
        
            /* Optional: Make the table header sticky when scrolling */
            thead th {
                position: sticky;
                top: 0;
                background: #f3f4f6;
            }
        </style>
        
        
    </head>
    <body>
        
            <div class="container">
                {{-- <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1> --}}
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>စဥ်</th>
                                <th>ရာထူးအမည်</th>
                                <th>လစာနှုန်း (ကျပ်)</th>
                                <th>ခွင့်ပြုအင်အား</th>
                                <th>ခန့်ပြီးအင်အား</th>
                                <th>လစ်လပ်အင်အား</th>
                            </tr>
                        </thead>
                        {{-- sfdfd --}}
                        <tbody>
                            @foreach ($first_ranks as $rank)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$rank->name}}</td>
                                <td>{{$rank->payscale->name}}</td>
                                <td>{{en2mm($rank->allowed_qty)}}</td>
                                <td>{{en2mm($rank->staffs->count())}}</td>
                                <td>{{en2mm($rank->allowed_qty - $rank->staffs->count())}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">{{$first_ranks[0]->staff_type->name}}</td>
                                <td>{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                                <td>{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                                <td>{{ en2mm($first_ranks->sum('allowed_qty') - $first_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                            </tr>
                            @foreach ($second_ranks as $rank)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$rank->name}}</td>
                                    <td>{{$rank->payscale->name}}</td>
                                    <td>{{en2mm($rank->allowed_qty)}}</td>
                                    <td>{{en2mm($rank->staffs->count())}}</td>
                                    <td>{{en2mm($rank->allowed_qty - $rank->staffs->count())}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">{{$second_ranks[0]->staff_type->name}}</td>
                                <td>{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                                <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                                <td>{{ en2mm($second_ranks->sum('allowed_qty') - $second_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        