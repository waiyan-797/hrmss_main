<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\Rank;
use App\Models\Salary;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class YangonStaffAprilSalaryList extends Component
{
    public function go_pdf()
    {
        $salaries = Salary::with('staff', 'rank')->get(); 
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
        $leaves = Leave::where('leave_type_id', 5)->get();
        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->get();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 2))->get();
        $data = [
            'staffs' => $staffs,
            'salaries' => $salaries,
            'leaves' => $leaves, 
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
        ];

        $pdf = PDF::loadView('pdf_reports.yangon_staff_april_salary_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'yangon_staff_april_salary_list_report_pdf.pdf');
    }  

    public function go_word()
{
    $salaries = Salary::with('staff', 'rank')->get(); 
    $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
    $leaves = Leave::where('leave_type_id', 5)->get();
    $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->get();
    $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 2))->get();
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
    
    $tableStyle = [
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 50,
    ];
    $firstRowStyle = ['bgColor' => 'f2f2f2'];
    
    $phpWord->addTableStyle('TrainingTable', $tableStyle, $firstRowStyle);
    $table = $section->addTable('TrainingTable');
    
   
    $table->addRow();
    $table->addCell(1000)->addText('စဥ်');
    $table->addCell(2000)->addText('အမည်');
    $table->addCell(2000)->addText('ရာထူး');
    $table->addCell(2000)->addText('မူရင်းလစာ');
    $table->addCell(2000)->addText('နှစ်တိုး');
    $table->addCell(2000)->addText('လစာပေးငွေ');
    $table->addCell(2000)->addText('ခွင့်လစာတောက်ဖြတ်ငွေ');
    $table->addCell(2000)->addText('လစာပေးငွေ');
    $table->addCell(2000)->addText('ဝင်ငွေခွန်');
    $table->addCell(2000)->addText('အသက်အာမခံကြေး');
    $table->addCell(2000)->addText('၂လစာချေးငွေဖြတ်တောက်ခြင်း');
    $table->addCell(2000)->addText('လစာ‌ပေးငွေ');
    $table->addCell(2000)->addText('အပိုထောက်ပံ့ငွေ');
    $table->addCell(2000)->addText('ထောက်ပံ့ငွေ+လစာ');
    $table->addCell(2000)->addText('လက်မှတ်');
    $table->addCell(2000)->addText('မှတ်ချက်');
    $totalBaseSalaryHigh = 0;
    $totalIncrementHigh = 0;
    $totalDeductionHigh = 0;
    $totalFinalSalaryHigh = 0;
    $deductionTaxHigh = 0;
    $deductionInsuranceHigh = 0;
    $deductionHigh = 0;
    $totalSalaryHigh = 0;
    $additionHigh = 0;
    $totalSalaryAdditionHigh = 0;

    
    foreach ($high_staffs as $index => $staff) {
        $baseSalary = $staff->currentRank->payscale->min_salary;
        $increment = $staff->currentRank->payscale->increment * $staff->current_increment_time;
        $currentSalary = $baseSalary + $increment;
        $totalBaseSalaryHigh += $baseSalary;
        $totalIncrementHigh += $increment;

        // Calculate leave deductions
        $leaveDeduction = 0;
        $dateDifference = 0;
        foreach ($staff->leaves as $leave) {
            if ($leave->leave_type_id === 5) {
                $fromDate = \Carbon\Carbon::parse($leave->from_date);
                $toDate = \Carbon\Carbon::parse($leave->to_date);
                $dateDifference = $fromDate->diffInDays($toDate) + 1;
                $leaveDeduction += ($staff->current_salary / 30) * $dateDifference;
            }
        }
        $totalDeductionHigh += $leaveDeduction;
        $netSalary = $currentSalary - $leaveDeduction;
        $staffSalaries = $salaries->where('staff_id', $staff->id);
        $deductionTax = $staffSalaries->sum('deduction_tax');
        $deductionInsurance = $staffSalaries->sum('deduction_insurance');
        $deductionOther = $staffSalaries->sum('deduction');
        $addition = $staffSalaries->sum('addition');

        // Update totals
        $deductionTaxHigh += $deductionTax;
        $deductionInsuranceHigh += $deductionInsurance;
        $deductionHigh += $deductionOther;
        $additionHigh += $addition;

        // Final salary calculations
        $finalSalary = $netSalary - $deductionTax - $deductionInsurance - $deductionOther;
        $totalWithAddition = $finalSalary + $addition;
        $totalFinalSalaryHigh += $netSalary;
        $totalSalaryHigh += $finalSalary;
        $totalSalaryAdditionHigh += $totalWithAddition;

        // Add row for each staff
        $table->addRow();
        $table->addCell(1000)->addText($index + 1);
        $table->addCell(2000)->addText($staff->name);
        $table->addCell(2000)->addText($staff->currentRank->name ?? '');
        $table->addCell(2000)->addText(en2mm($baseSalary));
        $table->addCell(2000)->addText(en2mm($increment));
        $table->addCell(2000)->addText(en2mm($currentSalary));
        $table->addCell(2000)->addText(en2mm($leaveDeduction));
        $table->addCell(2000)->addText(en2mm($netSalary));
        $table->addCell(2000)->addText(en2mm($deductionTax));
        $table->addCell(2000)->addText(en2mm($deductionInsurance));
        $table->addCell(2000)->addText(en2mm($deductionOther));
        $table->addCell(2000)->addText(en2mm($finalSalary));
        $table->addCell(2000)->addText(en2mm($addition));
        $table->addCell(2000)->addText(en2mm($totalWithAddition));
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('');
    }

    // Add the totals row
    $table->addRow();
    $table->addCell(1000)->addText('');
    $table->addCell(2000)->addText('အရာထမ်းစုစုပေါင်း');
    $table->addCell(2000)->addText(en2mm($high_staffs->count()));
    $table->addCell(2000)->addText(en2mm($totalBaseSalaryHigh));
    $table->addCell(2000)->addText(en2mm($totalIncrementHigh));
    $table->addCell(2000)->addText(en2mm($totalBaseSalaryHigh + $totalIncrementHigh));
    $table->addCell(2000)->addText(en2mm($totalDeductionHigh));
    $table->addCell(2000)->addText(en2mm($totalFinalSalaryHigh));
    $table->addCell(2000)->addText(en2mm($deductionTaxHigh));
    $table->addCell(2000)->addText(en2mm($deductionInsuranceHigh));
    $table->addCell(2000)->addText(en2mm($deductionHigh));
    $table->addCell(2000)->addText(en2mm($totalSalaryHigh));
    $table->addCell(2000)->addText(en2mm($additionHigh));
    $table->addCell(2000)->addText(en2mm($totalSalaryAdditionHigh));
    $table->addCell(2000)->addText('');
    $table->addCell(2000)->addText('');

    $totalBaseSalaryLow = 0;
    $totalIncrementLow = 0;
    $totalDeductionLow = 0;
    $totalFinalSalaryLow = 0;
    $deductionTaxLow = 0;
    $deductionInsuranceLow = 0;
    $deductionLow = 0;
    $totalSalaryLow = 0;
    $additionLow = 0;
    $totalSalaryAdditionLow = 0;

    
    foreach ($low_staffs as $index => $staff) {
        $baseSalary = $staff->currentRank->payscale->min_salary;
        $increment = $staff->currentRank->payscale->increment * $staff->current_increment_time;
        $currentSalary = $baseSalary + $increment;
        $totalBaseSalaryLow += $baseSalary;
        $totalIncrementLow += $increment;

        // Calculate leave deductions
        $leaveDeduction = 0;
        $dateDifference = 0;
        foreach ($staff->leaves as $leave) {
            if ($leave->leave_type_id === 5) {
                $fromDate = \Carbon\Carbon::parse($leave->from_date);
                $toDate = \Carbon\Carbon::parse($leave->to_date);
                $dateDifference = $fromDate->diffInDays($toDate) + 1;
                $leaveDeduction += ($staff->current_salary / 30) * $dateDifference;
            }
        }
        $totalDeductionLow += $leaveDeduction;
        $netSalary = $currentSalary - $leaveDeduction;
        $staffSalaries = $salaries->where('staff_id', $staff->id);
        $deductionTax = $staffSalaries->sum('deduction_tax');
        $deductionInsurance = $staffSalaries->sum('deduction_insurance');
        $deductionOther = $staffSalaries->sum('deduction');
        $addition = $staffSalaries->sum('addition');

        // Update totals
        $deductionTaxLow += $deductionTax;
        $deductionInsuranceLow += $deductionInsurance;
        $deductionLow += $deductionOther;
        $additionLow += $addition;

        // Final salary calculations
        $finalSalary = $netSalary - $deductionTax - $deductionInsurance - $deductionOther;
        $totalWithAddition = $finalSalary + $addition;
        $totalFinalSalaryLow += $netSalary;
        $totalSalaryLow += $finalSalary;
        $totalSalaryAdditionLow += $totalWithAddition;

        // Add row for each staff
        $table->addRow();
        $table->addCell(1000)->addText($index + 1);
        $table->addCell(2000)->addText($staff->name);
        $table->addCell(2000)->addText($staff->currentRank->name ?? '');
        $table->addCell(2000)->addText(en2mm($baseSalary));
        $table->addCell(2000)->addText(en2mm($increment));
        $table->addCell(2000)->addText(en2mm($currentSalary));
        $table->addCell(2000)->addText(en2mm($leaveDeduction));
        $table->addCell(2000)->addText(en2mm($netSalary));
        $table->addCell(2000)->addText(en2mm($deductionTax));
        $table->addCell(2000)->addText(en2mm($deductionInsurance));
        $table->addCell(2000)->addText(en2mm($deductionOther));
        $table->addCell(2000)->addText(en2mm($finalSalary));
        $table->addCell(2000)->addText(en2mm($addition));
        $table->addCell(2000)->addText(en2mm($totalWithAddition));
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('');
    }

    // Add the totals row
    $table->addRow();
    $table->addCell(1000)->addText('');
    $table->addCell(2000)->addText('အမှုထမ်းစုစုပေါင်း');
    $table->addCell(2000)->addText(en2mm($low_staffs->count()));
    $table->addCell(2000)->addText(en2mm($totalBaseSalaryLow));
    $table->addCell(2000)->addText(en2mm($totalIncrementLow));
    $table->addCell(2000)->addText(en2mm($totalBaseSalaryLow + $totalIncrementLow));
    $table->addCell(2000)->addText(en2mm($totalDeductionLow));
    $table->addCell(2000)->addText(en2mm($totalFinalSalaryLow));
    $table->addCell(2000)->addText(en2mm($deductionTaxLow));
    $table->addCell(2000)->addText(en2mm($deductionInsuranceLow));
    $table->addCell(2000)->addText(en2mm($deductionLow));
    $table->addCell(2000)->addText(en2mm($totalSalaryLow));
    $table->addCell(2000)->addText(en2mm($additionLow));
    $table->addCell(2000)->addText(en2mm($totalSalaryAdditionLow));
    $table->addCell(2000)->addText('');
    $table->addCell(2000)->addText('');

    $table->addRow();
    $table->addCell(1000)->addText('');
    $table->addCell(2000)->addText('စုစုပေါင်း(အမှုထမ်း+အရာထမ်း)');
    $table->addCell(2000)->addText(en2mm($low_staffs->count()+$high_staffs->count()));
    $table->addCell(2000)->addText(en2mm($totalBaseSalaryLow+$totalBaseSalaryHigh));
    $table->addCell(2000)->addText(en2mm($totalIncrementLow+$totalIncrementHigh));
    $table->addCell(2000)->addText(en2mm($totalBaseSalaryLow + $totalIncrementLow+$totalBaseSalaryHigh + $totalIncrementHigh));
    $table->addCell(2000)->addText(en2mm($totalDeductionLow+$totalDeductionHigh));
    $table->addCell(2000)->addText(en2mm($totalFinalSalaryLow+$totalFinalSalaryHigh));
    $table->addCell(2000)->addText(en2mm($deductionTaxLow+$deductionTaxHigh));
    $table->addCell(2000)->addText(en2mm($deductionInsuranceLow+$deductionInsuranceHigh));
    $table->addCell(2000)->addText(en2mm($deductionLow+$deductionHigh));
    $table->addCell(2000)->addText(en2mm($totalSalaryLow+$totalSalaryHigh));
    $table->addCell(2000)->addText(en2mm($additionLow+$additionHigh));
    $table->addCell(2000)->addText(en2mm($totalSalaryAdditionLow+$totalSalaryAdditionHigh));
    $table->addCell(2000)->addText('');
    $table->addCell(2000)->addText('');

   



    $fileName = 'yangon_staff_april_salary_list_report.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($tempFile);
    
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
        
    $fileName = 'local_training_report.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($tempFile);

    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}

    public function render()
    {
        $leaves = Leave::where('leave_type_id', 5)->get();
        $salaries = Salary::with('staff', 'rank')->get();
        $staffs = Rank::whereIn('staff_type_id', [1, 2, 3])->get();
        $high_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 1))->get();
        $low_staffs = Staff::whereHas('currentRank', fn($q) => $q->where('staff_type_id', 2))->get();
    
        return view('livewire.investment-companies.yangon-staff-april-salary-list',[ 
            'high_staffs' => $high_staffs,
            'low_staffs' => $low_staffs,
            'salaries' => $salaries,
            'leaves' =>$leaves,
            'staffs'=>$staffs,
        ]);
    }
}

