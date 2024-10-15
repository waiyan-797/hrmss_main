<?php

namespace App\Livewire\LocalTrainingReport;

use App\Models\Staff;
use App\Models\Training;
use App\Models\TrainingType;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;


class LocalTrainingReport extends Component
{
    public $trainingLocation;

    public $nameSearch, $staffs;
    public function go_pdf()
    {

        $data = [
            'staffs' => $this->staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.local_training_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'local_training_report_pdf.pdf');
    }
    public function go_word()
    {

        $staffs = Staff::get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 50,
        ];
        $firstRowStyle = ['bgColor' => 'f2f2f2'];
        $cellStyle = ['valign' => 'center'];
        $phpWord->addTableStyle('TrainingTable', $tableStyle, $firstRowStyle);









        $table = $section->addTable('TrainingTable');


        $table->addRow();
        $table->addCell(1000, $cellStyle)->addText('စဥ်');
        $table->addCell(2000, $cellStyle)->addText('အမည်');
        $table->addCell(2000, $cellStyle)->addText('ရာထူး');
        $table->addCell(2000, $cellStyle)->addText('သင်တန်းအမည်');
        $table->addCell(2000, $cellStyle)->addText('သင်တန်းကာလ(မှ)');
        $table->addCell(2000, $cellStyle)->addText('သင်တန်းကာလ(အထိ)');
        $table->addCell(2000, $cellStyle)->addText('သင်တန်းနေရာ/ဒေသ');
        $table->addCell(2000, $cellStyle)->addText('သင်တန်းအမျိုးအစား');


        foreach ($staffs as $index => $staff) {
            foreach ($staff->trainings->where('training_location_id', $this->trainingLocation) as $training) {

                $table->addRow();
                $table->addCell(1000, $cellStyle)->addText($index + 1);
                $table->addCell(2000, $cellStyle)->addText($staff->name);
                $table->addCell(2000, $cellStyle)->addText($staff->current_rank->name);
                $table->addCell(2000, $cellStyle)->addText($training->training_type->name);
                $table->addCell(2000, $cellStyle)->addText($training->from_date);
                $table->addCell(2000, $cellStyle)->addText($training->to_date);
                $table->addCell(2000, $cellStyle)->addText($training->location);
                $table->addCell(2000, $cellStyle)->addText($training->training_location?->name);
            }
        }


        $fileName = 'local_training_report.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);


        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);


        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function render()
    {

        $staffQuery  = Staff::query();
        if ($this->nameSearch) {
            $staffQuery->where('name', 'like', '%' . $this->nameSearch . '%');
        }

        $this->staffs = $staffQuery->get();
        return view('livewire.local-training-report.local-training-report', [
            'staffs' => $this->staffs,
        ]);
    }
}
