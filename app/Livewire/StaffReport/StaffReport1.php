<?php

namespace App\Livewire\StaffReport;

use App\Models\Department;
use App\Models\PensionYear;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class StaffReport1 extends Component
{

    public $nameSearch, $deptId, $filterDate;
    public $staffs;
    public $year , $month ;

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
            $table->addCell(2000)->addText($staff->current_rank->name);
            $table->addCell(2000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y')));
            $table->addCell(2000)->addText($staff->side_department->name);


            $educations = '';
            foreach ($staff->staff_educations as $edu) {
                $educations .= $edu->education_group->name . ' - ' . $edu->education_type->name . ', ' . $edu->education->name . "\n";
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
        $this->filterDate = Carbon::now()->format('Y-m-d');
    }
    public function render()
    {
        $year = explode('-', $this->filterDate)[0];
        $month = explode('-', $this->filterDate)[1];
        $this->year = $year ;
        $this->month = $month;

        $staffQuery = Staff::query();
        $staffQuery->withWhereHas('postings', function ($query) use ($year, $month) {

            $query->whereYear('from_date', '<=', $year)->whereMonth('from_date', '<=', $month);
            if ($this->deptId) {

                $query->where('department_id', $this->deptId);
            }
        });
        if ($this->nameSearch) {
            $staffQuery->where('name', 'like', '%' . $this->nameSearch . '%');
        }
        $this->staffs = $staffQuery->get();

        $staffs = Staff::get();
        $pension_year = PensionYear::first();
        


        return view('livewire.staff-report.staff-report1', [
            'staffs' => $this->staffs,
            'pension_year' => $pension_year,
            'depts' => Department::all()
        ]);
    }
}
