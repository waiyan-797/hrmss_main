<?php

namespace App\Livewire\EmployeeRecordReport;

use App\Models\RetireType;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use Livewire\WithPagination;

use function Laravel\Prompts\search;

class EmpoyeeRecordReport extends Component
{

    use WithPagination;
    public $retireTypes ;
    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.employee_record_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'employee_record_report_pdf.pdf');
    }

    // Method to generate Word document
    public function go_word()
    {
        $staffs = Staff::get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $section->addTitle('Former Employee Record Report of April, 2021', 1);

        $table = $section->addTable(['borderSize' => 6, 'borderColor' => 'black', 'cellMargin' => 50]);

        // Add header row
        $table->addRow();
        $headers = ['စဥ်', 'အမည်', 'ရာထူး', 'နှုတ်ထွက်သည့်ရက်စွဲ'];
        foreach ($headers as $header) {
            $table->addCell(2000)->addText($header, ['bold' => true]);
        }

        // Add data rows
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText($staff->current_rank->name);
            $table->addCell(2000)->addText($staff->retire_date);
        }

        // Save Word file to output
        $fileName = 'former_employee_record_report.docx';
        $temp_file = tempnam(sys_get_temp_dir(), 'former_employee_record_report') . '.docx';
        $phpWord->save($temp_file, 'Word2007');

        // Download the Word file
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }

    public $startDate , $endDate ;
    public $startDateListen , $endDateListen ;
    public $selectedRetireType_id ;
    public $selectedRetireType_id_listen ;
    public function mount(){

    $this->retireTypes =  RetireType::all();

    }





    public function search(){

$this->startDate = $this->startDateListen;
$this->endDate = $this->endDateListen;
$this->selectedRetireType_id = $this->selectedRetireType_id_listen ;

    }


    public function render()
    {
        $staffs = Staff::
        where('current_rank_id', '!=', 23)
        ->whereNotNull('retire_type_id')
        ->when($this->selectedRetireType_id , fn($q)=> $q->where('retire_type_id' , $this->selectedRetireType_id) )
        ->whereBetween('retire_date', [$this->startDate, $this->endDate])
        ->paginate(20);
        $currentPage = $staffs?->currentPage();
        $perPage = $staffs?->perPage();
        $start = ($currentPage - 1) * $perPage + 1;

        return view('livewire.employee-record-report.empoyee-record-report', [
            'staffs' => $staffs ,
            'start' => $start,
        ]);
    }

}
