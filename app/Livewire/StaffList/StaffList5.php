<?php

namespace App\Livewire\StaffList;
use App\Models\Division;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Carbon\Carbon;

class StaffList5 extends Component
{
    public $divisions , $selectedDivisionId;
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
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
<<<<<<< HEAD
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.23),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.51),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
=======
            // 'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.23),
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.6), 
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), 
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.51), 
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), 
>>>>>>> hrmsrp/main
        ]);

        
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center', 'lineHeight' => 1 ]);
        $phpWord->addTitleStyle(3,['bold' => false, 'font' => 'Pyidaungsu Number', 'size' => 13],['alignment' => 'right', 'indentation' => ['left' => 960, 'right' => 143]]);
            $division = getDivisionBy($this->selectedDivisionId);
        // $section->addTitle(($division ? $division->name : 'Unknown Division')."\n".'ကျားမအင်အားစာရင်း', 2);
        $section->addTitle(($division ? $division->name : 'Unknown Division'), 2);
        $section->addTitle('ကျားမအင်အားစာရင်း', 2);
        // $section->addTitle(formatDMYmm(Carbon::now()), 3);
       
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 5]);

        $section->addTitle(formatDMYmm(Carbon::now()), 3);

       
        $table = $section->addTable([
            'borderSize' => 6, 
            'borderColor' => '000000',
            'cellMargin' => 5
        ]);
        // Table headers
<<<<<<< HEAD
        $table->addRow();
=======
        $table->addRow(50, ['tblHeader' => true]);
>>>>>>> hrmsrp/main
        $table->addCell(700, ['valign' => 'top'])->addText('စဥ်',['bold' => true],['alignment' => 'center', 'spaceBefore' => 0, 'lineHeight' => 1]);
        $table->addCell(3000,['valign' => 'top'])->addText('ရာထူးအမည်', ['bold' => true],['alignment'=>'center','spaceBefore'=>0,'lineHeight' => 1]);
        $table->addCell(2000,['valign' => 'top'])->addText('ကျား', ['bold' => true],['alignment'=>'center','spaceBefore'=>0,'lineHeight' => 1]);
        $table->addCell(2000,['valign' => 'top'])->addText('မ', ['bold' => true],['alignment'=>'center','spaceBefore'=>0,'lineHeight' => 1]);
        $table->addCell(2000,['valign' => 'top'])->addText('စုစုပေါင်း', ['bold' => true],['alignment'=>'center','spaceBefore'=>0,'lineHeight' => 1]);

        // Add first rank data
        foreach ($first_ranks as $index=> $rank) {
            $table->addRow();
            $table->addCell(700, ['valign' => 'top'])->addText(en2mm($index + 1),null,['alignment'=>'center','spaceBefore'=>0,'lineHeight' => 1]);
            $table->addCell(3000, ['valign' => 'top'])->addText($rank->name,null,['indentation' => ['left' => 100],'alignment'=>'left','spaceBefore'=>0,'lineHeight' => 1]);
            $table->addCell(2000, ['valign' => 'top'])->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count()),null,['alignment'=>'center','spaceBefore'=>0,'lineHeight' => 1]);
            $table->addCell(2000, ['valign' => 'top'])->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()),null,['alignment'=>'center','spaceBefore'=>0,'lineHeight' => 1]);
            $table->addCell(2000, ['valign' => 'top'])->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()),null,['alignment'=>'center','spaceBefore'=>0,'lineHeight' => 1]);
        }

        
        // $table->addRow();
        // $table->addCell(700)->addText('');
        // $table->addCell(3500)->addText('စုစုပေါင်း အရာထမ်း', ['bold' => true]);
        // $table->addCell(1500)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())));
        // $table->addCell(1500)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
        // $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));

        foreach ($second_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(700)->addText(en2mm($index + 1 + $first_ranks->count()),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]); 
            $table->addCell(3500)->addText($rank->name,null,['indentation' => ['left' => 100],'alignment'=>'left', 'spaceBefore'=>50,'lineHeight' => 1]);
            $table->addCell(1500)->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count()),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
            $table->addCell(1500)->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
        }
    
       
        // $table->addRow();
        // $table->addCell(700)->addText('');
        // $table->addCell(3500)->addText('စုစုပေါင်း အမှုထမ်း', ['bold' => true]);
        // $table->addCell(1500)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())));
        // $table->addCell(1500)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
        // $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
    
        $table->addRow();
        $table->addCell(700)->addText('');
        $table->addCell(3500)->addText('စုစုပေါင်း', ['bold' => true],['indentation' => ['left' => 100],'alignment'=>'left', 'spaceBefore'=>50,'lineHeight' => 1]);
        $table->addCell(1500)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
        $table->addCell(1500)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
        $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);

        $table->addRow();
        $table->addCell(700)->addText('');
        $table->addCell(3500)->addText('နေ့စား',null,['indentation' => ['left' => 100],'alignment'=>'left','spaceBefore'=>50,'lineHeight' => 1]);
        $table->addCell(1500)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
        $table->addCell(1500)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())),null,['alignment'=>'center','spaceBefore'=>50,'lineHeight' => 1]);
        // $table->addRow();
        // $table->addCell(700)->addText('');
        // $table->addCell(3000)->addText('စုစုပေါင်း ဝန်ထမ်းဦးရေ', ['bold' => true]);
        // $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())));
        // $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));
        // $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())));

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
    public function mount(){
        $this->divisions = Division::all();
         $this->selectedDivisionId = getFirstOf('Division')->id;
}

}
