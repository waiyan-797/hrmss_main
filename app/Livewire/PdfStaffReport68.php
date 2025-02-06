<?php

namespace App\Livewire;

use App\Models\Ministry;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;

class PdfStaffReport68 extends Component
{
public $staff_id;
   public function mount($staff_id=0){
    $this->staff_id=$staff_id;
   }
    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report_68', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_68.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $phpWord->addFontStyle('pyidaungsu Numbers Font', ['name' => 'Pyidaungsu Numbers', 'size' => 13]);
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1), // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
        ]);
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
        $table->addRow();
        $table->addCell(2000)->addText('၁။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ဝန်ထမ်းအမှတ်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['align' => 'center']);
        $table->addCell(16000)->addText($staff->staff_no ? $staff->staff_no :'မရှိပါ',null, ['align' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၂။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('အမည်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['align' => 'center']);
        $table->addCell(16000)->addText($staff->name,null, ['align' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၃။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ငယ်အမည်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->nick_name ? $staff->nick_name :'မရှိပါ',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၄။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('အခြားအမည်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->other_name ? $staff->other_name :'မရှိပါ',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၅။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('မွေးသက္ကရာဇ် ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(formatDMYmm($staff->dob),null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၆။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('လူမျိုး ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->ethnic?->name,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၇။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ဘာသာ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->religion?->name,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၈။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('အရပ်အမြင့်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(en2mm($staff->height_feet).'ပေ'.en2mm($staff->height_inch).'လက်မ',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၉။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ဆံပင်အရောင် ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->hair_color, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၀။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('မျက်စိအရောင် ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->eye_color,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၁။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ထင်ရှားသည့်အမှတ်အသား',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->prominent_mark,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၂။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('အသားအရောင်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->skin_color,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၃။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ကိုယ်အလေးချိန်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->weight,null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၄။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('မွေးဖွားရာဇာတိ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->place_of_birth,null, ['align' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၅။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ကျား/မ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->gender->name,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၆။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('သွေးအုပ်စု ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->blood_type->name,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၇။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ဖုန်းနံပါတ် ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->phone, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၈။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ရုံး',null,['alignment'=>'both']);
        $table->addCell(2000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(5000)->addText('ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၉။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('လက်ကိုင်ဖုန်း ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->mobile,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၂၀။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('အီး‌မေးလ် ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->email,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၂၁။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၂၂။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ယခုနေရပ်လိပ်စာအပြည့်အစုံ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText( ($staff->current_address_street?? '') .
        ($staff->current_address_ward ?'၊'. $staff->current_address_ward :'') .
        ( $staff->current_address_township_or_town?->name ? '၊'. $staff->current_address_township_or_town?->name.'မြို့နယ်' : '') .
        ($staff->current_address_region?->name ? '၊'. $staff->current_address_region?->name : ''  ),null, ['alignment' => 'both']);
      
        $table->addRow();
        $table->addCell(2000)->addText('၂၃။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('အမြဲတမ်းလက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText( ($staff->permanent_address_street?? '') .
        ($staff->permanent_address_ward ?'၊'. $staff->permanent_address_ward :'') .
        ( $staff->permanent_address_township_or_town?->name ? '၊'. $staff->permanent_address_township_or_town?->name.'မြို့နယ်' : '') .
        ($staff->permanent_address_region?->name ? '၊'. $staff->permanent_address_region?->name : ''  ),null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၂၄။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ(တပ်မတော်သားဖြစ်က တပ်လိပ်စာဖော်ပြရန်မလို)',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->previous_addresses ? $staff->previous_addresses :'မရှိပါ',null, ['alignment' => 'both']);

    $table->addRow();
    $table->addCell(2000)->addText('၂၅။',null,['alignment'=>'center']);
    $table->addCell(15000)->addText('ပညာအရည်အချင်း',null,['alignment'=>'both']);
    $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
    $table->addCell(16000)->addText($staff->staff_educations->map(function ($education) {
        return $education->education->name;
    })->join(', '),null, ['alignment' => 'both']);
        $section->addText('အလုပ်အကိုင်', ['bold' => true],['alignment'=>'center']);
        $table->addRow();
        $table->addCell(2000)->addText('၁။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText("တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင်",null,['alignment'=>'both']);
        $table->addCell(1000)->addText('',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText('',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('(က)',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ကိုယ်ပိုင်အမှတ်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->military_solider_no ? $staff->military_solider_no :'မရှိပါ',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('(ခ)',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('တပ်သို့ဝင်သည့်နေ့',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(formatDMYmm($staff->military_join_date),null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('(ဂ)', null, ['alignment' => 'left']);
        $table->addCell(15000)->addText('ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်', null, ['alignment' => 'left']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'left']);
        $table->addCell(16000)->addText($staff->military_dsa_no ? $staff->military_dsa_no :'မရှိပါ', null, ['alignment' => 'left']);


        $table->addRow();
        $table->addCell(2000)->addText('(ဃ)',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ပြန်တမ်းဝင်ဖြစ်သည့်နေ့',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(formatDMYmm($staff->military_gazetted_date),null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('(င)',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('တပ်ထွက်သည့်နေ့',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(formatDMYmm($staff->military_leave_date),null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('(စ)',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ထွက်သည့်အကြောင်း',null,['alignment'=>'both']);
        $table->addCell(2000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->military_leave_reason ? $staff->military_leave_reason :'မရှိပါ',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('(ဆ)',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('အမှုထမ်းဆောင်ခဲ့သောတပ်များ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->military_served_army ? $staff->military_served_army :'မရှိပါ',null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('(ဇ)',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->military_brief_history_or_penalty ? $staff->military_brief_history_or_penalty : 'မရှိပါ',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('(ဈ)',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('အငြိမ်းစားလစာ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(en2mm($staff->military_pension),null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၂။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ကာယကံရှင်မွေးဖွားချိန်၌မိဘနှစ်ပါးသည်နိုင်ငံသားဟုတ်/မဟုတ်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->is_parents_citizen_when_staff_born?'ဟုတ်':'မဟုတ်',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၃။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ဝန်ထမ်းအဖြစ်စတင်ခန့်အပ်သည့်နေ့',null,['alignmet'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(formatDMYmm($staff->join_date),null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၄။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ဝန်ကြီးဌာန',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->ministry?->name,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၅။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ဦးစီးဌာန',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၆။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('လစာဝင်ငွေ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->payscale?->name,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၇။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('လက်ရှိအလုပ်အကိုင်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->current_rank->name,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၈။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('လက်ရှိရာထူးရသည့်နေ့',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(formatDMYmm($staff->current_rank_date),null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၉။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ပြောင်းရွေ့သည့်မှတ်ချက်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->transfer_remark ? $staff->transfer_remark :'မရှိပါ',null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၀။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('တွဲဖက်အင်အား ဖြစ်လျှင်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->side_department?->name,null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၁။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('လစာနှင့် စရိတ်ကျခံမည့်ဌာန',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->salary_paid_by_department?->name,null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၂။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('လက်ရှိအလုပ်အကိုင်ရလာပုံ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->is_direct_appointed,null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၃။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('ပြိုင်အ‌‌ရွေးခံ(သို့)တိုက်ရိုက်ခန့်',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->is_direct_appointed,null, ['alignment' => 'both']);

//         $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
//        $section->addText('၁၄။'.'အလုပ်အကိုင်အတွက် ထောက်ခံသူများ', ['bold' => true]);
//        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
//        $table->addRow(50, ['tblHeader' => true]);
//        $table->addCell(4000)->addText('ထောက်ခံသူ', ['bold' => true],$pStyle_1);
//        $table->addCell(4000)->addText('ဝန်ကြီးဌာန', ['bold' => true],$pStyle_1);
//        $table->addCell(4000)->addText('ဦးစီးဌာန', ['bold' => true],$pStyle_1);
//        $table->addCell(4000)->addText('ရာထူး', ['bold' => true],$pStyle_1);
//        $table->addCell(4000)->addText('အကြောင်းအရာ', ['bold' => true],$pStyle_1);
//      if ($staff->recommendations->isNotEmpty()) {
//        foreach ($staff->recommendations as  $recommendation) {
//         $table->addRow();
//         $table->addCell(4000)->addText($recommendation->recommend_by,null,$pStyle_1);
//         $table->addCell(4000)->addText($recommendation->ministry,null,$pStyle_1);
//         $table->addCell(4000)->addText($recommendation->department,null,$pStyle_1);
//         $table->addCell(4000)->addText($recommendation->rank,null,$pStyle_1);
//         $table->addCell(4000)->addText($recommendation->remark,null,$pStyle_1);
//     }
// }
//     else{
//             $table->addRow();
//             $table->addCell(4000)->addText();
//             $table->addCell(4000)->addText();
//             $table->addCell(4000)->addText();
//             $table->addCell(4000)->addText();
//             $table->addCell(4000)->addText();
//     }
        $table->addRow();
        $table->addCell(2000)->addText('၁၄။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText('အလုပ်အကိုင်အတွက် ထောက်ခံသူများ',null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->recommendations->map(function ($recommendation) {
            return $recommendation->recommend_by;
        })->join(', '),null, ['alignment' => 'both']);
    $section->addTextBreak();
    $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
       $section->addText('၁၅။'.'ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow(50, ['tblHeader' => true]);
       $table->addCell(5000)->addText('ရာထူး/အဆင့်', ['bold' => true],$pStyle_1);
       $table->addCell(4000)->addText('တပ်/ဌာန', ['bold' => true],$pStyle_1);
       $table->addCell(4000)->addText('နေရာ', ['bold' => true],$pStyle_1);
       $table->addCell(3000)->addText('မှ', ['bold' => true],$pStyle_1);
       $table->addCell(3000)->addText('ထိ', ['bold' => true],$pStyle_1);
       if ($staff->postings->isNotEmpty()) {
       foreach ($staff->postings as $posting) {
        $table->addRow();
        $table->addCell(5000)->addText($posting->rank->name ?? '-' ,null,$pStyle_1);
        $table->addCell(4000)->addText($posting->department->name ?? '-',null,$pStyle_1);
        $table->addCell(4000)->addText($posting->location ?? '-',null,$pStyle_1);
        $table->addCell(3000)->addText(formatDMYmm($posting->from_date),$pStyle_1);
        $table->addCell(3000)->addText(formatDMYmm($posting->to_date),$pStyle_1);
    }
}else{
    // $table->addRow();
    // $table->addCell(5000)->addText();
    // $table->addCell(4000)->addText();
    // $table->addCell(4000)->addText();
    // $table->addCell(3000)->addText();
    // $table->addCell(3000)->addText();
    $table->addRow();
    $cell = $table->addCell(19000, ['gridSpan' => 5]);
        $cell->addText('မရှိပါ',null,['alignment' => 'center']);
}
    $section->addTextBreak();
    $section->addText('မိဘဆွေမျိုးများ', ['bold' => true],['alignment'=>'center']);
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
    $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
    $table->addRow();
    $table->addCell(2000)->addText('(က)',null,['alignment'=>'center'],$pStyle_1);
    $table->addCell(15000)->addText('အဘအမည်၊လူမျိုး၊ကိုးကွယ်သည့်ဘာသာ အလုပ်အကိုင်',null,['alignment'=>'both'],$pStyle_1);
    $table->addCell(1000)->addText('-',null, ['alignment' => 'center'],$pStyle_1);
    $table->addCell(16000)->addText(($staff->father_name?? '') .
    ($staff->father_ethnic?->name ?'၊'. $staff->father_ethnic?->name :'') .
    ( $staff->father_religion?->name ? '၊'. $staff->father_religion?->name : '') .
    ( $staff->father_occupation ? '၊'. $staff->father_occupation: ''),null, ['alignment' => 'both'],$pStyle_1);
    $table->addRow();
    $table->addCell(2000)->addText('(ခ)',null,['alignment'=>'center'],$pStyle_1);
    $table->addCell(15000)->addText('၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ',null,['alignment'=>'both'],$pStyle_1);
    $table->addCell(1000)->addText('-',null, ['alignment' => 'center'],$pStyle_1);
    $table->addCell(16000)->addText(($staff->father_address_street?? '') .
    ($staff->father_address_ward ?'၊'. $staff->father_address_ward :'') .
    ($staff->father_address_township_or_town?->name  ? '၊'. $staff->father_address_township_or_town?->name : '') .
    ($staff->father_address_region?->name ? '၊'. $staff->father_address_region?->name : ''  ) . ($staff->father_place_of_birth ? '၊'. $staff->father_place_of_birth : ''),null, ['alignment' => 'both'],$pStyle_1);

    // $staff->father_address_street.'၊'.$staff->father_address_ward.'၊'.$staff->father_address_township_or_town?->name.'၊'.$staff->father_address_region?->name
    $table->addRow();
    $table->addCell(2000)->addText('(ဂ)',null,['alignment'=>'center'],$pStyle_1);
    $table->addCell(15000)->addText('အမိအမည်၊လူမျိုး၊ကိုးကွယ်သည့်ဘာသာ အလုပ်အကိုင်',null,['alignment'=>'both'],$pStyle_1);
    $table->addCell(1000)->addText('-',null, ['alignment' => 'center'],$pStyle_1);
    $table->addCell(16000)->addText(($staff->mother_name?? '') .
    ($staff->mother_ethnic?->name ?'၊'. $staff->mother_ethnic?->name :'') .
    ( $staff->mother_religion?->name ? '၊'. $staff->mother_religion?->name : '') .
    ( $staff->mother_occupation ? '၊'. $staff->mother_occupation: '').($staff->mother_place_of_birth ? '၊'. $staff->mother_place_of_birth : ''),null, ['alignment' => 'both'],$pStyle_1);
    $table->addRow();
    $table->addCell(2000)->addText('(ဃ)',null,['alignment'=>'center'],$pStyle_1);
    $table->addCell(15000)->addText('၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ',null,['alignment'=>'both'],$pStyle_1);
    $table->addCell(1000)->addText('-',null, ['alignment' => 'center'],$pStyle_1);
    $table->addCell(16000)->addText(($staff->mother_address_street?? '') .
    ($staff->mother_address_ward ?'၊'. $staff->mother_address_ward :'') .
    ( $staff->mother_address_township_or_town?->name  ? '၊'. $staff->mother_address_township_or_town?->name : '') .
    ($staff->mother_address_region?->name ? '၊'. $staff->mother_address_region?->name : ''  ),null, ['alignment' => 'both'],$pStyle_1);
    $section->addTextBreak();
       $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];

        $section->addText('၅။'.'ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('လူမျိုး/ဘာသာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ဇာတိ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_1);
        if ($staff->siblings->isNotEmpty()) {
        foreach ($staff->siblings as $sibling) {
            $table->addRow();
            $table->addCell(4000)->addText($sibling->name,null,$pStyle_1 );
            $table->addCell(4000)->addText($sibling->ethnic?->name.'/'.$sibling->religion?->name,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->place_of_birth,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->occupation,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->address,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->relation->name ?? '',null,$pStyle_1);

        }
    }else{
        // $table->addRow();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        $table->addRow();
        $cell = $table->addCell(24000, ['gridSpan' => 6]);
        $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
    $section->addTextBreak();
    $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၆။'.'အဘ၏ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('လူမျိုး/ဘာသာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ဇာတိ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_1);
        if ($staff->fatherSiblings->isNotEmpty()) {
        foreach ($staff->fatherSiblings as $sibling) {
            $table->addRow();
            $table->addCell(4000)->addText($sibling->name,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->ethnic?->name.'/'.$staff->religion?->name,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->place_of_birth,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->occupation,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->address,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->relation?->name,null,$pStyle_1);
        }
    }else{
        // $table->addRow();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        // $table->addCell(4000)->addText();
        $table->addRow();
        $cell = $table->addCell(24000, ['gridSpan' => 6]);
        $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
    $section->addTextBreak();
    $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၇။'.'အမိ၏ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('လူမျိုး/ဘာသာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ဇာတိ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_1);
        if ($staff->motherSiblings->isNotEmpty()) {
        foreach ($staff->motherSiblings as $sibling) {
            $table->addRow();
            $table->addCell(4000)->addText($sibling->name,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->ethnic?->name ?? ''.'/'.$sibling->religion?->name ?? '',null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->place_of_birth,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->occupation,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->address,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->relation->name ?? '',null,$pStyle_1 );
        }
    }else{
            // $table->addRow();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            $table->addRow();
            $cell = $table->addCell(24000, ['gridSpan' => 6]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
    $section->addTextBreak();
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၈။'.'ခင်ပွန်း၊ ဇနီးသည်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('လူမျိုး/ဘာသာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ဇာတိ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_1);
        if ($staff->spouses->isNotEmpty()) {
        foreach ($staff->spouses as $index => $spouse) {
            $table->addRow();
            $table->addCell(4000)->addText($spouse->name,null,$pStyle_1);
            $table->addCell(4000)->addText($spouse->ethnic->name ?? ''.'/'.$spouse->religion->name ?? '',null,$pStyle_1);
            $table->addCell(4000)->addText($spouse->place_of_birth,null,$pStyle_1);
            $table->addCell(4000)->addText($spouse->occupation,null,$pStyle_1);
            $table->addCell(4000)->addText($spouse->address,null,$pStyle_1);
            $table->addCell(4000)->addText($spouse->relation?->name,null,$pStyle_1);
        }
    }else{
            // $table->addRow();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            $table->addRow();
            $cell = $table->addCell(24000, ['gridSpan' => 6]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
    $section->addTextBreak();
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၉။'.'သားသမီးများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('လူမျိုး/ဘာသာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ဇာတိ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_1);
        if ($staff->children->isNotEmpty()) {
        foreach ($staff->children as $child) {
            $table->addRow();
            $table->addCell(4000)->addText($child->name,null,$pStyle_1);
            $table->addCell(4000)->addText($child->ethnic?->name ?? ''.'/'.$child->religion?->name ?? '',null,$pStyle_1);
            $table->addCell(4000)->addText($child->place_of_birth,null,$pStyle_1);
            $table->addCell(4000)->addText($child->occupation,null,$pStyle_1);
            $table->addCell(4000)->addText($child->address,null,$pStyle_1);
            $table->addCell(4000)->addText($child->relation?->name,null,$pStyle_1);
        }
    }else{
            // $table->addRow();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            $table->addRow();
            $cell = $table->addCell(24000, ['gridSpan' => 6]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
    $section->addTextBreak();
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၁၀။'.'ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('လူမျိုး/ဘာသာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ဇာတိ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_1);
        if ($staff->spouseSiblings->isNotEmpty()) {
        foreach ($staff->spouseSiblings as $sibling) {
            $table->addRow();
            $table->addCell(4000)->addText($sibling->name,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->ethnic?->name ?? ''.'/'.$sibling->religion?->name ?? '',null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->place_of_birth,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->occupation,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->address,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->relation?->name,null,$pStyle_1);
        }
    }else{
            // $table->addRow();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            $table->addRow();
            $cell = $table->addCell(24000, ['gridSpan' => 6]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
    $section->addTextBreak();
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၁၁။'.'ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('လူမျိုး/ဘာသာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ဇာတိ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_1);

        if ($staff->spouseFatherSiblings->isNotEmpty()) {
        foreach ($staff->spouseFatherSiblings as $sibling) {
            $table->addRow();
            $table->addCell(4000)->addText($sibling->name,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->ethnic?->name ?? ''.'/'.$sibling->religion?->name ?? '',null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->place_of_birth,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->occupation,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->address,null,$pStyle_1);
            $table->addCell(4000)->addText($sibling->relation?->name,null,$pStyle_1);
        }
    }else{
            // $table->addRow();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            $table->addRow();
            $cell = $table->addCell(24000, ['gridSpan' => 6]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
        $section->addTextBreak();
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $section->addText('၁၂။'.'ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(6000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('လူမျိုး/ဘာသာ', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('ဇာတိ', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_1);
        if ($staff->spouseMotherSiblings->isNotEmpty()) {
        foreach ($staff->spouseMotherSiblings as $sibling) {
            $table->addRow();
            $table->addCell(6000)->addText($sibling->name,null,$pStyle_1);
            $table->addCell(6000)->addText($sibling->ethnic?->name ?? ''.'/'.$sibling->religion?->name ?? '',null,$pStyle_1);
            $table->addCell(6000)->addText($sibling->place_of_birth,null,$pStyle_1);
            $table->addCell(6000)->addText($sibling->occupation,null,$pStyle_1);
            $table->addCell(6000)->addText($sibling->address,null,$pStyle_1);
            $table->addCell(6000)->addText($sibling->relation?->name,null,$pStyle_1);
        }
    }else{
            // $table->addRow();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            $table->addRow();
            $cell = $table->addCell(24000, ['gridSpan' => 6]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('၁၃။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText("မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊ညီအကိုမောင်နှမများ၊သားသမီးများ\nသည်နိုင်ငံရေးပါတီဝင်များတွင်ဝင်ရောက်ဆောင်ရွက်မှုရှိ/မရှိ(ရှိကအသေးစိတ်ဖော်ပြရန်)",null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        // $table->addCell(16000)->addText(,null, ['alignment' => 'both']);
        $table->addCell(16000)->addText(
            $staff->family_in_politics
                ? 'ရှိ' . ($staff->family_in_politics_text ?? '')
                : 'မရှိ',
            null, ['alignment'=>'both']
        );
        $section->addText('ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်', ['bold' => true],['alignment'=>'center']);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];

        $section->addText('၁။'.'နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('ရရှိခဲ့သော ဘွဲ့အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ကျောင်းအမည်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('မြို့', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ခုနှစ်', ['bold' => true],$pStyle_1);
        if ($staff->schools->isNotEmpty()) {
        foreach ($staff->schools as $school) {
            $table->addRow();
            $table->addCell(4000)->addText($school->education,null,$pStyle_1);
            $table->addCell(4000)->addText( $school->school_name,null,$pStyle_1 );
            $table->addCell(4000)->addText($school->town,null,$pStyle_1);
            $table->addCell(4000)->addText(en2mm($school->from_date).'-'.en2mm($school->to_date),null,$pStyle_1);

        }
    }else{
            // $table->addRow();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            $table->addRow();
            $cell = $table->addCell(16000, ['gridSpan' => 4]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
    $section->addTextBreak();
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၂။'.'တက်ရောက်ခဲ့သောသင်တန်းများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(6000, ['vMerge' => 'restart'])->addText('သင်တန်းအမည်', ['bold' => true],$pStyle_1);
         $table->addCell(12000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သင်တန်းကာလ',['bold'=>true],$pStyle_1);
        $table->addCell(6000, ['vMerge' => 'restart'])->addText('သင်တန်းနေရာ/ဒေသ', ['bold' => true],$pStyle_1);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(6000, ['vMerge' => 'continue']);
        $table->addCell(6000)->addText('မှ',['bold'=>true],['alignment' => 'center']);
        $table->addCell(6000)->addText('အထိ',['bold'=>true], ['alignment' => 'center']);
        $table->addCell(6000, ['vMerge' => 'continue']);
        if ($staff->trainings->isNotEmpty()) {
        foreach ($staff->trainings as $training) {
            $table->addRow();
            $table->addCell(6000)->addText($training->diploma_name,null,$pStyle_1);
            $table->addCell(6000)->addText(formatDMYmm($training->from_date),null,$pStyle_1);
            $table->addCell(6000)->addText(formatDMYmm($training->to_date),null,$pStyle_1);
            $table->addCell(6000)->addText( $training->location,null,$pStyle_1);

        }
    }else{
            // $table->addRow();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            $table->addRow();
            $cell = $table->addCell(24000, ['gridSpan' => 4]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);
    }
        // $section->addTextBreak();
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $section->addText('၃။'.'ချီးမြှင့်ခံရသည့်ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်များ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        // $table->addRow();
        $table->addCell(16000)->addText('ဘွဲ့ထူး၊ ဂုဏ်ထူး တံဆိပ်အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(16000)->addText('အမိန့်အမှတ်/ခုနှစ်', ['bold' => true],$pStyle_1);
        if ($staff->awardings->isNotEmpty()) {
        foreach ($staff->awardings as $awarding) {
            $table->addRow();
            $table->addCell(16000)->addText($awarding->award->name ?? '-',null,$pStyle_1 );
            $table->addCell(16000)->addText($awarding->order_no,null,$pStyle_1);
        }
    }else{
        // $table->addRow();
        // $table->addCell(16000)->addText();
        // $table->addCell(16000)->addText();
            $table->addRow();
            $cell = $table->addCell(32000, ['gridSpan' => 2]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('၄။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText("နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်းအတန်း၊ခုံအမှတ်၊ဘာသာရပ်အတိအကျဖော်ပြ\nရန်",null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->last_school_name.'၊'.$staff->last_school_subject.'၊'.$staff->last_school_row_no.'၊'.$staff->last_school_major,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၅။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText("ကျောင်းသားဘဝတွင်နိုင်ငံရေး/မြို့ရေး ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊တာဝန်",null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->student_life_political_social ? $staff->student_life_political_social : 'မရှိပါ',null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၆။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText("ဝါသနာပါပြီး၊လေ့လာလိုက်စားခဲ့သော\nကျန်းမာရေးကစားခုန်စားမှုများ၊\nအနုပညာဆိုင်ရာအတီးအမှုတ်များ၊ ပညာရေးစက်မှုလက်မှု",null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->habit ? $staff->habit : 'မရှိပါ',null, ['alignment' => 'both']);

        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၇။'.'လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        // $table->addRow();
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(6000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('ဦးစီးဌာန', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('ဝန်ကြီးဌာန', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('မှ', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('အထိ', ['bold' => true],$pStyle_1);
        $table->addCell(6000)->addText('မှတ်ချက်', ['bold' => true],$pStyle_1);

        if ($staff->postings->isNotEmpty()) {
        foreach ($staff->postings as $posting) {
            $table->addRow();
            $table->addCell(6000)->addText( $posting->rank->name ?? '',null,$pStyle_1);
            $table->addCell(6000)->addText($posting->department->name ?? '',null,$pStyle_1);
            $table->addCell(6000)->addText($posting->ministry->name ?? '',null,$pStyle_1);
            $table->addCell(6000)->addText(formatDMYmm($posting->from_date),null,$pStyle_1);
            $table->addCell(6000)->addText(formatDMYmm($posting->to_date),null,$pStyle_1);
            $table->addCell(6000)->addText($posting->remark,null,$pStyle_1);
        }
    }else{
            // $table->addRow();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            $table->addRow();
            $cell = $table->addCell(36000, ['gridSpan' => 6]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);
    }
        $section->addText('');
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('၈။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText("တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများ\nကြီးစိုးသောနယ်မြေတွင်နေခဲ့ဖူးလျှင်\nလုပ်ကိုင်ဆောင်ရွက်ချက်များကိုဖော်ပြရန်",null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->revolution ? $staff->revolution :'မရှိပါ' ,null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၉။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText("အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော\nအကြောင်းအကျိုးနှင့်လစာ",null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->transfer_reason_salary ? $staff->transfer_reason_salary : 'မရှိပါ',null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၀။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText
        ("အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်\nဆောင်ရွက်နေစဥ်နိုင်ငံရေး၊မြို့ရွာရေးဆောင်ရွက်မှုများ၊ဆောင်ရွက်နေစဥ်\nအသင်းအဆင့်အတန်းနှင့်တာဝန်",null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->during_work_political_social ? $staff->during_work_political_social :'မရှိပါ',null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၁။',null,['alignment']);
        $table->addCell(15000)->addText("စစ်ဘက်နယ်ဘက်ရဲဘက်နှင့်\nနိုင်ငံရေးဘက်တွင်ခင်မင်ရင်းနှီးသော\nမိတ်ဆွေများရှိ/မရှိ",null,['alignment'=>'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->has_military_friend? 'ရှိ':'မရှိ',null, ['alignment' => 'both']);


    $pStyle_1=array('align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100);
        $pStyle_3=array('align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200);

        $section->addText('၁၂။' . 'နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်');
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $textContent_1 = "သွားရောက်ခဲ့သည့်\nနိုင်ငံ";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_1);
        $textContent_1 = "သွားရောက်ခဲ့သည့်\nအကြောင်း";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊\n လူပုဂ္ဂိုလ်၊\n ဌာန";
        $table->addCell(6000,['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $textContent_1 = "သွား၊ ပြန်သည့်နေ့";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
            if ($staff->abroads->isNotEmpty()) {
        foreach ($staff->abroads as $abroad) {
            $table->addRow();
            $table->addCell(6000)->addText($abroad->countries->pluck('name')->join(', '),null,$pStyle_1);
            $table->addCell(6000)->addText($abroad->particular,null,$pStyle_3);
            $table->addCell(6000)->addText($abroad->meet_with,null,$pStyle_3);
            // $table->addCell(6000)->addText(formatDMYmm($abroad->from_date).formatDMYmm($abroad->to_date ));
            $table->addCell(6000)->addText(
                formatDMYmm($abroad->from_date) . '<w:br/>' . formatDMYmm($abroad->to_date),
                ['spaceAfter' => 0]
            );

        }
    }else{
            // $table->addRow();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            // $table->addCell(6000)->addText();
            $table->addRow();
            $cell = $table->addCell(24000, ['gridSpan' => 4]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);

    }
        $section->addText('');
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(1000)->addText('၁၃။',null,['alignment'=>'center']);
        $table->addCell(15000)->addText("မိမိနှင့်ခင်မင်ရင်းနှီးသောနိုင်ငံခြားသားရှိ/မရှိ၊ရှိကမည်သည့်အလုပ်အကိုင်၊လူမျိုး၊တိုင်းပြည်၊\nမည်ကဲ့သို့ရင်းနှီးသည်",null,['alignment' => 'both']);
        $table->addCell(1000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(16000)->addText( ($staff->foreigner_friend_name?? '') .
        ($staff->foreigner_friend_occupation ?'၊'. $staff->foreigner_friend_occupation :'') .
        ( $staff->foreigner_friend_nationality?->name ? '၊'. $staff->foreigner_friend_nationality?->name : '') .
        ($staff->foreigner_friend_country?->name ? '၊'. $staff->foreigner_friend_country?->name : ''  ).'၊'.($staff->foreigner_friend_how_to_know ? '၊'. $staff->foreigner_friend_how_to_know : ''  ),null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(4000)->addText('၁၄။',null,['alignment'=>'center']);
        $table->addCell(4000)->addText("မိမိအားထောက်ခံသည့်ပုဂ္ဂိုလ်(စစ်ဘက်/နယ်ဘက်အရာရှိ/မြို့နယ်/ကျေးရွာ/ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)",null,['alignment'=>'both']);
        $table->addCell(2000)->addText('-',null, ['alignment' => 'center']);
        $table->addCell(5000)->addText($staff->recommended_by_military_person ? $staff->recommended_by_military_person :'မရှိပါ',null, ['alignment' => 'both']);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $section->addText('၁၅။'.'ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ');
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(4000)->addText('ပြစ်ဒဏ်', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ပြစ်ဒဏ်ချမှတ်ခံရသည့်အကြောင်းအရင်း', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('မှ', ['bold' => true],$pStyle_1);
        $table->addCell(4000)->addText('ထိ', ['bold' => true],$pStyle_1);
        if ($staff->punishments->isNotEmpty()) {
        foreach ($staff->punishments as $punishment) {
            $table->addRow();
            $table->addCell(4000)->addText($punishment->penalty_type->name ?? '-',null,$pStyle_1);
            $table->addCell(4000)->addText($punishment->reason,null,$pStyle_1);
            $table->addCell(4000)->addText(formatDMYmm($punishment->from_date),null,$pStyle_1);
            $table->addCell(4000)->addText(formatDMYmm($punishment->to_date ),null,$pStyle_1);
        }
    }else{
            // $table->addRow();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            // $table->addCell(4000)->addText();
            $table->addRow();
            $cell = $table->addCell(16000, ['gridSpan' => 4]);
            $cell->addText('မရှိပါ',null,['alignment' => 'center']);
    }
    $section->addText('အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။',['bold'=>true]);
        $tableStyle = [
            'alignment' => Jc::END,
        ];
        $table = $section->addTable($tableStyle);
        $table->addRow();
        $table->addCell()->addText('လက်မှတ်');
        $table->addCell(500)->addText('၊');
        $table->addCell(3000)->addText('');

        $table->addRow();
        $table->addCell()->addText('ကိုယ်ပိုင်အမှတ်(သို့မဟုတ်)');
        $table->addCell(500)->addText('၊');
        $table->addCell(3000)->addText($staff->military_solider_no );

        $table->addRow();
        $table->addCell()->addText('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်');
        $table->addCell(500)->addText('၊');
        $table->addCell(3000)->addText(
            $staff->nrc_region_id->name.
            $staff->nrc_township_code->name.
            $staff->nrc_sign->name.
            en2mm($staff->nrc_code)
        );

        $table->addRow();
        $table->addCell()->addText('အဆင့်/ရာထူ:');
        $table->addCell(500)->addText('၊');
        $table->addCell(3000)->addText($staff->current_rank->name);
        $table->addRow();
        $table->addCell()->addText('အမည်');
        $table->addCell(500)->addText('၊');
        $table->addCell(3000)->addText($staff->name);
        $table->addRow();
        $table->addCell()->addText('တပ်/ဌာန');
        $table->addCell(500)->addText('၊');
        $table->addCell(3000)->addText($staff->current_department->name);

        $section->addText('ရက်စွဲ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center']);


        $fileName = 'staff_report_68_' . $staff->id . '.docx';
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
        $staff=Staff::where('id',$this->staff_id)->first();
        return view('livewire.pdf-staff-report68', [
            'staff' => $staff,


        ]);
    }
}
