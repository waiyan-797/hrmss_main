
       
        {{-- <style>
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
        </style> --}}
        
        
    {{-- </head> --}}
    <body>
        
            <div class="">
                
                {{-- <h1 class="header-title">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1> --}}
                <div class="">

                    <table class="">
                        <tr>
                            <th colspan="6" style="font-weight:bold">  
                                ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
                            </th>
                        </tr>
                        <tr>
                            <th colspan="6" style="font-weight:bold">
                                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                            </th>
                        </tr>
                        <tr>
                            <th colspan="6" >
                                {{mmDateFormat($year,$month)}}ရက်နေ့ရှိ ဝန်ထမ်းအင်အားစာရင်း
                            </th>
                            {{-- <th colspan="6">
                                ၂၀၂၄ခုနှစ်၊နိုဝင်ဘာလ ၃၀ ရက်နေ့ရှိ ဝန်ထမ်းအင်အားစာရင်း
                            </th> --}}
                        </tr>
                    </table>

                    <table>
                        <thead>
                            <tr>
                                <th rowspan="2">စဥ်</th>
                                <th rowspan="2">ရာထူးအမည်</th>
                                <th rowspan="2">လစာနှုန်း (ကျပ်)</th>
                                <th rowspan="2">ခွင့်ပြု <br> အင်အား</th>
                                <th rowspan="2">ခန့်ပြီး <br> အင်အား</th>
                                <th rowspan="2">လစ်လပ် <br> အင်အား</th>
                            </tr>
                        </thead>
                        {{-- sfdfd --}}
                        <tbody>
                            <tr></tr>
                            @foreach ($first_ranks as $rank)
                            <tr>
                                <td>{{en2mm(++$count)}}</td>
                                <td>{{$rank->name}}</td>
                                <td>{{$rank->payscale->name}}</td>
                                <td>{{en2mm($rank->allowed_qty)}}</td>
                                <td>{{en2mm($rank->staffs->count())}}</td>
                                <td>{{en2mm($rank->staffs->count() - $rank->allowed_qty)}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">{{$first_ranks[0]->staff_type->name}}စုစုပေါင်း</td>
                                <td>{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                                <td>{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                                <td>{{ en2mm( $first_ranks->sum(fn($rank) => $rank->staffs->count()) - $first_ranks->sum('allowed_qty')) }}</td>
                            </tr>
                            @foreach ($second_ranks as $rank)
                                <tr>
                                    <td>{{en2mm(++$count)}}</td>
                                    <td>{{$rank->name}}</td>
                                    <td>{{$rank->payscale->name}}</td>
                                    <td>{{en2mm($rank->allowed_qty)}}</td>
                                    <td>{{en2mm($rank->staffs->count())}}</td>
                                    <td>{{en2mm($rank->staffs->count() - $rank->allowed_qty)}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">{{$second_ranks[0]->staff_type->name}}စုစုပေါင်း</td>
                                <td>{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                                <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                                <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count()) - $second_ranks->sum('allowed_qty')) }}</td>
                            </tr>

                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="3">စုစုပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_ranks->sum('allowed_qty') + $second_ranks->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count()) + $second_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count()) - $second_ranks->sum('allowed_qty') + $first_ranks->sum(fn($rank) => $rank->staffs->count()) - $first_ranks->sum('allowed_qty')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        