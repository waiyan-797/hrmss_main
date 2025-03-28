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
        $staffs = Staff::whereIn('retire_type_id', [3, 4])->get();
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
    $staffs = Staff::whereIn('retire_type_id', [3, 4])->get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection([
        'orientation' => 'landscape',
        'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
        'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
    ]);
   
    $section->addText('၂၀၂၄-၂၀၂၅ ဘဏ္ဍာရေးနှစ်အတွင်း ဝန်ထမ်းအဖြစ်မှ ထုတ်ပစ်ခံရသော ဝန်ထမ်းများစာရင်း', ['bold' => true, 'size' => 13], ['alignment' => 'center']);
    $section->addText('ဝန်ထမ်းအဖွဲ့အစည်းအမည်၊ ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true, 'size' => 13]);
    // $section->addText(
    //       mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), 
    //     [], 
    //     ['alignment' => 'right']
    // );
    $section->addText(
        mmDateFormat(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month),
        [],
        ['alignment' => 'right']
    );
    
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);

    $table->addRow();
    $table->addCell(1000)->addText('စဥ်', ['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center', 'spaceBefore'=>1000]);
    $table->addCell(4500)->addText('အမည်နှင့်  အမျိုးသားမှတ်ပုံတင်   အမှတ်' , ['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center', 'spaceBefore'=>500]);
    $table->addCell(2000)->addText('မွေးနေ့ သက္ကရာဇ်' , ['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center', 'spaceBefore'=>1000]);
    $table->addCell(4500)->addText('(က)ရာထူး        (ခ)လစာနှုန်း   (ဂ)နောက်ဆုံးထုတ်လစာ' , ['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'left', 'spaceBefore'=>500]);
    $table->addCell(2000)->addText('စတင် အမှုထမ်း သည့်နေ့' , ['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center','spaceBefore'=>500]);
    $table->addCell(2000)->addText('စတင် ကင်းကွာ/ ပျက်ကွက် သည့်နေ့' , ['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center','spaceBefore'=>500]);
    $table->addCell(3200)->addText('ဝန်ထမ်းအဖြစ်မှ ထုတ်ပစ်/ရာထူးမှ ထုတ်ပယ်သည့်နေ့ အမိန့်စာရက်စွဲ' , ['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center', 'spaceBefore'=>100]);
    $table->addCell(2000)->addText('လုပ်သက်' , ['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center', 'spaceBefore'=>1000]);
    $table->addCell(3800)->addText('ဝန်ထမ်းအဖြစ်မှ ထုတ်ပစ်/ရာထူးမှ ထုတ်ပယ်ခံရသည့် အကြောင်းအရင်း' ,['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center', 'spaceBefore'=>500]);
    $table->addCell(1000)->addText('မှတ် ချက်' , ['bold'=>true , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center', 'spaceBefore'=>800]);
    
    $table->addRow();
    $table->addCell(1000)->addText('(က)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    $table->addCell(4500)->addText('(ခ)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    $table->addCell(2000)->addText('(ဂ)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    $table->addCell(4500)->addText('(ဃ)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    $table->addCell(2000)->addText('(င)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    $table->addCell(2000)->addText('(စ)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    $table->addCell(3200)->addText('(ဆ)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    $table->addCell(2000)->addText('(ဇ)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    $table->addCell(3800)->addText('(ဈ)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    $table->addCell(1000)->addText('(ည)', ['bold'=>false , 'font'=>'Pyidaungsy', 'size'=>12],['align'=>'center']);
    foreach ($staffs as $index => $staff) {
        $table->addRow();
        $table->addCell(1000)->addText(en2mm($index + 1));
        $table->addCell(4500)->addText($staff->name . '၊ ' . $staff->nrc_region_id?->name . $staff->nrc_township_code?->name . '/' . $staff->nrc_sign?->name . '/' . $staff->nrc_code);
        $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-Y')));
        $table->addCell(4500)->addText($staff->current_rank?->name . '၊ ' . $staff->payscale?->name . '၊ ' . $staff->current_salary);
        $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-Y')));
        $table->addCell(2000)->addText(en2mm($staff->lost_contact_from_date));
        $table->addCell(3200)->addText(en2mm($staff->retire_date));
        $join_date = \Carbon\Carbon::parse($staff->join_date);
        $join_date_duration = $join_date->diff(\Carbon\Carbon::now());
        $duration = "{$join_date_duration->y} နှစ် {$join_date_duration->m} လ {$join_date_duration->d} ရက်";
        $table->addCell(2000)->addText($duration);
        $table->addCell(3800)->addText($staff->retire_remark);
        $table->addCell(1000)->addText('');
    }

    
    $fileName = 'investment_companies_report_word.docx';
    $temp_file = tempnam(sys_get_temp_dir(), $fileName);

    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($temp_file);
    return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
}
     public function render()
    {
        $staffs = Staff::whereIn('retire_type_id', [3, 4])->get();
        return view('livewire.investment-companies.investment-companies9',[ 
            'staffs' => $staffs,
        ]);
     }
}
