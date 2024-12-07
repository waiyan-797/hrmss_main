<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies9 extends Component
{

    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_9', $data,[],[
            'format'=>'A4-L',
            'orientation'=>'L'
        ]);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_report_pdf_9.pdf');
    }
    public function go_word()
{
    $staffs = Staff::get(); 
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 200]); 
    $section->addText('၂၀၂၄-၂၀၂၅ ဘဏ္ဍာရေးနှစ်အတွင်း ဝန်ထမ်းအဖြစ်မှ ထုတ်ပစ်ခံရသော ဝန်ထမ်းများစာရင်း', ['bold' => true, 'size' => 14], ['alignment' => 'center']);
    $section->addText('ဝန်ထမ်းအဖွဲ့အစည်းအမည်၊ရင်းနှီးမြှုပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true, 'size' => 14]);
    $table = $section->addTable([
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 80,
    ]);
    $table->addRow();
    $table->addCell(1000)->addText('စဥ်', ['bold'=>true],['align'=>'center']);
    $table->addCell(3000)->addText('အမည်နှင့်အမျိုးသားမှတ်ပုံတင်အမှတ်' , ['bold'=>true],['align'=>'center']);
    $table->addCell(2000)->addText('မွေးနေ့သက္ကရာဇာ်' , ['bold'=>true],['align'=>'center']);
    $table->addCell(3000)->addText('(က)ရာထူး (ခ) လစာနှုန်း (ဂ)နောက်ဆုံးထုတ်လစာ' , ['bold'=>true],['align'=>'center']);
    $table->addCell(2000)->addText('စတင်အမှုထမ်းသည့်နေ့' , ['bold'=>true],['align'=>'center']);
    $table->addCell(2000)->addText('စတင်ကင်းကွာ/ပျက်ကွက်သည့်နေ့' , ['bold'=>true],['align'=>'center']);
    $table->addCell(3000)->addText('ဝန်ထမ်းအဖြစ်မှထုတ်ပစ်/ရာထူးမှထုတ်ပယ်သည့်နေ့အမိန့်စာရက်စွဲ' , ['bold'=>true],['align'=>'center']);
    $table->addCell(2000)->addText('လုပ်သက်' , ['bold'=>true],['align'=>'center']);
    $table->addCell(3000)->addText('ထုတ်ပယ်ခံရသည့်အကြောင်းအရင်း' ,['bold'=>true],['align'=>'center']);
    $table->addCell(2000)->addText('မှတ်ချက်' , ['bold'=>true],['align'=>'center']);
    
    $table->addRow();
    $table->addCell(1000)->addText('(က)');
    $table->addCell(3000)->addText('(ခ)');
    $table->addCell(2000)->addText('(ဂ)');
    $table->addCell(3000)->addText('(ဃ)');
    $table->addCell(2000)->addText('(င)');
    $table->addCell(2000)->addText('(စ)');
    $table->addCell(3000)->addText('(ဆ)');
    $table->addCell(2000)->addText('(ဇ)');
    $table->addCell(3000)->addText('(ဈ)');
    $table->addCell(2000)->addText('(ည)');
    foreach ($staffs as $index => $staff) {
        $table->addRow();
        $table->addCell(1000)->addText(en2mm($index + 1));
        $table->addCell(3000)->addText($staff->name . '၊ ' . $staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);
        $table->addCell(2000)->addText(\Carbon\Carbon::parse($staff->dob)->format('d-m-Y'));
        $table->addCell(3000)->addText($staff->current_rank?->name . '၊ ' . $staff->payscale?->name . '၊ ' . $staff->current_salary);

        $table->addCell(2000)->addText(\Carbon\Carbon::parse($staff->join_date)->format('d-m-Y'));
        $table->addCell(2000)->addText($staff->lost_contact_from_date);
        $table->addCell(3000)->addText($staff->retire_date);
        $join_date = \Carbon\Carbon::parse($staff->join_date);
        $join_date_duration = $join_date->diff(\Carbon\Carbon::now());
        $duration = "{$join_date_duration->y} နှစ် {$join_date_duration->m} လ {$join_date_duration->d} ရက်";
        $table->addCell(2000)->addText($duration);

        $table->addCell(3000)->addText($staff->retire_remark);
        $table->addCell(2000)->addText('');
    }

    
    $fileName = 'investment_companies_report_word.docx';
    $temp_file = tempnam(sys_get_temp_dir(), $fileName);

    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($temp_file);
    return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
}
     public function render()
    {
        $staffs = Staff::get();
        return view('livewire.investment-companies.investment-companies9',[ 
            'staffs' => $staffs,
        ]);
     }
}
