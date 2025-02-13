<?php

namespace App\Livewire;

use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class AboutToIncrement extends Component
{
    public $endDate, $startDate;
    public $staffs;
    public $staff_id;

    public function go_pdf(){
        $startDate = $this->startDate;
        $endDate = $this->endDate ;

                $staffs = Staff::all();
                $this->staffs = Staff::all()->filter(function ($staff) use ($startDate, $endDate) {

                    $totalLeaveDays = $staff->leaves->where('leve_type','5')->  reduce(function ($carry, $leave) {
                        $fromDate = Carbon::parse($leave->from_date);
                        $toDate = Carbon::parse($leave->to_date);
                        return $carry + $fromDate->diffInDays($toDate);
                    }, 0);


                    if ($staff->increments->isNotEmpty()) {
                        // Get the last increment date
                        $lastIncrementDate = $staff->increments->last()->increment_date;

                        // Adjust the last increment date by adding leave days
                        $adjustedIncrementDate = Carbon::parse($lastIncrementDate)
                        ->addDays($totalLeaveDays)
                        ;

                        // Calculate the 2-year mark based on the adjusted increment date
                        $promotionDate = $adjustedIncrementDate->addYears(2);
                        $staff->promotionDate =  $promotionDate;
                    } else {

                        $adjustedJoinDate = Carbon::parse($staff->join_date)->addDays($totalLeaveDays);

                        $promotionDate = $adjustedJoinDate->addYears(2);
                        $staff->promotionDate =  $promotionDate;

                    }

                    // Check if the promotion date falls between startDate and endDate
                    return $promotionDate->between($startDate, $endDate);
                });

        $data = [
           'staffs' => $this->staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.about_increment', $data,[],[
            'format'=>'A4',
            'orientation'=>'landscape'
        ]);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'about_increment_report.pdf');
    }
    public function go_word()
{
    $startDate = Carbon::parse($this->startDate);
    $endDate = Carbon::parse($this->endDate);

    // Filter staff based on promotion dates
    $filteredStaffs = Staff::all()->filter(function ($staff) use ($startDate, $endDate) {
        $totalLeaveDays = $staff->leaves->where('leave_type', '5')->reduce(function ($carry, $leave) {
            return $carry + Carbon::parse($leave->from_date)->diffInDays(Carbon::parse($leave->to_date));
        }, 0);

        $lastIncrementDate = $staff->increments->isNotEmpty()
            ? $staff->increments->last()->increment_date
            : $staff->join_date;

        $promotionDate = Carbon::parse($lastIncrementDate)->addDays($totalLeaveDays)->addYears(2);
        $staff->promotionDate = $promotionDate;

        return $promotionDate->between($startDate, $endDate);
    });

    // Create Word document
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();
    $table = $section->addTable(['borderSize' => 6, 'borderColor' => '000000']);

    // Table headers
    $table->addRow();
    $table->addCell(1000)->addText('Name', ['bold' => true]);
    $table->addCell(2000)->addText('Increment Date', ['bold' => true]);
    $table->addCell(2000)->addText('Action',['bold'=>true]);

    // Table rows
    foreach ($filteredStaffs as $staff) {
        $table->addRow();
        $table->addCell(1000)->addText($staff->name);
        $table->addCell(2000)->addText($staff->promotionDate->format('Y-m-d'));
        $table->addCell(2000)->addText();
    }

    // Download Word document
    $writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    return response()->streamDownload(function () use ($writer) {
        $writer->save('php://output');
    }, 'about_increment_report.docx');
}


    public function render()
    {

        $startDate = $this->startDate;
        $endDate = $this->endDate ;

                $staffs = Staff::all();
                $this->staffs = Staff::all()->filter(function ($staff) use ($startDate, $endDate) {
                    $totalLeaveDays = $staff->leaves->where('leve_type','5')->reduce(function ($carry, $leave) {
                        $fromDate = Carbon::parse($leave->from_date);
                        $toDate = Carbon::parse($leave->to_date);
                        return $carry + $fromDate->diffInDays($toDate);
                    }, 0);
                    $promotionDate = null ;

                    if($staff->current_increment_time < 5  && $staff->current_increment_time != 0   ){

                        $lastIncrementDate = $staff->last_increment_date;

                        $adjustedIncrementDate = Carbon::parse($lastIncrementDate)
                                ->addDays($totalLeaveDays)
                                ;

                                // Calculate the 2-year mark based on the adjusted increment date
                                $promotionDate = $adjustedIncrementDate->addYears(2);
                                // $staff->promotionDate =  $promotionDate;
                    }


                    elseif($staff->current_increment_time  == 0 && $staff->increments->isEmpty() ){

                        $adjustedJoinDate = Carbon::parse($staff->current_rank_date)->addDays($totalLeaveDays);

                        $promotionDate = $adjustedJoinDate->addYears(2);
                    }


                    // if ($staff->increments->isNotEmpty()) {
                    //     // Get the last increment date

                    //     $lastIncrment  = $staff->current_increment_time;
                    //     if($lastIncrment < 5 ){
                    //         $lastIncrementDate = $staff->last_increment_date;

                    //         // Adjust the last increment date by adding leave days
                    //         $adjustedIncrementDate = Carbon::parse($lastIncrementDate)
                    //         ->addDays($totalLeaveDays)
                    //         ;

                    //         // Calculate the 2-year mark based on the adjusted increment date
                    //         $promotionDate = $adjustedIncrementDate->addYears(2);
                    //         $staff->promotionDate =  $promotionDate;


                    //     }

                    // }
                    // // elseif(){

                    // //     $staff->promotionDate =  $promotionDate;

                    // // }
                    // else {

                    //     $adjustedJoinDate = Carbon::parse($staff->current_rank_date)->addDays($totalLeaveDays);

                    //     $promotionDate = $adjustedJoinDate->addYears(2);
                    //     $staff->promotionDate =  $promotionDate;

                    // }


                    return $promotionDate->between($startDate, $endDate);
                });



        return view('livewire.about-to-increment', [
            'staffs' => $this->staffs,
        ]);
    }

    public function mount()
    {
        $this->startDate = Carbon::now();
        $this->endDate = Carbon::now()->addWeeks(1) ;

    }
}
