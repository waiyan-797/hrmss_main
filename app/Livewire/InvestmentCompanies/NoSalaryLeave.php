<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Leave;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class NoSalaryLeave extends Component
{
    public function go_pdf()
{
    $leaves = Leave::where('leave_type_id', 1)->with('staff')->get();
    $data = [
        
        'leaves' => $leaves, 
    ];
    $pdf = PDF::loadView('pdf_reports.no_salary_leave_report', $data);
    return response()->streamDownload(function () use ($pdf) {
        echo $pdf->output();
    }, 'no_salary_leave_report_pdf.pdf');
}
public function go_word()
{
    $leaves = Leave::where('leave_type_id', 1)->with(['staff', 'staff.currentRank', 'leave_type'])->get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန\nရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန\nလစာမဲ့ ခွင့်လစာ တွက်ချက်မှုဇယား",
        ['bold' => true, 'size' => 14],
        ['alignment' => 'center']
    );
    $section->addTextBreak(1);

    // Add data for each leave
    foreach ($leaves as $leave) {
        $staffName = $leave->staff->name ?? 'N/A';
        $rankName = $leave->staff->currentRank->name ?? 'N/A';
        $leaveType = $leave->leaveType->name ?? 'N/A';
        $fromDate = \Carbon\Carbon::parse($leave->from_date)->format('Y-m-d');
        $toDate = \Carbon\Carbon::parse($leave->to_date)->format('Y-m-d');
        $orderNo = $leave->order_no;
        $dateDifference = \Carbon\Carbon::parse($leave->from_date)->diffInDays(\Carbon\Carbon::parse($leave->to_date)) + 1;
        $leaveSalary = $leave->staff?->current_salary / 30 * $dateDifference;

        // Add the details for each leave
        $section->addText("အမည် - $staffName");
        $section->addText("ရာထူး - $rankName");
        $section->addText("ခွင့်အမျိုးအစား - $leaveType");
        $section->addText("ခွင့်ယူသည့်ကာလ - $fromDate - $toDate");
        $section->addText("ရုံးမိန့် - $orderNo");
        $section->addText("ဖြတ်တောက်ရမည့်ခွင့်လစာ - $leaveSalary");
        $section->addTextBreak(1); 
    }
    $fileName = 'no_salary_leave_report.docx';
    $tempFile = storage_path('app/public/' . $fileName);
    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($tempFile);
    return response()->download($tempFile)->deleteFileAfterSend(true);
}
    public function render()
{
    
    $leaves = Leave::where('leave_type_id', 1)->with('staff')->get();

    return view('livewire.investment-companies.no-salary-leave', [
        'leaves' => $leaves,
       
       
    ]);
}

}
