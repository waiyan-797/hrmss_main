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
    public $trainingLocation =3 ;

    public $nameSearch, $staffs;
    public $count=0;
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


        $staffs = Staff::where('name', 'like', '%' . $this->nameSearch . '%')->whereHas('trainings', function ($query) {
        if ($this->trainingLocation == 3) {
            $query->whereIn('training_location_id', [1, 2]);
        } elseif (!empty($this->trainingLocation)) {
            $query->where('training_location_id', $this->trainingLocation);
        }
       })->with('trainings') ->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'landscape',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        // $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle($this->trainingLocation==1? 'Local Training Report' : 'Foreign  Training Report', 2);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow();
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('စဥ်',['bold'=>true],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(5000, ['vMerge' => 'restart'])->addText('အမည်/ရာထူး',['bold'=>true],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('ပညာအရည်အချင်း',['bold'=>true],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(5000, ['vMerge' => 'restart'])->addText('သင်တန်းအမည်',['bold'=>true],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(2500, ['vMerge' => 'restart'])->addText('သင်တန်းကာလ(မှ)',['bold'=>true],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(2500, ['vMerge' => 'restart'])->addText('သင်တန်းကာလ(ထိ)',['bold'=>true],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(3000, ['vMerge' => 'restart'])->addText('သင်တန်းနေရာ/ဒေသ',['bold'=>true],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ရရှိခဲ့သည့်အဆင့်',['bold'=>true],['alignment'=>'center','spaceBefore'=>150]);

        foreach ($staffs as $index => $staff) {
            $isFirstTraining = true; // Flag to check the first training

            foreach ($staff->trainings as $trainingIndex => $training) {
                $table->addRow();

                // Show these cells only for the first training of the staff
                if ($isFirstTraining) {
                    $table->addCell(700, ['vMerge' => 'restart'])->addText(en2mm($index + 1), null, ['indentation' => ['left' => 100]]);
                    $textRun = $table->addCell(3500, ['vMerge' => 'restart'])->addTextRun(['indentation' => ['left' => 100]]);
                    $textRun->addText($staff->name);
                    $textRun->addTextBreak();
                    $textRun->addText($staff->current_rank->name);
                    $cell = $table->addCell(3500, ['vMerge' => 'restart']);
                    $textRun = $cell->addTextRun(['indentation' => ['left' => 100]]);

                    foreach ($staff->staff_educations as $edu) {
                        $textRun->addText($edu->education?->name ?? '');
                        $textRun->addTextBreak();
                    }
                    $isFirstTraining = false; // Set the flag to false after the first iteration
                } else {
                    // Add merged cells for subsequent rows to align properly
                    $table->addCell(700, ['vMerge' => 'continue']);
                    $table->addCell(3500, ['vMerge' => 'continue']);
                    $table->addCell(3500, ['vMerge' => 'continue']);
                }
                // Add the training-specific cells
                $table->addCell(4000)->addText($training->training_type->name == 'အခြား' ? $training->diploma_name : $training->training_type->name , null, ['indentation' => ['left' => 100]]);
                $table->addCell(2500)->addText(formatDMYmm($training->from_date), null, ['indentation' => ['left' => 100]]);
                $table->addCell(2500)->addText(formatDMYmm($training->to_date), null, ['indentation' => ['left' => 100]]);
                $table->addCell(3000)->addText($training->location, null, ['indentation' => ['left' => 100]]);
                $table->addCell(2000)->addText($training->remark, null, ['indentation' => ['left' => 100]]);

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
            'count'=>$this->count,
            'trainingLocation'=>$this->trainingLocation,
        ]);
    }

}
