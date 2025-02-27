<?php

namespace App\Livewire;
use App\Models\Ministry;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Shared\Converter;
use Spatie\LaravelPdf\Enums\Format;

class PdfStaffReport68 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0)
    {
        $this->staff_id = $staff_id;
    }
    public function go_pdf($staff_id)
    {
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report_68', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_68.pdf');
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
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 8
        ]);
        
        //for table
        $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3=array('align' => 'left', 'spaceAfter' => 30, 'spaceBefore' => 70, 'indentation' => ['left' => 100]);
        $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
        $pStyle_7=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 350);
        //for no.1 to no.13
        $pStyle_4=array('align' => 'both', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
        $pStyle_5=array('align' => 'center', 'spaceAfter' => 15, 'spaceBefore' => 20);
        $pStyle_8=array('align' => 'left', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
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

        $footerFirstPage = $section->addFooter();
        $footerFirstPage->firstPage();
        $footerFirstPage->addText('လျှို့ဝှက်', null, ['alignment' => 'center', 'spaceBefore' => 200]);

        $footer = $section->addFooter();
        $footer->addText('လျှို့ဝှက်', null, ['align' => 'center', 'spaceBefore' => 200]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);

        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);

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
            $textBox->addImage($defaultImagePath, ['width' => 62, 'height' => 65, 'align' => 'center', 'padding' => 0]);
        }

        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(1300)->addText('၁။', null, $pStyle_5);
        $table->addCell(13000)->addText('ဝန်ထမ်းအမှတ်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->staff_no ? $staff->staff_no : '', null, $pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၂။', null,  $pStyle_5);
        $table->addCell(13000)->addText('အမည်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->name, null,$pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၃။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ငယ်အမည်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->nick_name ? $staff->nick_name : 'မရှိပါ', null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၄။', null,  $pStyle_5);
        $table->addCell(13000)->addText('အခြားအမည်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->other_name ? $staff->other_name : 'မရှိပါ', null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၅။', null,  $pStyle_5);
        $table->addCell(13000)->addText('မွေးသက္ကရာဇ် ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->dob), null,$pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၆။', null,  $pStyle_5);
        $table->addCell(13000)->addText('လူမျိုး ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->ethnic?->name, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၇။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ဘာသာ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->religion?->name, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၈။', null,  $pStyle_5);
        $table->addCell(13000)->addText('အရပ်အမြင့်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText(en2mm($staff->height_feet) . 'ပေ' .'၊'. en2mm($staff->height_inch) . 'လက်မ', null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၉။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ဆံပင်အရောင် ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->hair_color,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၀။', null,  $pStyle_5);
        $table->addCell(13000)->addText('မျက်စိအရောင် ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->eye_color, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၁။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ထင်ရှားသည့်အမှတ်အသား', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->prominent_mark, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၂။', null,  $pStyle_5);
        $table->addCell(13000)->addText('အသားအရောင်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->skin_color, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၃။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ကိုယ်အလေးချိန်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->weight, null,$pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၄။', null,  $pStyle_5);
        $table->addCell(13000)->addText('မွေးဖွားရာဇာတိ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->place_of_birth, null, $pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၅။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ကျား/မ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->gender->name, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၆။', null,  $pStyle_5);
        $table->addCell(13000)->addText('သွေးအုပ်စု ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->blood_type->name, null,$pStyle_8);

        $table->addRow();
        $table->addCell(2000)->addText('၁၇။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ဖုန်းနံပါတ် ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->phone,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၈။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ရုံး', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText("ရင်းနှီးမြှုပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှု\nဦးစီးဌာန", null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၉။', null,  $pStyle_5);
        $table->addCell(13000)->addText('လက်ကိုင်ဖုန်း ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->mobile, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၂၀။', null,  $pStyle_5);
        $table->addCell(13000)->addText('အီး‌မေးလ် ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->email, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၂၁။', null,  $pStyle_5);
        $table->addCell(13000)->addText('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၂၂။', null,  $pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->current_address_house_no.'  '. ($staff->current_address_street ?? '')."\n" . ($staff->current_address_ward ? '၊' . $staff->current_address_ward : '') .' ' .($staff->current_address_township_or_town?->name ? '၊' . $staff->current_address_township_or_town?->name . 'မြို့နယ်' : '') . ' '.($staff->current_address_region?->name ? '၊' . $staff->current_address_region?->name . 'ဒေသကြီး၊၊' : ''), null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၂၃။', null,  $pStyle_5);
        $table->addCell(13000)->addText('အမြဲတမ်းလက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->permanent_address_house_no .' ' .($staff->permanent_address_street ?? '')."\n" . ($staff->permanent_address_ward ? '၊' . $staff->permanent_address_ward : '') .' ' .($staff->permanent_address_township_or_town?->name ? '၊' . $staff->permanent_address_township_or_town?->name . 'မြို့နယ်' : '') .' ' .($staff->permanent_address_region?->name ? '၊' . $staff->permanent_address_region?->name . 'ဒေသကြီး၊၊' : ''), null, $pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၂၄။', null,  $pStyle_5);
        $table->addCell(13000)->addText("ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာ\nအပြည့်အစုံ(တပ်မတော်သားဖြစ်က တပ်လိပ်စာဖော်ပြရန်မလို)", null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->previous_addresses ? $staff->previous_addresses : 'မရှိပါ', null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၂၅။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ပညာအရည်အချင်း', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
       
        $educationNames = $staff->staff_educations->map(fn($edu) => $edu->education?->name)->implode(', ');
        $table->addCell(13000)->addText($educationNames, null,$pStyle_8);
   

        $section->addTextBreak('');
        $table->addRow();
        $table->addCell(1300)->addText('', null,  $pStyle_5);
        $table->addCell(13000)->addText(' အလုပ်အကိုင်',['bold'=>true],['alignment'=>'right']);
        $table->addCell(700)->addText('', null,  $pStyle_5);
        $table->addCell(13000)->addText('', null,$pStyle_7);
        
        

        $table->addRow(50);
        $table->addCell(1300)->addText('၁။', null, $pStyle_5);
        $table->addCell(13000)->addText("တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/\nတပ်မတော်သားဖြစ်လျှင်", null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(က) ကိုယ်ပိုင်အမှတ်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_solider_no ? $staff->military_solider_no :'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ခ) တပ်သို့ဝင်သည့်နေ့', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->military_join_date), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဂ) ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_dsa_no ? $staff->military_dsa_no :'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဃ) ပြန်တမ်းဝင်ဖြစ်သည့်နေ့', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText( formatDMYmm($staff->military_gazetted_date), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(င) တပ်ထွက်သည့်နေ့', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->military_leave_date), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(စ) ထွက်သည့်အကြောင်း', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_leave_reason ? $staff->military_leave_reason : 'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဆ) အမှုထမ်းဆောင်ခဲ့သောတပ်များ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_served_army ? $staff->military_served_army :'မရှိပါ',  null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဇ) တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_brief_history_or_penalty ? $staff->military_brief_history_or_penalty :'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဈ) အငြိမ်းစားလစာ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(en2mm($staff->military_pension), null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၂။', null,  $pStyle_5);
        $table->addCell(13000)->addText("ကာယကံရှင်မွေးဖွားချိန်၌\nမိဘနှစ်ပါးသည်\nနိုင်ငံသားဟုတ်/မဟုတ်", null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->is_parents_citizen_when_staff_born ? 'နိုင်ငံသားဟုတ်ပါသည်။' : 'မဟုတ်', null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၃။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ဝန်ထမ်းအဖြစ်စတင်ခန့်အပ်သည့်နေ့', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->join_date), null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၄။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ဝန်ကြီးဌာန', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText("ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွား\nဆက်သွယ်ရေးဝန်ကြီးဌာန", null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၅။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ဦးစီးဌာန', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText("ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှု\nဦးစီးဌာန", null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၆။', null,  $pStyle_5);
        $table->addCell(13000)->addText('လစာဝင်ငွေ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->payscale?->name, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၇။', null,  $pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိအလုပ်အကိုင်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->current_rank->name, null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၈။', null,  $pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိရာထူးရသည့်နေ့', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->current_rank_date), null,$pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၉။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ပြောင်းရွေ့သည့်မှတ်ချက်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->transfer_remark ? $staff->transfer_remark : 'မရှိပါ', null,$pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၀။', null,  $pStyle_5);
        $table->addCell(13000)->addText('တွဲဖက်အင်အား ဖြစ်လျှင်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->side_department?->name, null,$pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၁။', null,  $pStyle_5);
        $table->addCell(13000)->addText('လစာနှင့် စရိတ်ကျခံမည့်ဌာန', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->salary_paid_by_department?->name, null,$pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၂။', null,  $pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိအလုပ်အကိုင်ရလာပုံ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->is_direct_appointed, null,$pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၃။', null,  $pStyle_5);
        $table->addCell(13000)->addText('ပြိုင်အ‌‌ရွေးခံ(သို့)တိုက်ရိုက်ခန့်', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->is_direct_appointed, null,$pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၄။', null,  $pStyle_5);
        $table->addCell(13000)->addText('အလုပ်အကိုင်အတွက် ထောက်ခံသူများ', null,$pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->recommendations->pluck('recommend_by')->unique()->join(', '), null,$pStyle_8);
      

   
        // $section->addTextBreak();
        // $section->addText('၁၅။ '.    ' ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်', ['bold'=>true],null, ['spaceBefore' => 200]);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50,array('tblHeader' => true));
        // $table->addCell(4000)->addText('ရာထူး/အဆင့်', ['bold' => true], $pStyle_1);
        // $table->addCell(4000)->addText('တပ်/ဌာန', ['bold' => true], $pStyle_1);
        // $table->addCell(2500)->addText('နေရာ', ['bold' => true], $pStyle_1);
        // $table->addCell(2500)->addText('မှ', ['bold' => true], $pStyle_1);
        // $table->addCell(2500)->addText('ထိ', ['bold' => true], $pStyle_1);

       
        // if($staff->postings->isNotEmpty()){
        //     foreach ($staff->postings as $index => $posting) {
        //         $table->addRow(50);
        //         $table->addCell(4000)->addText($posting->rank->name ?? '',null,$pStyle_3);
        //         $table->addCell(4000)->addText($posting->ministry->name ?? ''."\n".$posting->department->name ?? '-',null, $pStyle_6);
        //         $table->addCell(2500)->addText($posting->location,null, $pStyle_6);
        //         $table->addCell(2500)->addText(formatDMYmm($posting->from_date),null, $pStyle_6);
        //         $table->addCell(2500)->addText(formatDMYmm($posting->to_date),null, $pStyle_6);
        //     }
        // }else{
        //         $table->addRow(50);
        //         $cell = $table->addCell(15500, ['gridSpan' => 5]); 
        //         $cell->addText(
        //             'မရှိပါ',
        //            null,
        //             ['alignment' => 'center']
        //         );
        //     }
        // $section->addTextBreak();
        // $section->addText('မိဘဆွေမျိုးများ', ['bold' => true], ['alignment' => 'center']);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50);
        // $table->addCell(1400)->addText('(က)', null, $pStyle_5);
        // $table->addCell(13000)->addText('အဘအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့် အလုပ်အကိုင်', null, $pStyle_8);
        // $table->addCell(700)->addText('-', null, $pStyle_5);
        // $table->addCell(13000)->addText(
        //     ($staff->father_name ?? '') .'  '. 
        //     ($staff->father_ethnic?->name ? '၊' . $staff->father_ethnic?->name:'') .'  '.
        //     ($staff->father_religion?->name ? '၊'. $staff->father_religion?->name : '' ).' '.
        //     ($staff->father_place_of_birth ? '၊'. $staff->father_place_of_birth : '' ). 
        //     ($staff->father_occupation ? '၊'. $staff->father_occupation.'။':''),
        //     null, 
        //     $pStyle_8
        // );

        // $table->addRow(50);
        // $table->addCell(1400)->addText('(ခ)', null, $pStyle_5);
        // $table->addCell(13000)->addText('၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ', null, $pStyle_8);
        // $table->addCell(700)->addText('-', null, $pStyle_5);
        // $table->addCell(13000)->addText(
        //     ($staff->father_address_street ?? '' ).
        //     ( $staff->father_address_ward ? '၊' . $staff->father_address_ward :'') . 
        //     ($staff->father_address_township_or_town?->name ? '၊'. $staff->father_address_township_or_town?->name.'မြို့နယ်' :'' ). 
        //     ($staff->father_address_region?->name ? '၊' . $staff->father_address_region?->name .'ဒေသကြီး။':''), 
        //     null, 
        //     $pStyle_8
        // );

        // $table->addRow(50);
        // $table->addCell(1400)->addText('(ဂ)', null, $pStyle_5);
        // $table->addCell(13000)->addText('အမိအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့် အလုပ်အကိုင်', null, $pStyle_8);
        // $table->addCell(700)->addText('-', null, $pStyle_5);
        // $table->addCell(13000)->addText(
        //     ($staff->mother_name?? '') .'  '.
        //     ($staff->mother_ethnic?->name ?'၊'. $staff->mother_ethnic?->name :'') .'  '.
        //     ( $staff->mother_religion?->name ? '၊'. $staff->mother_religion?->name : '') .'  '. 
        //     ($staff->mother_place_of_birth ? '၊'. $staff->mother_place_of_birth : ''  ).
        //     ( $staff->mother_occupation ? '၊'. $staff->mother_occupation.'။':'') ,
        //     null,
        //     $pStyle_8
        // );

        // $table->addRow(50);
        // $table->addCell(1400)->addText('(ဃ)', null, $pStyle_5);
        // $table->addCell(13000)->addText('၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ', null, $pStyle_8);
        // $table->addCell(700)->addText('-', null, $pStyle_5);
        // $table->addCell(13000)->addText(
        //     ($staff->mother_address_street ?? '') . 
        //     ($staff->mother_address_ward ? '၊' . $staff->mother_address_ward : '') . 
        //     ($staff->mother_address_township_or_town?->name ? '၊' . $staff->mother_address_township_or_town->name.'မြို့နယ်' : '') . 
        //     ($staff->mother_address_region?->name ? '၊' . $staff->mother_address_region->name .'ဒေသကြီး။': '') ,
        //     null,
        //     $pStyle_8
        // );
        // $section->addTextBreak();
        // $section->addText('၅။ '.  ' ညီအကိုမောင်နှမများ', ['bold'=>true],null, ['spaceBefore' => 200]);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50,array('tblHeader' => true));
        // $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        // $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        // $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        // $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        // $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        // $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        // if($staff->siblings->isNotEmpty()){
        //     foreach ($staff->siblings as $index=>$sibling) {
        //         $table->addRow(50);
        //         $table->addCell(2800)->addText($sibling->name,null,$pStyle_3);
        //         $table->addCell(1300)->addText($sibling->ethnic?->name . "/\n" . $sibling->religion?->name,null, $pStyle_6);
        //         $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
        //         $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_6);
        //         $table->addCell(2300)->addText($sibling->address,null, $pStyle_6);
        //         $table->addCell(1200)->addText($sibling->relation->name ?? '',null, $pStyle_6);
        //     }
        // }else{
        //         $table->addRow(50);
        //         $cell = $table->addCell(10700, ['gridSpan' => 6]); 
        //         $cell->addText(
        //             'မရှိပါ',
        //            null,
        //             ['alignment' => 'center']
        //         );
        //     }
        // $section->addTextBreak();
        // $section->addText('၆။ '.  ' အဘ၏ညီအကိုမောင်နှမများ', ['bold'=>true],null, ['spaceBefore' => 200]);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50,array('tblHeader' => true));
        // $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        // $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        // $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        // $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        // $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        // $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        // if($staff->fatherSiblings->isNotEmpty()){
        //     foreach ($staff->fatherSiblings as $index => $sibling) {
        //         $table->addRow();
        //         $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
        //         $table->addCell(1300)->addText($sibling->ethnic?->name . "/\n" . $staff->religion?->name,null, $pStyle_6);
        //         $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
        //         $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_6);
        //         $table->addCell(2300)->addText($sibling->address,null, $pStyle_6);
        //         $table->addCell(1200)->addText($sibling->relation?->name,null, $pStyle_6);
        //     }
        // }else{
        //         $table->addRow(50);
        //         $cell = $table->addCell(10700, ['gridSpan' => 6]); 
        //         $cell->addText(
        //             'မရှိပါ',
        //            null,
        //             ['alignment' => 'center']
        //         );
        //     }
        // $section->addTextBreak();
        // $section->addText('၇။ '.  ' အမိ၏ညီအကိုမောင်နှမများ', ['bold'=>true],null, ['spaceBefore' => 200]);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50,array('tblHeader' => true));
        // $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        // $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        // $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        // $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        // $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        // $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        // if($staff->motherSiblings->isNotEmpty()){
        //     foreach ($staff->motherSiblings as $index => $sibling) {
        //         $table->addRow(50);
              
        //         $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
        //         $table->addCell(1300)->addText($sibling->ethnic?->name  . "/\n" . $sibling->religion?->name ,null, $pStyle_6);
        //         $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
        //         $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_6);
        //         $table->addCell(2300)->addText($sibling->address,null, $pStyle_6);
        //         $table->addCell(1200)->addText($sibling->relation->name ,null, $pStyle_6);
        //     }
        // }else{
        //         $table->addRow(50);
        //         $cell = $table->addCell(10700, ['gridSpan' => 6]); 
        //         $cell->addText(
        //             'မရှိပါ',
        //            null,
        //             ['alignment' => 'center']
        //         );
        //     }
        // $section->addTextBreak();
        // $section->addText(' ၈။ '.  ' ခင်ပွန်း၊ ဇနီးသည်', ['bold'=>true],null, ['spaceBefore' => 200]);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50,array('tblHeader' => true));
        // $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        // $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        // $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        // $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        // $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        // $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        // if($staff->spouses->isNotEmpty()){
        //     foreach ($staff->spouses as $index => $spouse) {
        //         $table->addRow();
        //         $table->addCell(2800)->addText($spouse->name,null, $pStyle_3);
        //         $table->addCell(1300)->addText($spouse->ethnic->name  . "\n" . $spouse->religion->name ,null, $pStyle_6);
        //         $table->addCell(1300)->addText($spouse->place_of_birth,null, $pStyle_6);
        //         $table->addCell(1800)->addText($spouse->occupation,null, $pStyle_3);
        //         $table->addCell(2300)->addText($spouse->address,null, $pStyle_3);
        //         $table->addCell(1200)->addText($spouse->relation?->name,null, $pStyle_6);
        //     }
        // }else{
               
        //         $table->addRow(50);
        //         $cell = $table->addCell(10700, ['gridSpan' => 6]); 
        //         $cell->addText(
        //             'မရှိပါ',
        //            null,
        //             ['alignment' => 'center']
        //         );
        //     }

       
        // $section->addTextBreak();
        // $section->addText(' ၉။ '.  ' သားသမီးများ', ['bold'=>true],null, ['spaceBefore' => 200]);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50,array('tblHeader' => true));
        // $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        // $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        // $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        // $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        // $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        // $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        // if($staff->children->isNotEmpty()){
        //     foreach ($staff->children as $index => $child) {
        //         $table->addRow();
        //         $table->addCell(2800)->addText($child->name,null, $pStyle_3);
        //         $table->addCell(1300)->addText($child->ethnic?->name  . "/\n" . $child->religion?->name ?? '',null, $pStyle_6);
        //         $table->addCell(1300)->addText($child->place_of_birth,null, $pStyle_6);
        //         $table->addCell(1800)->addText($child->occupation,null, $pStyle_3);
        //         $table->addCell(2300)->addText($child->address,null, $pStyle_3);
        //         $table->addCell(1200)->addText($child->relation?->name,null, $pStyle_6);
        //     }
        // }else{
        //         $table->addRow(50);
        //         $cell = $table->addCell(10700, ['gridSpan' => 6]); 
        //         $cell->addText(
        //             'မရှိပါ',
        //            null,
        //             ['alignment' => 'center']
        //         );
        //     }

        
        // $section->addTextBreak();
        // $section->addText(' ၁၀။ '.  ' ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ', ['bold'=>true],null, ['spaceBefore' => 200]);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50,array('tblHeader' => true));
        // $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        // $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        // $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        // $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        // $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        // $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        // if($staff->spouseSiblings->isNotEmpty()){
        //     foreach ($staff->spouseSiblings as $index => $sibling) {
        //         $table->addRow();
               
        //         $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
        //         $table->addCell(1300)->addText($sibling->ethnic?->name  . '/'."\n" . $sibling->religion?->name ,null, $pStyle_6);
        //         $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
        //         $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_3);
        //         $table->addCell(2300)->addText($sibling->address,null, $pStyle_3);
        //         $table->addCell(1200)->addText($sibling->relation?->name,null, $pStyle_6);
        //     }
        // }else{
        //         $table->addRow(50);
        //         $cell = $table->addCell(10700, ['gridSpan' => 6]); 
        //         $cell->addText(
        //             'မရှိပါ',
        //            null,
        //             ['alignment' => 'center']
        //         );
        //     }

     
        // $section->addTextBreak();
        // $section->addText(' ၁၁။ '.  " ခင်ပွန်း/ဇနီးသည်အဘနှင့်ညီအကိုမောင်နှမများ၏ အမည်၊ လူမျိုး၊ ဘာသာ၊ ဇာတိ၊\n     အလုပ်အကိုင်နှင့်နေရပ်လိပ်စာ", ['bold'=>true],null, ['spaceBefore' => 200]);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50,array('tblHeader' => true));
        // $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        // $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        // $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        // $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        // $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        // $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        // if($staff->spouseFatherSiblings->isNotEmpty()){
        //     foreach ($staff->spouseFatherSiblings as $index => $sibling) {
        //         $table->addRow();
        //         $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
        //         $table->addCell(1300)->addText($sibling->ethnic?->name  . "/\n" . $sibling->religion?->name ,null, $pStyle_6);
        //         $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
        //         $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_3);
        //         $table->addCell(2300)->addText($sibling->address,null, $pStyle_3);
        //         $table->addCell(1200)->addText($sibling->relation?->name,null, $pStyle_6);
        //     }
        // }else{
        //         $table->addRow(50);
        //         $cell = $table->addCell(10700, ['gridSpan' => 6]); 
        //         $cell->addText(
        //             'မရှိပါ',
        //            null,
        //             ['alignment' => 'center']
        //         );
        //     }
        // $section->addTextBreak();
        // $section->addText(' ၁၂။ '.  " ခင်ပွန်း/ဇနီးသည်အမိနှင့်ညီအကိုမောင်နှမများ၏ အမည်၊ လူမျိုး၊ဘာသာ၊ဇာတိ၊\n      အလုပ်အကိုင်နှင့်နေရပ်လိပ်စာ", ['bold'=>true],null, ['spaceBefore' => 200]);
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50,array('tblHeader' => true));
        // $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        // $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        // $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        // $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        // $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        // $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        // if($staff->spouseMotherSiblings->isNotEmpty()){
        //     foreach ($staff->spouseMotherSiblings as $index => $sibling) {
        //         $table->addRow();
        //         $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
        //         $table->addCell(1300)->addText($sibling->ethnic?->name . "/\n" . $sibling->religion?->name,null, $pStyle_6);
        //         $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
        //         $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_3);
        //         $table->addCell(2300)->addText($sibling->address,null, $pStyle_3);
        //         $table->addCell(1200)->addText($sibling->relation?->name,null, $pStyle_6);
        //     }
        // }else{
        //         $table->addRow(50);
        //         $cell = $table->addCell(10700, ['gridSpan' => 6]); 
        //         $cell->addText(
        //             'မရှိပါ',
        //            null,
        //             ['alignment' => 'center']
        //         );
        //     }
        //     $section->addText('');
        // $table = $section->addTable();
        // $table->addRow();
        // $table->addCell(1300)->addText('၁၃။', null, $pStyle_5);
        // $table->addCell(13000)->addText("မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊ညီအကိုမောင်နှမများ၊သားသမီးများသည်\nနိုင်ငံရေးပါတီဝင်များတွင်ဝင်ရောက်ဆောင်ရွက်မှုရှိ/မရှိ(ရှိကအသေးစိတ်ဖော်ပြရန်)", null, $pStyle_8);
        // $table->addCell(700)->addText('-', null,$pStyle_5);
        // $table->addCell(13000)->addText($staff->family_in_politics ?  ($staff->family_in_politics_text ?? '') : 'မရှိပါ', null,$pStyle_8);
        // $section->addText('ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်', ['bold' => true], ['alignment' => 'center']);
        // $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];


        // $section->addTextBreak();
        // $section->addText('၁။ ' . ' နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)', ['bold' => true],array('spaceBefore' => 200));
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50, array('tblHeader' => true));
        // // $table->addCell(700,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true], $pStyle_2);
        // $table->addCell(4000)->addText('ရရှိခဲ့သော ဘွဲ့အမည်', ['bold' => true],$pStyle_2);
        // $table->addCell(4000)->addText("ကျောင်းအမည်",['bold'=>true], $pStyle_1);
        // $table->addCell(4000)->addText("မြို့",['bold'=>true], $pStyle_1);
        // $table->addCell(4000)->addText('ခုနှစ်', ['bold' => true],$pStyle_2);
        // if($staff->schools->isNotEmpty()){
        //      $index=0;
        //      foreach ($staff->schools as $school) {
        //          $table->addRow(50);
        //          $table->addCell(4000)->addText($school->education, null, $pStyle_3);
        //          $table->addCell(4000)->addText($school->school_name, null, $pStyle_6);
        //          $table->addCell(4000)->addText($school->town, null, $pStyle_6);
        //          $table->addCell(4000)->addText($school->from_date . '-' . ($school->to_date), null, $pStyle_6);
        //          $index++;
        //      }
        //  }else{
        //          $table->addRow(50);
        //          $cell = $table->addCell(10000, ['gridSpan' => 4]); 
        //          $cell->addText(
        //              'မရှိပါ',
        //             null,
        //              ['alignment' => 'center']
        //          );
        //      }
        //       $section->addTextBreak();
        // $section->addText('၂။ ' . ' တက်ရောက်ခဲ့သောသင်တန်းများ', ['bold' => true],array('spaceBefore' => 200));
        // $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        // $table->addRow(50, array('tblHeader' => true));
        // $table->addCell(4000)->addText('သင်တန်းအမည်', ['bold' => true],$pStyle_2);
        // $table->addCell(2000)->addText("သင်တန်းကာလ\n(မှ)",['bold'=>true], $pStyle_1);
        // $table->addCell(2000)->addText("သင်တန်းကာလ\n(အထိ)",['bold'=>true], $pStyle_1);
        // $table->addCell(3000)->addText('သင်တန်းနေရာ/ဒေသ', ['bold' => true],$pStyle_2);
        // if($staff->trainings->isNotEmpty()){
        //      $index=0;
        //      foreach ($staff->trainings->where('training_location_id', 1) as  $training) {
        //         $table->addRow(50);
        //         $trainingName = ($training->training_type_id == 32) ?       $training->diploma_name : $training->training_type?->name;
        //          $table->addCell(4000)->addText($trainingName.$training->batch, null, $pStyle_3);
        //          $table->addCell(2000)->addText(formatDMYmm($training->from_date), null, $pStyle_6);
        //          $table->addCell(2000)->addText(formatDMYmm($training->to_date), null, $pStyle_6);
        //          $table->addCell(3000)->addText($training->location, null, $pStyle_6);
        //          $index++;
        //      }
        //  }else{
        //          $table->addRow(50);
        //          $cell = $table->addCell(11000, ['gridSpan' => 4]); 
        //          $cell->addText(
        //              'မရှိပါ',
        //             null,
        //              ['alignment' => 'center']
        //          );
        //      }
        $section->addText('၃။ '.' ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်များ', ['bold' => true], array('spaceBefore' => 200));
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow(50, array('tblHeader' => true));
       $table->addCell(5700)->addText('ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်', ['bold' => true], $pStyle_1);
       $table->addCell(3300)->addText('အမိန့်အမှတ်/ခုနှစ်', ['bold' => true], $pStyle_1);
       
       if($staff->awardings->isNotEmpty()){
                foreach ($staff->awardings as $index=>$awarding) {
                    $table->addRow(50);
                    $table->addCell(5700)->addText( $awarding->award->name, null ,$pStyle_3);
                    $table->addCell(3300)->addText($awarding->order_no, null, $pStyle_3);
                }
            }else{
                $table->addRow(50);
                $cell = $table->addCell(9000, ['gridSpan' => 2]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }
       
            $section->addText('');
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(1300)->addText('၄။', null,  $pStyle_5);
        $table->addCell(13000)->addText("နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်း၊ အတန်း၊  ခုံအမှတ်၊ ဘာသာရပ်အတိအကျဖော်ပြရန်", null, $pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->last_school_name . '၊' . $staff->last_school_subject . '၊' . $staff->last_school_row_no . '၊' . $staff->last_school_major, null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၅။', null,  $pStyle_5);
        $table->addCell(13000)->addText("ကျောင်းသားဘဝတွင်နိုင်ငံရေး/မြို့ရေး ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊ တာဝန်", null, $pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->student_life_political_social ? $staff->student_life_political_social : 'မရှိပါ', null, $pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၆။', null,  $pStyle_5);
        $table->addCell(13000)->addText("ဝါသနာပါပြီး၊လေ့လာလိုက်စားခဲ့သော\nကျန်းမာရေးကစားခုန်စားမှုများ၊ အနုပညာဆိုင်ရာအတီးအမှုတ်များ၊ ပညာရေးစက်မှုလက်မှု", null, $pStyle_8);
        $table->addCell(700)->addText('-', null,  $pStyle_5);
        $table->addCell(13000)->addText($staff->habit ? $staff->habit : 'မရှိပါ', null, $pStyle_8);

        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၇။ '.'  လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်', ['bold' => true], array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        // $table->addRow();
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(7000)->addText('အမည်', ['bold' => true], $pStyle_1);
        $table->addCell(6000)->addText('ဦးစီးဌာန', ['bold' => true], $pStyle_1);
        $table->addCell(6000)->addText('ဝန်ကြီးဌာန', ['bold' => true], $pStyle_1);
        $table->addCell(5000)->addText('မှ', ['bold' => true], $pStyle_1);
        $table->addCell(5000)->addText('ထိ', ['bold' => true], $pStyle_1);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true], $pStyle_1);

        if ($staff->postings->isNotEmpty()) {
            foreach ($staff->postings as $posting) {
                $table->addRow();
                $table->addCell(7000)->addText($posting->rank->name ?? '', null, $pStyle_1);
                $table->addCell(6000)->addText($posting->department->name ?? '', null, $pStyle_1);
                $table->addCell(6000)->addText($posting->ministry->name ?? '', null, $pStyle_1);
                $table->addCell(5000)->addText(formatDMYmm($posting->from_date), null, $pStyle_1);
                $table->addCell(5000)->addText(formatDMYmm($posting->to_date), null, $pStyle_1);
                $table->addCell(2000)->addText($posting->remark, null, $pStyle_1);
            }
        } else {
            $table->addRow();
            $cell = $table->addCell(31000, ['gridSpan' => 6]);
            $cell->addText('မရှိပါ', null, ['alignment' => 'center']);
        }
        $section->addText('');
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(1300)->addText('၈။', null,$pStyle_5);
        $table->addCell(13000)->addText("တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများ\nကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင်\nလုပ်ကိုင်ဆောင်ရွက်ချက်များကို ဖော်ပြရန်", null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->revolution ? $staff->revolution : 'မရှိပါ', null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၉။', null,$pStyle_5);
        $table->addCell(13000)->addText("အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော\nအကြောင်းအကျိုးနှင့်လစာ", null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->transfer_reason_salary ? $staff->transfer_reason_salary : 'မရှိပါ', null, $pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၀။', null,$pStyle_5);
        $table->addCell(13000)->addText("အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်\nဆောင်ရွက်နေစဥ် နိုင်ငံရေး၊ မြို့ရွာရေး ဆောင်ရွက်မှုများ၊ ဆောင်ရွက်နေစဥ် အသင်းအဆင့်အတန်းနှင့်တာဝန်", null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->during_work_political_social ? $staff->during_work_political_social : 'မရှိပါ', null,$pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၁။', null, $pStyle_5);
        $table->addCell(13000)->addText("စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့်\nနိုင်ငံရေးဘက်တွင်ခင်မင်ရင်းနှီးသော\nမိတ်ဆွေများရှိ/မရှိ", null,$pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->has_military_friend ? $staff->has_military_friend_text : 'မရှိ', null,$pStyle_8);

        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];

        
        $section->addText('၁၂။ '.' နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်', ['bold' => true], array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $textContent_1 = "သွားရောက်ခဲ့သည့်\nနိုင်ငံ";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "သွားရောက်ခဲ့သည့်\nအကြောင်း";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊\n လူပုဂ္ဂိုလ်၊\n ဌာန";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = 'သွား၊ ပြန်သည့်နေ့';
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        if ($staff->abroads->isNotEmpty()) {
            foreach ($staff->abroads as $abroad) {
                $table->addRow();
                $table->addCell(6000)->addText($abroad->countries->pluck('name')->unique()->join(', '), null, $pStyle_1);
                $table->addCell(6000)->addText($abroad->particular, null, $pStyle_3);
                $table->addCell(6000)->addText($abroad->meet_with, null, $pStyle_3);
                $table->addCell(6000)->addText(formatDMYmm($abroad->from_date) . "\n" . formatDMYmm($abroad->to_date),null,$pStyle_8);
            }
        } else {
            $table->addRow();
            $cell = $table->addCell(24000, ['gridSpan' => 4]);
            $cell->addText('မရှိပါ', null, ['alignment' => 'center']);
        }
        $section->addText('');
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(1300)->addText('၁၃။', null, $pStyle_5);
        $table->addCell(13000)->addText("မိမိနှင့်ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက မည်သည့်အလုပ်အကိုင်၊ လူမျိုး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ရင်းနှီးသည်", null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText(($staff->foreigner_friend_name ?? '') . ($staff->foreigner_friend_occupation ? '၊' . $staff->foreigner_friend_occupation : '') . ($staff->foreigner_friend_nationality?->name ? '၊' . $staff->foreigner_friend_nationality?->name : '') . ($staff->foreigner_friend_country?->name ? '၊' . $staff->foreigner_friend_country?->name : '')  . ($staff->foreigner_friend_how_to_know ? '၊' . $staff->foreigner_friend_how_to_know : ''), null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၄။', null, $pStyle_5);
        $table->addCell(13000)->addText('မိမိအား ထောက်ခံသည့်ပုဂ္ဂိုလ်(စစ်ဘက်/နယ်ဘက်အရာရှိ/မြို့နယ်/ကျေးရွာ/ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->recommended_by_military_person ? $staff->recommended_by_military_person : 'မရှိပါ', null,$pStyle_8);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၁၅။' . 'ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ');
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('ပြစ်ဒဏ်', ['bold' => true], $pStyle_1);
        $table->addCell(4000)->addText('ပြစ်ဒဏ်ချမှတ်ခံရသည့်အကြောင်းအရင်း', ['bold' => true], $pStyle_1);
        $table->addCell(4000)->addText('မှ', ['bold' => true], $pStyle_1);
        $table->addCell(4000)->addText('ထိ', ['bold' => true], $pStyle_1);
        if ($staff->punishments->isNotEmpty()) {
            foreach ($staff->punishments as $punishment) {
                $table->addRow();
                $table->addCell(4000)->addText($punishment->penalty_type->name ?? '-', null, $pStyle_1);
                $table->addCell(4000)->addText($punishment->reason, null, $pStyle_1);
                $table->addCell(4000)->addText(formatDMYmm($punishment->from_date), null, $pStyle_1);
                $table->addCell(4000)->addText(formatDMYmm($punishment->to_date), null, $pStyle_1);
            }
        } else {
            $table->addRow();
            $cell = $table->addCell(16000, ['gridSpan' => 4]);
            $cell->addText('မရှိပါ', null, ['alignment' => 'center']);
        }
        $section->addText('အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။', ['bold' => true]);
        $tableStyle = [
            'alignment' => Jc::END,
        ];
        $table = $section->addTable($tableStyle);
        $table->addRow(50);
        $table->addCell(2100)->addText('လက်မှတ်');
        $table->addCell(300)->addText('၊');
        $table->addCell(2100)->addText('');

        $table->addRow(50);
        $table->addCell(2100)->addText('ကိုယ်ပိုင်အမှတ်(သို့မဟုတ်)');
        $table->addCell(300)->addText('၊');
        $table->addCell(2100)->addText($staff->military_solider_no);

        $table->addRow(50);
        $table->addCell(2100)->addText('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်');
        $table->addCell(300)->addText('၊');
        $table->addCell(2100)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . en2mm($staff->nrc_code));

        $table->addRow(50);
        $table->addCell(2100)->addText('အဆင့်/ရာထူ:');
        $table->addCell(300)->addText('၊');
        $table->addCell(2100)->addText($staff->current_rank->name);
        $table->addRow(50);
        $table->addCell(2100)->addText('အမည်');
        $table->addCell(300)->addText('၊');
        $table->addCell(2100)->addText($staff->name);
        $table->addRow(50);
        $table->addCell(2100)->addText('တပ်/ဌာန');
        $table->addCell(300)->addText('၊');
        $table->addCell(2100)->addText($staff->current_department->name);

        $section->addText('ရက်စွဲ၊ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center']);

        $fileName = 'staff_report_68_' . $staff->id . '.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');

        return response()->stream(
            function () use ($objWriter) {
                $objWriter->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ],
        );
    }
    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report68', [
            'staff' => $staff,
        ]);
    }
}
