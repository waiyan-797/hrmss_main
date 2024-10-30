<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Salary;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class FinanceSalaryList extends Component
{
    public $startYr, $endYr;

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
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);

        // Add title
        $section->addText(
            en2mm($this->startYr) . ' - ' . en2mm($this->endYr) . ' ဘဏ္ဍာရေးနှစ်အတွက် လစာငွေထုတ်ယူမည့် စာရင်း',
            ['bold' => true, 'size' => 16],
            ['alignment' => 'center']
        );

        // Table setup
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        // Table headers
        $table->addRow();
        $table->addCell(1000)->addText('စဥ်', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('လအမည်', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('လက်ရှိလစာနှုန်း', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('ထောက်ပံ့ကြေး', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('အသက်အာမခံဖြတ်တောက်ငွေ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(1500)->addText('လုပ်သက်ခွင့်', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(1500)->addText('လစာမဲ့ခွင့်', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('ဝင်‌ငွေခွန်ဖြတ်တောက်ငွေ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('၂လစာချေးငွေ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('အသားတင်လစာ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true], ['alignment' => 'center']);

        // Loop through years and months to populate data
        $count = 0;

        foreach ([$this->startYr, $this->endYr] as $key => $year) {
            foreach (financeYear()[$key] as $month) {


                $count++;
                $table->addRow();
                $table->addCell(1000)->addText(en2mm($count));
                $table->addCell(2000)->addText(en2mm($month) . '/' . en2mm($year));
                $table->addCell(2000)->addText(getSalary($month, $year));
                $table->addCell(2000)->addText(getAddition($month, $year));
                $table->addCell(2000)->addText(getDeductionInsurance($month, $year));
                $table->addCell(1500)->addText(getLeveTypeOne($month, $year));
                $table->addCell(1500)->addText(getLeveTypeTwo($month, $year));
                $table->addCell(2000)->addText(getDeductionTax($month, $year));
                $table->addCell(2000)->addText(get2MonthDeduction($month, $year));
                $table->addCell(2000)->addText(getNetActualSalary($month, $year));
                $table->addCell(2000)->addText('');
            }
        }

        // Save the document
        $fileName = 'finance_report_' . now()->format('Y-m-d') . '.docx';
        $filePath = storage_path('app/public/' . $fileName);
        $phpWord->save($filePath, 'Word2007');

        return response()->download($filePath);
    }

    public function mount()
    {
        $this->endYr   = Carbon::now()->year;
    }

    public function render()
    {
        $this->startYr = $this->endYr - 1;
        $staffs = Staff::get();
        $salaries = Salary::query();
        return view('livewire.investment-companies.finance-salary-list', [
            'staffs' => $staffs,
            'salaries' => $salaries
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.investment-companies.finance-salary-list');
    // }
}
