<?php 

namespace App\Livewire;

use App\Exports\PA19;
use App\Models\Division;
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
    public $age, $ageTwo;
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
        $staffs = $query->with('currentRank', 'gender')->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 50,
        ];
        $firstRowStyle = ['bgColor' => 'f2f2f2'];
       
        $phpWord->addTableStyle('TrainingTable', $tableStyle, $firstRowStyle);
        $table = $section->addTable('TrainingTable');
        $table->addRow();
        $table->addCell(1000)->addText('စဥ်');
        $table->addCell(2000)->addText('အမည်');
        $table->addCell(2000)->addText('ရာထူး');
        $table->addCell(2000)->addText('မွေးသက္ကရာဇ်');
        $table->addCell(2000)->addText('အသက်');
            foreach ($staffs as $index => $staff) {

                $table->addRow();
                $table->addCell(1000,['vMerge' => 'restart'])->addText(en2mm($index + 1));
                $table->addCell(2000,['vMerge' => 'restart'])->addText($staff->name);
                $table->addCell(2000,['vMerge' => 'restart'])->addText($staff->currentRank?->name);
                $table->addCell(2000,['vMerge' => 'restart'])->addText(en2mm($staff->dob));
                $table->addCell(2000,['vMerge' => 'restart'])->addText($staff->howOldAmI());
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

        // Eager load relationships like `currentRank` and `gender`
        $this->staffs = $query->with('currentRank', 'gender')->get();

        return view('livewire.age-filter');
    }
}
