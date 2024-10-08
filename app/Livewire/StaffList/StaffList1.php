<?php

namespace App\Livewire\StaffList;

use App\Models\Division;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffList1 extends Component
{
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
        $divisions = Division::with('staffs.currentRank')->where('division_type_id', 2)->get();

        // Create a new Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);

        // Add title
        $section->addTitle('Staff List Report', 1);

       
        $table = $section->addTable([
            'borderSize' => 6, 
            'borderColor' => '000000',
            'cellMargin' => 80
        ]);
        

        // Add table headers
        $table->addRow();
        $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true, 'size' => 12]);
        $table->addCell(4000,['vMerge' => 'restart'])->addText('တိုင်း/ပြည်နယ်', ['bold' => true, 'size' => 12]);
        $table->addCell(6000, ['gridSpan' => 3, 'valign' => 'center'])->addText('ခန့်ပြီးအမြဲတမ်းဝန်ထမ်း',['alignment' => 'center']);
        
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(3000)->addText('အရာထမ်း', ['alignment' => 'center']);
        $table->addCell(3000)->addText('အမှုထမ်း', ['alignment' => 'center']);
        $table->addCell(3000)->addText('စုစုပေါင်း', ['alignment' => 'center']);
        

       
        foreach ($divisions as $index => $division) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(4000)->addText($division->name);
            $table->addCell(2000)->addText(en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 1)->count()));
            $table->addCell(2000)->addText(en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 2)->count()));
            $table->addCell(2000)->addText(en2mm($division->staffs->count()));
        }

        // Save the file
        $filePath = 'staff_list_report.docx';
        $phpWord->save($filePath, 'Word2007');

        // Return the file as a download response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }


     public function render()
     {
        $divisions = Division::where('division_type_id', 2)->get();
        return view('livewire.staff-list.staff-list1',[
            'divisions' => $divisions,
        ]);
     }
}


