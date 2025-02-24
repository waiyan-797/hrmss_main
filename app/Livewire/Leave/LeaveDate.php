<?php
namespace App\Livewire\Leave;
use App\Exports\L4;
use App\Models\Leave;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
class LeaveDate extends Component
{
    public $staff_id;
    public function mount($staff_id = 0)
    {
        $this->staff_id = $staff_id;
    }
    public function go_pdf()
    {
        $staff = Staff::find($this->staff_id);
        $leaves = Leave::where('staff_id', $this->staff_id)
            ->where('leave_type_id', 2)
            ->get();
        $data = [
            'staff' => $staff,
            'leaves' => $leaves,
        ];

        $pdf = PDF::loadView('pdf_reports.leave_date_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'leave_date_report_pdf.pdf');
    }
    public function go_excel($staff_id)
{
    return Excel::download(new L4($staff_id), 'L4.xlsx');
}
    public function go_word()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        $leaves = Leave::where('staff_id', $this->staff_id)
            ->where('leave_type_id', 2)->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(5000, ['gridSpan' => 4, 'valign' => 'center'])->addText('တာဝန်ချိန် ကာလ	');
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('စာတိုင်(၂)အရ ခံစာခွင့်ရှိသည့်လုပ်သက်');
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('စုစုပေါင်းခံစားခွင့်ရှိသည့်လုပ်သက်ခွင့်စာတိုင်(၃)+(၇)');
        $table->addCell(6000, ['gridSpan' => 3, 'valign' => 'center'])->addText('လုပ်သက်ခွင့်ခံစားသည့်ကာလ');
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('လုပ်သက်ခွင့်စာတိုင်(၄)-(၆)');
        $table->addRow();
        $table->addCell(2000)->addText('မှ---ထိ', ['alignment' => 'center']);
        $table->addCell(1000)->addText('နှစ်', ['alignment' => 'center']);
        $table->addCell(1000)->addText('လ', ['alignment' => 'center']);
        $table->addCell(1000)->addText('ရက်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('လ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ရက်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('လ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ရက်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('မှ---ထိ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('လ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ရက်', ['alignment' => 'center']);
        $table->addCell(2000)->addText('လ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ရက်', ['alignment' => 'center']);
    $workStartDate = $staff->join_date;
    $previous_total_leave_months = 0;
    $previous_total_leave_days = 0;
    foreach ($leaves as $leave) {
        $workEndDate = \Carbon\Carbon::parse($leave->from_date)->subDay()->toDateString();
        $work_diff = dateDiff($workStartDate, $workEndDate);
        $total_days_worked = \Carbon\Carbon::parse($workStartDate)->diffInDays(\Carbon\Carbon::parse($workEndDate));
        $free_leave_days = floor($total_days_worked / 11);
        $free_leave_months = floor($free_leave_days / 30);
        $remaining_free_leave_days = $free_leave_days % 30;
        $leave_diff = dateDiff($leave->from_date, $leave->to_date);
        $total_leave_months = $previous_total_leave_months + $free_leave_months;
        $total_leave_days = $previous_total_leave_days + $remaining_free_leave_days;
        $diff_leave_months = $total_leave_months - $leave_diff->m;
        $diff_leave_days = $total_leave_days - $leave_diff->d;
        $table->addRow();
        $table->addCell(2000)->addText(en2mm(formatDMY($workStartDate)).'မှ'.en2mm(formatDMY($workEndDate)));
        $table->addCell(2000)->addText( $work_diff->y > 0 ? en2mm($work_diff->y) . ' နှစ် ' : '-');
        $table->addCell(2000)->addText($work_diff->m > 0 ? en2mm($work_diff->m) . ' လ ' : en2mm('0'));
        $table->addCell(2000)->addText($work_diff->d > 0 ? en2mm($work_diff->d) . ' ရက် ' : en2mm('0'));
        $table->addCell(2000)->addText($free_leave_months > 0 ? en2mm($free_leave_months).' လ' : '-');
        $table->addCell(2000)->addText($remaining_free_leave_days > 0 ? en2mm($remaining_free_leave_days).' ရက်' : '-');
        $table->addCell(2000)->addText($total_leave_months > 0 ? en2mm($total_leave_months) . ' လ ' : '-');
        $table->addCell(2000)->addText($total_leave_days > 0 ? en2mm($total_leave_days) . ' ရက် ' : '-');
        $table->addCell(2000)->addText(formatDMYmm($leave->from_date).'မှ'.formatDMYmm($leave->to_date).'ထိ');
        $table->addCell(2000)->addText($leave_diff->m > 0 ? en2mm($leave_diff->m) . ' လ ' : '-');
        $table->addCell(2000)->addText( $leave_diff->d > 0 ? en2mm($leave_diff->d + 1    ) . ' ရက် ' : '-');
        $table->addCell(2000)->addText($diff_leave_months > 0 ? en2mm($diff_leave_months) . ' လ' : '-');
        $table->addCell(2000)->addText($diff_leave_days > 0 ? en2mm($diff_leave_days  - 1 ) . ' ရက်' : '-');
        $workStartDate = \Carbon\Carbon::parse($leave->to_date)->addDay()->toDateString();
        $previous_total_leave_months = $diff_leave_months;
        $previous_total_leave_days = $diff_leave_days;
    }
        $filePath = storage_path('app/public/leave_report.docx');
        $phpWord->save($filePath, 'Word2007');
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        $leaves = Leave::where('staff_id', $this->staff_id)->whereIn('leave_type_id', [2, 4, 5])->get();
        return view('livewire.leave.leave-date', [
            'staff' => $staff,
            'leaves' => $leaves,
        ]);
    }
}
