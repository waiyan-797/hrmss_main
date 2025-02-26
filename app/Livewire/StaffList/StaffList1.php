<?php

namespace App\Livewire\StaffList;

use App\Models\Division;
use App\Models\DivisionType;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use Carbon\Carbon;

class StaffList1 extends Component
{
public $selsectedDivisionTypeId = null  ;    
public $divisionTypes ;
    public function go_pdf(){
        $divisions = Division::where('division_type_id', 2)->get();
        $data = [
            'divisions' => $divisions,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_list_report_1', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_list_pdf_1.pdf');
    }
    public function go_word()
    {
        
        $divisions = Division::with('staffs.currentRank')->where('division_type_id', $this->selsectedDivisionTypeId)->get();

        // Create a new Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.3),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $phpWord->addTitleStyle(2, ['bold' => false, 'size' => 13], ['alignment' => 'center']);
        $phpWord->addTitleStyle(3, ['bold' => false, 'font'=>'Pyidaungsu Number', 'size' => 13], ['alignment' => 'right']);
        // $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုးဦးစီးဌာန', 1);
        // dd($this->selsectedDivisionTypeId );
        if ($this->selsectedDivisionTypeId == 1) {
            $divisionTitle = 'ရုံးချုပ် ဌာနခွဲ';
        } elseif ($this->selsectedDivisionTypeId == 2) {
            $divisionTitle = 'တိုင်းဒေသကြီး/ပြည်နယ်ဦးစီးမှုးရုံး';
        } else {
            $divisionTitle = '';
        }
        // dd($divisionTitle );
        $section->addTitle(
            "{$divisionTitle} များ၏ အရာထမ်း၊အမှုထမ်းများစာရင်း", 
            2
        );
        $section->addTitle(formatDMYmm(Carbon::now()), 3);

       
        $table = $section->addTable([
            'borderSize' => 6, 
            'borderColor' => '000000',
            'cellMargin' => 5
        ]);
        

        // Add table headers
        $table->addRow();
        $table->addCell(900,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true, 'size' => 13],['alignment' => 'center', 'spaceBefore'=> 50]);
        $table->addCell(8100,['vMerge' => 'restart'])->addText('ဌာနအမည်', ['bold' => true, 'size' => 13],['alignment' => 'center', 'spaceBefore'=> 50]);
        $table->addCell(2100)->addText('အရာထမ်း', ['bold' => true, 'size' => 13],['alignment' => 'center', 'spaceBefore'=> 50]);
        $table->addCell(2000)->addText('အမှုထမ်း', ['bold' => true, 'size' => 13],['alignment' => 'center', 'spaceBefore'=> 50]);
        $table->addCell(1800)->addText('စုစုပေါင်း', ['bold' => true, 'size' => 13],['alignment' => 'center', 'spaceBefore'=> 50]);
        $table->addCell(1800)->addText('နေ့စား', ['bold' => true, 'size' => 13],['alignment' => 'center', 'spaceBefore'=> 50]);
        $table->addCell(1900)->addText('မှတ်ချက်', ['bold' => true, 'size' => 13],['alignment' => 'center', 'spaceBefore'=> 50]);
       
        
        // $table->addRow();
        // $table->addCell(2000, ['vMerge' => 'continue']);
        // $table->addCell(4000, ['vMerge' => 'continue']);
        // $table->addCell(3000)->addText('အရာထမ်း', ['alignment' => 'center']);
        // $table->addCell(3000)->addText('အမှုထမ်း', ['alignment' => 'center']);
        // $table->addCell(3000)->addText('စုစုပေါင်း', ['alignment' => 'center']);, 'spaceBefore'=> 50
        

       
        foreach ($divisions as $index => $division) {
            $table->addRow();
            $table->addCell(900)->addText(en2mm($index + 1),null, ['alignment' => 'center', 'spaceBefore'=> 50]);
            $table->addCell(8000)->addText($division->name, null, ['indentation' => ['left' => 100], 'alignment' => 'left', 'spaceBefore'=> 50]);
            $table->addCell(2100)->addText(en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 1)->count()), null, ['indentation' => ['right' => 100],'alignment' => 'right', 'spaceBefore'=> 50]);
            $table->addCell(2000)->addText(en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 2)->count()), null, ['indentation' => ['right' => 100],'alignment' => 'right', 'spaceBefore'=> 50]);
            $table->addCell(1800)->addText(en2mm($division->staffs->count()), null, ['indentation' => ['right' => 100],'alignment' => 'right', 'spaceBefore'=> 50]);
            $table->addCell(1800)->addText(en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 3)->count()), null, ['indentation' => ['right' => 100],'alignment' => 'right', 'spaceBefore'=> 50]);
            $table->addCell(2000)->addText('', null, ['alignment' => 'right', 'spaceBefore'=> 50]);
        }

        if ($this->selsectedDivisionTypeId == 1) {
            $divisionTitle = 'ရုံးချုပ်စုစုပေါင်း';
        } elseif ($this->selsectedDivisionTypeId == 2) {
            $divisionTitle = 'နယ်ရုံးခွဲ';
        } 
        $table->addRow();
        $table->addCell(900)->addText('');
        $table->addCell(7000)->addText("{$divisionTitle}",['bold'=>true],['alignment'=>'center']);

        $divisionStaffCount = $divisions->sum(function($division) {
                            
            return $division->staffs->filter(function($staff) {
                return $staff->currentRank && $staff->currentRank->staff_type_id == 1;
            })->count();
        });
        $table->addCell(2300)->addText(en2mm($divisionStaffCount ), null, ['indentation' => ['right' => 100],'alignment' => 'right', 'spaceBefore'=> 50]);
       
        $secondPayscale = $divisions->sum(function($division) {
            
            return $division->staffs->filter(function($staff) {
                return $staff->currentRank && $staff->currentRank->staff_type_id == 2;
            })->count();
        });
        
        $table->addCell(2000)->addText(en2mm($secondPayscale), null, ['indentation' => ['right' => 100],'alignment' => 'right', 'spaceBefore'=> 50]);

        $table->addCell(2000)->addText(en2mm($divisionStaffCount  + $secondPayscale), null, ['indentation' => ['right' => 100],'alignment' => 'right', 'spaceBefore'=> 50]);

        $labour = $divisions->sum(function($division) {
                
            return $division->staffs->filter(function($staff) {
                return $staff->currentRank && $staff->currentRank->staff_type_id ==3;
            })->count();
        });
        $table->addCell(1500)->addText(en2mm($labour), null, ['indentation' => ['right' => 100],'alignment' => 'right', 'spaceBefore'=> 50]);
        $table->addCell(2000)->addText('', null, ['alignment' => 'right', 'spaceBefore'=> 50]);

        // Save the file
        $filePath = 'staff_list_report.docx';
        $phpWord->save($filePath, 'Word2007');

        // Return the file as a download response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }


     
    public function mount(){
        $this->divisionTypes = DivisionType::all();
            
    }
    
    public function render()
     {
        $divisions =
         Division::query();

         if($this->selsectedDivisionTypeId){
            $divisions->where('division_type_id', $this->selsectedDivisionTypeId
         
         );
         }
              $divisions =     $divisions->get();
              
                  $testDivision = Division::all();
        return view('livewire.staff-list.staff-list1',[
            'divisions' => $divisions,
           
        ]);
     }
}


