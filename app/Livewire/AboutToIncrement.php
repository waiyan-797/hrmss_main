<?php

namespace App\Livewire;

use App\Exports\PA20;
use App\Models\Increment;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class AboutToIncrement extends Component
{
    public $endDate, $startDate;
    public $arr ;
    public $staff_id;
    public $staff_to_increment = [] ;

    public function go_pdf(){
        $startDate = $this->startDate;
        $endDate = $this->endDate ;

                $staffs = Staff::all();
                $this-> $this->arr
                = Staff::all()->filter(function ($staff) use ($startDate, $endDate) {

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
    public function go_excel()
    {
        return Excel::download(new PA20($this->arr), 'PA20.xlsx');
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

// $staffs  = $this->search();
        $staffs = $this->arr;

        return view('livewire.about-to-increment', compact('staffs'));
    }


    public function search(){



$staffs  =  DB::table(function ($query) {
    $query->select([
        's.id',
        's.name as staff_name',
        'r.name as rank_name',
        'd.name as division_name',
        DB::raw('CASE WHEN l.leave_days IS NULL THEN 0 ELSE l.leave_days END as leave_days'),
        DB::raw('CASE WHEN inc.increment_time IS NOT NULL THEN inc.increment_time
                  WHEN s.current_increment_time > 0 AND s.current_increment_time < 5 THEN s.current_increment_time ELSE 0 END as increment_time'),
        DB::raw('CASE WHEN inc.increment_time IS NOT NULL THEN inc.increment_date
                  WHEN s.current_increment_time > 0 AND s.current_increment_time < 5 THEN s.last_increment_date ELSE s.current_rank_date END as last_increment_date')
    ])
    ->from('staff as s')
    ->where('current_rank_id' , '!=' , 23 )
    ->where('current_rank_id' , '!=' , 1 )
    ->leftJoin('ranks as r', 's.current_rank_id', '=', 'r.id')
    ->leftJoin('divisions as d', 's.current_division_id', '=', 'd.id')
    ->leftJoin(DB::raw('(SELECT * FROM increments WHERE id IN (SELECT MAX(i.id) FROM increments i WHERE increment_time < 5 GROUP BY i.staff_id)) as inc'), 's.id', '=', 'inc.staff_id')
    ->leftJoin(DB::raw('(SELECT staff_id, SUM(qty) as leave_days FROM leaves WHERE leave_type_id = 5 GROUP BY staff_id) as l'), 's.id', '=', 'l.staff_id');
}, 'x')
->select([
    'x.id',
    'x.staff_name',
    'x.rank_name',
    'x.division_name',
    'x.increment_time',
    'x.last_increment_date',
    'x.leave_days',
    DB::raw('DATE_ADD(DATE_ADD(x.last_increment_date, INTERVAL x.leave_days DAY), INTERVAL 2 YEAR) as coming_increment_date')
])->get();


$this->arr= $staffs->whereBetween('coming_increment_date' ,[$this->startDate->format('Y-m-d'),$this->endDate->format('Y-m-d')]) ;
    }


    public function select_all(){
        // $this->staff_to_increment =
        foreach ($this->arr as $key => $value) {
            $this->staff_to_increment[] = $key;
        }
    }
    public function mount()
    {
        $this->startDate = Carbon::now();
        $this->endDate = Carbon::now()->addWeeks(1) ;

    }

    public function doIncrementBulkAction(){
        foreach(
            $this->staff_to_increment  as  $staff


        ){
            $element  = $this->arr[$staff];
            $staffModle = Staff::find($element->id);



            Increment::create([
                'staff_id' => $staffModle->id,
                'increment_rank_id' => $staffModle->current_rank_id,
                'min_salary' => $staffModle->payscale->min_salary,
                'increment' => 2000,
                'max_salary' => $staffModle->payscale->max_salary,
                'increment_date' => $element->coming_increment_date,
                'increment_time' =>$staffModle->current_increment_time + 1 ,

            ]);

            $staffModle->current_salary += 2000 ;
            $staffModle->last_increment_date = $element->coming_increment_date;
            $staffModle->current_increment_time +=1 ;


            $staffModle->update();
        }

        $this->staff_to_increment = [];
    }


    public function doIncrement(){

    }
}
