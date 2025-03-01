<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;


class PdfStaffReport19 extends Component
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

         
        // // Define margin settings in millimeters
        // $pdf = PDF::loadView('pdf_reports.staff_report_19', $data, [], [
        //     'default_font_size' => 13,       // Optional, set default font size
        //     'default_font' => 'Pyidaungsu',      // Optional, set default font
        //     'format' => 'A4',               // Set paper size
        //     'orientation' => 'P',           // Portrait orientation
        //     'margin_left' => 25.4,          // 1 inch = 25.4 mm
        //     'margin_right' => 12.7,         // 0.5 inches = 12.7 mm
        //     'margin_top' => 12.7,           // 0.5 inches = 12.7 mm
        //     'margin_bottom' => 12.7         // 0.5 inches = 12.7 mm
        // ]);

        $pdf = PDF::loadView('pdf_reports.staff_report_19', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_19.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);
        // $section = $phpWord->addSection(); 
        
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

        //for table
        $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3=array('align' => 'left', 'spaceAfter' => 30, 'spaceBefore' => 70, 'indentation' => ['left' => 100]);
        $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
        $pStyle_7=array('align' => 'left', 'spaceAfter' => 0, 'spaceBefore' => 0, 'indentation' => ['left' => 100]);
        //for no.1 to no.13
        $pStyle_4=array('align' => 'both', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
        $pStyle_5=array('align' => 'center', 'spaceAfter' => 15, 'spaceBefore' => 20);
        $pStyle_8=array('align' => 'left', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း',1);
        $section->addTitle('[နည်းဥပဒေ ၃၅ (ဇ) (၄)၊ ၄၇ (စ) (၄)]',1);
        $textBoxStyle = [
        'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
        'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
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
        $table->addCell(1500)->addText('၁။',null, $pStyle_5);
        $table->addCell(13000)->addText('အမည်(ကျား/မ)',null,$pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->name, null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၂။',null,$pStyle_5);
        $table->addCell(13000)->addText('နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်', null, $pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name  .en2mm( $staff->nrc_code), null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၃။',null, $pStyle_5);
        $table->addCell(13000)->addText('လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ', null,$pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'),null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၄။', null , $pStyle_5);
        $table->addCell(13000)->addText('မွေးဖွားရာအရပ်', null, $pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->place_of_birth, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1500)->addText('၅။',null, $pStyle_5);
        $table->addCell(13000)->addText('အဘအမည်',null, $pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->father_name, null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၆။', null, $pStyle_5);
        $table->addCell(13000)->addText('မွေးဖွားသည့် ရက်၊ လ၊ ခုနှစ်',null,$pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'], $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->dob));

        $table->addRow(50);
        $table->addCell(1500)->addText('၇။',null,$pStyle_5);
        $table->addCell(13000)->addText('ကိုယ်တွင်ထင်ရှားသည့် အမှတ်အသား',null, $pStyle_4);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->prominent_mark,null,$pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၈။',null,$pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိရာထူး',null,$pStyle_4);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->current_rank->name,null,$pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၉။',null, $pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိနေရပ်လိပ်စာ',null, $pStyle_4);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->current_address_house_no.$staff->current_address_street.'၊'.$staff->current_address_ward.'၊'.$staff->current_address_township_or_town->name.'မြို့နယ်၊'.$staff->current_address_region->name.'ဒေသကြီး။',null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1500)->addText('၁၀။',null,$pStyle_5);
        $table->addCell(13000)->addText('အမြဲတမ်းနေရပ်လိပ်စာ',null,$pStyle_4);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->permanent_address_house_no.$staff->permanent_address_street.'၊'.$staff->permanent_address_ward.'၊'.$staff->permanent_address_township_or_town->name.'မြို့နယ်၊'.$staff->permanent_address_region->name.'ဒေသကြီး။',null,$pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၁၁။', null, $pStyle_5);
        $table->addCell(13000)->addText('ပညာအရည်အချင်း ',null ,$pStyle_4);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $educationNames = $staff->staff_educations->map(fn($edu) => $edu->education?->name)->implode(', ');
        $table->addCell(13000)->addText($educationNames, null,$pStyle_4);
        $table->addRow(50);
        $table->addCell(1500)->addText('၁၂။',null,$pStyle_5);
        $table->addCell(13000)->addText("တတ်မြောက်သည့်အခြားဘာသာ\nစကားနှင့်တတ်ကျွမ်းသည့်အဆင့်",null,$pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $languagesData = $staff->staff_languages->map(function ($language) {
            return $language->language->name . ' (' . $language->rank . ')';
        })->join(', ');
        
        $table->addCell(13000)->addText($languagesData,null,$pStyle_4);
        $section->addText('၁၃။ '.'တက်ရောက်ခဲ့သည့်သင်တန်းများ', null,array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader'=>true));
        $table->addCell(6700)->addText('ကျောင်း/တက္ကသိုလ်/သင်တန်း', ['bold' => true], $pStyle_1);
        $table->addCell(2000)->addText('မှ', ['bold' => true],$pStyle_1);
        $table->addCell(2000)->addText('ထိ', ['bold' => true],$pStyle_1);
        if($staff->trainings->isNotEmpty()){
            foreach ($staff->trainings as $training) {
                    $table->addRow(50);
                        $table->addCell(6500)->addText($training->training_type_id  == 32 ? $training->diploma_name :  $training->training_type->name,null, $pStyle_7);
                        $table->addCell(2000)->addText(formatDMYmm($training->from_date),null, $pStyle_1);
                        $table->addCell(2000)->addText(formatDMYmm($training->to_date),null, $pStyle_1);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(10500, ['gridSpan' => 3]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );

            }

        $section->addText('၁၄။ '.'ထမ်းဆောင်ခဲ့သောတာဝန်များ', null,array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader'=>true));
        $table->addCell(1500)->addText('တာဝန်', ['bold' => true],$pStyle_1);
        $table->addCell(3000)->addText('ရုံး/ ဌာန/ အဖွဲ့အစည်း', ['bold' => true],$pStyle_1);
        $table->addCell(1600)->addText('နေ့ရက်မှ', ['bold' => true],$pStyle_1);
        $table->addCell(1600)->addText('နေ့ရက်ထိ', ['bold' => true],$pStyle_1);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true],$pStyle_1);
        if ($staff->postings->isNotEmpty()) {
            foreach ($staff->postings as $posting) {
                $table->addRow(50);
                $table->addCell(1500)->addText($posting->rank?->name ?? ' - ', null, $pStyle_7);
                $table->addCell(3000)->addText($posting->department->name ?? ' - ', null, $pStyle_7);
                $table->addCell(1600)->addText($posting->from_date ? formatDMYmm($posting->from_date) : ' - ', null, $pStyle_1);
                $table->addCell(1600)->addText($posting->to_date ? formatDMYmm($posting->to_date) : ' - ', null, $pStyle_1);
                $table->addCell(2000)->addText($posting->remark ?? ' - ', null, $pStyle_1);
            }
        } else {
            $table->addRow(50);
            $cell = $table->addCell(9700, ['gridSpan' => 5]); 
            $cell->addText(
                'မရှိပါ',
                null,
                ['alignment' => 'center']
            );
        }
        $section->addText('၁၅။ '.'ပါဝင်ဆောင်ရွက်ဆဲနှင့် ဆောင်ရွက်ခဲ့သည် လူမှုရေးနှင့် အစိုးရမဟုတ်သော အဖွဲ့အစည်းများ၏ '.'အမည်နှင့်တာဝန်များ',null,array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow();
        $table->addRow(50,array('tblHeader'=>true));
        $table->addCell(500)->addText('စဥ်', ['bold' => true],$pStyle_1);
        $table->addCell(4800)->addText('အဖွဲ့အစည်း', ['bold' => true],$pStyle_1);
        $table->addCell(2800)->addText('တာဝန်', ['bold' => true],$pStyle_1);
        $table->addCell(1800)->addText('မှတ်ချက်', ['bold' => true],$pStyle_1);
        if($staff->postings->isNotEmpty()){
            foreach ($staff->postings as $index=> $posting) {
                $table->addRow();
                $table->addCell(500)->addText('('.myanmarAlphabet($index).')',null, $pStyle_1);
                $table->addCell(4800)->addText($posting->department?->name,null,$pStyle_7);
                $table->addCell(2800)->addText($posting->remark, null, $pStyle_7);
                $table->addCell(1800)->addText($posting->remark, null, $pStyle_7);
           
            }
        }else{
            $table->addRow(50);
                $cell = $table->addCell(9900, ['gridSpan' => 4]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }

            $section->addText('၁၆။ '.'ချီးမြှင့်ခံရသည့်ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်လက်မှတ်များ',null,array('spaceBefore' => 200));
            $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
            // $table->addRow();
            $table->addRow(50,array('tblHeader'=>true));
            $table->addCell(1000)->addText('စဥ်', ['bold' => true],$pStyle_1);
            $table->addCell(5000)->addText('ဆုတံဆိပ်အမျိုးအစား', ['bold' => true],$pStyle_1);
            $table->addCell(3000)->addText('ရက်-လ-နှစ်', ['bold' => true],$pStyle_1);
            $table->addCell(3000)->addText('မှတ်ချက်', ['bold' => true],$pStyle_1);
            if($staff->awardings->isNotEmpty()){
                foreach ($staff->awardings as $index => $awarding) {
                    $table->addRow();
                    $table->addCell(1000)->addText('('.myanmarAlphabet($index).')',null, $pStyle_1);
                    $table->addCell(5000)->addText( $awarding->award->name,null,$pStyle_7);
                    $table->addCell(3000)->addText(formatDMYmm($awarding->order_date), null, $pStyle_7);
                    $table->addCell(3000)->addText( $awarding->remark, null, $pStyle_7);
               
                }
            }else{
                $table->addRow(50);
                $cell = $table->addCell(12000, ['gridSpan' => 4]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
                }
       $table = $section->addTable();
        $table->addRow();
        $table->addCell(1000)->addText('၁၇။',null, $pStyle_5);
        $table->addCell(5000)->addText('အပြစ်ပေးခံရခြင်းများ',null,$pStyle_4);
        $table->addCell(500)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(5000)->addText($staff->punishments->map(function ($punishment) {
            return $punishment->penalty_type->name;
        })->join(', '), null, $pStyle_4);
        $table->addRow();
        $table->addCell(1000)->addText('၁၈။',null, $pStyle_5);
        $table->addCell(5000)->addText('အခြားတင်ပြလိုသည့်အချက်များ',null,$pStyle_4);
        $table->addCell(500)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(5000)->addText('', null, $pStyle_4);

        $section->addText('('.'ဝန်ထမ်း၏ထိုးမြဲလက်မှတ်'.')',null,['alignment' => Jc::END]);
        $textStyle=[
            'alignment' => Jc::BOTH 
        ];
        $section->addText('၁၉။အထက်ဖော်ပြပါဝန်ထမ်း၏ကိုယ်ရေးမှတ်တမ်းနှင့်ပတ်သတ်၍မှန်ကန်စွာဖြည့်သွင်းရေးသားထားပါကြောင်းစိစစ်အတည်ပြုပါသည်။',null,$textStyle);
        $section->addText(''); 

        $tableStyle = [
            'alignment' => Jc::END // Center the table
        ];
        $table = $section->addTable($tableStyle);
            $table->addRow(50);
            $table->addCell(1000)->addText('လက်မှတ် ',null ,$pStyle_4);
            $table->addCell(300)->addText('၊', null, $pStyle_5);
            $table->addCell(1000);

            $table->addRow(50);
            $table->addCell(1000)->addText('အမည်',null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(1000)->addText($staff->name ,null ,$pStyle_4);

            $table->addRow(50);
            $table->addCell(1000)->addText('အဆင့်/ရာထူး',null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(1000)->addText($staff->current_rank?->name,null ,$pStyle_4);

            $table->addRow(50);
            $table->addCell(1000)->addText('ရုံး/ဌာန',null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(1000)->addText($staff->current_department?->name,null,$pStyle_4);

            $section->addText('ရက်စွဲ: '. mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center'],array('spaceBefore' => 300));

        $fileName = 'staff_report_19_' . $staff->id . '.docx';
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
        return view('livewire.pdf-staff-report19', [
            'staff' => $staff,
        ]);
    }
}


