<?php

namespace App\Livewire\Leave;

use App\Exports\L02;
use App\Models\Division;
use App\Models\Leave;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class LeaveNuberPercent2 extends Component
{
    public $startYr, $startMonth, $endYr, $endMonth;
    public $staff_id;
    public $fromDateRange, $toDateRange;
    public $dep_category;
    public $months;
    public $divisions;
    public $monthly_leaves;
    public $divisonMontlyLeavesCollection;
    public function mount($staff_id = 0)
    {
        $this->staff_id = $staff_id;
        $this->fromDateRange = Carbon::now()->subMonth(9)->format('Y-m'); // 9 months ago
        $this->toDateRange = Carbon::now()->format('Y-m'); // current month
        $this->dep_category = 1;
       
    }
    
    public function go_pdf($staff_id)
    {
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
            'startYr' => $this->startYr,
            'startMonth' => $this->startMonth,
            'endYr' => $this->endYr,
            'endMonth' => $this->endMonth,
            'months' => $this->months,
            'divisions' => $this->divisions,
            'monthly_leaves' => $this->monthly_leaves
        ];
        
        $pdf = PDF::loadView('pdf_reports.leave_nuber_percent_report2', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'leave_nuber_precent_report_pdf_2.pdf');
    }
    // public function go_excel() 
    // {
        
    //     return Excel::download(new L02(), 'L02.xlsx');
    // }

    // public $startYr, $startMonth, $endYr, $endMonth;
    // public $staff_id;
    // public $fromDateRange, $toDateRange;
    // public $dep_category;
    // public $months;
    // public $divisions;
    // public $monthly_leaves;
    // public $divisonMontlyLeavesCollection;

    // public function go_excel() 
    // {
    //     return Excel::download(new L02($this->startYr ,
    //     $this->startMonth  , 
    
    // $this->endYr , $this->endMonth , $this->fromDateRange , $this->toDateRange , $this->dep_category , $this->months,$this->divisions,$this->monthly_leaves,$this->divisionMonthlyLeavesCollection
    // ), 'L02.xlsx');
    // }

  
    public function go_excel()
    {
        if ($this->divisionMonthlyLeavesCollection->isEmpty()) {
            session()->flash('error', 'No data to export.');
            return;
        }

        return Excel::download(new L02(
            $this->startYr,
            $this->startMonth,
            $this->endYr,
            $this->endMonth,
            $this->fromDateRange,
            $this->toDateRange,
            $this->dep_category,
            $this->months,
            $this->divisions,
            $this->monthly_leaves,
            $this->divisionMonthlyLeavesCollection
        ), 'L02.xlsx');
    }




















    // public function go_excel($staff_id)
    // {
    //     return Excel::download(new L02($staff_id), 'L02.xlsx');
    // }
  
    public function go_word()
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
        $section->addText(
            'ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန',
            ['bold' => true, 'size' => 14],
            ['alignment' => 'center']);
        $section->addText(mmDateFormat($this->startYr, $this->startMonth) . ' မှ ' . mmDateFormat($this->endYr, $this->endMonth) . ' ခွင့်ခံစားမှု အနည်းအများအလိုက် ရာခိုင်နှုန်းဇယား',['bold' => true, 'size' => 12]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
        $table->addCell(4000)->addText('ဌာနခွဲ', ['bold' => true]);

        foreach ($this->months as $month) {
            $table->addCell(2000)->addText(mmDateFormat(explode('-', $month)[0], explode('-', $month)[1]), ['bold' => true]);
        }
        $table->addCell(2000)->addText('စုစုပေါင်း', ['bold' => true]);

        // Add data rows
        foreach ($this->divisions as $division) {
            $table->addRow();
            $table->addCell(2000)->addText($division->id);
            $table->addCell(4000)->addText($division->name);

            $totalLeaveCount = 0;
            foreach ($this->months as $YearMonth) {
                $leaveCount = $this->leaveCount($division->id, $YearMonth);
                $table->addCell(2000)->addText(en2mm($leaveCount));
                $totalLeaveCount += $leaveCount;
            }

            $table->addCell(2000)->addText(en2mm($totalLeaveCount));
        }

        // Save the Word file to the output
        $filePath = 'leave_report_2.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $staff = Staff::get()->first();
        $fromDate = Carbon::parse($this->fromDateRange); // Start date
        $toDate = Carbon::parse($this->toDateRange);     // End date
        $this->startYr  = explode('-', $fromDate)[0];
        $this->startMonth  = explode('-', $fromDate)[1];
        $this->endYr  = explode('-', $toDate)[0];
        $this->endMonth  = explode('-', $toDate)[1];
        $this->divisions = Division::where('division_type_id', $this->dep_category)->get();
        $months = [];
        while ($fromDate->lte($toDate)) { 
            $months[] = $fromDate->format('Y-m'); 
            $fromDate->addMonth(); 
        }
        $this->months = $months;
        return view('livewire.leave.leave-nuber-percent2', [
            'staff' => $staff,
            'months' => $this->months,
            'divisions' => $this->divisions,
            'monthly_leaves' => $this->monthly_leaves

        ]);
    }
    public function leaveCount($division, $YearMonth)
    {

        [$year, $month] = explode('-', $YearMonth);
        $totalLeaveCount = 0;
        $staffs = Staff::where("current_division_id", $division)->get();
        foreach ($staffs as $staff) {
            $leave = Leave::where('staff_id', $staff->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->count('id');
            $totalLeaveCount += $leave;
        }
        return $totalLeaveCount;
    }
}
