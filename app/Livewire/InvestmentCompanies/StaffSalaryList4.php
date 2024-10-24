<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffSalaryList4 extends Component
{
    public function go_pdf()
    {
        $high_staffs = Rank::where('staff_type_id', 1)->get();
        $low_staffs = Rank::whereIn('staff_type_id', [2, 3])->get();
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
        $data = [
            'staffs' => $staffs,
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_list_4_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_list_report_pdf_4.pdf');
    }

    public function go_word()
    {
        $high_staffs = Rank::where('staff_type_id', 1)->get();
        $low_staffs = Rank::whereIn('staff_type_id', [2, 3])->get();
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 14], ['alignment' => 'center']);
        $section->addTitle('နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏', 1);
        $section->addTitle('လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့် အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်(၃၁-၅-၂၀၂၄)', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('လစာနှုန်း', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ရာထူးအဆင့်', ['bold' => true]);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အမြဲတမ်းအတွင်းဝန်ချီးမြှင့်ငွေ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အခြားချီးမြှင့်ငွေ/စရိတ်', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ရက္ခာစရိတ်', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('စုစုပေါင်း', ['alignment' => 'center']);

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('ဝန်ထမ်းဦးရေ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ဝန်ထမ်းဦးရေ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ဝန်ထမ်းဦးရေ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ဝန်ထမ်းဦးရေ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)', ['alignment' => 'center']);
        foreach ($high_staffs as $index => $staff) {
          
            $additionEducationCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_education')->isNotEmpty())->count();
            $additionEducationSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_education'));

            $additionCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition')->isNotEmpty())->count();
            $additionSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition'));

            $additionRationCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_ration')->isNotEmpty())->count();
            $additionRationSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_ration'));

            $totalCount = $staff->staffs->filter(fn($staff) => $staff->salaries->filter(fn($salary) => $salary->addition_education !== null || $salary->addition !== null || $salary->addition_ration !== null)->isNotEmpty())->count();

            $totalSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum(fn($salary) => ($salary->addition_education ?? 0) + ($salary->addition ?? 0) + ($salary->addition_ration ?? 0)));

            // Add a new row to the table
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->payscale->name);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText(en2mm($additionEducationCount));
            $table->addCell(2000)->addText(en2mm($additionEducationSum));
            $table->addCell(2000)->addText(en2mm($additionCount));
            $table->addCell(2000)->addText(en2mm($additionSum));
            $table->addCell(2000)->addText(en2mm($additionRationCount));
            $table->addCell(2000)->addText(en2mm($additionRationSum));
            $table->addCell(2000)->addText(en2mm($totalCount));
            $table->addCell(2000)->addText(en2mm($totalSum));
        }

        // Calculate the totals for the "အရာထမ်းပေါင်း" row
        $totalAdditionEducationCount = $high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_education')->isNotEmpty())->count());
        $totalAdditionEducationSum = $high_staffs->sum(fn($staff) => $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_education')));

        $totalAdditionCount = $high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition')->isNotEmpty())->count());
        $totalAdditionSum = $high_staffs->sum(fn($staff) => $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition')));

        $totalAdditionRationCount = $high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_ration')->isNotEmpty())->count());
        $totalAdditionRationSum = $high_staffs->sum(fn($staff) => $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_ration')));

        $grandTotalCount = $high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->salaries->filter(fn($salary) => $salary->addition_education !== null || $salary->addition !== null || $salary->addition_ration !== null)->isNotEmpty())->count());

        $grandTotalSum = $high_staffs->sum(fn($staff) => $staff->staffs->sum(fn($staff) => $staff->salaries->sum(fn($salary) => ($salary->addition_education ?? 0) + ($salary->addition ?? 0) + ($salary->addition_ration ?? 0))));

        // Add the final row for totals
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('အရာထမ်းပေါင်း');
        $table->addCell(2000)->addText('-');
        $table->addCell(2000)->addText(en2mm($totalAdditionEducationCount));
        $table->addCell(2000)->addText(en2mm($totalAdditionEducationSum));
        $table->addCell(2000)->addText(en2mm($totalAdditionCount));
        $table->addCell(2000)->addText(en2mm($totalAdditionSum));
        $table->addCell(2000)->addText(en2mm($totalAdditionRationCount));
        $table->addCell(2000)->addText(en2mm($totalAdditionRationSum));
        $table->addCell(2000)->addText(en2mm($grandTotalCount));
        $table->addCell(2000)->addText(en2mm($grandTotalSum));

        foreach ($low_staffs as $index => $staff) {
            // Calculating counts and sums for each staff member
            $additionEducationCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_education')->isNotEmpty())->count();
            $additionEducationSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_education'));

            $additionCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition')->isNotEmpty())->count();
            $additionSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition'));

            $additionRationCount = $staff->staffs->filter(fn($staff) => $staff->salaries->whereNotNull('addition_ration')->isNotEmpty())->count();
            $additionRationSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum('addition_ration'));

            $totalCount = $staff->staffs->filter(fn($staff) => $staff->salaries->filter(fn($salary) => $salary->addition_education !== null || $salary->addition !== null || $salary->addition_ration !== null)->isNotEmpty())->count();

            $totalSum = $staff->staffs->sum(fn($staff) => $staff->salaries->sum(fn($salary) => ($salary->addition_education ?? 0) + ($salary->addition ?? 0) + ($salary->addition_ration ?? 0)));

            // Adding row to the table
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->payscale->name ?? '-');
            $table->addCell(2000)->addText($staff->name ?? '-');
            $table->addCell(2000)->addText(en2mm($additionEducationCount));
            $table->addCell(2000)->addText(en2mm($additionEducationSum));
            $table->addCell(2000)->addText(en2mm($additionCount));
            $table->addCell(2000)->addText(en2mm($additionSum));
            $table->addCell(2000)->addText(en2mm($additionRationCount));
            $table->addCell(2000)->addText(en2mm($additionRationSum));
            $table->addCell(2000)->addText(en2mm($totalCount));
            $table->addCell(2000)->addText(en2mm($totalSum));
        }

        // Adding the final summary row
        $additionEducationTotalCount = $low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_education')->count() : 0);
        $additionEducationTotalSum = $low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_education') : 0);
        $additionTotalCount = $low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition')->count() : 0);
        $additionTotalSum = $low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition') : 0);
        $additionRationTotalCount = $low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_ration')->count() : 0);
        $additionRationTotalSum = $low_staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_ration') : 0);
        $totalOverallCount = $low_staffs->sum(fn($staff) => $staff->staffs->sum(fn($staff) => $staff->salaries->filter(fn($salary) => $salary->addition_education !== null || $salary->addition !== null || $salary->addition_ration !== null)->count()));
        $totalOverallSum = $low_staffs->sum(fn($staff) => $staff->staffs->sum(fn($staff) => $staff->salaries->sum(fn($salary) => ($salary->addition_education ?? 0) + ($salary->addition ?? 0) + ($salary->addition_ration ?? 0))));

        // Add the final row for the totals
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('အမှုထမ်းပေါင်း');
        $table->addCell(2000)->addText('-');
        $table->addCell(2000)->addText(en2mm($additionEducationTotalCount));
        $table->addCell(2000)->addText(en2mm($additionEducationTotalSum));
        $table->addCell(2000)->addText(en2mm($additionTotalCount));
        $table->addCell(2000)->addText(en2mm($additionTotalSum));
        $table->addCell(2000)->addText(en2mm($additionRationTotalCount));
        $table->addCell(2000)->addText(en2mm($additionRationTotalSum));
        $table->addCell(2000)->addText(en2mm($totalOverallCount));
        $table->addCell(2000)->addText(en2mm($totalOverallSum));

        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText('စုစုပေါင်း');
        $table->addCell(2000)->addText('-');
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_education')->count() : 0)));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_education') : 0)));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition')->count() : 0)));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition') : 0)));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->whereNotNull('addition_ration')->count() : 0)));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->salaries ? $staff->salaries->sum('addition_ration') : 0)));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->sum(fn($staff) => $staff->salaries->filter(fn($salary) => $salary->addition_education !== null || $salary->addition !== null || $salary->addition_ration !== null)->count()))));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->sum(fn($staff) => $staff->salaries->sum(fn($salary) => ($salary->addition_education ?? 0) + ($salary->addition ?? 0) + ($salary->addition_ration ?? 0))))));

        $section->addText();
        $section->addText('လက်မှတ်: -', ['align' => 'center']);
        $section->addText('အမည်: ', ['align' => 'center']);
        $section->addText('ရာထူး: ', ['align' => 'center']);
        $section->addText('ဆက်သွယ်ရန်: ', ['align' => 'center']);
        $section->addText('ဖုန်း: ', ['align' => 'center']);

        $fileName = 'staff_salary.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $high_staffs = Rank::where('staff_type_id', 1)->get();
        $low_staffs = Rank::whereIn('staff_type_id', [2, 3])->get();
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
        return view('livewire.investment-companies.staff-salary-list4', [
            'staffs' => $staffs,
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
        ]);
    }
}
