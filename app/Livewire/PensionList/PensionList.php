<?php

namespace App\Livewire\PensionList;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class PensionList extends Component
{

    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.pension_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'pension_list_report_pdf.pdf');
    }
  
    public function go_word() {
        $staffs = Staff::get(); 
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addTitle('Pension List Report', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $headerCells = [
            'စဥ်', 'အမည်', 'တာဝန်ထမ်းဆောင်ခဲ့သည့်ရာထူး',
            'တာဝန်ထမ်းဆောင်ခဲ့သည့်ဌာနခွဲ', 'မွေးနေ့သက္ကရာဇ်',
            'စုစုပေါင်းလုပ်သက်', 'ပင်စင်အမျိုးအစား',
            'ပင်စင်ခံစားသည့် ရက်စွဲ', 'ပင်စင်လစာ',
            'ဆုငွေ', 'ထုတ်ွံယူသည့်ဘဏ်', 'ပင်စင်ရုံး၏ ခွင့်ပြုမိန့်',
            'ဆက်သွယ်ရန်လိပ်စာ/တယ်လီဖုန်းနံပါတ်'
        ];
        
        foreach ($headerCells as $cell) {
            $table->addCell(2000)->addText($cell, ['bold' => true]);
        }
    
        // Add table rows
        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            
            $postingNames = $staff->postings->pluck('rank.name')->implode(', ');
            $table->addCell(2000)->addText($postingNames);
    
            $divisionNames = $staff->postings->pluck('division.name')->implode(', ');
            $table->addCell(2000)->addText($divisionNames);
            
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')));
    
            $currentDate = \Carbon\Carbon::now();
            $rankDate = \Carbon\Carbon::parse($staff->current_rank_date);
            $diff = $rankDate->diff($currentDate);
            $duration = ($diff->y > 0 ? en2mm($diff->y) . ' နှစ် ' : '') .
                        ($diff->m > 0 ? en2mm($diff->m) . ' လ ' : '') .
                        ($diff->d > 0 ? en2mm($diff->d) . ' ရက်' : '');
            $table->addCell(2000)->addText($duration);
    
            $table->addCell(2000)->addText($staff->pension_type->name ?? '');
            $table->addCell(2000)->addText($staff->retire_date);
            $table->addCell(2000)->addText($staff->pension_salary);
            $table->addCell(2000)->addText($staff->gratuity);
            $table->addCell(2000)->addText($staff->pension_bank);
            $table->addCell(2000)->addText($staff->pension_office_order);
            $table->addCell(2000)->addText($staff->permanent_address_ward . '၊' . 
                $staff->permanent_address_street . '၊' . 
                $staff->permanent_address_township_or_town->name . '၊' . 
                $staff->permanent_address_region->name . '၊' . 
                $staff->phone);
        }
    
      
        $fileName = 'pension_list_report.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        
       
        return response()->stream(function() use ($objWriter) {
            $objWriter->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
    

     public function render()
     {
        $staffs = Staff::get();
     return view('livewire.pension-list.pension-list',[ 
             'staffs' => $staffs,
        ]);
      }
}
