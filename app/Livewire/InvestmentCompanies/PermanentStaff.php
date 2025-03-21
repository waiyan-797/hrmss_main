<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Salary;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class PermanentStaff extends Component
{
    public $dateRange, $year, $month, $day;

    public function go_pdf()
    {
        [$year, $month, $day] = explode('-', $this->dateRange);
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;

        $staffs = Staff::get();
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $salaries = Salary::with('staff')->get();
        $allPayScales = Payscale::all();
        $TotalAllowQty = Payscale::sum('allowed_qty');
        $currentStaffTotal = Staff::where('current_department_id', 1)->where('is_active', 1)->count();
        $currentMaleStaffTotal = Staff::where('current_department_id', 1)->where('gender_id', 1)->where('is_active', 1)->count();
        $currentFeMaleStaffTotal = Staff::where('current_department_id', 1)->where('gender_id', 2)->where('is_active', 1)->count();

        $totalStaffFromOthersDept = Staff::where('salary_paid_by', 1)->where('current_department_id', '!=', 1)->count();
        $totalSalaryPaidStaff = Staff::where('salary_paid_by', 1)->count();
        $maximumBudget = 0;
        foreach ($allPayScales as $payscale) {
            $budget = $payscale->min_salary * $payscale->allowed_qty;
            $maximumBudget += $budget;
        }
        $data = [
            'salaries' => $salaries,
            'staffs' => $staffs,
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
            // 'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
            'allPayScales' => $allPayScales,
            'TotalAllowQty' => $TotalAllowQty,
            'currentMaleStaffTotal' => $currentMaleStaffTotal,
            'currentFeMaleStaffTotal' => $currentFeMaleStaffTotal,
            'maximumBudget' => $maximumBudget,
            'year' => $this->year,
            'month' => $this->month,
            'day' => $this->day,
            'dateRange' => $this->dateRange,
        ];
        $pdf = PDF::loadView('pdf_reports.permanent_staff_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'permanent_staff_report_pdf.pdf');
    }
    public function go_word()
    {
        $first_payscales = Payscale::where('staff_type_id', 1)->with('staff')->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->with('staff')->get();

        // Create a new PHPWord instance
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);

        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        $table->addRow();
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('အမှတ်စဥ်', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('လစာနှုန်း(ကျပ်)', ['bold' => true], ['align' => 'center']);
        $table->addCell(4000, ['gridSpan' => 4])->addText("၂၀၂၄-၂၀၂၅\n", ['bold' => true], ['align' => 'center']);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('၁၂-၁၁-၂၀၂၄ ရက်နေ့တွင်အမှန်တကယ်ထုတ်ပေးရမည့်လစာငွေ(ကျပ်သန်း)', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('မှတ်ချက်', ['bold' => true], ['align' => 'center']);

        // Second Row
        $table->addRow();
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('ခွင့်ပြု', ['bold' => true], ['align' => 'center']);
        $table->addCell(3000, ['gridSpan' => 3])->addText('ခန့်ပြီး', ['bold' => true], ['align' => 'center']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);

        // Third Row
        $table->addRow();
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(1000)->addText('ကျား', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('မ', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('ပေါင်း', ['bold' => true], ['align' => 'center']);
        $table->addCell(null, ['vMerge' => 'continue']);
        $table->addCell(null, ['vMerge' => 'continue']);

        // Sample Data Row
        $table->addRow();
        $table->addCell(1000)->addText('၁', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('၂', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('၃', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('၄', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('၅', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('၆', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('၇', ['bold' => true], ['align' => 'center']);
        $table->addCell(1000)->addText('၈', ['bold' => true], ['align' => 'center']);

        foreach ($first_payscales as $index => $payscale) {
            $maleStaffCount = $payscale->staff->where('gender_id', 1)->where('current_department_id', 1)->where('is_active', 1)->where('salary_paid_by', 1)->count();
            $femaleStaffCount = $payscale->staff->where('gender_id', 2)->where('current_department_id', 1)->where('is_active', 1)->where('salary_paid_by', 1)->count();
            $totalActiveStaff = $payscale->staff->where('is_active', 1)->where('current_department_id', 1)->count();
            $totalPaidForThisMonth = $payscale->staff->where('is_active', 1)->where('salary_paid_by', 1)->sum(fn($staff) => $staff->paidForThisMonth($this->dateRange));

            $table->addRow();
            $table->addCell()->addText($index + 1);
            $table->addCell()->addText($payscale->name);
            $table->addCell()->addText($payscale->allowed_qty);
            $table->addCell()->addText($maleStaffCount);
            $table->addCell()->addText($femaleStaffCount);
            $table->addCell()->addText($totalActiveStaff);
            $table->addCell()->addText($totalPaidForThisMonth);
            $table->addCell()->addText();
        }

        // Add total row at the end
        $table->addRow();
        $table->addCell()->addText('');
        $table->addCell()->addText('အရာထမ်းစုစုပေါင်း');
        $table->addCell()->addText($first_payscales->sum('allowed_qty'));
        $table->addCell()->addText($first_payscales->sum(fn($p) => $p->staff->where('gender_id', 1)->where('current_department_id', 1)->where('is_active', 1)->where('salary_paid_by', 1)->count()));
        $table->addCell()->addText($first_payscales->sum(fn($p) => $p->staff->where('gender_id', 2)->where('current_department_id', 1)->where('is_active', 1)->where('salary_paid_by', 1)->count()));
        $table->addCell()->addText($first_payscales->sum(fn($p) => $p->staff->where('is_active', 1)->where('current_department_id', 1)->count()));
        $table->addCell()->addText($first_payscales->sum(fn($p) => $p->staff->where('is_active', 1)->where('salary_paid_by', 1)->sum(fn($staff) => $staff->paidForThisMonth($this->dateRange))));
        $table->addCell()->addText();

        foreach ($second_payscales as $payscale) {
            $maleStaffCount = $payscale->staff->where('gender_id', 1)->where('current_department_id', 1)->where('is_active', 1)->where('salary_paid_by', 1)->count();
            $femaleStaffCount = $payscale->staff->where('gender_id', 2)->where('current_department_id', 1)->where('is_active', 1)->where('salary_paid_by', 1)->count();
            $totalActiveStaff = $payscale->staff->where('is_active', 1)->where('current_department_id', 1)->count();
            $totalPaidForThisMonth = $payscale->staff->where('is_active', 1)->where('salary_paid_by', 1)->sum(fn($staff) => $staff->paidForThisMonth($this->dateRange));

            $table->addRow();
            $table->addCell()->addText($index + 1);
            $table->addCell()->addText($payscale->name);
            $table->addCell()->addText($payscale->allowed_qty);
            $table->addCell()->addText($maleStaffCount);
            $table->addCell()->addText($femaleStaffCount);
            $table->addCell()->addText($totalActiveStaff);
            $table->addCell()->addText($totalPaidForThisMonth);
            $table->addCell()->addText();
        }

        // Add total row at the end
        $table->addRow();
        $table->addCell()->addText('');
        $table->addCell()->addText('အမှုထမ်းစုစုပေါင်း');
        $table->addCell()->addText($second_payscales->sum('allowed_qty'));
        $table->addCell()->addText($second_payscales->sum(fn($p) => $p->staff->where('gender_id', 1)->where('current_department_id', 1)->where('is_active', 1)->where('salary_paid_by', 1)->count()));
        $table->addCell()->addText($second_payscales->sum(fn($p) => $p->staff->where('gender_id', 2)->where('current_department_id', 1)->where('is_active', 1)->where('salary_paid_by', 1)->count()));
        $table->addCell()->addText($second_payscales->sum(fn($p) => $p->staff->where('is_active', 1)->where('current_department_id', 1)->count()));
        $table->addCell()->addText($second_payscales->sum(fn($p) => $p->staff->where('is_active', 1)->where('salary_paid_by', 1)->sum(fn($staff) => $staff->paidForThisMonth($this->dateRange))));
        $table->addCell()->addText();

        $table->addRow();
        $table->addCell()->addText('');
        $table->addCell()->addText('စုစုပေါင်း');
        $table->addCell()->addText();
        $table->addCell()->addText();
        $table->addCell()->addText();
        $table->addCell()->addText();
        $table->addCell()->addText();
        $table->addCell()->addText();

        $table->addRow();
        $table->addCell()->addText('');
        $table->addCell()->addText('(၁လအတွက်လစာစရိတ်(ကျပ်သန်း))	');
        $table->addCell()->addText();
        $table->addCell()->addText();
        $table->addCell()->addText();
        $table->addCell()->addText();
        $table->addCell()->addText();
        $table->addCell()->addText();
        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);
        return response()->download($tempFile, 'permanent_staff_report.docx')->deleteFileAfterSend(true);
    }

    public function mount()
    {
        $this->dateRange = Carbon::now()->format('Y-m-d');
    }
    public function render()
    {
        [$year, $month, $day] = explode('-', $this->dateRange);
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;

        $staffs = Staff::get();
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $salaries = Salary::with('staff')->get();
        $allPayScales = Payscale::all();
        $TotalAllowQty = Payscale::sum('allowed_qty');
        $currentStaffTotal = Staff::where('current_department_id', 1)->where('is_active', 1)->count();
        $currentMaleStaffTotal = Staff::where('current_department_id', 1)->where('gender_id', 1)->where('is_active', 1)->count();
        $currentFeMaleStaffTotal = Staff::where('current_department_id', 1)->where('gender_id', 2)->where('is_active', 1)->count();

        $totalStaffFromOthersDept = Staff::where('salary_paid_by', 1)->where('current_department_id', '!=', 1)->count();
        $totalSalaryPaidStaff = Staff::where('salary_paid_by', 1)->count();
        $maximumBudget = 0;
        foreach ($allPayScales as $payscale) {
            $budget = $payscale->min_salary * $payscale->allowed_qty;
            $maximumBudget += $budget;
        }
        return view('livewire.investment-companies.permanent-staff', [
            'staffs' => $staffs,
            'salaries' => $salaries,
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
            'allPayScales' => $allPayScales,
            'TotalAllowQty' => $TotalAllowQty,
            'currentMaleStaffTotal' => $currentMaleStaffTotal,
            'currentFeMaleStaffTotal' => $currentFeMaleStaffTotal,
            'maximumBudget' => $maximumBudget,
        ]);
    }
}
