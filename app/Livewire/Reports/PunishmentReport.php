<?php

namespace App\Livewire\Reports;

use App\Models\Punishment;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class PunishmentReport extends Component
{

    public $search = ''; 
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.punishment_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'punishment_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();

        
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        
        $section->addTitle('Punishment Report', 1);

       
        $table = $section->addTable([
            'borderSize' => 6, 
            'borderColor' => '000000',
            'cellMargin' => 80
        ]);
        

       
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်');
        $table->addCell(4000)->addText('အမည်');
        $table->addCell(4000)->addText('ရာထူး');
        $table->addCell(4000)->addText('txtpenalty');

        // Add table data
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(4000)->addText($staff->name);
            $table->addCell(4000)->addText($staff->current_rank->name);
            $table->addCell(4000)->addText(implode(', ', $staff->punishments->pluck('penalty_type.name')->toArray()));
        }

        // Save the file
        $filePath = 'punishment_report.docx';
        $phpWord->save($filePath, 'Word2007');

        // Return the file as a download response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

public function render()
{
    $staffs = Staff::where('name', 'like', '%' . $this->search . '%')->paginate(2);

        $currentPage = $staffs->currentPage();
        $perPage = $staffs->perPage();
        $startIndex = ($currentPage - 1) * $perPage + 1;


    return view('livewire.reports.punishment-report',[ 
        'staffs' => $staffs,
        'startIndex' => $startIndex,
    ]);
}
    
   

}
