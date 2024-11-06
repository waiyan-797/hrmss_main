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
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_list_report_2', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_list_report_pdf_2.pdf');
    }
    public function go_word()
    {

        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $section->addTitle('Staff List Report', 1);

        // Create a table
        $table = $section->addTable([
            'borderSize' => 6,
            'cellMargin' => 80,
        ]);

        // Define table header
        $table->addRow();
        $table->addCell(2000,['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(4000,['vMerge' => 'restart'])->addText('အမည်/ရာထူး/ဌာန', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('လက်ရှိရာထူး', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('တစ်ဆင့်နိမ့်ရာထူး', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('တစ်ဆင့်နိမ့်ရာထူး', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('တစ်ဆင့်နိမ့်ရာထူး', ['bold' => true]);
        $table->addCell(2000,['vMerge' => 'restart'])->addText('စူစုပေါင်း', ['bold' => true]);

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(3000)->addText('၁', ['alignment' => 'center']);
        $table->addCell(3000)->addText('၂', ['alignment' => 'center']);
        $table->addCell(3000)->addText('၃', ['alignment' => 'center']);
        $table->addCell(3000)->addText('၄', ['alignment' => 'center']);
        $table->addCell(3000)->addText('၇', ['alignment' => 'center']);


        $staffs = Staff::all();
        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(4000)->addText("{$staff->name}၊ {$staff->current_rank->name}၊ {$staff->side_department->name}");
            $table->addCell(2000)->addText($staff->current_rank->name);
            $table->addCell(2000)->addText('');
            $table->addCell(2000)->addText('');
            $table->addCell(2000)->addText('');
            $table->addCell(2000)->addText('');
        }

        $fileName = 'staff_list_report.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath, 'Word2007');


        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    private function promotion_stages($rank_id){
        return Promotion::where('rank_id', $rank_id)->where('staff_id', $this->staff_id)->first();
    }

    private function calc_points($diff){
        $points = 0;
        $diff->y > 0 ? $points = $diff->y + $points : '';
        $diff->m >= 6 ? $points++ : '';
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
        $first_promotion_points = $this->calc_points(dateDiff($first_promotion->promotion_date, $today));
        $second_promotion_points = $second_promotion ? $this->calc_points(dateDiff($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) : 0;
        $third_promotion_points = $third_promotion ? $this->calc_points(dateDiff($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) : 0;
        $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) : 0;
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

