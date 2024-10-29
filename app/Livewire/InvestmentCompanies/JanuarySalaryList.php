<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Leave;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class JanuarySalaryList extends Component
{
    public function go_pdf(){
        $staffs = Staff::whereIn('current_rank_id', [8, 9, 10, 11, 12, 13, 14, 16, 19])->get();
        $leaves = Leave::get();
        $data = [
            'staffs' => $staffs,
            'leaves' => $leaves,
        ];
        $pdf = PDF::loadView('pdf_reports.january_salary_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'january_salary_list_report_pdf.pdf');
    }
    public function go_word()
    {
        
        $staffs = Staff::whereIn('current_rank_id', [8, 9, 10, 11, 12, 13, 14, 16, 19])->get();
        $leaves = Leave::get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 14], ['alignment' => 'center']);
        $section->addTitle('၂၀၂၄ ခုနှစ်၊ဇန်နဝါရီ လ အတွက် ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာနမှဒုတိယဦးစီးမှူး၊ဌာနခွဲစာရေး နှင့် စာရင်းကိုင်(၁/၂/၃)၊အကြီးတန်းစာရေး,ယာဉ်မောင်း(၄),', 1);
        $section->addTitle('အငယ်တန်းစာရေးနှင့်ယာဉ်မောင်း(၅)များ၏လစာစာရင်း', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ဌာနစုနှင့် အမှုထမ်းအမည်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ရာထူးအမည်', ['bold' => true]);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အလုပ်ခွင်ကာလအတွက်တောင်းခံသောလစာ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ခွင့်ကာလအတွက်တောင်းခံသောလစာ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ဖြည့်စွက်စရိတ်', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('၀၃.အောက်ရှိစရိတ်များ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ပုံသေခရီးစရိတ်နှင့်လစဥ်စရိတ်', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အပိုထောက်ပံ့ငွေ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('စုစုပေါင်းတောင်းခံငွေ', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ဖြတ်တောက်ငွေဇယားအရစုစုပေါင်း', ['alignment' => 'center']);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('အသားတင်ပေးရန်ငွေ', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('မှတ်ချက်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('တောင်းခံရရှိကြောင်း ဝန်ခံချက်', ['bold' => true]);


        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ကျပ်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ပြား', ['alignment' => 'center']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);

        $total_work_salary_kyat = 0;
        $total_work_salary_pyar = 0;

        $total_leave_salary_kyat = 0;
        $total_leave_salary_pyar = 0;

        $total_addition_kyat = 0;
        $total_addition_pyar = 0;

        $total_addition_ration_kyat = 0;
        $total_addition_ration_pyar = 0;

        $total_addition_education_kyat = 0;
        $total_addition_education_pyar = 0;

        $total_sum_kyat = 0;
        $total_sum_pyar = 0;

        $total_sum_deduction_kyat = 0;
        $total_sum_deduction_pyar = 0;

        $total_left_kyat = 0;
        $total_left_pyar = 0;
    
   
    foreach ($staffs as $staff) {
        $current_salary_record = $staff->salaries->where('rank_id', $staff->current_rank_id)->first();
        $current_salary = $current_salary_record ? $current_salary_record->actual_salary : 0;
        $per_day_salary = $current_salary / 31;

        $staff_leave_records = $leaves->where('staff_id', $staff->id);
        $january_start = \Carbon\Carbon::createFromDate(date('Y'), 1, 1);
        $january_end = \Carbon\Carbon::createFromDate(date('Y'), 1, 31);
        $staff_leave_days = 0;
        foreach ($staff_leave_records as $leave) {
            $from_date = \Carbon\Carbon::parse($leave->from_date);
            $to_date = \Carbon\Carbon::parse($leave->to_date);
            $leave_start = $from_date->greaterThan($january_start) ? $from_date : $january_start;
            $leave_end = $to_date->lessThan($january_end) ? $to_date : $january_end;
            if ($leave_start->lessThanOrEqualTo($leave_end)) {
                $staff_leave_days += $leave_start->diffInDays($leave_end) + 1;
            }
        }

        //work salary
        $work_salary = $per_day_salary * (31 - $staff_leave_days);
        $work_salary_kyat = floor($work_salary);
        $work_salary_pyar = round(($work_salary - $work_salary_kyat) * 100);

        $total_work_salary_kyat += $work_salary_kyat;
        $total_work_salary_pyar += $work_salary_pyar;

        //leave salary
        $leave_salary = $per_day_salary * $staff_leave_days;
        $leave_salary_kyat = floor($leave_salary);
        $leave_salary_pyar = round(($leave_salary - $leave_salary_kyat) * 100);

        $total_leave_salary_kyat += $leave_salary_kyat;
        $total_leave_salary_pyar += $leave_salary_pyar;

        //addition
        $addition = $current_salary_record ? $current_salary_record->addition : 0;
        $addition_kyat = floor($addition);
        $addition_pyar = round(($addition - $addition_kyat) * 100);

        $total_addition_kyat += $addition_kyat;
        $total_addition_pyar += $addition_pyar;

        //addition_ration
        $addition_ration = $current_salary_record ? $current_salary_record->addition_ration : 0;
        $addition_ration_kyat = floor($addition_ration);
        $addition_ration_pyar = round(($addition_ration - $addition_ration_kyat) * 100);

        $total_addition_ration_kyat += $addition_ration_kyat;
        $total_addition_ration_pyar += $addition_ration_pyar;

        //addition_education
        $addition_education = $current_salary_record ? $current_salary_record->addition_education : 0;
        $addition_education_kyat = floor($addition_education);
        $addition_education_pyar = round(($addition_education - $addition_education_kyat) * 100);

        $total_addition_education_kyat += $addition_education_kyat;
        $total_addition_education_pyar += $addition_education_pyar;

        //total
        $total_kyat = $work_salary_kyat + $leave_salary_kyat + $addition_kyat + $addition_ration_kyat + $addition_education_kyat;
        $total_pyar = $work_salary_pyar + $leave_salary_pyar + $addition_pyar + $addition_ration_pyar + $addition_education_pyar;

        $total_sum_kyat += $total_kyat;
        $total_sum_pyar += $total_pyar;

        //total_deduction
        $total_deduction = ($current_salary_record ? $current_salary_record->deduction : 0) + ($current_salary_record ? $current_salary_record->deduction_insurance : 0) + ($current_salary_record ? $current_salary_record->deduction_tax : 0);
        $total_deduction_kyat = floor($total_deduction);
        $total_deduction_pyar = round(($total_deduction - $total_deduction_kyat) * 100);

        $total_sum_deduction_kyat += $total_deduction_kyat;
        $total_sum_deduction_pyar += $total_deduction_pyar;

        //left
        $left_kyat = $total_kyat - $total_deduction_kyat;
        $left_pyar = $total_pyar - $total_deduction_pyar;

        $total_left_kyat += $left_kyat;
        $total_left_pyar += $left_pyar;
        $table->addRow();
        $table->addCell(2000)->addText($staff->name); // Add staff name
        $table->addCell(2000)->addText($staff->currentRank->name); // Add staff rank
        $table->addCell(2000)->addText(en2mm($work_salary_kyat));
        $table->addCell(2000)->addText(en2mm($work_salary_pyar));
        $table->addCell(2000)->addText(en2mm($leave_salary_kyat));
        $table->addCell(2000)->addText(en2mm($leave_salary_pyar));
        $table->addCell(2000)->addText(en2mm($addition_kyat));
        $table->addCell(2000)->addText(en2mm($addition_pyar));
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText(en2mm($addition_ration_kyat));
        $table->addCell(2000)->addText(en2mm($addition_ration_pyar));
        $table->addCell(2000)->addText(en2mm($addition_education_kyat));
        $table->addCell(2000)->addText(en2mm($addition_education_pyar));
        $table->addCell(2000)->addText(en2mm($total_kyat));
        $table->addCell(2000)->addText(en2mm($total_pyar));
        $table->addCell(2000)->addText(en2mm($total_deduction_kyat));
        $table->addCell(2000)->addText(en2mm($total_deduction_pyar));
        $table->addCell(2000)->addText(en2mm($left_kyat));
        $table->addCell(2000)->addText(en2mm($left_pyar));
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        
    }
    $table->addRow();
        $table->addCell(2000)->addText('စုစုပေါင်း'.en2mm($staffs->count())); 
        $table->addCell(2000)->addText(); 
        $table->addCell(2000)->addText(en2mm($total_work_salary_kyat));
        $table->addCell(2000)->addText(en2mm($total_work_salary_pyar));
        $table->addCell(2000)->addText(en2mm($total_leave_salary_kyat));
        $table->addCell(2000)->addText(en2mm($total_leave_salary_pyar));
        $table->addCell(2000)->addText(en2mm($total_addition_kyat));
        $table->addCell(2000)->addText(en2mm($total_addition_pyar));
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText(en2mm($total_addition_ration_kyat));
        $table->addCell(2000)->addText(en2mm($total_addition_ration_pyar));
        $table->addCell(2000)->addText(en2mm($total_addition_education_kyat));
        $table->addCell(2000)->addText(en2mm($total_addition_education_pyar));
        $table->addCell(2000)->addText(en2mm($total_sum_kyat));
        $table->addCell(2000)->addText(en2mm($total_sum_pyar));
        $table->addCell(2000)->addText(en2mm($total_sum_deduction_kyat));
        $table->addCell(2000)->addText(en2mm($total_sum_deduction_pyar));
        $table->addCell(2000)->addText(en2mm($total_left_kyat) );
        $table->addCell(2000)->addText(en2mm($total_left_pyar));
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText();
        $fileName = 'january_salary_list.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function render()
     {
        $staffs = Staff::whereIn('current_rank_id', [8, 9, 10, 11, 12, 13, 14, 16, 19])->get();
        $leaves = Leave::get();
        return view('livewire.investment-companies.january-salary-list',[
        'staffs' => $staffs,
        'leaves' => $leaves,
    ]);
     }
}
