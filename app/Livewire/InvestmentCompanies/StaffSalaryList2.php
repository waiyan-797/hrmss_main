<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffSalaryList2 extends Component
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
        $pdf = PDF::loadView('pdf_reports.staff_salary_list_2_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_list_report_pdf_2.pdf');
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
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ဒီပလိုမာ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('Fellowship/Membership', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('မဟာဘွဲ့', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ပါရဂူဘွဲ့', ['alignment' => 'center']);
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
        $table->addCell(2000)->addText('ဝန်ထမ်းဦးရေ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)', ['alignment' => 'center']);

        foreach ($high_staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->payscale->name);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
        }

        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText('အရာထမ်းပေါင်း');
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        foreach ($low_staffs as $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->payscale->name);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count()));
            $table->addCell(2000)->addText(en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))));
        }
        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText('အမှုထမ်းပေါင်း');
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText('စုစုပေါင်း');
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count())));
        $table->addCell(2000)->addText(en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))));

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
        return view('livewire.investment-companies.staff-salary-list2', [
            'staffs' => $staffs,
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
        ]);
    }
}
