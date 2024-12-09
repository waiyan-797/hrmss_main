
    <style type="text/css">
         page{
            background: white;
        }

       
        page[size="A4 portrait"] {
            width: 210mm;
            height: 297mm;
        }


        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        } */

        body {
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }

        .container {
            width: 100%;
            margin-bottom: 16px;
        }

        .header-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
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
        }

        thead tr {
            background-color: #f3f4f6;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
        }

        tbody tr td {
            height: 32px;
        }
    </style>
    <div class="container">
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>စဥ်</th>
                        <th>ရာထူး/အဆင့်</th>
                        <th>အိမ်ထောင်သည်</th>
                        <th>လူပျို</th>
                        <th>အပျို</th>
                        <th>စုစုပေါင်း</th>
                    </tr>
                </thead>
                <tbody class="text-center h-8 p-2">
                    @foreach ($first_payscales as $payscale)
                    <tr>
                        <td>{{en2mm($loop->iteration)}}</td>
                        <td>{{$payscale->name}}</td>
                        <td>{{en2mm($payscale->staff->where("current_division_id", 26)
                        ->where('marital_status_id' , 6 )->count()
                        )}}</td>
                          <td>{{en2mm($payscale->staff->where("current_division_id", 26)
                            ->whereIn('marital_status_id' ,[1,2,3,4,5])->where('gender_id' , 1 )
                            ->count()
                            )}}</td>
                            <td>{{en2mm($payscale->staff->where("current_division_id", 26)
                                ->whereIn('marital_status_id' ,[ 1, 2,3,4,5])->where('gender_id' , 2 )
                                ->count()
                                )}}</td>
                       
                        <td>
                           
                          
                            {{ en2mm($payscale->staff->where("current_division_id", 26)->count()) }}
                        </td>
                        <td> 
                            
                        </td>
            
                    </tr>
                @endforeach
                    <tr class="font-bold">
                        <td></td>
                        <td>အရာထမ်းပေါင်း</td>
                        <td >{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
                            ->where('marital_status_id' , 6 )->count()))}}</td>

                     <td >{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
                         ->whereIn('marital_status_id' , [1,2,3,4,5])->where('gender_id' , 1 )->count()))}}</td>
        
        <td >{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
            ->whereIn('marital_status_id' , [1,2,3,4,5])->where('gender_id' , 2 )->count()))}}</td>
                      

                        <td>
                          
                        
                            {{ en2mm( 
                       $first_payscales->sum(fn($scale) => $scale->staff->where("current_division_id", 26)->count())  
                               ) }}

                        </td>
                   
        
        
                      
                      
                    </tr>

                      @foreach ($second_payscales as $payscale)
                    <tr>
                        <td>{{en2mm($loop->iteration)}}</td>
                        <td>{{$payscale->name}}</td>
                        <td>{{en2mm($payscale->staff->where("current_division_id", 26)
                        ->where('marital_status_id' , 6 )->count()
                        )}}</td>
                          <td>{{en2mm($payscale->staff->where("current_division_id", 26)
                            ->whereIn('marital_status_id' ,[1,2,3,4,5])->where('gender_id' , 1 )
                            ->count()
                            )}}</td>
                            <td>{{en2mm($payscale->staff->where("current_division_id", 26)
                                ->whereIn('marital_status_id' ,[ 1, 2,3,4,5])->where('gender_id' , 2 )
                                ->count()
                                )}}</td>
                       
                        <td>
                           
                          
                            {{ en2mm($payscale->staff->where("current_division_id", 26)->count()) }}
                        </td>
                        <td> 
                            
                        </td>
            
                    </tr>
                @endforeach
                    <tr class="font-bold">
                        <td></td>
                        <td>အရာထမ်းပေါင်း</td>
                        <td>{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
                            ->where('marital_status_id' , 6 )->count()))}}</td>

                     <td>{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
                         ->whereIn('marital_status_id' , [1,2,3,4,5])->where('gender_id' , 1 )->count()))}}</td>
        
        <td>{{ en2mm($first_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
            ->whereIn('marital_status_id' , [1,2,3,4,5])->where('gender_id' , 2 )->count()))}}</td>
                      

                        <td>
                          
                        
                            {{ en2mm( 
                       $second_payscales->sum(fn($scale) => $scale->staff->where("current_division_id", 26)->count())  
                               ) }}

                        </td>
                   
        
        
                      
                      
                    </tr>


            
                    <tr class="font-bold">
                        <td></td>
                        <td>စုစုပေါင်း</td>
                        <td>{{
                            en2mm(
                                $first_payscales->sum($payscale->staff->where("current_division_id", 26)
                        ->where('marital_status_id' , 6 )->count()
                            )
                        + $second_payscales->sum($payscale->staff->where("current_division_id", 26)
                        ->where('marital_status_id' , 6 )->count())
                        )
                         }}</td>
                       
                    
                       <td >{{
                        en2mm(
                            $first_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
                         ->whereIn('marital_status_id' , [1,2,3,4,5])->where('gender_id' , 1 )->count()) + 
                         $second_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
                         ->whereIn('marital_status_id' , [1,2,3,4,5])->where('gender_id' , 1 )->count())

                    )
                     }}</td>



<td >{{
en2mm(
    $first_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
                         ->whereIn('marital_status_id' , [1,2,3,4,5])->where('gender_id' , 2 )->count()) + 
                         $second_payscales->sum(fn($p)=>$p->staff->where("current_division_id", 26)
                         ->whereIn('marital_status_id' , [1,2,3,4,5])->where('gender_id' , 2 )->count())
)
}}</td>


                        <td >
                            {{ en2mm(  
                                $first_payscales->sum($payscale->staff->where("current_division_id", 26)->count()
                                +
                                $second_payscales->sum($payscale->staff->where("current_division_id", 26)->count())

                                ) ) }}



                        </td>
                    </tr>
                   

                </tbody>
            </table>
        </div>
    </div>




   
 