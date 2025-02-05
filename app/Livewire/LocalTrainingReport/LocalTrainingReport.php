<?php

namespace App\Livewire\LocalTrainingReport;

use App\Models\LetterType;
use App\Models\Staff;
use App\Models\Training;
use App\Models\TrainingType;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;


class LocalTrainingReport extends Component
{
    public $trainingLocation =3 ;
    public $nameSearch;
    
    public  $staffsAll;
    public function go_pdf()
    {
      
        $data = [
            'staffs' => $this->staffsAll,
            'trainingLocation' => $this->trainingLocation
        ];
        $pdf = PDF::loadView('pdf_reports.local_training_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'local_training_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::where('name', 'like', '%' . $this->nameSearch . '%')
        ->whereHas('trainings', function ($query) {
            if ($this->trainingLocation == 3) {
                // Include training locations 1 and 2 when $trainingLocation is 3
                $query->whereIn('training_location_id', [1, 2]);
            } elseif ($this->trainingLocation) {
                // Filter by the specific training location
                $query->where('training_location_id', $this->trainingLocation);
            }
        })
        ->with(['trainings' => function ($query) {
            if ($this->trainingLocation == 3) {
                $query->whereIn('training_location_id', [1, 2]);
            } elseif ($this->trainingLocation) {
                $query->where('training_location_id', $this->trainingLocation);
            }
        }])
        ->get();

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
            $table->addCell(700)->addText('စဥ်',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(3500)->addText('အမည်',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(3500)->addText('ရာထူး',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(4000)->addText('သင်တန်းအမည်',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(2500)->addText('သင်တန်း   ကာလ(မှ)',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(2500)->addText('သင်တန်း    ကာလ(အထိ)',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(3000)->addText('သင်တန်းနေရာ/    ဒေသ',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);
            $table->addCell(2000)->addText('သင်တန်း   အမျိုးအစား',['bold'=>true],['alignment'=>'center','spaceBefore'=>50]);

            foreach ($staffs as $index => $staff) {
                $isFirstTraining = true; // Flag to check the first training
            
                foreach ($staff->trainings as $trainingIndex => $training) {
                    $table->addRow();
            
                    // Show these cells only for the first training of the staff
                    if ($isFirstTraining) {
                        $table->addCell(700, ['vMerge' => 'restart'])->addText(en2mm($index + 1), null, ['indentation' => ['left' => 100]]);
                        $table->addCell(3500, ['vMerge' => 'restart'])->addText($staff->name, null, ['indentation' => ['left' => 100]]);
                        $table->addCell(3500, ['vMerge' => 'restart'])->addText($staff->current_rank->name, null, ['indentation' => ['left' => 100]]);
                        $isFirstTraining = false; // Set the flag to false after the first iteration
                    } else {
                        // Add merged cells for subsequent rows to align properly
                        $table->addCell(700, ['vMerge' => 'continue']);
                        $table->addCell(3500, ['vMerge' => 'continue']);
                        $table->addCell(3500, ['vMerge' => 'continue']);
                    }
            
                    // Add the training-specific cells
                    $table->addCell(4000)->addText($training->training_type->name == 'အခြား' ? $training->diploma_name : $training->training_type->name, null, ['indentation' => ['left' => 100]]);
                    $table->addCell(2500)->addText(formatDMYmm($training->from_date), null, ['indentation' => ['left' => 100]]);
                    $table->addCell(2500)->addText(formatDMYmm($training->to_date), null, ['indentation' => ['left' => 100]]);
                    $table->addCell(3000)->addText($training->location, null, ['indentation' => ['left' => 100]]);
                    $table->addCell(2000)->addText($training->training_location?->name, null, ['indentation' => ['left' => 100]]);
                    }
                  
                }
       
        $fileName = 'local_training_report.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);


        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);


        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }


   
    public function render()
    {
        $this->staffsAll = Staff::
        where('name', 'like', '%' . $this->nameSearch . '%')
        ->whereHas('trainings')->with('trainings')->get();
        $letter_types = LetterType::all();
        return view('livewire.local-training-report.local-training-report', [
            'staffs' => $this->staffsAll,
            'letter_types'=>$letter_types,

        
        
        
        
        
        ]);
    }


}
