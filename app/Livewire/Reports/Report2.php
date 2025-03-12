<?php

namespace App\Livewire\Reports;

use App\Exports\A04;
use App\Models\Ethnic;
use App\Models\MaritalStatus;
use App\Models\Rank;
use App\Models\Religion;
use App\Models\Staff;
use App\Models\Gender;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class Report2 extends Component
{
    public $selectedRankId;
    public $age;
    public $ageTwo;
    public $signID = 'all';
    public $selectedEthnicId;
    public $selectedReligionId;
    public $selectedGenderId;
    public $selectedMaritalId;
    public $staffs;

    protected $listeners = [
        'set-ethnic' => 'setEthnic'
    ];

    public function mount()
    {
        $this->updateStaffs();
    }

    public function setEthnic($data)
    {
        $this->selectedEthnicId = $data['value'];
        $this->updateStaffs();
    }

    public function updatedAge()
    {
        $this->updateStaffs();
    }

    public function updatedAgeTwo()
    {
        $this->updateStaffs();
    }

    public function updatedSignID()
    {
        $this->updateStaffs();
    }

    public function updatedSelectedRankId()
    {
        $this->updateStaffs();
    }

    public function updatedSelectedEthnicId()
    {
        $this->updateStaffs();
    }

    public function updatedSelectedReligionId()
    {
        $this->updateStaffs();
    }

    public function updatedSelectedGenderId()
    {
        $this->updateStaffs();
    }

    public function updatedSelectedMaritalId()
    {
        $this->updateStaffs();
    }

    private function updateStaffs()
    {
        $query = Staff::query();

        // Apply all filters together
        if ($this->selectedRankId) {
            $query->where('current_rank_id', $this->selectedRankId);
        }

        if ($this->age || $this->signID !== 'all') {
            switch ($this->signID) {
                case 'between':
                    if ($this->age && $this->ageTwo) {
                        $startDate = now()->subYears($this->ageTwo);
                        $endDate = now()->subYears($this->age);
                        $query->whereBetween('current_rank_date', [$startDate, $endDate]);
                    }
                    break;
                case '>':
                    if ($this->age) {
                        $date = now()->subYears($this->age);
                        $query->where('current_rank_date', '<', $date);
                    }
                    break;
                case '=':
                    if ($this->age) {
                        $startDate = now()->subYears($this->age)->startOfYear();
                        $endDate = now()->subYears($this->age)->endOfYear();
                        $query->whereBetween('current_rank_date', [$startDate, $endDate]);
                    }
                    break;
                case '<':
                    if ($this->age) {
                        $date = now()->subYears($this->age);
                        $query->where('current_rank_date', '>', $date);
                    }
                    break;
            }
        }

        if ($this->selectedEthnicId) {
            $query->where('ethnic_id', $this->selectedEthnicId);
        }

        if ($this->selectedReligionId) {
            $query->where('religion_id', $this->selectedReligionId);
        }

        if ($this->selectedGenderId) {
            $query->where('gender_id', $this->selectedGenderId);
        }

        if ($this->selectedMaritalId) {
            if ($this->selectedMaritalId == '1') { // ရှိ
                $query->whereNotNull('spouse_name');
            } else { // မရှိ
                $query->whereNull('spouse_name');
            }
        }

        $this->staffs = $query->with([
            'currentRank', 
            'ethnic', 
            'religion',
            'gender',
            'current_address_region', 
            'current_address_township_or_town',
            'permanent_address_region', 
            'permanent_address_township_or_town',
            'children'
        ])->get();
    }

    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.report_2', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'report_2.pdf');
    }

    public function go_excel() 
    {
        return Excel::download(new A04(
            $this->selectedRankId,
            $this->age,
            $this->ageTwo,
            $this->signID,
            $this->selectedEthnicId,
            $this->selectedReligionId,
            $this->selectedGenderId,
            $this->selectedMaritalId
        ), 'A04.xlsx');
    }

    public function go_word()
    {
        $staffs = Staff::get();

       
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $section->addText('Report - 2', ['bold' => true, 'size' => 14], ['alignment' => 'center']);

        
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        // Add header row
        $table->addRow();
        $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အမည်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ရာထူး');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အသက်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('လက်ရှိရာထူးရသောလုပ်သက်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('လူမျိုး');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ကိုးကွယ်သည့်ဘာသာ');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ယခုနေထိုင်သည့်နေရပ်လိပ်စာ');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('ကျား/မ');
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သားသမီးအရေအတွက်');
        $table->addCell(2000,['vMerge' => 'restart'])->addText('အိမ်ထောင် (ရှိ/မရှိ)');

        $table->addRow();
            $table->addCell(2000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(4000, ['vMerge' => 'continue']);
            $table->addCell(3000)->addText('ကျား', ['alignment' => 'center']);
            $table->addCell(3000)->addText('မ', ['alignment' => 'center']);
            $table->addCell(4000, ['vMerge' => 'continue']);

       
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell()->addText($index + 1);
            $table->addCell()->addText($staff->name);
            $table->addCell()->addText($staff->current_rank->name);
            $table->addCell()->addText(\Carbon\Carbon::parse($staff->dob)->age . ' years');
            $table->addCell()->addText(\Carbon\Carbon::parse($staff->current_rank_date)->age . ' years');
            $table->addCell()->addText($staff->ethnic->name);
            $table->addCell()->addText($staff->religion->name);
            $table->addCell()->addText($staff->current_address_street . '/' . $staff->current_address_ward . '/' . $staff->current_address_region->name . '/' . $staff->current_address_district->name . '/' . $staff->current_address_township_or_town->name);
            $table->addCell()->addText($staff->permanent_address_street . '/' . $staff->permanent_address_ward . '/' . $staff->permanent_address_region->name . '/' . $staff->permanent_address_district->name . '/' . $staff->permanent_address_township_or_town->name);
            $table->addCell()->addText($staff->gender->name);
            $table->addCell()->addText($staff->children->where('gender_id', 1)->count());
            $table->addCell()->addText($staff->children->where('gender_id', 2)->count());
            $table->addCell()->addText($staff->spouse_name ? 'ရှိ' : 'မရှိ');
        }

        
        $fileName = 'report_2.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $ranks = Rank::where('is_dica',1)->get();
        $ethnics = Ethnic::all();
        $religions = Religion::all();
        $genders = Gender::all();
        $maritals = MaritalStatus::all();

        return view('livewire.reports.report2', [
            'staffs' => $this->staffs,
            'ranks' => $ranks,
            'religions' => $religions,
            'ethnics' => $ethnics,
            'maritals' => $maritals,
            'genders' => $genders,
        ]);
    }
}
