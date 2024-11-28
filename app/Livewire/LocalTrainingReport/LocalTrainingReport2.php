<?php

namespace App\Livewire\LocalTrainingReport;

use App\Models\LetterType;
use App\Models\Staff;
use App\Models\Training;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class LocalTrainingReport2 extends Component
{
    public $trainingLocation = null;

    public $nameSearch, $staffs;
    public function go_pdf()
    {
        $staffs = Staff::get();
      
           
        $data = [
            'staffs' => $staffs,
         
      
       
        ];
        $pdf = PDF::loadView('pdf_reports.local_training_report_2', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'local_training_report2_pdf.pdf');
    }

    public function go_word()
    {
        $staffs = Staff::with(['current_rank', 'abroads', 'trainings', 'staff_educations.education_group'])->get();
        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Pyidaungsu');
        $phpWord->setDefaultFontSize(12);
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $section->addTitle('Local Training Report2', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);


        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('အမည်');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('ရာထူး');
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သွားရောက်သည့်ကာလ');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲတတ်ရောက်ခဲ့သည့်နေရာ');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('တတ်ရောက်ခဲ့သည့်အကြောင်းအရာ');
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('ပညာအရည်အချင်း');

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(3000)->addText('မှ', ['alignment' => 'center']);
        $table->addCell(3000)->addText('ထိ', ['alignment' => 'center']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);


      

        foreach ($staffs as $index => $staff) {

            $abroadCount = count($staff->abroads);
            $trainingCount = count($staff->trainings);


            $maxRows = max($abroadCount, $trainingCount);

            for ($rowIndex = 0; $rowIndex < $maxRows; $rowIndex++) {
                $table->addRow();


                $table->addCell(2000)->addText($index + 1);
                $table->addCell(4000)->addText($staff->name);
                $table->addCell(4000)->addText($staff->current_rank->name ?? '');


                if (isset($staff->abroads[$rowIndex])) {
                    $table->addCell(2000)->addText($staff->abroads[$rowIndex]->from_date ?? '');
                    $table->addCell(2000)->addText($staff->abroads[$rowIndex]->to_date ?? '');
                } else {
                    $table->addCell(2000)->addText('');
                    $table->addCell(2000)->addText('');
                }


                if (isset($staff->trainings[$rowIndex])) {
                    $table->addCell(4000)->addText($staff->trainings[$rowIndex]->location ?? '');
                    $table->addCell(4000)->addText($staff->trainings[$rowIndex]->remark ?? '');
                } else {
                    $table->addCell(4000)->addText('');
                    $table->addCell(4000)->addText('');
                }


                if ($rowIndex === 0) {
                    $educationGroups = $staff->staff_educations->pluck('education_group.name')->toArray();
                    $table->addCell(4000)->addText(implode(", ", $educationGroups));
                } else {
                    $table->addCell(4000)->addText('');
                }
                $table->addRow();
                $table->addCell(1000, ['vMerge' => 'continue']);
                $table->addCell(2000, ['vMerge' => 'continue']);
                $table->addCell(2000, ['vMerge' => 'continue']);
                $table->addCell(2000)->addText($staff->abroads[$rowIndex]->from_date ?? '');
                $table->addCell(2000)->addText($staff->abroads[$rowIndex]->to_date ?? '');
                $table->addCell(2000,['vMerge' => 'continue'])->addText();
                $table->addCell(2000,['vMerge' => 'continue'])->addText();
                $table->addCell(2000, ['vMerge' => 'continue'])->addText();
            }
        }


        $fileName = 'local_training_report2.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $objWriter->save($temp_file);


        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
    public function render()
    {
        $staffQuery  = Staff::query();

        if ($this->nameSearch) {
            $staffQuery->where('name', 'like', '%' . $this->nameSearch . '%');
        }
        $this->staffs = $staffQuery->get();
        $letter_types=LetterType::all();

        return view('livewire.local-training-report.local-training-report2', [
            'staffs' => $this->staffs,
            'letter_types'=>$letter_types,
        ]);
    }
    
}
