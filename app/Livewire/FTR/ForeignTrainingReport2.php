<?php

namespace App\Livewire\FTR;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class ForeignTrainingReport2 extends Component
{
    public $staffs, $nameSearch;

    public function go_pdf()
    {

        $staffQuery  = Staff::query();
        if ($this->nameSearch) {
            $staffQuery->where('name', 'like', '%' . $this->nameSearch . '%');
        }
        $this->staffs = $staffQuery->get();
        $data = [
            'staffs' => $this->staffs,
        ];

        $pdf = PDF::loadView('pdf_reports.foreign_training_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'foreign_training_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'landscape',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $section->addTitle('Foreign Training Report', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow();
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true],['alignment'=>'center','spaceBefore'=>1350]);
        $table->addCell(3500, ['vMerge' => 'restart'])->addText('အမည်', ['bold' => true],['alignment'=>'center','spaceBefore'=>1350]);
        $table->addCell(3500, ['vMerge' => 'restart'])->addText('ရာထူး', ['bold' => true],['alignment'=>'center','spaceBefore'=>1350]);
        $table->addCell(5000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သွားရောက်သည့်ကာလ',['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('သွားရောက်သည့်နိုင်ငံ', ['bold' => true],['alignment'=>'center','spaceBefore'=>1250]);
        $table->addCell(2500, ['vMerge' => 'restart'])->addText('ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ', ['bold' => true],['alignment'=>'center','spaceBefore'=>1250]);
        $table->addCell(1500, ['vMerge' => 'restart'])->addText('သွား ရောက် ခဲ့သည့် အကြိမ် အရေ အတွက်', ['bold' => true],['alignment'=>'center','spaceBefore'=>50]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ထောက်ပံ့သည့်အဖွဲ့အစည်း', ['bold' => true],['alignment'=>'center','spaceBefore'=>1250]);
        $table->addCell(1500, ['vMerge' => 'restart'])->addText('မှတ်  ချက်', ['bold' => true],['alignment'=>'center','spaceBefore'=>1250]);

        $table->addRow();
        $table->addCell(1000, ['vMerge' => 'continue']);
        $table->addCell(3500, ['vMerge' => 'continue']);
        $table->addCell(3500, ['vMerge' => 'continue']);
        $table->addCell(2500)->addText('မှ', ['alignment' => 'center','bold' => true],['alignment'=>'center','spaceBefore'=>350]);
        $table->addCell(2500)->addText('ထိ', ['alignment' => 'center','bold' => true],['alignment'=>'center','spaceBefore'=>350]);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(1000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(1500, ['vMerge' => 'continue']);
        $serialNumber = 1; // Initialize the serial number

foreach ($staffs as $staff) {
    if ($staff->abroads->isNotEmpty()) {
        $travelCount = 1; // Initialize travel count for each staff member
        $abroadCount = $staff->abroads->count();

        foreach ($staff->abroads as $index => $abroad) {
            $table->addRow();

            if ($index == 0) {
                // Add cells only for the first abroad of the staff
                $table->addCell(1000)->addText(en2mm($serialNumber++),null,['alignment'=>'center']);
                $table->addCell(3500)->addText($staff->name,null,['indentation' => ['left' => 100]]);
                $table->addCell(3500)->addText($staff->current_rank?->name,null,['indentation' => ['left' => 100]]);
            } else {
                // Add empty cells for subsequent abroad entries
                $table->addCell(1000);
                $table->addCell(3500);
                $table->addCell(3500);
            }

            // Add abroad-specific details
            $table->addCell(2500)->addText(formatDMYmm($abroad->from_date),null,['indentation' => ['left' => 100]]);
            $table->addCell(2500)->addText(formatDMYmm($abroad->to_date),null,['indentation' => ['left' => 100]]);
            $table->addCell(2000)->addText($abroad->country?->name,null,['indentation' => ['left' => 100]]);
            $table->addCell(2500)->addText($abroad->particular,null,['indentation' => ['left' => 100]]);
            $table->addCell(1500)->addText(en2mm($travelCount++),null,['alignment'=>'center']);
            $table->addCell(2000)->addText('',null,['indentation' => ['left' => 100]]); // Empty cell
            $table->addCell(1500)->addText(''); // Empty cell
        }
    }
}
        // foreach ($staffs as $index => $staff) {
        //     foreach ($staff->abroads as $key => $abroad) {

        //         $table->addRow();

        //         if ($key == 0) {
        //             $table->addCell(2000)->addText($index);
        //             $table->addCell(2000)->addText($staff->name);

        //             $table->addCell(2000)->addText($staff->current_rank?->name);
        //         } else {
        //             $table->addCell(2000);
        //             $table->addCell(2000);
        //             $table->addCell(2000);
        //         }
        //         $table->addCell(2000)->addText($abroad->from_date);
        //         $table->addCell(2000)->addText($abroad->to_date);
        //         $table->addCell(2000)->addText($abroad->country?->name);
        //         $table->addCell(2000)->addText($abroad->particular);
        //         $table->addCell(2000)->addText($abroad->sponser);
        //         $table->addCell(2000)->addText('');
        //     }
        // }
        $fileName = 'foreign_training_report.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function render()
    {
        $staffQuery  = Staff::query();
        if ($this->nameSearch) {
            $staffQuery->where('name', 'like', '%' . $this->nameSearch . '%');
        }
        $this->staffs = $staffQuery->get();


        return view('livewire.f-t-r.foreign-training-report2', [
            'staffs' => $this->staffs,
        ]);
    }
}
