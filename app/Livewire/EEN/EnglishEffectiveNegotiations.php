<?php

namespace App\Livewire\EEN;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class EnglishEffectiveNegotiations extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.english_effective_negotiations_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();
        
      
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $section->addTitle('2023 E-Learning Training Staff List', 1);
        
       
         $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 80,
        ]);

        // Add header row
        $table->addRow();
        $headers = [
            'စဥ်', 
            'အမည် (မြန်မာ/အင်္ဂလိပ်)၊Email၊ ဖုန်း', 
            'ရာထူး/ဌာန', 
            'ပညာအရည်အချင်း(ပြည်ပဘွဲ့/ဒီပလိုမာများ နိုင်ငံ/ခုနှစ် ဖော်ပြရန်)', 
            'အသက်(ရက်/လ/နှစ်)(မွေးသက္ကရာဇ်)', 
            'စုစုပေါင်းဝန်ထမ်းလုပ်သက်(ရက်၊လ၊နှစ်)', 
            'တာဝန်ယူဆောင်ရွက်နေသည့်လုပ်ငန်းနယ်ပယ်', 
            'မှတ်ချက်'
        ];
        foreach ($headers as $header) {
            $table->addCell(2000)->addText($header, ['bold' => true]);
        }

        // Add data rows
        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText("{$staff->name}, {$staff->email}, {$staff->phone}");
            $table->addCell(2000)->addText("{$staff->current_rank->name}, {$staff->current_department->name}");
            $educationText = '';
            foreach ($staff->staff_educations as $edu) {
                $educationText .= "{$edu->education_group->name} - {$edu->education_type->name}, {$edu->education->name}\n";
            }
            $table->addCell(2000)->addText($educationText);
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')));
            
            $currentDate = \Carbon\Carbon::now();
            $rankDate = \Carbon\Carbon::parse($staff->current_rank_date);
            $diff = $rankDate->diff($currentDate);
            $experience = "{$diff->y} နှစ် {$diff->m} လ {$diff->d} ရက်";
            $table->addCell(2000)->addText($experience);
            $table->addCell(2000)->addText($staff->current_division->name);
            $table->addCell(2000)->addText('');
        }

        // Save Word file to output
        $fileName = 'staff_list.docx';
        $temp_file = tempnam(sys_get_temp_dir(), 'staff_list') . '.docx';
        $phpWord->save($temp_file, 'Word2007');

        // Download the Word file
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }


    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.e-e-n.english-effective-negotiations', [
            'staffs' => $staffs,
        ]);
    }
}
