<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Salary;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffSalary extends Component
{
    public function go_pdf()
    {
        $salaries = Salary::with('staff')->get();
        $TotalAllowQty = Payscale::sum('allowed_qty');
        $currentStaffTotal = Staff::where('current_department_id', 1)->where('is_active', 1)->count();
        $totalStaffToOthersDept = Staff::where('current_department_id', 1)->where('is_active', 1)->whereNotNull('side_department_id')->where('salary_paid_by', '!=', 1)->count();
        $totalStaffFromOthersDept = Staff::where('salary_paid_by', 1)->where('is_active', 1)->where('current_department_id', '!=', 1)->count();
        $totalSalaryPaidStaff = Staff::where('salary_paid_by', 1)->where('is_active', 1)->count();
        $data = [
            'salaries' => $salaries,
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
            'TotalAllowQty' => $TotalAllowQty,
            'currentStaffTotal' => $currentStaffTotal,
            'totalStaffFromOthersDept' => $totalStaffFromOthersDept,
            'totalStaffToOthersDept' => $totalStaffToOthersDept,
            'totalSalaryPaidStaff' => $totalSalaryPaidStaff,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_report_pdf.pdf');
    }
    public function go_word()
    {
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $salaries = Salary::with('staff')->get();
        $TotalAllowQty = Payscale::sum('allowed_qty');
        $currentStaffTotal = Staff::where('current_department_id', 1)->where('is_active', 1)->count();
        $totalStaffToOthersDept = Staff::where('current_department_id', 1)->where('is_active', 1)->whereNotNull('side_department_id')->where('salary_paid_by', '!=', 1)->count();
        $totalStaffFromOthersDept = Staff::where('salary_paid_by', 1)->where('is_active', 1)->where('current_department_id', '!=', 1)->count();
        $totalSalaryPaidStaff = Staff::where('salary_paid_by', 1)->where('is_active', 1)->count();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 14], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏ ၂၀၂၄ ခုနှစ်၊ မေလဝန်ထမ်းအင်အား နှင့် လစာထုတ်ပေးမှုအခြေအနေ', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('လစာနှုန်း', ['bold' => true]);
        $table->addCell(12000, ['gridSpan' => 6, 'valign' => 'center'])->addText('(၃၁-၅-၂၀၂၄ ရက်နေ့ရှိအင်အားစာရင်း)', ['alignment' => 'center']);

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('ဖွဲ့စည်းပုံခွင့်ပြုအင်အား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ခန့်ထားအင်အား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('မိမိဌာနမှ လစာကျခံပြီးအခြားဌာနမှတွဲဖက်အင်အား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('မိမိဌာနမှ လစာကျခံခြင်းမရှိပဲအခြားဌာနသို့တွဲဖက်အင်အား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('လစာထုတ်ပေးအင်အား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('အမှန်တကယ်ထုတ်ပေးခဲ့သည့်လစာ(ကျပ်သန်း)', ['alignment' => 'center']);
        foreach ($first_payscales as $index => $payscale) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($payscale->name);
            $table->addCell(2000)->addText(en2mm($payscale->allowed_qty));
            $table->addCell(2000)->addText(en2mm($payscale->staff->where('is_active', 1)->count()));
            $table->addCell(2000)->addText(en2mm($payscale->staff->where('is_active', 1)->where('side_department_id', 1)->where('salary_paid_by', 1)->count()));
            $table->addCell(2000)->addText(en2mm($payscale->staff->where('is_active', 1)->where('current_department_id', 1)->where('side_department_id', '!=', 1)->where('salary_paid_by', '!=', 1)->count()));
            $table->addCell(2000)->addText(en2mm($payscale->staff->where('is_active', 1)->where('salary_paid_by', 1)->count()));
            $table->addCell(2000)->addText(en2mm($payscale->staff->sum(fn($each) => $each->salaries->last()?->actual_salary)));
        }
        $table->addRow();
        $table->addCell(4000, ['gridSpan' => 2])->addText($first_payscales[0]->staff_type->name);
        $table->addCell(2000)->addText(en2mm($first_payscales->sum('allowed_qty')));
        $table->addCell(2000)->addText(en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('is_active', 1)->where('current_department_id', 1)->count())));
        $table->addCell(2000)->addText(en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('is_active', 1)->where('side_department_id', 1)->where('salary_paid_by', 1)->count())));
        $table->addCell(2000)->addText(en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('is_active', 1)->where('current_department_id', 1)->where('side_department_id', '!=', 1)->where('salary_paid_by', '!=', 1)->count())));
        $table->addCell(2000)->addText(en2mm($first_payscales->sum(fn($scale) => $scale->staff->where('is_active', 1)->where('salary_paid_by', 1)->count())));
        $table->addCell(2000)->addText(en2mm($first_payscales->sum(fn($payscale) => $payscale->staff->where('is_active', 1)->sum(fn($each) => $each->salaries->last()?->actual_salary))));
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);
        foreach ($second_payscales as $index => $payscale) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($payscale->name);
            $table->addCell(2000)->addText(en2mm($payscale->allowed_qty));
            $table->addCell(2000)->addText(en2mm($payscale->staff->where('current_department_id', 1)->where('is_active', 1)->count()));
            $table->addCell(2000)->addText(en2mm($payscale->staff->where('side_department_id', 1)->where('salary_paid_by', 1)->where('is_active', 1)->count()));
            $table->addCell(2000)->addText(en2mm($payscale->staff->where('is_active', 1)->where('current_department_id', 1)->where('side_department_id', '!=', 1)->where('salary_paid_by', '!=', 1)->count()));
            $table->addCell(2000)->addText(en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('salary_paid_by', 1)->count())));
            $table->addCell(2000)->addText(en2mm($payscale->staff->sum(fn($each) => $each->salaries->last()?->actual_salary)));
        }
        $table->addRow();
        $table->addCell(4000, ['gridSpan' => 2])->addText($second_payscales[0]->staff_type->name);
        $table->addCell(2000)->addText(en2mm($second_payscales->sum('allowed_qty')));
        $table->addCell(2000)->addText(en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('current_department_id', 1)->where('is_active', 1)->count())));
        $table->addCell(2000)->addText(en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('side_department_id', 1)->where('salary_paid_by', 1)->where('is_active', 1)->count())));
        $table->addCell(2000)->addText(en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('current_department_id', 1)->where('side_department_id', '!=', 1)->where('is_active', 1)->where('salary_paid_by', '!=', 1)->count())));
        $table->addCell(2000)->addText(en2mm($second_payscales->sum(fn($scale) => $scale->staff->where('salary_paid_by', 1)->count())));
        $table->addCell(2000)->addText(en2mm($second_payscales->sum(fn($payscale) => $payscale->staff->sum(fn($each) => $each->salaries->last()?->actual_salary)) + $first_payscales->sum(fn($payscale) => $payscale->staff->sum(fn($each) => $each->salaries->last()?->actual_salary))));
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        $table->addRow();
        $table->addCell(4000, ['gridSpan' => 1])->addText('စုစုပေါင်း');
        $table->addCell(2000)->addText(en2mm($TotalAllowQty));
        $table->addCell(2000)->addText(en2mm($currentStaffTotal));
        $table->addCell(2000)->addText(en2mm($totalStaffFromOthersDept));
        $table->addCell(2000)->addText(en2mm($totalStaffToOthersDept));
        $table->addCell(2000)->addText(en2mm($totalSalaryPaidStaff));
        $table->addCell(2000)->addText(en2mm($second_payscales->sum(fn($payscale) => $payscale->staff->sum(fn($each) => $each->salaries->last()?->actual_salary)) + $first_payscales->sum(fn($payscale) => $payscale->staff->sum(fn($each) => $each->salaries->last()?->actual_salary))));

        $fileName = 'staff_salary.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $salaries = Salary::with('staff')->get();
        $TotalAllowQty = Payscale::sum('allowed_qty');
        $currentStaffTotal = Staff::where('current_department_id', 1)->where('is_active', 1)->count();
        $totalStaffToOthersDept = Staff::where('current_department_id', 1)->where('is_active', 1)->whereNotNull('side_department_id')->where('salary_paid_by', '!=', 1)->count();
        $totalStaffFromOthersDept = Staff::where('salary_paid_by', 1)->where('is_active', 1)->where('current_department_id', '!=', 1)->count();
        $totalSalaryPaidStaff = Staff::where('salary_paid_by', 1)->where('is_active', 1)->count();
        return view('livewire.investment-companies.staff-salary', [
            'salaries' => $salaries,
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
            'TotalAllowQty' => $TotalAllowQty,
            'currentStaffTotal' => $currentStaffTotal,
            'totalStaffFromOthersDept' => $totalStaffFromOthersDept,
            'totalStaffToOthersDept' => $totalStaffToOthersDept,
            'totalSalaryPaidStaff' => $totalSalaryPaidStaff,
        ]);
    }
}
