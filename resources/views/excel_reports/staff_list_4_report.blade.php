
    <style type="text/css">
        /* page{
            background: white;
        }

        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        } */

        /* @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        } */

        body {
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }
        /* .heading {
    font-weight: bold;
    text-align: center;
    font-size: 1rem;
    margin-bottom: 20px;
}

.staff-table {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto;
}

.staff-table th, .staff-table td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

.staff-table th {
    text-align: center;
    padding: 10px;
}

.staff-table td {
    padding: 8px;
}

.staff-table th:nth-child(1),
.staff-table th:nth-child(4),
.staff-table th:nth-child(6),
.staff-table th:nth-child(7),
.staff-table th:nth-child(8),
.staff-table td:nth-child(1),
.staff-table td:nth-child(4),
.staff-table td:nth-child(6),
.staff-table td:nth-child(7),
.staff-table td:nth-child(8) {
    text-align: center;
} */

        
        
    </style>

        <h1>
            ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ
            ဝန်ထမ်းအင်အားစာရင်း
        </h1>
    
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်/ရာထူး</th>
                    <th>မူလဌာန</th>
                    <th>ခုနှစ်<br>မှ-ထိ</th>
                    <th>ပြောင်းရွေ့ဌာန</th>
                    <th>ခုနှစ်<br>မှ-ထိ</th>
                    <th>လက်ရှိဌာန<br>ရောက်ရှိ ရက်စွဲ</th>
                    <th>မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
                    @php
                        $start=0;
                    @endphp

                    @foreach ($staffs as $staff)
                        @php
                            $latestPosting = $staff->postings->sortByDesc('from_date')->first();
                        @endphp
                        <tr>
                            <td>{{ en2mm( $start++ )}}</td>
                            <td>
                                {{ $staff->name }} <br>
                                 {{ $staff->currentRank?->name }}
                            </td>
                            <td>
                                {{ $staff->postings->first()?->department->name ?? '' }}
                                ( 
                                     {{
                                            $staff->postings->first()?->division?->nick_name ?? '' 
                                     }}
                                       )
                            </td>
                            <td>
                                @if ($staff->postings->isNotEmpty())
                                    @php
                                        $firstPosting = $staff->postings->first();
                                    @endphp
                                    {{ en2mm( $firstPosting->from_date ? \Carbon\Carbon::parse($firstPosting->from_date)->format('d-m-Y') :  '') }} မှ  
                                    <br>
                                    {{ en2mm( $firstPosting->from_date ? \Carbon\Carbon::parse($firstPosting->from_date)->format('d-m-Y') :  '') }}
                                     ထိ
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                           

                          @foreach(
                             $staff->postings->slice(1, $staff->postings->count() - 2) as $oldPost
                          )
                           
                                {{  
                                     $oldPost
                                      ->department?->name ?? '' 
                                       }} 
                                     (  {{  
                                        $oldPost
                                         ->division?->nick_name ?? '' 
                                          }} )<br>

@endforeach

</td>

<td>

    @foreach(
       $staff->postings->slice(1, $staff->postings->count() - 2) as $oldPost
    )
     
          {{  
              ( $oldPost
                ->from_date ? en2mm(\Carbon\Carbon::parse($oldPost->from_date)->format('d-m-y')) : '') 
                .'မှ'.
         
               ( $oldPost
                ->to_date ? en2mm(\Carbon\Carbon::parse($oldPost->to_date)->format('d-m-y')) : '') .'ထိ'

                 }} 
                 <br>

@endforeach

</td>

                               
                            </td>

                            <td>
                                {{-- {{ $latestPosting->department->name ?? '' }} --}}
                                
                                     {{
                                            $latestPosting->division?->nick_name ?? '' 
                                     }}
                                       
                                       <br>
                                {{ $latestPosting?->from_date ? en2mm(\Carbon\Carbon::parse($latestPosting->from_date)->format('d-m-y')) : '' }}
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
