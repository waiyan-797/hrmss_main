<?php

namespace App\Livewire;

use App\Models\BloodType;
use App\Models\Education;
use App\Models\Ethnic;
use App\Models\Religion;
use App\Models\Spouse;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\SimpleType\JcTable;

class PdfStaffReport18 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }
    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];
         
        // Define margin settings in millimeters
        // $pdf = PDF::loadView('pdf_reports.staff_report_18', $data, [], [
        //     'default_font_size' => 13,       // Optional, set default font size
        //     'default_font' => 'Pyidaungsu',      // Optional, set default font
        //     'format' => 'A4',               // Set paper size
        //     'orientation' => 'P',           // Portrait orientation
        //     'margin_left' => 25.4,          // 1 inch = 25.4 mm
        //     'margin_right' => 12.7,         // 0.5 inches = 12.7 mm
        //     'margin_top' => 12.7,           // 0.5 inches = 12.7 mm
        //     'margin_bottom' => 12.7         // 0.5 inches = 12.7 mm
        // ]);

        $pdf = PDF::loadView('pdf_reports.staff_report_18', $data);
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_18.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $phpWord->addFontStyle('pyidaungsu Numbers Font', ['name' => 'Pyidaungsu Numbers', 'size' => 13]);
        $section = $phpWord->addSection([
            'headerHeight' => 350,
            'orientation' => 'portrait',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);
        //for table
        $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3=array('align' => 'left', 'spaceAfter' => 30, 'spaceBefore' => 70, 'indentation' => ['left' => 100]);
        $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
        //for no.1 to no.13
        $pStyle_4=array('align' => 'both', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
        $pStyle_5=array('align' => 'center', 'spaceAfter' => 15, 'spaceBefore' => 20);

        $header_page_1 = $section->addHeader();
        $header_page_1->firstPage();
        $header_page_1->addText('လျှို့ဝှက်', null, [
            'align' => 'center',
            'spaceBefore' => 0, 
            'spaceAfter' => 0, 
            'lineHeight' => 1, 
        ]);
        $header_subseq = $section->addHeader();
        $header_subseq->addText('လျှို့ဝှက်', null, [
            'align' => 'center',
            'spaceBefore' => 0,
            'spaceAfter' => 0,
            'lineHeight' => 1,
        ]);

        $header_subseq->addPreserveText('{PAGE}', ['name' => 'Pyidaungsu Numbers', 'size' => 13], ['alignment' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0]);
        
        $footer = $section->addFooter();
        $footer->addText('လျှို့ဝှက်',null,array('align'=>'center', 'spaceBefore' => 200));

        // $section = $phpWord->addSection(); 
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
        $textBoxStyle = [
        'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
        'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
        // 'borderColor' => 'FFFFFF', // Set to white for no visible border
        'borderSize' => 0,    
        'positioning' => 'relative', // Relative positioning
        'posHorizontal' => 'right', // Align next to inline content
        'posHorizontalRel' => 'margin', // Relative to margin (inline context)
        'marginLeft' => 0, // Small spacing from the left
        
    ];
    $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : null;
        if ($imagePath && file_exists($imagePath)) {
            $textBox = $section->addTextBox($textBoxStyle);
            $textBox->addImage($imagePath, ['width' => 62, 'height' => 69, 'align' => 'right']);
        } else {
        $defaultImagePath = public_path('img/user.png');
        $textBox = $section->addTextBox($textBoxStyle);

        $textBox->addImage($defaultImagePath, ['width' =>62, 'height' => 65, 'align' => 'center', 'padding'=>0 ]);
       }
    
        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(2000)->addText('၁။', null, $pStyle_5);
        $table->addCell(10000)->addText('အမည်(ကျား/မ) ',null ,$pStyle_4);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText($staff->name ,null ,$pStyle_4);

        $table->addRow();
        $table->addCell(2000)->addText('၂။', null, $pStyle_5);
        $table->addCell(10000)->addText('ဝန်ထမ်းအမှတ် ',null ,$pStyle_4);
        $table->addCell(700)->addText('-',  null, $pStyle_5);
        $table->addCell(16000)->addText($staff->staff_no ? $staff->staff_no : 'မရှိပါ',null ,$pStyle_4);

        $table->addRow();
        $table->addCell(2000)->addText('၃။', null, $pStyle_5);
        $table->addCell(10000)->addText('မွေးနေ့ (ရက်၊ လ၊ နှစ်) ',null ,$pStyle_4);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-Y')),null ,$pStyle_4);
        
        $table->addRow();
        $table->addCell(700)->addText('၄။' , null, $pStyle_5);
        $table->addCell(10000)->addText('လူမျိုး/ဘာသာ ',null ,$pStyle_4);
        $table->addCell(900)->addText('-',  null, $pStyle_5);
        $table->addCell(16000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'), null, $pStyle_4);
        
        $table->addRow();
        $table->addCell(700)->addText('၅။' , null, $pStyle_5);
        $table->addCell(10000)->addText('အဘအမည် ',null ,$pStyle_4);
        $table->addCell(900)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText($staff->father_name,null ,$pStyle_4);
        
        $table->addRow();
        $table->addCell(2000)->addText('၆။', null, $pStyle_5);
        $table->addCell(10000)->addText('အမိအမည် ',null ,$pStyle_4);
        $table->addCell(900)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText($staff->mother_name,null ,$pStyle_4);
        
        $table->addRow();
        $table->addCell(2000)->addText('၇။', null, $pStyle_5);
        $table->addCell(10000)->addText('နိုင်ငံသားစိစစ်ရေးအမှတ် ',null ,$pStyle_4);
        $table->addCell(900)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText(($staff->nrc_region_id->name . $staff->nrc_township_code->name) . ($staff->nrc_sign->name . en2mm($staff->nrc_code)),null ,$pStyle_4);
        
        $table->addRow();
        $table->addCell(2000)->addText('၈။', null, $pStyle_5);
        $table->addCell(10000)->addText('ဇနီး/ခင်ပွန်းအမည် ',null ,$pStyle_4);
        $table->addCell(900)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText($staff?->spouses->first()?->name ? $staff?->spouses->first()?->name :'မရှိပါ' ,null ,$pStyle_4);
        
        $table->addRow();
        $table->addCell(2000)->addText('၉။', null, $pStyle_5);
        $table->addCell(10000)->addText('သား/သမီးအမည် ',null ,$pStyle_4);
        $table->addCell(900)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText($staff->children->first()?->name ? $staff->children->first()?->name :'မရှိပါ',null ,$pStyle_4);
        
        $table->addRow();
        $table->addCell(2000)->addText('၁၀။', null, $pStyle_5);
        $table->addCell(10000)->addText('လိပ်စာ ',null ,$pStyle_4);
        $table->addCell(900)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText($staff->current_address_street.$staff->current_address_ward.$staff->current_address_township_or_town->name.'မြို့နယ်၊'.$staff->current_address_region->name.'။',null ,$pStyle_4);
        
        $table->addRow();
        $table->addCell(2000)->addText('၁၁။', null, $pStyle_5);
        $table->addCell(10000)->addText('ပညာအရည်အချင်း ',null ,$pStyle_4);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->staff_educations->map(function ($education) {
            return $education->education->name;
        })->join(', '),null ,['alignment'=>'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၂။', null, $pStyle_5);
        $table->addCell(10000)->addText('လက်ရှိရာထူး/လစာနှုန်း/ဌာန ',null ,$pStyle_4);
        $table->addCell(900)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText($staff->current_rank?->name.'၊'.$staff->payscale?->name."\n".$staff?->current_department->name ,null ,$pStyle_4);
        
        $table->addRow();
        $table->addCell(2000)->addText('၁၃။', null, $pStyle_5);
        $table->addCell(10000)->addText('သွေးအုပ်စု ',null ,$pStyle_4);
        $table->addCell(900)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText($staff->blood_type->name,null ,$pStyle_4);

       $section->addText('၁၄။' . 'နိုင်ငံ့ဝန်ထမ်းတာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (စစ်ဘက်/နယ်ဘက်)', ['bold' => true]);
        
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
       $table->addRow(50,  array('tblHeader' => true));
       $table->addCell(1000,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true],$pStyle_2);
       $table->addCell(4000,['vMerge' => 'restart'])->addText('ရာထူး/ဌာန', ['bold' => true], $pStyle_2);
       $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('တာ၀န်ထမ်းဆောင်သည့်ကာလ',['bold' => true], $pStyle_1);
       $table->addCell(2000,['vMerge' => 'restart'])->addText('နေရာ/ဒေသ', ['bold' => true],$pStyle_2);
       $table->addRow(50,array('tblHeader' => true));
       $table->addCell(1000, ['vMerge' => 'continue']);
       $table->addCell(4000, ['vMerge' => 'continue']);
       $table->addCell(2000)->addText('မှ', ['alignment' => 'center'], $pStyle_1);
       $table->addCell(2000)->addText('ထိ', ['alignment' => 'center'], $pStyle_1);
       $table->addCell(2000, ['vMerge' => 'continue']);
       if($staff->past_postings && $staff->past_postings->isNotEmpty()){
            foreach ($staff->past_postings as $index=> $posting) {
                $table->addRow(50);
                $table->addCell(700)->addText( '('.myanmarAlphabet($index).')', null, $pStyle_6);
                $table->addCell(4000)->addText($posting->rank->name."\n".$posting->department->name, null, $pStyle_3);
                $table->addCell(1750)->addText(formatDMYmm($posting->from_date), null, $pStyle_6);
                $table->addCell(1750)->addText(formatDMYmm($posting->to_date), null, $pStyle_6);
                $table->addCell(2000)->addText($posting->address, null, $pStyle_3);
            }
        }else{
                // $table->addRow(50);
                //     $table->addCell(700);
                //     $table->addCell(4000);
                //     $table->addCell(1750);
                //     $table->addCell(1750);
                //     $table->addCell(1500);
                $table->addRow(50);
                $cell = $table->addCell(9700, ['gridSpan' => 5]); 
                $cell->addText('မရှိပါ',null,['alignment' => 'center']);
            }
    // if ( $staff->postings->isNotEmpty()) {
    //     foreach ($staff->postings as $index => $posting) {
    //         $table->addRow(50);
    //         $table->addCell(1000)->addText('('.myanmarAlphabet($index).')', null, $pStyle_6);
    //         $table->addCell(4000)->addText($posting->rank->name . "\n" . $posting->department->name, null, $pStyle_3);
    //         $table->addCell(2000)->addText(formatDMYmm($posting->from_date), null, $pStyle_6);
    //         $table->addCell(2000)->addText(formatDMYmm($posting->to_date), null, $pStyle_6);
    //         $table->addCell(2000)->addText($posting->location, null, $pStyle_3);
    //     }
    // } else {
       
    //     $table->addRow(50);
    //     $cell = $table->addCell(11000, ['gridSpan' => 5]); 
    //     $cell->addText(
    //         'မရှိပါ',
    //        null,
    //         ['alignment' => 'center']
    //     );
    
    // }
       $section->addTextBreak();
       $section->addText('၁၅။ ' . ' ပြည်တွင်းသင်တန်းများ တက်ရောက်မှု', ['bold' => true],array('spaceBefore' => 200));
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
       $table->addRow(50, array('tblHeader' => true));
       $table->addCell(700,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true], $pStyle_2);
       $table->addCell(4000,['vMerge' => 'restart'])->addText('သင်တန်းအမည်', ['bold' => true],$pStyle_2);
       $table->addCell(3500, ['gridSpan' => 2, 'valign' => 'center'])->addText('တက်ရောက်သည့်ကာလ',['bold'=>true], $pStyle_1);
       $table->addCell(2000,['vMerge' => 'restart'])->addText('နေရာ/ဒေသ', ['bold' => true],$pStyle_2);
       $table->addRow(50, array('tblHeader' => true));
       $table->addCell(700, ['vMerge' => 'continue']);
       $table->addCell(4000, ['vMerge' => 'continue']);
       $table->addCell(1750)->addText('မှ', ['alignment' => 'center'], $pStyle_1);
       $table->addCell(1750)->addText('ထိ', ['alignment' => 'center'], $pStyle_1);
       $table->addCell(2000, ['vMerge' => 'continue']);
       
       if($staff->trainings->isNotEmpty()){
            $index=0;
            foreach ($staff->trainings->where('training_location_id', 1) as  $training) {
                $table->addRow(50);
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')', null, $pStyle_6);
                $table->addCell(4000)->addText($training->training_type->name, null, $pStyle_3);
                $table->addCell(1750)->addText(formatDMYmm($training->from_date), null, $pStyle_6);
                $table->addCell(1750)->addText(formatDMYmm($training->to_date), null, $pStyle_6);
                $table->addCell(2000)->addText($training->location, null, $pStyle_3);
                $index++;
            }
        }else{
                // $table->addRow(50);
                //     $table->addCell(700);
                //     $table->addCell(4000);
                //     $table->addCell(1750);
                //     $table->addCell(1750);
                //     $table->addCell(2000);
                $table->addRow(50);
                $cell = $table->addCell(10200, ['gridSpan' => 5]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }
        $section->addTextBreak();
       $section->addText('၁၆။ ' . ' ပြည်ပသင်တန်းများ တက်ရောက်မှု', ['bold' => true],array('spaceBefore' => 200));
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
       $table->addRow(50, array('tblHeader' => true));
       $table->addCell(700,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true], $pStyle_2);
       $table->addCell(4000,['vMerge' => 'restart'])->addText('သင်တန်းအမည်', ['bold' => true], $pStyle_2);
       $table->addCell(3500, ['gridSpan' => 2, 'valign' => 'center'])->addText('တက်ရောက်သည့်ကာလ', ['bold'=>true], $pStyle_1);
       $table->addCell(2000,['vMerge' => 'restart'])->addText('နေရာ/ဒေသ', ['bold' => true],$pStyle_2);
       $table->addRow(50, array('tblHeader' => true));
       $table->addCell(700, ['vMerge' => 'continue']);
       $table->addCell(4000, ['vMerge' => 'continue']);
       $table->addCell(1750)->addText('မှ', ['alignment' => 'center'], $pStyle_1);
       $table->addCell(1750)->addText('ထိ', ['alignment' => 'center'], $pStyle_1);
       $table->addCell(2000, ['vMerge' => 'continue']);
       
       if($staff->trainings->isNotEmpty()){
            $index=0;
            foreach ($staff->trainings->where('training_location_id', 2) as  $training) {
                $table->addRow(50);
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')', null, $pStyle_6);
                $table->addCell(4000)->addText($training->diploma_name, null, $pStyle_3);
                $table->addCell(1750)->addText(formatDMYmm($training->from_date), null, $pStyle_6);
                $table->addCell(1750)->addText(formatDMYmm($training->to_date), null, $pStyle_6);
                $table->addCell(2000)->addText($training->location, null, $pStyle_3);
                $index++;
            }
        }else{
                // $table->addRow(50);
                //     $table->addCell(700);
                //     $table->addCell(4000);
                //     $table->addCell(1750);
                //     $table->addCell(1750);
                //     $table->addCell(2000);
                $table->addRow(50);
                $cell = $table->addCell(10200, ['gridSpan' => 4]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }
        $section->addTextBreak();
       $section->addText('၁၇။ ' . ' ပြစ်မှုမှတ်တမ်း', ['bold' => true],array('spaceBefore' => 200));
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
       $table->addRow(50, array('tblHeader' => true));
    //    $table->addCell(700,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true]);
       $table->addCell(2000,['vMerge' => 'restart'])->addText('ပြစ်ဒဏ်', ['bold' => true], $pStyle_2);
       $table->addCell(4700,['vMerge' => 'restart'])->addText('ပြစ်ဒဏ်ချမှတ်ခံရသည့် အကြောင်းအရာ', ['bold' => true],$pStyle_2);
       $table->addCell(3000, ['gridSpan' => 2, 'valign' => 'center'])->addText("ပြစ်ဒဏ်ချမှတ်သည့်\nကာလ", ['bold' => true], $pStyle_1);
      
       $table->addRow(50, array('tblHeader' => true));
    //    $table->addCell(700, ['vMerge' => 'continue']);
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(4700, ['vMerge' => 'continue']);
       $table->addCell(1750)->addText('မှ', ['bold' => true, 'alignment' => 'center'], $pStyle_1);
       $table->addCell(1750)->addText('ထိ', ['bold' => true, 'alignment' => 'center'], $pStyle_1);
       if($staff->punishments->isNotEmpty()){
            foreach ($staff->punishments as $punishment) {
                $table->addRow(50);
        //      $table->addCell(700)->addText($index + 1);
                $table->addCell(2000)->addText($punishment->penalty_type->name, null, $pStyle_3);
                $table->addCell(4700)->addText($punishment->reason,null, $pStyle_3);
                $table->addCell(1750)->addText(formatDMYmm($punishment->from_date), null, $pStyle_6);
                $table->addCell(1750)->addText(formatDMYmm($punishment->to_date), null, $pStyle_6);
            }
        }else{
                // $table->addRow(50);
                // $table->addCell(2000);
                // $table->addCell(4700);
                // $table->addCell(1750);
                // $table->addCell(1750);
                $table->addRow(50);
                $cell = $table->addCell(10200, ['gridSpan' => 4]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }
       $section->addText('၁၈။ '.' ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်များ', ['bold' => true], array('spaceBefore' => 200));
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow(50, array('tblHeader' => true));
       $table->addCell(1000)->addText('စဉ်', ['bold' => true], $pStyle_1);
       $table->addCell(5700)->addText('ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်', ['bold' => true], $pStyle_1);
       $table->addCell(3300)->addText('အမိန့်အမှတ်/ခုနှစ်', ['bold' => true], $pStyle_1);
       
       if($staff->awardings->isNotEmpty()){
                foreach ($staff->awardings as $index=>$awarding) {
                    $table->addRow(50);
                    $table->addCell(1000)->addText('('.myanmarAlphabet($index).')',null, $pStyle_6);
                    $table->addCell(5700)->addText( $awarding->award->name, null ,$pStyle_3);
                    $table->addCell(3300)->addText($awarding->order_no, null, $pStyle_3);
                }
            }else{
                // $table->addRow(50);
                // $table->addCell(700);
                // $table->addCell(5700);
                // $table->addCell(3300);
                $table->addRow(50);
                $cell = $table->addCell(9700, ['gridSpan' => 3]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }
       
            // $section->addPageBreak();
          
    $section->addText('အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။', ['bold' => true], array('spaceBefore' => 200, 'alignment' => Jc::START));
    $tableStyle = [
        'alignment' => JcTable::END // Center the table
    ];
    $table = $section->addTable($tableStyle);
        $table->addRow(50);
        $table->addCell(2100)->addText('လက်မှတ် ',null ,$pStyle_4);
        $table->addCell(300)->addText('၊', null, $pStyle_5);
        $table->addCell(2100);

        $table->addRow(50);
        $table->addCell(2100)->addText('အမည်',null ,$pStyle_4);
        $table->addCell(300)->addText('၊',  null, $pStyle_5);
        $table->addCell(2100)->addText($staff->name ,null ,$pStyle_4);

        $table->addRow(50);
        $table->addCell(2100)->addText('ရာထူး',null ,$pStyle_4);
        $table->addCell(300)->addText('၊',  null, $pStyle_5);
        $table->addCell(2100)->addText($staff->current_rank?->name,null ,$pStyle_4);

        $table->addRow(50);
        $table->addCell(2100)->addText('ဖုန်းနံပါတ်(ရုံး/လက်ကိုင်ဖုန်း)',null ,$pStyle_4);
        $table->addCell(300)->addText('၊',  null, $pStyle_5);
        $table->addCell(2100)->addText($staff->phone,null ,$pStyle_4);

        $table->addRow(50);
        $table->addCell(2100);
        $table->addCell(300)->addText('၊',  null, $pStyle_5);
        $table->addCell(2100)->addText($staff->mobile,null ,$pStyle_4);

        $table->addRow(50);
        $table->addCell(2100)->addText('အီး‌မေးလ်',null ,$pStyle_4);
        $table->addCell(300)->addText('၊',  null, $pStyle_5);
        $table->addCell(2100)->addText($staff->email,null ,$pStyle_4);

        $section->addText('ရက်စွဲ: '. mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center'],array('spaceBefore' => 300));
     
        $fileName = 'staff_report_18_' . $staff->id . '.docx';
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
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report18',[
            'staff' => $staff,
        ]);
    }
}


