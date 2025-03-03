<?php

namespace App\Livewire\StaffList;
use App\Exports\SSL02;
use App\Models\Rank;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
class StaffList3 extends Component
{
    public $count  = 0 ;
    public $printedDate;
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
            'count' => 0 ,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_list_report_3', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_list3_report.pdf'); 
    }
    public function go_excel() 
    {
        return Excel::download(new SSL02(
    ), 'SSL02.xlsx');
    }
    public function go_word()
    { 
        $count=0;
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),    
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.46),   
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.31),  
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.3),
        ]);

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
        $phpWord->addTitleStyle(2, ['bold' => false, 'size' => 13], ['alignment' => 'center']);
        $phpWord->addTitleStyle(3, ['bold' => false, 'font'=>'Pyidaungsu Number', 'size' => 13], ['alignment' => 'right']);
        $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုးဦးစီးဌာန', 1);
        $section->addTitle('ရုံးချုပ် ဌာနခွဲများ၏အရာထမ်း၊ အမှုထမ်းများစာရင်း', 2);
        $section->addTitle(formatDMYmm(Carbon::now()), 3);

        
        $table = $section->addTable([
            'borderSize' => 6, 
            'borderColor' => '000000',
            'cellMargin' => 1
        ]);
    
        // Table header
        $table->addRow();
        $table->addCell(700)->addText('စဥ်',['bold'=>true, 'size'=>13],['alignment'=>'center','spaceBefore'=> 70]);
        $table->addCell(5000)->addText('ရာထူးအမည်',['bold'=>true, 'size'=>13],['alignment'=>'center','spaceBefore'=> 70]);
        $table->addCell(2000)->addText('ကျား',['bold'=>true, 'size'=>13],['alignment'=>'center','spaceBefore'=> 70]);
        $table->addCell(2000)->addText('မ',['bold'=>true, 'size'=>13],['alignment'=>'center','spaceBefore'=> 70]);
        $table->addCell(2000)->addText('စုစုပေါင်း',['bold'=>true, 'size'=>13],['alignment'=>'center','spaceBefore'=> 70]);
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $third_ranks = Rank::where('staff_type_id', 3)->withCount('staffs')->get();
        $all_ranks = Rank::withCount('staffs')->get();
        foreach ($first_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(700)->addText(en2mm(++$count),null,['alignment'=>'center','spaceBefore'=> 70]);
            $table->addCell(5000)->addText($rank->name,null,['alignment'=>'left','spaceBefore'=> 70]);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->count()),null,['alignment'=>'center','spaceBefore'=> 70]);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 2)->count()),null,['alignment'=>'center','spaceBefore'=> 70]);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count()),null,['alignment'=>'center','spaceBefore'=>50, 'indentation' => ['left' => 100],'lineHeight'=>0.6 ]);
        }
    
      
        $table->addRow();
        $table->addCell(700)->addText('',['bold' => true],['alignment'=>'left','spaceBefore'=>50, 'indentation' => ['left' => 100],'lineHeight'=>0.6 ]);
        $table->addCell(5000)->addText('အရာထမ်းပေါင်း', ['bold'=>true],['alignment'=>'left','spaceBefore'=> 70]);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=> 70]);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=> 70]);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=> 70]);
    
       
        foreach ($second_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(700)->addText(en2mm(++$count),null,['alignment'=>'center','spaceBefore'=> 70]);
            $table->addCell(5000)->addText($rank->name,null,['alignment'=>'left','spaceBefore'=> 70]);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->count()),null,['alignment'=>'center','spaceBefore'=> 70]);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 2)->count()),null,['alignment'=>'center','spaceBefore'=> 70]);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count()),null,['alignment'=>'center','spaceBefore'=> 70]);
        }
        $table->addRow();
        $table->addCell(700)->addText('',['alignment'=>'left','spaceBefore'=>50, 'indentation' => ['left' => 100],'lineHeight'=>0.6 ]);
        $table->addCell(5000)->addText('အမှုထမ်းပေါင်း', ['bold' => true],['alignment'=>'left','spaceBefore'=>50, 'indentation' => ['left' => 120],'lineHeight'=>0.6 ]);
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6  ]);
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6  ]);
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6  ]);
        $table->addRow();
        $table->addCell(700)->addText('',['bold' => true],['alignment'=>'left','spaceBefore'=>50, 'indentation' => ['left' => 100],'lineHeight'=>0.6 ]);
        $table->addCell(5000)->addText('ပေါင်း', ['bold' => true],['alignment'=>'left','spaceBefore'=>50, 'indentation' => ['left' => 100],'lineHeight'=>0.6 ]);
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6  ]);
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6  ]);
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6  ]);
        $table->addRow();
        $table->addCell(700)->addText('',['bold' => true],['alignment'=>'left','spaceBefore'=>50, 'indentation' => ['left' => 100],'lineHeight'=>0.6 ]);
        $table->addCell(5000)->addText('နေ့စား',['bold' => true],['alignment'=>'left','spaceBefore'=>50, 'indentation' => ['left' => 100],'lineHeight'=>0.6 ]);
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6  ]);
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6  ]);
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())), ['bold' => true],['alignment'=>'center','spaceBefore'=>50,'lineHeight'=>0.6  ]);

        $fileName = 'staff_list3_report.docx';
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    
        return response()->stream(function () use ($objWriter) {
            $objWriter->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
    public function mount(){
        
        $this->printedDate =   explode('-',Carbon::now()->format('Y-m-d'));
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


