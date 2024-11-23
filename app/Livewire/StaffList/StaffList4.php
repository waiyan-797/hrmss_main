<?php

namespace App\Livewire\StaffList;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffList4 extends Component
{
    use WithPagination;
    public $posting;
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_list_report_4', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_list_report_pdf_4.pdf');
    }
    public function go_word()
{
    $staffs = Staff::get();
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

    // Add the data rows
    foreach ($staffs as $staff) {
        foreach ($staff->postings as $index=> $posting) {
            $table->addRow();
            $table->addCell(500)->addText($index + 1, null, ['align' => 'center']);
            $table->addCell(2000)->addText($staff->name . '၊ ' . ($staff->rank ? $staff->rank->name : ''), null, ['align' => 'left']);
            $table->addCell(2000)->addText($posting->department->name ?? '', null, ['align' => 'left']);
            $table->addCell(1500)->addText($posting->from_date . ' - ' . $posting->to_date, null, ['align' => 'center']);
            $table->addCell(2000)->addText($staff->side_department->name ?? '', null, ['align' => 'left']);
            $table->addCell(1500)->addText(\Carbon\Carbon::parse($posting->to_date)->format('d-m-Y') . ' - ' . \Carbon\Carbon::now()->format('d-m-Y'), null, ['align' => 'center']);
            $table->addCell(1500)->addText(en2mm(\Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()->from_date)->format('d-m-y')), null, ['align' => 'center']);
            $table->addCell(1500)->addText('', null, ['align' => 'center']);  
        }
    }

    $fileName = 'staff_list_report_4.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $phpWord->save($tempFile, 'Word2007');

    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}

     public function render()
     {
        $staffs = Staff::paginate(20);

        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $start = ($currentPage - 1) * $perPage + 1;
        return view('livewire.staff-list.staff-list4',[ 
            'staffs' => $staffs,
            'start'=>$start,
        ]);
     }
    
}
