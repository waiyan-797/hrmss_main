<?php

namespace App\Livewire\StaffList;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffList2 extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_list_report_2', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_list_report_pdf_2.pdf');
    }
    public function go_word()
    {
       
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $section->addTitle('Staff List Report', 1);

        // Create a table
        $table = $section->addTable([
            'borderSize' => 6,
            'cellMargin' => 80,
        ]);
        
        // Define table header
        $table->addRow();
        $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(4000,['vMerge' => 'restart'])->addText('အမည်/ရာထူး/ဌာန', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('လက်ရှိရာထူး', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('တစ်ဆင့်နိမ့်ရာထူး', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('တစ်ဆင့်နိမ့်ရာထူး', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('တစ်ဆင့်နိမ့်ရာထူး', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('စူစုပေါင်း', ['bold' => true]);

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(3000)->addText('၁', ['alignment' => 'center']);
        $table->addCell(3000)->addText('၂', ['alignment' => 'center']);
        $table->addCell(3000)->addText('၃', ['alignment' => 'center']);
        $table->addCell(3000)->addText('၄', ['alignment' => 'center']);
        $table->addCell(3000)->addText('၇', ['alignment' => 'center']);

        
        $staffs = Staff::all();
        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(4000)->addText("{$staff->name}၊ {$staff->current_rank->name}၊ {$staff->side_department->name}");
            $table->addCell(2000)->addText($staff->current_rank->name);
            $table->addCell(2000)->addText(''); 
            $table->addCell(2000)->addText('');
            $table->addCell(2000)->addText('');
            $table->addCell(2000)->addText('');
        }

        
        $fileName = 'staff_list_report.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath, 'Word2007');

      
        return response()->download($filePath)->deleteFileAfterSend(true);
    }


     public function render()
     {
         $staffs = Staff::get();
        return view('livewire.staff-list.staff-list2',[ 
            'staffs' => $staffs,
        ]);
     }
    
}

// public function go_word()
//     {
//         $staffs = Staff::get();
//         $phpWord = new PhpWord();
//         $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
//         $section->addTitle('Foreign Training Report', 1);
//         $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
//         $table->addRow();
//         $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
//         $table->addCell(2000,['vMerge' => 'restart'])->addText('အမည်', ['bold' => true]);
//         $table->addCell(2000,['vMerge' => 'restart'])->addText('ရာထူး', ['bold' => true]);
//         $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သွားရောက်သည့်ကာလ');
//         $table->addCell(2000,['vMerge' => 'restart'])->addText('သွားရောက်သည့်နိုင်ငံ', ['bold' => true]);
//         $table->addCell(2000,['vMerge' => 'restart'])->addText('ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ', ['bold' => true]);
//         $table->addCell(2000,['vMerge' => 'restart'])->addText('ထောက်ပံ့သည့်အဖွဲ့အစည်း', ['bold' => true]);
//         $table->addCell(2000,['vMerge' => 'restart'])->addText('မှတ်ချက်', ['bold' => true]);

//         $table->addRow();
//             $table->addCell(2000, ['vMerge' => 'continue']);
//             $table->addCell(4000, ['vMerge' => 'continue']);
//             $table->addCell(4000, ['vMerge' => 'continue']);
//             $table->addCell(3000)->addText('မှ', ['alignment' => 'center']);
//             $table->addCell(3000)->addText('ထိ', ['alignment' => 'center']);
//             $table->addCell(4000, ['vMerge' => 'continue']);
//             $table->addCell(4000, ['vMerge' => 'continue']);
//             $table->addCell(4000, ['vMerge' => 'continue']);
//             $table->addCell(4000, ['vMerge' => 'continue']);
//         foreach ($staffs as $index=> $staff) {
//             foreach ($staff->abroads as $abroad) {
//                 $table->addRow();
//                 $table->addCell(2000)->addText($index + 1);
//                 $table->addCell(2000)->addText($staff->name);
//                 $table->addCell(2000)->addText($staff->current_rank->name);
//                 $table->addCell(2000)->addText($abroad->from_date);
//                 $table->addCell(2000)->addText($abroad->to_date);
//                 $table->addCell(2000)->addText($abroad->country->name);
//                 $table->addCell(2000)->addText($abroad->particular);
//                 $table->addCell(2000)->addText($abroad->sponser);
//                 $table->addCell(2000)->addText(''); 
//             }
//         }
//         $fileName = 'foreign_training_report.docx';
//         $filePath = storage_path('app/' . $fileName);
//         $phpWord->save($filePath);
    
//         return response()->download($filePath)->deleteFileAfterSend(true);
//     }

