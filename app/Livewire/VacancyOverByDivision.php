<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\LetterType;
use App\Models\Payscale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\SimpleType\Jc;

class VacancyOverByDivision extends Component
{
    public $letter_types;
    public $count = 0 ;
    public $divisionName;
    public $divisions ;
    public $selectedDivisionId ;
    public function mount($divisionName = null ){
        $this->letter_types  = LetterType::all();
        $this->divisions = Division::all();
        $this->divisionName = $divisionName;
        $this->selectedDivisionId=1;
        
    }
    public function go_pdf() {
       
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $total_allowed_qty = $first_payscales->sum('allowed_qty') + $second_payscales->sum('allowed_qty');
        $total_staff_count = $first_payscales->sum('staff_count') + $second_payscales->sum('staff_count');
        $total_vacant_positions = $first_payscales->sum('vacant_positions') + $second_payscales->sum('vacant_positions');
        $data = [
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
            'selectedDivisionId' => $this->selectedDivisionId,
            'total_allowed_qty' => $total_allowed_qty,
            'total_staff_count' => $total_staff_count,
            'total_vacant_positions' => $total_vacant_positions,
        ];
        $pdf = PDF::loadView('pdf_reports.vacancy_over_by_division', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'vacancy_over_by_division.pdf');
    }
public function go_word()
{

    $first_payscales = Payscale::where('staff_type_id', 1)->get();
    $second_payscales = Payscale::where('staff_type_id', 2)->get();
    $total_allowed_qty = $first_payscales->sum('allowed_qty') + $second_payscales->sum('allowed_qty');
    $total_staff_count = $first_payscales->sum('staff_count') + $second_payscales->sum('staff_count');
    $total_vacant_positions = $first_payscales->sum('vacant_positions') + $second_payscales->sum('vacant_positions');
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    // $section = $phpWord->addSection([
    // 'orientation' => 'portrait', 
    // 'paperSize' => 'A4',        
    // 'marginTop' => 0.5 * 1440,   
    // 'marginLeft' => 1 * 1440,
    // 'marginBottom' => 0.7 * 1440,
    // 'marginRight' => 0.65 * 1440,
    // ]);
    // $section = $phpWord->addSection([
    //     'orientation' => 'portrait', 
    //     'paperSize' => 'A4',        
    //     'marginTop' => 0.5 * 1440,   
    //     'marginLeft' => 1 * 1440,
    //     'marginBottom' => 0.5 * 1440,
    //     'marginRight' => 0.3 * 1440,
    // ]);
    $section = $phpWord->addSection([
        'orientation' => 'portrait',
        'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
        'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.65),   // 0.5 inch
        'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.7),   // 0.5 inch
    ]);
    
    if (!is_null($this->selectedDivisionId)) {
        $divisionName = getDivisionBy($this->selectedDivisionId)->name;
        $section->addText($divisionName, ['bold' => true, 'size' => 14], ['align' => 'center']);
    } else {
        $section->addText('', ['bold' => true, 'size' => 14], ['align' => 'center']);
    }
    

    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $phpWord->addTitleStyle(2, ['bold' => false, 'size' => 13], ['alignment' => 'center']);
        $phpWord->addTitleStyle(3, ['bold' => false, 'font'=>'Pyidaungsu Number', 'size' => 13], ['alignment' => 'right']);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုးဦးစီးဌာန', 1);
        $section->addTitle('ဖွဲ့စည်းပုံ ၊ ခွင့်ပြု ၊ လစ်လပ်အင်အားစာရင်း', 2);
        $section->addTitle(formatDMYmm(Carbon::now()), 3);
    $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000']);
    // $table->addRow();
    $table->addRow(50, ['tblHeader' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true], ['alignment'=>'center','spaceBefore'=> 70]);
    $table->addCell(5000)->addText('ရာထူးအမည်',['bold'=>true, 'size'=>13],['alignment'=>'center','spaceBefore'=> 70]);
    $table->addCell(3000)->addText('ဖွဲ့စည်းပုံ', ['bold' => true] ,['align' => 'center']);
    $table->addCell(4000)->addText('ခန့်ထားအင်အား',['bold'=>true, 'size'=>13],['alignment'=>'center','spaceBefore'=> 70]);
    $table->addCell(4000)->addText('လစ်လပ်အင်အား',['bold'=>true, 'size'=>13],['alignment'=>'center','spaceBefore'=> 70]);
    $table->addCell(2000)->addText('မှတ်ချက်',['bold'=>true, 'size'=>13],['alignment'=>'center','spaceBefore'=> 70]);
    $count = 1; 




   
                           
                       
                
    //                 @endforeach
    //                 @foreach ($second_payscales as $payscale)
                     
    //                 @foreach($payscale->ranks as $rank)
                     
    //                 <tr>
    //                     <td class="border border-black p-2 ">{{en2mm(++$count)}}</td>
                       
    //                     <td class="border border-black p-2">
                       
    //                         {{ $rank->name }}
                     
    //                     </td>
    //                     <td class="border text-right border-black  p-2"> 
    //                         {{ en2mm ($rank->allowed_qty )}}
    //                     </td>

    //                     <td class="border border-black p-2 text-right"> 
    //                         {{ en2mm ($rank->staffs->filter(function ($staff) {
    //                             return $staff->current_division_id == 1;
    //                         })->count())
    //                          }}

    
                            
    //                     </td>
    //                     <td class="border border-black p-2 text-right" > 
    //                         {{ en2mm($rank->staffs->filter(function ($staff) {
    //                             return $staff->current_division_id == 1;
    //                         })->count() - $rank->allowed_qty)
    //                          }}]
    
                            
    //                     </td>
    //                     <td class="border border-black p-2">

    //                     </td>

    //                 </tr>

    //                 @endforeach
                   
                   
               
        
    //         @endforeach


    //                     <tr class="font-bold">
    //                         <td class="border border-black text-center p-2"></td>
    //                         <td class="border border-black text-center p-2">ပေါင်း</td>
    //                         <td class="border border-black text-right p-2">
    //                             {{
    //                                 en2mm(
    //                                     $first_payscales->sum(function($payscale) {
    //                                     return $payscale->ranks->sum(function($rank) {
    //                                         return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
    //                                     });

    
    //                                 }
    //                                 )
    //                                 +

    //                                 $second_payscales->sum(function($payscale) {
    //                                     return $payscale->ranks->sum(function($rank) {
    //                                         return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
    //                                     });
    //                                 }
    //                                 )
    //                                 )
    //                             }}
    //                         </td>
                            


    //                         <td class="border border-black text-right p-2">
    //                             {{
    //                                 en2mm(
    //                                     $first_payscales->sum(function($payscale) {
    //                                         return $payscale->ranks->sum(function($rank) {
    //                                             return $rank->staffs->filter(function($staff) {
    //                                                 return $staff->current_division_id == 1;
    //                                             })->count();
    //                                         });
    //                                     }) 
    //                                     +
    //                                     $second_payscales->sum(function($payscale) {
    //                                         return $payscale->ranks->sum(function($rank) {
    //                                             return $rank->staffs->filter(function($staff) {
    //                                                 return $staff->current_division_id == 1;
    //                                             })->count();
    //                                         });
    //                                     }) 

    //                                 )
    //                             }}
    //                         </td>
                            

    //                         <td class="border border-black text-right p-2">
    //                             {{
    //                                 en2mm(
    //                                  (   $first_payscales->sum(function($payscale) {
    //                                         return $payscale->ranks->sum(function($rank) {
    //                                             return $rank->staffs->filter(function($staff) {
    //                                                 return $staff->current_division_id == 1;
    //                                             })->count();
    //                                         });
    //                                     }) 
    //                                     +
    //                                     $second_payscales->sum(function($payscale) {
    //                                         return $payscale->ranks->sum(function($rank) {
    //                                             return $rank->staffs->filter(function($staff) {
    //                                                 return $staff->current_division_id == 1;
    //                                             })->count();
    //                                         });
    //                                     }) )
    //                                     -
    //                                     (
    //                                         $first_payscales->sum(function($payscale) {
    //                                     return $payscale->ranks->sum(function($rank) {
    //                                         return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
    //                                     });
    //                                 }
    //                                 )
    //                                 +

    //                                 $second_payscales->sum(function($payscale) {
    //                                     return $payscale->ranks->sum(function($rank) {
    //                                         return $rank->allowed_qty; // Assuming `allowed_qty` is numeric.
    //                                     });
    //                                 }
    //                                 )
    //                                     )
    //                                     // -


    //                                 )
    //                             }}
    //                         </td>
                            
    //                     </tr>













    foreach ($first_payscales as $payscale) {
        foreach($payscale->ranks->filter(function($rank) {
            $selectedDivisionId = $this->selectedDivisionId;
            return $rank->is_dica == 1 && ($selectedDivisionId == 1 || !in_array($rank->id, [1, 2]));
        }) as $rank) {
            $staff_count = $rank->staffs->filter(fn($staff) => $staff->current_division_id == 1)->count();
            $vacant_positions = $rank->allowed_qty - $staff_count;

            $table->addRow();
            $table->addCell(700)->addText(en2mm($count++),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(5000)->addText($rank->name,null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(3000)->addText(en2mm($rank->allowed_qty),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(4000)->addText(en2mm ($rank->staffs->filter(function ($staff) {
                return $staff->current_division_id == 1;
          })->count()),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(4000)->addText(en2mm($rank->staffs->filter(function ($staff) {
                return $staff->current_division_id == 1;
              })->count() - $rank->allowed_qty),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(2000)->addText('');
        }
    }
    foreach ($second_payscales as $payscale) {
        foreach($payscale->ranks->filter(function($rank) {
            $selectedDivisionId = $this->selectedDivisionId;
            return $rank->is_dica == 1 && ($selectedDivisionId == 1 || !in_array($rank->id, [1, 2]));
        }) as $rank){

            $table->addRow();
            $table->addCell(700)->addText(en2mm($count++),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(5000)->addText($rank->name,null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(3000)->addText(en2mm($rank->allowed_qty),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(4000)->addText(en2mm ($rank->staffs->filter(function ($staff) {
                return $staff->current_division_id == 1;
            })->count()),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(4000)->addText(en2mm($rank->staffs->filter(function ($staff) {
                return $staff->current_division_id == 1;
            })->count() - $rank->allowed_qty),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
            $table->addCell(4000)->addText('');
        }
    }

    // Add totals row
    $table->addRow();
    $table->addCell(700)->addText('');
    $table->addCell(5000)->addText('ပေါင်း',null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
    $table->addCell(3000)->addText(en2mm(
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
    ),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
    $table->addCell(4000)->addText(en2mm($total_staff_count),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
    $table->addCell(4000)->addText(en2mm($total_vacant_positions),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6]);
    $table->addCell(4000)->addText('', ['bold' => true]);

  
    $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    return response()->streamDownload(function () use ($writer) {
        $writer->save('php://output');
    }, 'vacancy_over_by_division_report.docx');
}
    public function render()
    {

        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        return view('livewire.vacancy-over-by-division' ,
    [
        'first_payscales' => $first_payscales,
             'second_payscales' => $second_payscales,
    ]
    );
    }
}
