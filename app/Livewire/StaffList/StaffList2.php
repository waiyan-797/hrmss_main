<?php

namespace App\Livewire\StaffList;

use App\Models\Promotion;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;

class StaffList2 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }

    public function go_pdf(){
        $staffs = Staff::get();
        $today = \Carbon\Carbon::now();
        $staff = Staff::where('id', $this->staff_id)->first();
        $promotions = Promotion::where('staff_id', $this->staff_id)->get();
        $first_promotion = $this->promotion_stages($staff->current_rank_id);
        $second_promotion = $first_promotion ? $this->promotion_stages($first_promotion->previous_rank_id) : null;
        $third_promotion = $second_promotion ? $this->promotion_stages($second_promotion->previous_rank_id) : null;
        $fourth_promotion = $third_promotion ? $this->promotion_stages($third_promotion->previous_rank_id) : null;

        //calc points
        $first_promotion_points = $this->calc_points(dateDiff($first_promotion?->promotion_date, $today));
        $second_promotion_points = $second_promotion ? $this->calc_points(dateDiff($second_promotion?->promotion_date, \Carbon\Carbon::parse($first_promotion?->promotion_date)->subDay())) : 0;
        $third_promotion_points = $third_promotion ? $this->calc_points(dateDiff($third_promotion?->promotion_date, \Carbon\Carbon::parse($second_promotion?->promotion_date)->subDay())) : 0;
        $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($staff->government_staff_started_date, \Carbon\Carbon::parse($third_promotion?->promotion_date)->subDay())) : 0;
        $total_points = $first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points;
        $data = [
            'staffs' => $staffs,
            'promotions' => $promotions,
            'today' => $today,
            'first_promotion' => $first_promotion,
            'second_promotion' => $second_promotion,
            'third_promotion' => $third_promotion,
            'fourth_promotion' => $fourth_promotion,
            'first_promotion_points' => $first_promotion_points,
            'second_promotion_points' => $second_promotion_points,
            'third_promotion_points' => $third_promotion_points,
            'fourth_promotion_points' => $fourth_promotion_points,
            'total_points' => $total_points, 
            'staff' => $staff
        ];
        $pdf = PDF::loadView('pdf_reports.staff_list_report_2', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_list_report_pdf_2.pdf');
    }
    public function go_word()
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation'=>'portrait',
            'marginTop' => 446,
            'marginBottom' => 720,
            'marginLeft' => 500,
            'marginRight' => 500,
            'gutter' => 0,
            'gutterPos' => 'left',
        ]);

        $section->addText('ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန',['bold' => true, 'size' => 13], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $section->addText('ရင်းနှီးမြှုပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန',['bold' => true, 'size' => 13], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $section->addText('ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန',['bold' => true, 'size' => 13], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
    
        $table = $section->addTable([
            'borderSize' => 6,
            'cellMargin' => 80,
        ]);

        $table->addRow();
        $table->addCell(800, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true,'size'=>12],['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('အမည်/ရာထူး/ဌာန', ['bold' => true,'size'=>12],['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText('လက်ရှိရာထူး', ['bold' => true,'size'=>12],['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText('တစ်ဆင့်နိမ့်ရာထူး ၁', ['bold' => true,'size'=>12],['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText('တစ်ဆင့်နိမ့်ရာထူး ၂', ['bold' => true,'size'=>12],['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText('တစ်ဆင့်နိမ့်ရာထူး ၃', ['bold' => true,'size'=>12],['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(1800)->addText('စုစုပေါင်း', ['bold' => true,'size'=>12],['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
    
        $table->addRow();
        $table->addCell(800, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2200)->addText('၁', ['bold'=>true],['alignment'=>Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText('၂', ['bold'=>true],['alignment'=>Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText('၃', ['bold'=>true],['alignment'=>Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText('၄', ['bold'=>true],['alignment'=>Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(1800)->addText('၇', ['bold'=>true],['alignment'=>Jc::CENTER, 'spaceAfter' => 0]);

        $staff = Staff::where('id', $this->staff_id)->first();
        $first_promotion = $this->promotion_stages($staff->current_rank_id);
        $second_promotion = $first_promotion ? $this->promotion_stages($first_promotion->previous_rank_id) : null;
        $third_promotion = $second_promotion ? $this->promotion_stages($second_promotion->previous_rank_id) : null;
        $fourth_promotion = $third_promotion ? $this->promotion_stages($third_promotion->previous_rank_id) : null;
        $today = \Carbon\Carbon::now();
        $first_promotion_points = $this->calc_points(dateDiff($first_promotion?->promotion_date, $today));
        $second_promotion_points = $second_promotion ? $this->calc_points(dateDiff($second_promotion?->promotion_date, \Carbon\Carbon::parse($first_promotion?->promotion_date)->subDay())) : 0;
        $third_promotion_points = $third_promotion ? $this->calc_points(dateDiff($third_promotion?->promotion_date, \Carbon\Carbon::parse($second_promotion?->promotion_date)->subDay())) : 0;
        $third_promotion_date = $third_promotion ? \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay() : \Carbon\Carbon::parse($staff->government_staff_started_date)->subDay();
        $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($staff->government_staff_started_date, $third_promotion_date)) : 0;
        $total_points = $first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points;

        // Add data row with styling
        $table->addRow();
        $table->addCell(800)->addText(en2mm(1),['size' => 12],['alignment' => Jc::CENTER,'spaceAfter'=>0],); // Serial number
        
        // Add staff information in a single cell with styling
        $staffCell = $table->addCell(4000);
        $staffCell->addText($staff->name, ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0, 'lineSpacing' => 1.15]);
        $staffCell->addText($staff->currentRank->name, ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0, 'lineSpacing' => 1.15]);
        $staffCell->addText($staff->current_department->name, ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0, 'lineSpacing' => 1.15]);
        
        // Current Rank with styling
        $cell = $table->addCell(2200);
        if ($first_promotion) {
            $cell->addText($first_promotion->rank->name, ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
        }

        // First Previous Rank with styling
        $cell = $table->addCell(2200);
        if ($second_promotion) {
            $cell->addText($second_promotion->rank->name,['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
        }

        // Second Previous Rank with styling
        $cell = $table->addCell(2200);
        if ($third_promotion) {
            $cell->addText($third_promotion->rank->name, ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
        }

        // Third Previous Rank with styling
        $cell = $table->addCell(2200);
        if ($fourth_promotion) {
            $cell->addText($fourth_promotion->rank->name, ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
        }

        // Total Points column
        $table->addCell(1800)->addText('', [], ['spaceAfter' => 0]);

        // Date ranges and duration row
        $table->addRow();
        $table->addCell(800)->addText('', [], ['spaceAfter' => 0]);
        $table->addCell(4000)->addText('', [], ['spaceAfter' => 0]);
        
        // Current Rank dates and duration
        $cell = $table->addCell(2200);
        if ($first_promotion) {
            $cell->addText(en2mm(formatDMYmm($first_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm($today)) .' ထိ ', ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
            $cell->addText(dateDiffYMD($first_promotion->promotion_date, $today), ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
        }

        // First Previous Rank dates and duration
        $cell = $table->addCell(2200);
        if ($second_promotion) {
            $cell->addText(en2mm(formatDMYmm($second_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm(\Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) .' ထိ ', ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
            $cell->addText(dateDiffYMD($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay()), ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
        }

        // Second Previous Rank dates and duration
        $cell = $table->addCell(2200);
        if ($third_promotion) {
            $cell->addText(en2mm(formatDMYmm($third_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm(\Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) .' ထိ ', ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
            $cell->addText(dateDiffYMD($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay()), ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
        }

        // Third Previous Rank dates and duration
        $cell = $table->addCell(2200);
        if ($fourth_promotion) {
            $cell->addText(en2mm(formatDMYmm($staff->government_staff_started_date)) .' မှ '. en2mm(formatDMYmm(\Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) .' ထိ ', ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
            $cell->addText(dateDiffYMD($staff->government_staff_started_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay()), ['size' => 12], ['alignment' => Jc::LEFT, 'spaceAfter' => 0]);
        }

        // Empty cell for total
        $table->addCell(1800)->addText('', [], ['spaceAfter' => 0]);

        // Points row with styling
        $table->addRow();
        $table->addCell(800)->addText('', [], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2000)->addText('ပေါင်း', ['bold'=>true, 'size' => 12], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText(en2mm($first_promotion_points * 3), ['bold' => true, 'size' => 12], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText(en2mm($second_promotion_points*2), ['bold' => true, 'size' => 12], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText(en2mm($third_promotion_points*1), ['bold' => true, 'size' => 12], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(2200)->addText(en2mm($fourth_promotion_points*0.5), ['bold' => true, 'size' => 12], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $table->addCell(1800)->addText(en2mm($total_points), ['bold' => true, 'size' => 12], ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        // Save Word file
        $fileName = 'staff_list_report.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath, 'Word2007');
    
        // Download the file
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    

    private function promotion_stages($rank_id){
        return Promotion::where('rank_id', $rank_id)->where('staff_id', $this->staff_id)->first();
    }

    private function calc_points($diff) {
        $points = 0;
    
     
        if ($diff->y > 0) {
            $points += $diff->y;
        }
        if ($diff->m >= 6) {
            $points++;
        }
    
        return $points;
    }
    

    public function render()
    {
        $today = \Carbon\Carbon::now();
        $staff = Staff::where('id', $this->staff_id)->first();
        $promotions = Promotion::where('staff_id', $this->staff_id)->get();
        $first_promotion = $this->promotion_stages($staff->current_rank_id);
        $second_promotion = $first_promotion ? $this->promotion_stages($first_promotion->previous_rank_id) : null;
        $third_promotion = $second_promotion ? $this->promotion_stages($second_promotion->previous_rank_id) : null;
        $fourth_promotion = $third_promotion ? $this->promotion_stages($third_promotion->previous_rank_id) : null;

        //calc points
        $first_promotion_points = $this->calc_points(dateDiff($first_promotion?->promotion_date, $today));
        $second_promotion_points = $second_promotion ? $this->calc_points(dateDiff($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) : 0;
        $third_promotion_points = $third_promotion ? $this->calc_points(dateDiff($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) : 0;
        $third_promotion_date = $third_promotion ? \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay() : \Carbon\Carbon::parse($staff->government_staff_started_date)->subDay();
        $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($staff->government_staff_started_date, $third_promotion_date)) : 0;

        $total_points = $first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points;

        return view('livewire.staff-list.staff-list2',[
            'staff' => $staff,
            'promotions' => $promotions,
            'today' => $today,
            'first_promotion' => $first_promotion,
            'second_promotion' => $second_promotion,
            'third_promotion' => $third_promotion,
            'fourth_promotion' => $fourth_promotion,
            'first_promotion_points' => $first_promotion_points,
            'second_promotion_points' => $second_promotion_points,
            'third_promotion_points' => $third_promotion_points,
            'fourth_promotion_points' => $fourth_promotion_points,
            'total_points' => $total_points,
        ]);
    }

}
