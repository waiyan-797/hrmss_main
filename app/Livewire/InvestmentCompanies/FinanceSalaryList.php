<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Salary;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class FinanceSalaryList extends Component
{
    public $startYr;
    public $endYr;

    public function mount()
    {
        $this->startYr = 2023;
        $this->endYr = now()->year;
    }

    public function go_pdf()
    {
        $staffs = Staff::get();
        $salaries = Salary::query();

        $data = [
            'staffs' => $staffs,
            'salaries' => $salaries,
            'startYr' => $this->startYr,
            'endYr' => $this->endYr,


        ];
        $pdf = PDF::loadView('pdf_reports.finance_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'finance_salary_list_report_pdf.pdf');
    }


public function go_word()
{

    $staffs = Staff::get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);

    // Add Title
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 14], ['alignment' => 'center']);
    $section->addTitle('၂၀၂၄-၂၀၂၅ဘဏ္ဍာရေးနှစ်အတွက် လစာငွေထုတ်ယူမည့် စာရင်း', 1);

    // Add table headers
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
    $table->addRow();
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('လအမည်', ['bold' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('လက်ရှိလစာနှုန်း', ['bold' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('ထောက်ပံ့ကြေး', ['bold' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('အသက်အာမခံဖြတ်တောက်ငွေ', ['bold' => true]);
    $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ခွင့်');
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('ဝင်‌ငွေခွန်ဖြတ်တောက်ငွေ', ['bold' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('၂လစာချေးငွေ', ['bold' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('အသားတင် လစာ', ['bold' => true]);
    $table->addCell(2000, ['vMerge' => 'restart'])->addText('မှတ်ချက်', ['bold' => true]);
    $count = 0;
    foreach ([$this->startYr, $this->endYr] as $yearIndex => $year) {
        foreach (financeYear()[$yearIndex] as $month) {
            $table->addRow();
            $table->addCell(2000, ['vMerge' => 'continue'])->addText(en2mm(++$count));
            $table->addCell(2000, ['vMerge' => 'continue'])->addText(en2mm($month) . '/' . en2mm($year));
            $table->addCell(2000, ['vMerge' => 'continue'])->addText(en2mm(_getSalary($month, $year)));
            $table->addCell(2000, ['vMerge' => 'continue'])->addText(en2mm(getAddition($month, $year)));
            $table->addCell(2000, ['vMerge' => 'continue'])->addText(en2mm(getDeductionInsurance($month, $year)));
            $table->addCell(2000)->addText(en2mm(getLeveTypeone($month, $year)), ['alignment' => 'center']);
            $table->addCell(2000)->addText(en2mm(getLeveTypeTwo($month, $year)), ['alignment' => 'center']);
            $table->addCell(2000, ['vMerge' => 'continue'])->addText(en2mm(getDeductionTax($month, $year)));
            $table->addCell(2000, ['vMerge' => 'continue'])->addText(en2mm(get2monthDeduction($month, $year)));
            $table->addCell(2000, ['vMerge' => 'continue'])->addText(en2mm(getNetActualSalary($month, $year)));
            $table->addCell(2000, ['vMerge' => 'continue']);
        }
    }
    $fileName = 'finance_salary_list.docx';
    $filePath = storage_path('app/' . $fileName);
    $phpWord->save($filePath);
    return response()->download($filePath)->deleteFileAfterSend(true);
}
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.investment-companies.finance-salary-list', [
            'staffs' => $staffs,
        ]);
    }
}
