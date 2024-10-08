<?php

namespace App\Livewire\StaffList;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class StaffList5 extends Component
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
        $pdf = PDF::loadView('pdf_reports.staff_list_report_5', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_list_pdf_5.pdf');
    }
    public function go_word()
    {
      
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $third_ranks = Rank::where('staff_type_id', 3)->withCount('staffs')->get();
        $all_ranks = Rank::withCount('staffs')->get();

       
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

       
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addText('ဌာန အလိုက်ဝန်ထမ်းအင်အားစာရင်း', ['bold' => true]);
        $section->addText('၁။ စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ', ['bold' => true]);

       
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        // Table headers
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('ရာထူးအမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ကျား', ['bold' => true]);
        $table->addCell(2000)->addText('မ', ['bold' => true]);
        $table->addCell(2000)->addText('စုစုပေါင်း', ['bold' => true]);

        // Add first rank data
        foreach ($first_ranks as $index=> $rank) {
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1));
            $table->addCell(2000)->addText($rank->name);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count()));
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()));
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()));
        }

        
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('စုစုပေါင်း အရာထမ်း', ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())));
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));

        foreach ($second_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1 + $first_ranks->count())); 
            $table->addCell(2000)->addText($rank->name);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count()));
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()));
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()));
        }
    
       
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('စုစုပေါင်း အမှုထမ်း', ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())));
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
    
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('စုစုပေါင်း အရာထမ်း အမှုထမ်း', ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())));
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));

        $table->addRow();
        $table->addCell(2000)->addText('၁');
        $table->addCell(2000)->addText('နေ့စား');
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())));
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('စုစုပေါင်း ဝန်ထမ်းဦးရေ', ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())));
        $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
        $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));

        $fileName = 'staff_list.docx';
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
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $third_ranks = Rank::where('staff_type_id', 3)->withCount('staffs')->get();
        $all_ranks = Rank::withCount('staffs')->get();
        return view('livewire.staff-list.staff-list5',[
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'first_second_ranks' => $first_second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ]);
    }
}


