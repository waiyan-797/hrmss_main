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
    public function go_word()
    {
        $staffs = Staff::where('current_rank_id', '!=', 23)->whereNotNull('retire_type_id')
            ->when($this->selectedRetireType_id, fn($q) => $q->where('retire_type_id', $this->selectedRetireType_id))
            ->whereBetween('retire_date', [$this->startDate, $this->endDate])
            ->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5), // Letter width
            'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11),  // Letter height
            'marginTop'    => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
            'marginLeft'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9),
            'marginRight'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.9),
        ]);
        $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle(formatDMYmm($this->startDateListen) . ' မှ ' . formatDMYmm($this->endDateListen) . ' အထိ နုတ်ထွက်သွားသော ဝန်ထမ်းစာရင်း', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 8]);
        $table->addRow();
        $table->addCell(1000)->addText('စဥ်',['bold' => true],$pStyle_1);
        $table->addCell(3000)->addText('အမည်',['bold'=> true],$pStyle_1);
        $table->addCell(4000)->addText('ရာထူး',['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ဌာနခွဲ',['bold'=> true],$pStyle_1);
        $table->addCell(3000)->addText("အလုပ်မှ\nနုတ်ထွက်သည့်\nရက်စွဲ",['bold'=>true],$pStyle_1);
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(1000)->addText(en2mm($index + 1),null,$pStyle_1);
            $table->addCell(3000)->addText($staff->name,null,$pStyle_1);
            $table->addCell(4000)->addText($staff->current_rank->name,null,$pStyle_1);
            $table->addCell(4000)->addText($staff->current_division?->name,null,$pStyle_1);
            $table->addCell(3000)->addText(formatDMYmm($staff->retire_date),null,$pStyle_1);
        }
        $fileName = 'E01.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'E01') . '.docx';
        $phpWord->save($tempFile, 'Word2007');
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
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
