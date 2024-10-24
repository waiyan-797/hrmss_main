<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffSalaryList3 extends Component
{
    public function go_pdf()
    {
        $staffs = Staff::get();
        $payscales = Payscale::select('payscales.id', 'payscales.name', 'payscales.similiar_rank', 'payscales.staff_type_id')
            ->selectRaw('SUM(CASE WHEN salaries.addition_education > 0 THEN 1 ELSE 0 END) AS staff_count_addition_education') // a twin won
            ->selectRaw('SUM(CASE WHEN salaries.addition > 0 THEN 1 ELSE 0 END) AS staff_count_addition') // others
            ->selectRaw('SUM(CASE WHEN salaries.addition_ration > 0 THEN 1 ELSE 0 END) AS staff_count_addition_ration') // yeik khar
            ->selectRaw('SUM(salaries.addition_education) AS addition_education')
            ->selectRaw('SUM(salaries.addition) AS addition')
            ->selectRaw('SUM(salaries.addition_ration) AS addition_ration')
            ->leftJoin('ranks', 'ranks.payscale_id', '=', 'payscales.id') // Join ranks to get payscale_id
            ->leftJoin('salaries', 'salaries.rank_id', '=', 'ranks.id') // Join salaries with ranks using rank_id
            ->leftJoin('staff', 'salaries.staff_id', '=', 'staff.id') // Join staff table
            ->groupBy('payscales.id', 'payscales.name') // Group by payscale id and name
            ->get();

        $firstRanks = Rank::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        $data = [
            'staffs' => $staffs,
            'payscales' => $payscales,
            'firstRanks' => $firstRanks,
            'second_payscales' => $second_payscales,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_list_3_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_list_report_pdf_3.pdf');
    }
    public function go_word()
    {
        $payscales = Payscale::select('payscales.id', 'payscales.name', 'payscales.similiar_rank', 'payscales.staff_type_id')
            ->selectRaw('SUM(CASE WHEN salaries.addition_education > 0 THEN 1 ELSE 0 END) AS staff_count_addition_education') // a twin won
            ->selectRaw('SUM(CASE WHEN salaries.addition > 0 THEN 1 ELSE 0 END) AS staff_count_addition') // others
            ->selectRaw('SUM(CASE WHEN salaries.addition_ration > 0 THEN 1 ELSE 0 END) AS staff_count_addition_ration') // yeik khar
            ->selectRaw('SUM(salaries.addition_education) AS addition_education')
            ->selectRaw('SUM(salaries.addition) AS addition')
            ->selectRaw('SUM(salaries.addition_ration) AS addition_ration')
            ->leftJoin('ranks', 'ranks.payscale_id', '=', 'payscales.id') // Join ranks to get payscale_id
            ->leftJoin('salaries', 'salaries.rank_id', '=', 'ranks.id') // Join salaries with ranks using rank_id
            ->leftJoin('staff', 'salaries.staff_id', '=', 'staff.id') // Join staff table
            ->groupBy('payscales.id', 'payscales.name') // Group by payscale id and name
            ->get();

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
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အမြဲတမ်းအတွင်းဝန်ချီးမြှင့်ငွေ');
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အခြားချီးမြှင့်ငွေ/စရိတ်');
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ရက္ခာစရိတ်');
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('စုစုပေါင်း');

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
        foreach ($payscales->where('staff_type_id', 1) as $index => $payscale) {
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1));
            $table->addCell(2000)->addText(en2mm($payscale->name ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->similiar_rank ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->staff_count_addition_education ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->addition_education ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->staff_count_addition ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->addition ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->addition_ration ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->staff_count_addition_education ?? (0 + $payscale->staff_count_addition ?? (0 + $payscale->staff_count_addition_ration ?? 0))));
            $table->addCell(2000)->addText(en2mm($payscale->staff_count_addition_education ?? (0 + $payscale->staff_count_addition ?? (0 + $payscale->staff_count_addition_ration ?? 0))));
            $table->addCell(2000)->addText(en2mm($payscale->addition_education ?? (0 + $payscale->addition ?? (0 + $payscale->addition_ration ?? 0))));
        }
        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText('အရာထမ်းပေါင်း');
        $table->addCell(2000)->addText('-');
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_education)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_education)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_ration)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_ration)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_education) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->staff_count_addition_ration)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_education) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition) + $payscales->where('staff_type_id', 1)->sum(fn($q) => $q->addition_ration)));
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);

        foreach ($payscales->where('staff_type_id', 2) as $index => $payscale) {
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1));
            $table->addCell(2000)->addText(en2mm($payscale->name ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->similiar_rank ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->staff_count_addition_education ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->addition_education ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->staff_count_addition ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->addition ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->staff_count_addition_ration ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->addition_ration ?? 0));
            $table->addCell(2000)->addText(en2mm($payscale->staff_count_addition_education ?? (0 + $payscale->staff_count_addition ?? (0 + $payscale->staff_count_addition_ration ?? 0))));
            $table->addCell(2000)->addText(en2mm($payscale->addition_education ?? (0 + $payscale->addition ?? (0 + $payscale->addition_ration ?? 0))));
        }
        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText('အမှုထမ်းပေါင်း');
        $table->addCell(2000)->addText('-');
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_education)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_education)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_ration)));

        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_ration)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_education) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->staff_count_addition_ration)));
        $table->addCell(2000)->addText(en2mm($payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_education) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition) + $payscales->where('staff_type_id', 2)->sum(fn($q) => $q->addition_ration)));
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 50]);
        $section->addText();
       $section->addText('လက်မှတ်: -', ['align' => 'center']);
       $section->addText('အမည်: ', ['align' => 'center']);
       $section->addText('ရာထူး: ', ['align' => 'center']);
       $section->addText('ဆက်သွယ်ရန်: ', ['align' => 'center']);
       $section->addText('ဖုန်း: ', ['align' => 'center']);
      ;
        $fileName = 'staff_salary.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $payscales = Payscale::select('payscales.id', 'payscales.name', 'payscales.similiar_rank', 'payscales.staff_type_id')
            ->selectRaw('SUM(CASE WHEN salaries.addition_education > 0 THEN 1 ELSE 0 END) AS staff_count_addition_education') // a twin won
            ->selectRaw('SUM(CASE WHEN salaries.addition > 0 THEN 1 ELSE 0 END) AS staff_count_addition') // others
            ->selectRaw('SUM(CASE WHEN salaries.addition_ration > 0 THEN 1 ELSE 0 END) AS staff_count_addition_ration') // yeik khar
            ->selectRaw('SUM(salaries.addition_education) AS addition_education')
            ->selectRaw('SUM(salaries.addition) AS addition')
            ->selectRaw('SUM(salaries.addition_ration) AS addition_ration')
            ->leftJoin('ranks', 'ranks.payscale_id', '=', 'payscales.id') // Join ranks to get payscale_id
            ->leftJoin('salaries', 'salaries.rank_id', '=', 'ranks.id') // Join salaries with ranks using rank_id
            ->leftJoin('staff', 'salaries.staff_id', '=', 'staff.id') // Join staff table
            ->groupBy('payscales.id', 'payscales.name') // Group by payscale id and name
            ->get();

        $firstRanks = Rank::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();

        $staffs = Staff::get();
        return view('livewire.investment-companies.staff-salary-list3', [
            'staffs' => $staffs,
            'payscales' => $payscales,
            'firstRanks' => $firstRanks,
            'second_payscales' => $second_payscales,
        ]);
    }
}
