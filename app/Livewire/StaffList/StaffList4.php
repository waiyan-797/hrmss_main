<?php

namespace App\Livewire\StaffList;

use App\Exports\SSL03;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffList4 extends Component
{
    use WithPagination;
    public $ranks;
    public $posting;
    public $selectedRankId= null ;
    public function mount(){
        $this->ranks = (new Rank )->isDicaAll();
    }
    public function go_pdf()
{
    $staffs = Staff::with('postings', 'currentRank')->get();
    $data = ['staffs' => $staffs];
    $pdf = PDF::loadView('pdf_reports.staff_list_report_4', $data);

    return response()->streamDownload(function () use ($pdf) {
        echo $pdf->output();
    }, 'staff_list_report_pdf_4.pdf');
}
    public function go_excel() 
    {
        return Excel::download(new SSL03(
    ), 'SSL03.xlsx');
    }
    public function go_word()
{
    // $staffs = Staff::get();
    $staffs = Staff::with(['postings.department', 'postings.division', 'currentRank'])->get();

    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန\nစီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ\nဝန်ထမ်းအင်အားစာရင်း",
        ['bold' => true, 'size' => 14],
        ['align' => 'center']
    );

    // Add a table
    $table = $section->addTable([
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 80
    ]);

    // Add the header row
    $table->addRow();
    $table->addCell(500)->addText('စဥ်', ['bold' => true], ['align' => 'center']);
    $table->addCell(2000)->addText('အမည်/ရာထူး', ['bold' => true], ['align' => 'center']);
    $table->addCell(2000)->addText('မူလဌာန', ['bold' => true], ['align' => 'center']);
    $table->addCell(1500)->addText('ခုနှစ်မှ-ထိ', ['bold' => true], ['align' => 'center']);
    $table->addCell(2000)->addText('ပြောင်းရွေ့ဌာန', ['bold' => true], ['align' => 'center']);
    $table->addCell(1500)->addText('ခုနှစ်မှ-ထိ', ['bold' => true], ['align' => 'center']);
    $table->addCell(1500)->addText('လက်ရှိဌာနရောက်ရှိရက်စွဲ', ['bold' => true], ['align' => 'center']);
    $table->addCell(1500)->addText('မှတ်ချက်', ['bold' => true], ['align' => 'center']);
    foreach ($staffs as $index => $staff) {
        foreach ($staff->postings as $postingIndex => $posting) {
            $table->addRow();
            $table->addCell(500)->addText($index + 1); // Sequence
            $table->addCell(2000)->addText($staff->name . " / " . ($staff->currentRank?->name ?? '')); // Name / Rank
            $table->addCell(2000)->addText(($posting->department?->name ?? '') . ' (' . ($posting->division?->nick_name ?? '') . ')'); // Original Department
            $table->addCell(1500)->addText(en2mm(
                ($posting->from_date ? \Carbon\Carbon::parse($posting->from_date)->format('d-m-Y') : '')) . ' - ' .
                en2mm(($posting->to_date ? \Carbon\Carbon::parse($posting->to_date)->format('d-m-Y') : ''))
            ); // From-To Date
            $table->addCell(2000)->addText(($posting->department?->name ?? '') . ' (' . ($posting->division?->nick_name ?? '') . ')'); // Transfer Department
            $table->addCell(1500)->addText(
                en2mm(($posting->from_date ? \Carbon\Carbon::parse($posting->from_date)->format('d-m-Y') : '')) . ' - ' .
                (en2mm($posting->to_date ? \Carbon\Carbon::parse($posting->to_date)->format('d-m-Y') : ''))
            ); // Transfer Dates
            $table->addCell(1500)->addText(en2mm($posting->from_date ? \Carbon\Carbon::parse($posting->from_date)->format('d-m-Y') : '')); // Current Department Date
            $table->addCell(1500)->addText(''); // Remarks
        }
    }
    
    $fileName = 'staff_list_report_4.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $phpWord->save($tempFile, 'Word2007');

    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}


     public function render()
     {
        $staffs = Staff::when(

            $this->selectedRankId  , function($q){
                return $q->where('current_rank_id' , $this->selectedRankId) ;
            }
        )
        
        ->paginate(20);

        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $start = ($currentPage - 1) * $perPage + 1;
        return view('livewire.staff-list.staff-list4',[ 
            'staffs' => $staffs,
            'start'=>$start,
        ]);
     }
    
}
