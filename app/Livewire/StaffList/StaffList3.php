<?php

namespace App\Livewire\StaffList;

use App\Models\Rank;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class StaffList3 extends Component
{
    public function go_pdf(){
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $third_ranks = Rank::where('staff_type_id', 3)->withCount('staffs')->get();
        $all_ranks = Rank::withCount('staffs')->get();
        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'first_second_ranks' => $first_second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_list_report_3', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_list3_report.pdf'); 
    }
    public function go_word()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $section->addTitle('Staff List Report', 1);
        $table = $section->addTable([
            'borderSize' => 6, 
            'borderColor' => '000000',
            'cellMargin' => 80
        ]);
    
        // Table header
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်');
        $table->addCell(4000)->addText('ရာထူးအမည်');
        $table->addCell(2000)->addText('ကျား');
        $table->addCell(2000)->addText('မ');
        $table->addCell(2000)->addText('စုစုပေါင်း');
    
      
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $third_ranks = Rank::where('staff_type_id', 3)->withCount('staffs')->get();
        $all_ranks = Rank::withCount('staffs')->get();
    
        
        foreach ($first_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1));
            $table->addCell(4000)->addText($rank->name);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->count()));
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 2)->count()));
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count()));
        }
    
      
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(3000)->addText('စုစုပေါင်း အရာထမ်း', ['alignment' => 'right']);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())), ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())), ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())), ['bold' => true]);
    
       
        foreach ($second_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1));
            $table->addCell(4000)->addText($rank->name);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->count()));
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 2)->count()));
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count()));
        }
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('စုစုပေါင်း အမှုထမ်း', ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())), ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())), ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())), ['bold' => true]);
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(3000)->addText('စုစုပေါင်း အရာထမ်း အမှုထမ်း', ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())), ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())), ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())), ['bold' => true]);
        $table->addRow();
        $table->addCell(2000)->addText('1');
        $table->addCell(4000)->addText('နေ့စား');
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())));
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())));
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(3000)->addText('စုစုပေါင်း ဝန်ထမ်းဦးရေ', ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())), ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())), ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())), ['bold' => true]);
        $fileName = 'staff_list3_report.docx';
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    
        return response()->stream(function () use ($objWriter) {
            $objWriter->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
    

    public function render()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $third_ranks = Rank::where('staff_type_id', 3)->withCount('staffs')->get();
        $all_ranks = Rank::withCount('staffs')->get();
        return view('livewire.staff-list.staff-list3', [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'first_second_ranks' => $first_second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ]);
    }
}


