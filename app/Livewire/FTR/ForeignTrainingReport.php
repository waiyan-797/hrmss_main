<?php

namespace App\Livewire\FTR;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class ForeignTrainingReport extends Component
{
    public $staffs, $nameSearch;
    public  $ranks;
    public function go_pdf()
    {

        $staffQuery  = Staff::query();
        if ($this->nameSearch) {
            $staffQuery->where('name', 'like', '%' . $this->nameSearch . '%');
        }
        $this->staffs = $staffQuery->get();
        $data = [
            'staffs' => $this->staffs,
        ];

        $pdf = PDF::loadView('pdf_reports.foreign_training_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'foreign_training_report_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $section->addTitle('Foreign Training Report', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အမည်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ရာထူး', ['bold' => true]);
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သွားရောက်သည့်ကာလ');
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('သွားရောက်သည့်နိုင်ငံ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ထောက်ပံ့သည့်အဖွဲ့အစည်း', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('မှတ်ချက်', ['bold' => true]);

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(3000)->addText('မှ', ['alignment' => 'center']);
        $table->addCell(3000)->addText('ထိ', ['alignment' => 'center']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        foreach ($staffs as $index => $staff) {
            foreach ($staff->abroads as $key => $abroad) {

                $table->addRow();

                if ($key == 0) {
                    $table->addCell(2000)->addText($index);
                    $table->addCell(2000)->addText($staff->name);

                    $table->addCell(2000)->addText($staff->current_rank->name);
                } else {
                    $table->addCell(2000);
                    $table->addCell(2000);
                    $table->addCell(2000);
                }
                $table->addCell(2000)->addText($abroad->from_date);
                $table->addCell(2000)->addText($abroad->to_date);
                $table->addCell(2000)->addText($abroad->country->name);
                $table->addCell(2000)->addText($abroad->particular);
                $table->addCell(2000)->addText($abroad->sponser);
                $table->addCell(2000)->addText('');
            }
        }
        $fileName = 'foreign_training_report.docx';
        $filePath = storage_path('app/' . $fileName);
        $phpWord->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function render()
    {
        // $staffQuery  = Staff::query();
        // if ($this->nameSearch) {
        //     $staffQuery->where('name', 'like', '%' . $this->nameSearch . '%');
        // }
        // $this->staffs = $staffQuery->get();
        $query = Staff::query();
        if (!empty($this->selectedRankId)) {
            $query->where('current_rank_id', $this->selectedRankId);
        }
        $this->staffs = $query->with('currentRank')->get();
        $selectedRankName = null;
        if (!empty($this->selectedRankId)) {
            $selectedRankName = Rank::find($this->selectedRankId)?->name ?? 'ရာထူးအားလုံး';
        }

// 'ranks' => $this->ranks,
//         'age' => $this->age,
//         'signID' => $this->signID,
//         'selectedRankName' => $selectedRankName, 
        return view('livewire.f-t-r.foreign-training-report', [
            'staffs' => $this->staffs,
            'ranks'=>$this->ranks,
            'selectedRankName'=>$selectedRankName,
        ]);
    }
}
