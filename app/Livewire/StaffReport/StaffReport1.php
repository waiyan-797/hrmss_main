<?php

namespace App\Livewire\StaffReport;

use App\Exports\PA16;
use App\Models\Division;
use App\Models\Department;
use App\Models\Rank;
use App\Models\PensionYear;
use App\Models\Staff;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class StaffReport1 extends Component
{

    public $nameSearch,  $filterDate;
    public $staffs;
    public $divi,$divId ;
    public $year, $month, $filterRange;
    public $rank, $rankId;
    public $previousYear, $previousMonthDate, $previousMonth;
    public  $pension_year;

    public function go_pdf()
    {
        $staffs = Staff::get();
        $pension_year = PensionYear::first();
        $data = [
            'staffs' => $staffs,
            'pension_year'=>$pension_year,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report_1', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_1.pdf');
    }
   
    // public function go_excel() 
    // {
    //     $staffs = Staff::where('current_department_id', $this->deptId)
    //         ->where('current_rank_id', $this->rankId)
    //         ->get();
    //     $this->staffs = $staffs;
    //     return Excel::download(new PA16($this->year, $this->month, $this->filterRange, $this->previousMonthDate, $this->previousMonth, $this->staffs), 'PA16.xlsx');
    // }
    // public function go_excel() 
    // {
    //     $staffs = Staff::where('current_department_id', $this->deptId)
    //         ->where('current_rank_id', $this->rankId)
    //         ->get();
            
    //     return Excel::download(new PA16($this->year, $this->month, $this->filterRange, $this->previousMonthDate, $this->previousMonth, $staffs), 'PA16.xlsx');
    // }

    public function go_excel() 
    {
        // Get filtered staff records
        $staffs = Staff::query()
            ->when($this->divId, function ($query) {
                $query->where('current_division_id', $this->divId);
            })
            ->when($this->rankId, function ($query) {
                $query->where('current_rank_id', $this->rankId);
            })
            ->get();
        
        // Pass the filtered staff data to the PA16 class
        return Excel::download(new PA16(
            $this->year, 
            $this->month, 
            $this->filterRange, 
            $this->previousMonthDate, 
            $this->previousMonth, 
            
            $staffs
        ), 'PA16.xlsx');
    }
    
    

    public function go_word()
    {
        $staffs = Staff::with('current_rank', 'nrc_region_id', 'nrc_township_code', 'nrc_sign', 'side_department', 'staff_educations')->get();
        $pension_year = PensionYear::first();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addText('(၂၄-၇-၂၀၂၄)ရက်နေ့ ညွှန်ကြားရေးမှူးများ၏ လက်ရှိဌာနသို့ ရောက်ရှိတာဝန်ထမ်းဆောင်သည့်စာရင်း', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $headerTitles = ['စဥ်', 'အမည်', 'ရာထူး', 'နိုင်ငံသားစိစစ်ရေးအမှတ်', 'မွေးနေ့သက္ကရာဇ်', 'အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ', 'လက်ရှိအဆင့်ရရက်စွဲ', 'လက်ရှိဌာနရောက်ရှိရက်စွဲ', 'ဌာနခွဲ', 'ပညာအရည်အချင်း', 'ပင်စင်ပြည့်သည့်နေ့စွဲ'];

        foreach ($headerTitles as $title) {
            $table->addCell(2000)->addText($title, ['bold' => true]);
        }

        // Add table rows
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText($staff->current_rank?->name);
            $table->addCell(2000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y')));
            $table->addCell(2000)->addText($staff->side_department?->name);


            $educations = '';
            foreach ($staff->staff_educations as $edu) {
                $educations .= $edu->education_group?->name . ' - ' . $edu->education_type?->name . ', ' . $edu->education?->name . "\n";
            }
            $table->addCell(2000)->addText($educations);

            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->year + $pension_year->year));
        }


        $fileName = 'staff_report.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $temp_file = tempnam(sys_get_temp_dir(), 'phpword');
        $objWriter->save($temp_file);
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }

    public function mount()
    {
        $this->filterRange = Carbon::now()->format('Y-m'); // Format: 'YYYY-MM'
    }
    
    public function render()
{
    if (isset($this->filterRange)) {
        [$year, $month] = explode('-', $this->filterRange);
    } else {
        $year = now()->year; 
        $month = now()->month;
    }

    $this->year = $year;
    $this->month = $month;

    $previousMonthDate = Carbon::createFromDate($this->year, $this->month)->subMonth();
    $this->previousYear = $previousMonthDate->year;
    $this->previousMonth = $previousMonthDate->month;

    $staffQuery = Staff::query();

    if (!is_null($this->divId)) {
        $staffQuery->where('current_division_id', $this->divId);
    }

    if (!is_null($this->rankId)) {
        $staffQuery->where('current_rank_id', $this->rankId);
    }

    $staffQuery->withWhereHas('postings', function ($query) use ($year, $month) {
        $query->whereYear('from_date', '<=', $year)
              ->whereMonth('from_date', '<=', $month);
    });

    $this->staffs = $staffQuery->get();

    $pension_year = PensionYear::where('id', 1)->value('year');
    $this->pension_year = $pension_year;

    return view('livewire.staff-report.staff-report1', [
        'staffs' => $this->staffs,
        'pension' => $this->pension_year,
        'divis' => Division::all(),
        'ranks' => Rank::where('is_dica',1)->get(),
        'year' => $year,
        'month' => $month,
    ]);
}

}
