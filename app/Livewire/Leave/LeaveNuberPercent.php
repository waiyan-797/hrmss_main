<?php

namespace App\Livewire\Leave;

use App\Exports\L01;
use App\Models\Division;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeaveNuberPercent extends Component
{
    public $staff_id;
    public $year, $month;
    public $dep_category;
    public $divisions;
    public $dateRange;
    public  $filterRange;
    public $previousYear, $previousMonthDate, $previousMonth;
     public $count=0;
    public function mount()
    {

        $this->dateRange = Carbon::now()->format('Y-m');

        $this->dep_category = 1;
    }
    public function go_pdf()
    {
        $leave_types = LeaveType::all();
       
    if (!($this->dep_category == 3)) {
        $divisions = Division::where('division_type_id', $this->dep_category)->get();
    }
    $totalStaffCount = 0;
    $totalLeaveCount = 0;
    $totalLeaveTypeCounts = [];
        $divisions = Division::get();
        [$year, $month] = explode('-', $this->dateRange);
        $this->year = $year;
        $this->month = $month;

        if (!($this->dep_category == 3)) {
            $divisions = Division::where('division_type_id', $this->dep_category)->get();
        }
        $totalStaffCount = 0;
        $totalLeaveCount = 0;
        $totalLeaveTypeCounts = [];

        foreach ($divisions as $division) {
            $division->staffCount = $this->staffCount($division->id);
            $division->leaveCount = $this->leaveCount($division->id);
            $totalStaffCount += $division->staffCount;
            $totalLeaveCount += $division->leaveCount;

            foreach ($leave_types as $leave_type) {
                $leaveTypeCount = $this->leaveType($division->id, $leave_type->id);

                $totalLeaveTypeCounts[$leave_type->id] = ($totalLeaveTypeCounts[$leave_type->id] ?? 0) + $leaveTypeCount;
            }
        }
        $this->divisions = $divisions;

        $data = [
            'leave_types' => $leave_types,
            'divisions' => $divisions,
            'year' => $this->year,
            'month' => $this->month,
            'totalStaffCount' => $totalStaffCount,
            'totalLeaveCount' => $totalLeaveCount,
            'totalLeaveTypeCounts' => $totalLeaveTypeCounts,
            'YearMonth' => $this->dateRange
        ];
        $pdf = PDF::loadView('pdf_reports.leave_nuber_percent_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'leave_nuber_precent_report_pdf.pdf');
    }
    public function go_excel() 
    {
        
        return Excel::download(new L01($this->month,$this->month, $this->dateRange, $this->dep_category), 'L01.xlsx');
    }
  
    public function go_word()
{
    $leave_types = LeaveType::all();
    [$year, $month] = explode('-', $this->dateRange);
    $this->year = $year;
    $this->month = $month;
    if (!($this->dep_category == 3)) {
        $divisions = Division::where('division_type_id', $this->dep_category)->get();
    } else {
        $divisions = Division::get();
    }
    $totalStaffCount = 0;
    $totalLeaveCount = 0;
    $totalLeaveTypeCounts = [];

    foreach ($divisions as $division) {
        $division->staffCount = $this->staffCount($division->id);
        $division->leaveCount = $this->leaveCount($division->id);
        $totalStaffCount += $division->staffCount;
        $totalLeaveCount += $division->leaveCount;

        foreach ($leave_types as $leave_type) {
            $leaveTypeCount = $this->leaveType($division->id, $leave_type->id);
            $totalLeaveTypeCounts[$leave_type->id] = ($totalLeaveTypeCounts[$leave_type->id] ?? 0) + $leaveTypeCount;
        }
    }
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 

    // Add title
    $section->addText(
        'ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန',
        ['bold' => true, 'size' => 14],
        ['alignment' => 'center']
    );
    $section->addText(
        mmDateFormat($year, $month) . ' ဝန်ထမ်းများ၏ ခွင့်ခံစားမှုအရေအတွက်နှင့်ရာခိုင်နှုန်း',
        ['bold' => true, 'size' => 12],
        ['alignment' => 'center']
    );

    // Add table
    $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center']);

    // Add table header
    $table->addRow();
    $table->addCell(1000)->addText('စဥ်', ['bold' => true]);
    $table->addCell(2000)->addText('ဌာနခွဲ', ['bold' => true]);
    $table->addCell(2000)->addText('ဝန်ထမ်းအင်အား', ['bold' => true]);
    $table->addCell(2000)->addText('ခွင့်ယူသည့်ဝန်ထမ်းဦးရေ', ['bold' => true]);
    foreach ($leave_types as $leave_type) {
        $table->addCell()->addText($leave_type->name, ['bold' => true]);
    }
    $table->addCell()->addText('ခွင့်ယူသည့်အင်အားရာခိုင်နှုန်း', ['bold' => true]);
    foreach ($divisions as $index=> $division) {
        $table->addRow();
        $table->addCell(1000)->addText($index + 1);
        $table->addCell(2000)->addText($division->name);
        $table->addCell(2000)->addText(en2mm($division->staffCount));
        $table->addCell(2000)->addText(en2mm($division->leaveCount));

        foreach ($leave_types as $leave_type) {
            $leaveTypeCount = $this->leaveType($division->id, $leave_type->id);
            $table->addCell()->addText(en2mm($leaveTypeCount));
        }

        $leavePercentage = $division->staffCount > 0 ? ($division->leaveCount / $division->staffCount) * 100 : 0;
        $table->addCell()->addText(en2mm(number_format($leavePercentage, 2) . '%'));
    }

    // Add total row
    $table->addRow();
    $table->addCell(1000)->addText('', ['bold' => true]);
    $table->addCell(2000)->addText('စုစုပေါင်း', ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($totalStaffCount), ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($totalLeaveCount), ['bold' => true]);
    foreach ($leave_types as $leave_type) {
        $table->addCell(2000)->addText(en2mm($totalLeaveTypeCounts[$leave_type->id] ?? 0), ['bold' => true]);
    }
    $totalLeavePercentage = $totalStaffCount > 0 ? ($totalLeaveCount / $totalStaffCount) * 100 : 0;
    $table->addCell(2000)->addText(en2mm(number_format($totalLeavePercentage, 2) . '%'), ['bold' => true]);
    $fileName = 'leave_number_percent_report.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $phpWord->save($tempFile, 'Word2007');
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}
    public function staffCount($division)
    {
        return Staff::where("current_division_id", $division)->count();
    }
    public function leaveCount($division)
    {
        $totalLeaveCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();
        
        foreach ($staffs as $staff) {
            
            $leave = Leave::whereYear('created_at', $this->year)
                ->whereMonth('created_at', $this->month)
                ->where('staff_id', $staff->id)
                ->distinct('staff_id')
                ->count('staff_id');
                // if($staff->id == 3 ){
                //     dd($leave);
                // }
            $totalLeaveCount += $leave;

        }
        return $totalLeaveCount;
    }

    public function leaveType($division, $leave_type_id)
    {
        $totalCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();

        foreach ($staffs as $staff) {
            $leaveCount = Leave::where('staff_id', $staff->id)
                ->where('leave_type_id', $leave_type_id)
                ->whereYear('created_at', $this->year)
                ->whereMonth('created_at', $this->month)

                ->count();
            $totalCount += $leaveCount;
        }

        return $totalCount;
    }
    
    public function render()
    {
        $leave_types = LeaveType::all();
        $divisions = Division::get();
        [$year, $month] = explode('-', $this->dateRange);
        $this->year = $year;
        $this->month = $month;

        if (!($this->dep_category == 3)) {
            $divisions = Division::where('division_type_id', $this->dep_category)->get();
        }
        $totalStaffCount = 0;
        $totalLeaveCount = 0;
        $totalLeaveTypeCounts = [];

        foreach ($divisions as $division) {
            $division->staffCount = $this->staffCount($division->id);
            $division->leaveCount = $this->leaveCount($division->id);
            $totalStaffCount += $division->staffCount;
            $totalLeaveCount += $division->leaveCount;

            foreach ($leave_types as $leave_type) {
                $leaveTypeCount = $this->leaveType($division->id, $leave_type->id);

                $totalLeaveTypeCounts[$leave_type->id] = ($totalLeaveTypeCounts[$leave_type->id] ?? 0) + $leaveTypeCount;
            }
        }
        $this->divisions = $divisions;
        return view('livewire.leave.leave-nuber-percent', [
            'leave_types' => $leave_types,
            'divisions' => $divisions,
            'totalStaffCount' => $totalStaffCount,
            'totalLeaveCount' => $totalLeaveCount,
            'totalLeaveTypeCounts' => $totalLeaveTypeCounts,
            
        ]);
    }
}
