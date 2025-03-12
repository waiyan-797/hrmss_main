<?php

namespace App\Livewire\StaffList;

use App\Models\Promotion;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

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
        $first_promotion_points = $this->calc_points(dateDiff($first_promotion->promotion_date, $today));
        $second_promotion_points = $second_promotion ? $this->calc_points(dateDiff($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) : 0;
        $third_promotion_points = $third_promotion ? $this->calc_points(dateDiff($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) : 0;
        $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) : 0;
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
        $section = $phpWord->addSection(['orientation'=>'landscape', 'margin'=>600]);
        $section->addTitle('Staff List Report', 1);
    
        // Create table with border and margins
        $table = $section->addTable([
            'borderSize' => 6,
            'cellMargin' => 80,
        ]);
        $staff = Staff::where('id', $this->staff_id)->first();

    
        
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('အမည်/ရာထူး/ဌာန', ['bold' => true]);
        $table->addCell(2000)->addText('လက်ရှိရာထူး', ['bold' => true]);
        $table->addCell(2000)->addText('တစ်ဆင့်နိမ့်ရာထူး ၁', ['bold' => true]);
        $table->addCell(2000)->addText('တစ်ဆင့်နိမ့်ရာထူး ၂', ['bold' => true]);
        $table->addCell(2000)->addText('တစ်ဆင့်နိမ့်ရာထူး ၃', ['bold' => true]);
        $table->addCell(2000)->addText('စူစုပေါင်း', ['bold' => true]);
    
        
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('၁', ['alignment' => 'center']);
        $table->addCell(2000)->addText('၂', ['alignment' => 'center']);
        $table->addCell(2000)->addText('၃', ['alignment' => 'center']);
        $table->addCell(2000)->addText('၄', ['alignment' => 'center']);
        $table->addCell(2000)->addText('၇', ['alignment' => 'center']);

        $first_promotion = $this->promotion_stages($staff->current_rank_id);
        $second_promotion = $first_promotion ? $this->promotion_stages($first_promotion->previous_rank_id) : null;
        $third_promotion = $second_promotion ? $this->promotion_stages($second_promotion->previous_rank_id) : null;
        $fourth_promotion = $third_promotion ? $this->promotion_stages($third_promotion->previous_rank_id) : null;
            $today = \Carbon\Carbon::now();
            $first_promotion_points = $this->calc_points(dateDiff($first_promotion?->promotion_date, $today));
            $second_promotion_points = $second_promotion ? $this->calc_points(dateDiff($second_promotion?->promotion_date, \Carbon\Carbon::parse($first_promotion?->promotion_date)->subDay())) : 0;
            $third_promotion_points = $third_promotion ? $this->calc_points(dateDiff($third_promotion?->promotion_date, \Carbon\Carbon::parse($second_promotion?->promotion_date)->subDay())) : 0;
            // $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($fourth_promotion?->promotion_date, \Carbon\Carbon::parse($third_promotion?->promotion_date)->subDay())) : 0;
            $third_promotion_date = $third_promotion ? \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay() : \Carbon\Carbon::parse($staff->government_staff_started_date)->subDay();
            $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($staff->government_staff_started_date, $third_promotion_date)) : 0;
            $total_points = $first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points;
    
            // Add row data
            $table->addRow();
            $table->addCell(2000)->addText(1); // Serial number
            $table->addCell(4000)->addText($staff->name); // Name, Rank, Department
            $table->addCell(2000)->addText( $first_promotion ? $first_promotion->rank->name : ''); // Current Rank
            $table->addCell(2000)->addText($second_promotion ? $second_promotion->rank->name : ''); // First Promotion Rank
            
            $table->addCell(2000)->addText($third_promotion ? $third_promotion->rank->name : ''); // Third Promotion Rank
            $table->addCell(2000)->addText($fourth_promotion ? $fourth_promotion->rank->name : ''); // Total Points
            $table->addCell(2000)->addText('');

            $table->addRow();
            $table->addCell(2000)->addText(''); // Serial number
            $table->addCell(4000)->addText( $staff->currentRank->name ); // Name, Rank, Department
            $table->addCell(2000)->addText( $first_promotion ? en2mm(formatDMYmm($first_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm($today)) .' ထိ ' : '' ); // Current Rank
            $table->addCell(2000)->addText($second_promotion ? en2mm(formatDMYmm($second_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm(\Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) .' ထိ ' : ''  ); // First Promotion Rank
            $table->addCell(2000)->addText( $third_promotion ? en2mm(formatDMYmm($third_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm(\Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) .' ထိ ' : ''  ); // Second Promotion Rank
            $table->addCell(2000)->addText(  $fourth_promotion ? en2mm(formatDMYmm($fourth_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm(\Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) .' ထိ ' : ''); // Third Promotion Rank
            $table->addCell(2000)->addText(''); 
            $table->addRow();
            $table->addCell(2000)->addText(''); // Serial number
            $table->addCell(4000)->addText( $staff->current_department->name); // Name, Rank, Department
            $table->addCell(2000)->addText( $first_promotion ? dateDiffYMD($first_promotion->promotion_date, $today) : ''  ); // Current Rank
            $table->addCell(2000)->addText($second_promotion ? dateDiffYMD($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay()) : ''  ); // First Promotion Rank
            $table->addCell(2000)->addText(  $third_promotion ? dateDiffYMD($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay()) : ''   ); // Second Promotion Rank
            $table->addCell(2000)->addText(  $fourth_promotion ? dateDiffYMD($staff->government_staff_started_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay()) : ''); // Third Promotion Rank
            $table->addCell(2000)->addText(''); 
            


            // <tr>
            //             <td class="border border-black text-center p-2"></td>
            //             <td class="border border-black text-center p-2"></td>
            //             <td class="border border-black text-center p-2">{{ en2mm($first_promotion_points * 3) }}</td>
            //             <td class="border border-black text-center p-2">{{ en2mm($second_promotion_points*2) }}</td>
            //             <td class="border border-black text-center p-2">{{ en2mm($third_promotion_points*1) }}</td>
            //             <td class="border border-black text-center p-2">{{ en2mm($fourth_promotion_points*0.5) }}</td>
            //             <td class="border border-black text-center p-2">{{ en2mm($total_points) }}</td>
            //         </tr>


            $table->addRow();
            $table->addCell(2000)->addText(''); // Serial number
            $table->addCell(2000)->addText(''); // Serial number
            $table->addCell(4000)->addText( en2mm($first_promotion_points * 3) ); // Name, Rank, Department
            $table->addCell(2000)->addText( en2mm($second_promotion_points*2) ); // Current Rank
           

            $table->addCell(4000)->addText( en2mm($third_promotion_points*1)); // Name, Rank, Department
            $table->addCell(2000)->addText( en2mm($fourth_promotion_points*0.5) ); // Current Rank
            $table->addCell(2000)->addText( en2mm($total_points) ); // Current Rank
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

    // private function calc_points($diff){
    //     $points = 0;
    //     $diff->y > 0 ? $points = $diff->y + $points : '';
    //     $diff->m >= 6 ? $points++ : '';
    //     return $points;
    // }
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
        // $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) : 0;
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
