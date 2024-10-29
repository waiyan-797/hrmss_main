<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Payscale;
use App\Models\Rank;
use App\Models\Salary;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffSalaryList extends Component
{

     public function go_pdf()
    {
        $salaries = Salary::with('staff', 'rank')->get();
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->get();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 2))->get();
        

        $data = [
            'salaries' => $salaries,
            'first_payscales' => Payscale::where('staff_type_id', 1)->get(),
            'second_payscales' => Payscale::where('staff_type_id', 2)->get(),
            'staffs'=>$staffs,
            'high_staffs'=>$high_staffs,
            'low_staffs'=>$low_staffs,
           
        ];
        $pdf = PDF::loadView('pdf_reports.staff_salary_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_salary_list_report_pdf.pdf');
    }
    public function go_word()
    {
        $salaries = Salary::with('staff', 'rank')->get();
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
        $salaries = Salary::with('staff', 'rank')->get();
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
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
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ဦးရေ');
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('လစာ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ဘွဲ့အလိုက်ချီးမြှင့်ငွေ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အခြားချီးမြှင့်ငွေ/စရိတ်များ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ဒေသစရိတ်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('လစာနှင့်စရိတ်ပေါင်း', ['bold' => true]);
        
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('ခွင့်ပြု', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ခန့်ပြီး', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);

        $totalActualSalaryFirst = 0;
        $totalAdditionEducationFirst = 0;
        $totalAdditionFirst = 0;
        $totalAdditionRationFirst = 0;
        $totalOverallFirst = 0;
        
        foreach ($first_payscales as $index=> $payscale) {
            $totalActualSalary = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('actual_salary'),);
                        $totalAdditionEducation = $payscale->staff->sum(
                            fn($staff) => $staff->salaries->sum('addition_education'),
                        );
                        $totalAddition = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition'));
                        $totalAdditionRation = $payscale->staff->sum(
                            fn($staff) => $staff->salaries->sum('addition_ration'),
                        );
                        $totalPayscale =
                            $totalActualSalary + $totalAdditionEducation + $totalAddition + $totalAdditionRation;
            
                        $totalActualSalaryFirst += $totalActualSalary;
                        $totalAdditionEducationFirst += $totalAdditionEducation;
                        $totalAdditionFirst += $totalAddition;
                        $totalAdditionRationFirst += $totalAdditionRation;
                        $totalOverallFirst += $totalPayscale;
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1));
            $table->addCell(2000)->addText(en2mm($payscale->name ?? 0));
            $table->addCell(2000)->addText($payscale->ranks[0]->name);
            $table->addCell(2000)->addText(en2mm($payscale->allowed_qty));
            $table->addCell(2000)->addText(en2mm($payscale->staff->count()));
            $table->addCell(2000)->addText(en2mm($totalActualSalary) );
            $table->addCell(2000)->addText( en2mm($totalAdditionEducation));
            $table->addCell(2000)->addText(en2mm($totalAddition));
            $table->addCell(2000)->addText(en2mm($totalAdditionRation));
            $table->addCell(2000)->addText(en2mm($totalPayscale));
        }
   


        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText($first_payscales[0]->staff_type->name.'စုစုပေါင်း');
        $table->addCell(2000)->addText('-');
        $table->addCell(2000)->addText(en2mm($first_payscales->sum('allowed_qty')));
        $table->addCell(2000)->addText(en2mm($first_payscales->sum(fn($scale) => $scale->staff->count())));
        $table->addCell(2000)->addText(en2mm($totalActualSalaryFirst));
        $table->addCell(2000)->addText(en2mm($totalAdditionEducationFirst));
        $table->addCell(2000)->addText(en2mm($totalAdditionFirst));
        $table->addCell(2000)->addText(en2mm($totalAdditionRationFirst));
        $table->addCell(2000)->addText(en2mm($totalOverallFirst));


        $totalActualSalarySecond = 0;
        $totalAdditionEducationSecond = 0;
        $totalAdditionSecond = 0;
        $totalAdditionRationSecond = 0;
        $totalOverallSecond = 0;
        
        foreach ($second_payscales as $index=> $payscale) {
            $totalActualSalary = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('actual_salary'),);
                        $totalAdditionEducation = $payscale->staff->sum(
                            fn($staff) => $staff->salaries->sum('addition_education'),
                        );
                        $totalAddition = $payscale->staff->sum(fn($staff) => $staff->salaries->sum('addition'));
                        $totalAdditionRation = $payscale->staff->sum(
                            fn($staff) => $staff->salaries->sum('addition_ration'),
                        );
                        $totalPayscale =
                            $totalActualSalary + $totalAdditionEducation + $totalAddition + $totalAdditionRation;
            
                        $totalActualSalarySecond += $totalActualSalary;
                        $totalAdditionEducationSecond += $totalAdditionEducation;
                        $totalAdditionSecond += $totalAddition;
                        $totalAdditionRationSecond += $totalAdditionRation;
                        $totalOverallSecond += $totalPayscale;
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1));
            $table->addCell(2000)->addText(en2mm($payscale->name ?? 0));
            $table->addCell(2000)->addText($payscale->ranks[0]->name);
            $table->addCell(2000)->addText(en2mm($payscale->allowed_qty));
            $table->addCell(2000)->addText(en2mm($payscale->staff->count()));
            $table->addCell(2000)->addText(en2mm($totalActualSalary) );
            $table->addCell(2000)->addText( en2mm($totalAdditionEducation));
            $table->addCell(2000)->addText(en2mm($totalAddition));
            $table->addCell(2000)->addText(en2mm($totalAdditionRation));
            $table->addCell(2000)->addText(en2mm($totalPayscale));
        }
   


        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText($second_payscales[0]->staff_type->name.'စုစုပေါင်း');
        $table->addCell(2000)->addText('-');
        $table->addCell(2000)->addText(en2mm($second_payscales->sum('allowed_qty')));
        $table->addCell(2000)->addText(en2mm($second_payscales->sum(fn($scale) => $scale->staff->count())));
        $table->addCell(2000)->addText(en2mm($totalActualSalarySecond));
        $table->addCell(2000)->addText(en2mm($totalAdditionEducationSecond));
        $table->addCell(2000)->addText(en2mm($totalAdditionSecond));
        $table->addCell(2000)->addText(en2mm($totalAdditionRationSecond));
        $table->addCell(2000)->addText(en2mm($totalOverallSecond));

        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText('စုစုပေါင်း');
        $table->addCell(2000)->addText('-');
        $table->addCell(2000)->addText(en2mm($second_payscales->sum('allowed_qty')+$first_payscales->sum('allowed_qty')));
        $table->addCell(2000)->addText(en2mm($second_payscales->sum(fn($scale) => $scale->staff->count())+$first_payscales->sum(fn($scale) => $scale->staff->count())));
        $table->addCell(2000)->addText(en2mm($totalActualSalarySecond+$totalActualSalaryFirst));
        $table->addCell(2000)->addText(en2mm($totalAdditionEducationSecond+$totalAdditionEducationFirst));
        $table->addCell(2000)->addText(en2mm($totalAdditionSecond+$totalAdditionFirst));
        $table->addCell(2000)->addText(en2mm($totalAdditionRationSecond+$totalAdditionRationFirst));
        $table->addCell(2000)->addText(en2mm($totalOverallSecond+$totalOverallFirst));

        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText('ထောက်ပံ့ကြေး');
        $table->addCell(2000)->addText('-');
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $fileName = 'staff_salary_list.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function render()
    {
        $salaries = Salary::with('staff', 'rank')->get();
        $first_payscales = Payscale::where('staff_type_id', 1)->get();
        $second_payscales = Payscale::where('staff_type_id', 2)->get();
        return view('livewire.investment-companies.staff-salary-list', [
            'salaries'=>$salaries,
            'first_payscales' => $first_payscales,
            'second_payscales' => $second_payscales,
        ]);
    }
 

}
