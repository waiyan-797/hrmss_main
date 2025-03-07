<?php 

namespace App\Livewire;

use App\Exports\PA19;
use App\Models\Division;
use App\Models\Rank;
use App\Models\Gender;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class AgeFilter extends Component
{
    
    public $ranks, $selectedRankId;
    public $age, $ageTwo ;
    public $divisions, $division_id  ;
    public $genders, $gender_id;
    public $staffs;
    public $signID;
    public function go_pdf()
    {
        $now = Carbon::now();
        $query = Staff::query();
    
        if (!empty($this->age) && is_numeric($this->age)) {
            $birthDate = $now->copy()->subYears($this->age);
            
            if ($this->signID) {
                if ($this->signID == '>') {
                    $query->whereYear('dob', '<=', $birthDate->year);
                } elseif ($this->signID == '<') {
                    $query->whereYear('dob', '>', $birthDate->year);
                } elseif ($this->signID == '=') {
                    $query->whereYear('dob', '=', $birthDate->year);
                } elseif ($this->signID == 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
                    $birthDateFrom = $now->copy()->subYears($this->age);
                    $birthDateTo = $now->copy()->subYears($this->ageTwo);
                    $query->whereBetween('dob', [$birthDateTo, $birthDateFrom]);
                }
            }
        }
    
        if ($this->division_id) {
            $query->where('current_division_id', $this->division_id);
        }
    
        if ($this->gender_id) {
            $query->where('gender_id', $this->gender_id);
        }
    // sdfdsf
        $staffs = $query->with('currentRank', 'gender')->get();
    
        $data = [
            'staffs' => $staffs,
            'filters' => [
                'age' => $this->age,
                'ageTwo' => $this->ageTwo,
                'signID' => $this->signID,
                'division_id' => $this->division_id,
                'gender_id' => $this->gender_id,
            ],
        ];
    
        $pdf = PDF::loadView('pdf_reports.age_filter', $data);
    
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'age_filter.pdf');
    }
    public function go_word()
    {

        $now = Carbon::now();
        $query = Staff::query();
    
        if (!empty($this->age) && is_numeric($this->age)) {
            $birthDate = $now->copy()->subYears($this->age);
            
            if ($this->signID) {
                if ($this->signID == '>') {
                    $query->whereYear('dob', '<=', $birthDate->year);
                } elseif ($this->signID == '<') {
                    $query->whereYear('dob', '>', $birthDate->year);
                } elseif ($this->signID == '=') {
                    $query->whereYear('dob', '=', $birthDate->year);
                } elseif ($this->signID == 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
                    $birthDateFrom = $now->copy()->subYears($this->age);
                    $birthDateTo = $now->copy()->subYears($this->ageTwo);
                    $query->whereBetween('dob', [$birthDateTo, $birthDateFrom]);
                }
            }
        }
    
        if ($this->division_id) {
            $query->where('current_division_id', $this->division_id);
        }
    
        if ($this->gender_id) {
            $query->where('gender_id', $this->gender_id);
        }
        if($this->selectedRankId){
            $query->where('current_rank_id', $this->selectedRankId);
        }

        $staffs = $query->with('currentRank', 'gender')->get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 50,
        ];
        // $firstRowStyle = ['bgColor' => 'f2f2f2'];

        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);
        // 
        // $header_subseq = $section->addHeader();
        // $header_subseq->addText('လျှို့ဝှက်', null, [
        //     'align' => 'center',
        //     'spaceBefore' => 0,
        //     'spaceAfter' => 0,
        //     'lineHeight' => 1,
        // ]);

        // $header_subseq->addPreserveText('{PAGE}', ['name' => 'Pyidaungsu Numbers', 'size' => 13], ['alignment' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0]);
        // $footer = $section->addFooter();
        // $footer->addText('လျှို့ဝှက်',null,array('align'=>'center', 'spaceBefore' => 200));

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200,'lineHeight' => 1]);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center','lineHeight' => 1]);
        // $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        // $section->addTitle(mmDateFormat($this->year, $this->month). 'အတွင်း တာဝန်ပျက်ကွက်သူဝန်ထမ်းများအား အရေးယူဆောင်ရွက်ပြီးစီးမှုနှင့် ဆောင်ရွက်ဆဲစာရင်း', 2);
       
       
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(1000,['vMerge' => 'restart'])->addText('စဥ်',['font'=>'Pyidaungsu','size'=>11],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(4000,['vMerge' => 'restart'])->addText('အမည်',['font'=>'Pyidaungsu','size'=>11],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(4500,['vMerge' => 'restart'])->addText('ရာထူး',['font'=>'Pyidaungsu','size'=>11],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(3000,['vMerge' => 'restart'])->addText('မွေးသက္ကရာဇ်',['font'=>'Pyidaungsu','size'=>11],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(3000,['vMerge' => 'restart'])->addText('အသက်',['font'=>'Pyidaungsu','size'=>11],['alignment'=>'center','spaceBefore'=>600]);
        $table->addCell(2000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အသက်',['font'=>'Pyidaungsu','size'=>11],['alignment'=>'center','spaceBefore'=>200]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('မှတ်ချက်',['font'=>'Pyidaungsu','size'=>11],['alignment'=>'center','spaceBefore'=>600]);

        $table->addRow();
        $table->addCell(1000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4500, ['vMerge' => 'continue']);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(1000)->addText('ကျား', ['font'=>'Pyidaungsu','size'=>11,'alignment' => 'center','spaceBefore'=>200]);
        $table->addCell(1000)->addText('မ', ['font'=>'Pyidaungsu','size'=>11,'alignment' => 'center','spaceBefore'=>200]);
        $table->addCell(2000, ['vMerge' => 'continue']);

            foreach ($staffs as $index => $staff) {

                $table->addRow();
                $table->addCell(1000,['vMerge' => 'restart'])->addText(en2mm($index + 1),['font'=>'Pyidaungsu','size'=>11],['alignment'=>'center',]);
                $table->addCell(4000,['vMerge' => 'restart'])->addText($staff->name,['font'=>'Pyidaungsu','size'=>11]);
                $table->addCell(4500,['vMerge' => 'restart'])->addText($staff->currentRank?->name,['font'=>'Pyidaungsu','size'=>11]);
                $table->addCell(3000,['vMerge' => 'restart'])->addText(en2mm($staff->dob),['font'=>'Pyidaungsu','size'=>11]);
                $table->addCell(3000,['vMerge' => 'restart'])->addText($staff->howOldAmI(),['font'=>'Pyidaungsu','size'=>11]);
                if($staff->gender_id==1){
                    $table->addCell(1000,['vMerge' => 'restart'])->addText("\u{2714}",null,['alignment'=>'center',]);
                    $table->addCell(1000,['vMerge' => 'restart'])->addText();
                }elseif($staff->gender_id==2){
                    $table->addCell(1000,['vMerge' => 'restart'])->addText();
                    $table->addCell(1000,['vMerge' => 'restart'])->addText("\u{2714}",null,['alignment'=>'center',]);
                }
                
                $table->addCell(2000,['vMerge' => 'restart'])->addText();
            }
        $fileName = 'age_filter_report.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    public function mount()
    {
        // Initial values for divisions and genders
        $this->divisions = Division::all();
        $this->genders = Gender::all();
        $this->division_id = 11;
        $this->gender_id;
        $this->ranks = (new Rank )->isDicaAll();
    }

    public function render()
    {
        $now = Carbon::now();
        $query = Staff::query();

        if (!empty($this->age) && is_numeric($this->age)) {
            $birthDate = $now->copy()->subYears($this->age);
            
            
            if ($this->signID) {
                if ($this->signID == '>') {

                    $query->whereYear('dob', '<=', $birthDate->year);
                } elseif ($this->signID == '<') {
                    
                    $query->whereYear('dob', '>', $birthDate->year);
                } elseif ($this->signID == '=') {
                    $query->whereYear('dob', '=', $birthDate->year);
                }
                 elseif ($this->signID == 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
                    
                    $birthDateFrom = $now->copy()->subYears($this->age);
                    $birthDateTo = $now->copy()->subYears($this->ageTwo);
                    $query->whereBetween('dob', [$birthDateTo, $birthDateFrom]);
                }
            }
        }

        if ($this->division_id) {
            $query->where('current_division_id', $this->division_id);
        }

        if ($this->gender_id) {
            $query->where('gender_id', $this->gender_id);
        }

        if($this->selectedRankId){
            $query->where('current_rank_id', $this->selectedRankId);
        }

        // Eager load relationships like `currentRank` and `gender`
        $this->staffs = $query->with('currentRank', 'gender')->get();

        return view('livewire.age-filter');
    }
}
