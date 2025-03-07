<?php

namespace App\Livewire\StaffReport;

use App\Exports\PA17;
use App\Models\Department;
use App\Models\Division;
use App\Models\PensionYear;
use App\Models\Rank;
use App\Models\Staff;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffReport2 extends Component
{

    public $nameSearch, $deptId, $filterDate;
    public $rankId;
    public $staffs;
    public $searchName;
    public $year, $month, $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;
    public $pension_year;
    public $startDate;
    public $age;
    public $ageTwo;
    public $signID = 'all';

    private function getSignName($signID)
    {
        return match ($signID) {
            'all' => 'အားလုံး',
            'between' => 'နှစ်ကြား',
            '>' => 'နှစ်အထက်',
            '=' => 'နှစ်',
            '<' => 'နှစ်အောက်',
            default => '',
        };
    }

    public function mount()
    {
        $this->signID = 'all';
    }

    public function updatedRankId()
    {
        $this->startDate = null;
    }

    public function updatedDeptId()
    {
        $this->startDate = null;
    }

    public function updatedStartDate()
    {
        $this->rankId = '';
        $this->deptId = '';
    }

    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
       
        $pdf = PDF::loadView('pdf_reports.staff_report_2', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_2.pdf');
    }
    public function go_excel() 
    {
        return Excel::download(new PA17(
            $this->rankId, 
            $this->deptId, 
            $this->startDate,
            $this->age,
            $this->ageTwo,
            $this->signID
        ), 'PA17.xlsx');
    }
    public function go_word()
    {
        $staffs = Staff::get();
        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Pyidaungsu');
        $phpWord->setDefaultFontSize(12);
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');


        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();


        $headers = ['စဥ်', 'အမည်', 'ရာထူး', 'နိုင်ငံသားစိစစ်ရေးအမှတ်', 'ဌာနခွဲ', 'မွေးသက္ကရာဇ်', 'အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ', 'တစ်ဆင့်နိမ့်ရာထူးရရက်စွဲ ရက်၊လ၊နှစ်', 'လက်ရှိရာထူးရရက်စွဲ ရက်၊လ၊နှစ်', 'ပညာအရည်အချင်း'];
        foreach ($headers as $header) {
            $table->addCell(2000)->addText($header, ['bold' => true]);
        }


        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText($staff->currentRank?->name);
            $table->addCell(2000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);
            $table->addCell(2000)->addText($staff->current_department?->name);
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')));
            $educations = '';
            foreach ($staff->staff_educations as $edu) {
                $educations .= $edu->education_group->name . ' - ' . $edu->education_type->name . ', ' . $edu->education->name . "\n";
            }
            $table->addCell(2000)->addText(trim($educations));
        }


        $filePath = 'staff_report_2.docx';
        $phpWord->save($filePath, 'Word2007');

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $staffQuery = Staff::query();

        // Apply rank filter
        if ($this->rankId) {
            $staffQuery->whereHas('currentRank', function ($query) {
                $query->where('id', $this->rankId);
            });
        }

        // Apply department filter
        if ($this->deptId) {
            $staffQuery->where('current_division_id', $this->deptId);
        }

        // Apply service years (လုပ်သက်) filter
        if (!empty($this->age) && is_numeric($this->age)) {
            $now = now();
            if ($this->signID === '>') {
                // More than X years of service
                $dateLimit = $now->copy()->subYears($this->age);
                $staffQuery->where('government_staff_started_date', '<=', $dateLimit);
            } elseif ($this->signID === '<') {
                // Less than X years of service
                $dateLimit = $now->copy()->subYears($this->age);
                $staffQuery->where('government_staff_started_date', '>', $dateLimit);
            } elseif ($this->signID === '=') {
                // Exactly X years of service
                $startYear = $now->copy()->subYears($this->age + 1);
                $endYear = $now->copy()->subYears($this->age);
                $staffQuery->whereBetween('government_staff_started_date', [$endYear, $startYear]);
            } elseif ($this->signID === 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
                // Between X and Y years of service
                $maxDate = $now->copy()->subYears(min($this->age, $this->ageTwo));
                $minDate = $now->copy()->subYears(max($this->age, $this->ageTwo));
                $staffQuery->whereBetween('government_staff_started_date', [$minDate, $maxDate]);
            }
        }

        $staffs = $staffQuery->get();
        $pension_year = PensionYear::where('id', 1)->value('year');
        $this->staffs = $staffs;
        $this->pension_year = $pension_year;
        
        return view('livewire.staff-report.staff-report2', [
            'ranks' => Rank::where('is_dica',1)->get(),
            'depts' => Division::all(),
            'staffs' => $this->staffs,
            'pension' => $this->pension_year,
        ]);
    }
}
