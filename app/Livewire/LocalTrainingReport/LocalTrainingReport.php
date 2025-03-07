<?php

namespace App\Livewire\LocalTrainingReport;
use App\Models\LetterType;
use App\Models\Rank;
use App\Models\Staff;
use App\Models\Training;
use App\Models\TrainingType;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use Illuminate\Database\Eloquent\Collection;

class LocalTrainingReport extends Component
{
    public $trainingLocation;
    public $nameSearch;

    public  $staffsAll;
    public  $staffs;
    public  $ranks,$selectedRankId;
    public $From, $To;
    public function mount()
    {
        $this->ranks = (new Rank() )->isDicaAll();
    }
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
    $query = Staff::whereHas('trainings', function ($query) {
        if (!empty($this->From) && !empty($this->To)) {
            $query->where(function ($query) {
                $query->whereBetween('from_date', [
                    date('Y-m-01', strtotime($this->From)),
                    date('Y-m-t', strtotime($this->To))
                ])->orWhereBetween('to_date', [
                    date('Y-m-01', strtotime($this->From)),
                    date('Y-m-t', strtotime($this->To))
                ]);
            });
        }
        
        // Apply date range filter if both dates are provided
        if (!empty($this->From) && !empty($this->To)) {
            $query->where(function ($query) {
                $query->whereBetween('from_date', [
                    date('Y-m-01', strtotime($this->From)),
                    date('Y-m-t', strtotime($this->To))
                ]);
            });
        }
    })->with(['trainings' => function($query) {
        // Apply same filters to eager loaded trainings
        if (!empty($this->trainingLocation)) {
            $query->where('training_location_id', $this->trainingLocation);
        }
        
        if (!empty($this->From) && !empty($this->To)) {
            $query->whereBetween('from_date', [
                date('Y-m-01', strtotime($this->From)),
                date('Y-m-t', strtotime($this->To))
            ]);
        }
        
        $query->with(['training_type', 'training_location']);
    }, 'currentRank']);



    if (!empty($this->selectedRankId)) {
        $query->where('current_rank_id', $this->selectedRankId);
    }
    

    $this->staffs = $query->get();

    // Get selected rank name
    $selectedRankName = $this->selectedRankId
        ? Rank::find($this->selectedRankId)?->name ?? 'ရာထူးအားလုံး'
        : 'ရာထူးအားလုံး';

    // Create a new PHPWord instance
    $phpWord = new PhpWord();

    $section = $phpWord->addSection([
        'orientation'  => 'landscape',
        'pageSizeW'    => Converter::inchToTwip(11),  // Letter width (landscape)
        'pageSizeH'    => Converter::inchToTwip(8.5), // Letter height (landscape)
        'marginLeft'   => Converter::inchToTwip(0.8), // 0.8 inch
        'marginRight'  => Converter::inchToTwip(0.8), // 0.8 inch
        'marginTop'    => Converter::inchToTwip(1),   // 1 inch
        'marginBottom' => Converter::inchToTwip(1),   // 1 inch
    ]);
    $phpWord->setDefaultFontSize(12);
    $pStyle_7=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 350);

    // Title styles
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 12], ['alignment' => 'center', 'spaceBefore' => 200]);
    $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 12], ['alignment' => 'center']);

    // Add Titles
    $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
    $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
    // $section->addTitle($this->From . "မှ" . $this->To . "အတွင်းတက်ရောက်ခဲ့သည့်" . (in_array($this->trainingLocation, [1, 2]) ? 'ပြည်တွင်းသင်တန်း Report' : 'ပြည်ပသင်တန်း Report'), 2);
    $section->addTitle($this->From . "မှ" . $this->To . "အတွင်းတက်ရောက်ခဲ့သည့်သင်တန်း Report", 2);

    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
    $table->addRow(50,array('tblHeader' => true));
    $table->addCell(700)->addText('စဉ်', ['bold' => true],$pStyle_7);
    $table->addCell(5000)->addText("အမည်", ['bold' => true],$pStyle_7);
    $table->addCell(4000)->addText('ရာထူး', ['bold' => true],$pStyle_7);
    $table->addCell(4000)->addText('သင်တန်းအမည်', ['bold' => true],$pStyle_7);
    $table->addCell(2500)->addText("သင်တန်း\nကာလ(မှ)", ['bold' => true],$pStyle_7);
    $table->addCell(2500)->addText("သင်တန်း\nကာလ(အထိ)", ['bold' => true],$pStyle_7);
    $table->addCell(3000)->addText('သင်တန်းနေရာ/ဒေသ', ['bold' => true],$pStyle_7);
    $table->addCell(3000)->addText('သင်တန်းအမျိုးအစား', ['bold' => true],$pStyle_7);
    foreach ($this->staffs as $index => $staff) {
        $isFirstTraining = true;

        foreach ($staff->trainings as $training) {
            $table->addRow();

            if ($isFirstTraining) {
                $table->addCell(700, ['vMerge' => 'restart'])->addText(en2mm($index + 1),null,$pStyle_7);
                $table->addCell(5000, ['vMerge' => 'restart'])->addText($staff->name,null,$pStyle_7);
                $table->addCell(4000, ['vMerge' => 'restart'])->addText($staff->currentRank->name ?? '',null,$pStyle_7);
                $isFirstTraining = false;
            } else {
                $table->addCell(700, ['vMerge' => 'continue']);
                $table->addCell(5000, ['vMerge' => 'continue']);
                $table->addCell(4000, ['vMerge' => 'continue']);
            }

            // Add training details
            $table->addCell(4000)->addText($training->training_type->name == 'အခြား' ? $training->diploma_name : $training->training_type->name,null,$pStyle_7);
            $table->addCell(2500)->addText(formatDMYmm($training->from_date),null,$pStyle_7);
            $table->addCell(2500)->addText(formatDMYmm($training->to_date),null,$pStyle_7);
            $table->addCell(3000)->addText($training->location,null,$pStyle_7);
            $table->addCell(3000)->addText($training->training_location?->name ?? '',null,$pStyle_7);
        }
    }

    // Save and return file
    $fileName = 'local_training_report.docx';
    $tempFile = tempnam(sys_get_temp_dir(), 'word');
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save($tempFile);

    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}



public function render()
{
    $query = Staff::whereHas('trainings', function ($query) {
        // Filter by training location
        if ($this->trainingLocation != 3) {
            $query->where('training_location_id', $this->trainingLocation);
        }
        
        // Apply date range filter if both dates are provided
        if (!empty($this->From) && !empty($this->To)) {
            $query->where(function ($query) {
                $query->whereBetween('from_date', [
                    date('Y-m-01', strtotime($this->From)),
                    date('Y-m-t', strtotime($this->To))
                ]);
            });
        }
    })->with(['trainings' => function($query) {
        // Apply same filters to eager loaded trainings
        if ($this->trainingLocation != 3) {
            $query->where('training_location_id', $this->trainingLocation);
        }
        
        if (!empty($this->From) && !empty($this->To)) {
            $query->whereBetween('from_date', [
                date('Y-m-01', strtotime($this->From)),
                date('Y-m-t', strtotime($this->To))
            ]);
        }
        
        $query->with(['training_type', 'training_location']);
    }, 'currentRank']);

    // Apply rank filter if selected
    if (!empty($this->selectedRankId)) {
        $query->where('current_rank_id', $this->selectedRankId);
    }

    $this->staffs = $query->get();
    
    $selectedRankName = null;
    if (!empty($this->selectedRankId)) {
        $selectedRankName = Rank::find($this->selectedRankId)?->name ?? 'ရာထူးအားလုံး';
    }

    return view('livewire.local-training-report.local-training-report', [
        'staffs' => $this->staffs,
        'ranks' => $this->ranks,
        'selectedRankId' => $this->selectedRankId,
        'selectedRankName' => $selectedRankName,
        'From' => $this->From,
        'To' => $this->To
    ]);
}
}
