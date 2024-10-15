<?php

namespace App\Livewire;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class PdfStaffReport71 extends Component
{

    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report_71', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_71.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' =>10 ], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
        $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : 'img/user.png';
        $section->addImage($imagePath, ['width' => 80, 'height' => 80, 'align' => 'right']); 
        $section->addText('၁။'.'အမည်: '. str_repeat(' ', 5).$staff->name );
        $section->addText('၂။'.'ငယ်အမည်: '. str_repeat(' ', 5).$staff->nick_name);
        $section->addText('၃။'.'ကျား/မ: '. str_repeat(' ', 5).$staff->gender->name);
        $section->addText('၄။'.'Attandance ID(Finger Print ID): '. str_repeat(' ', 5).$staff->attendid);
        $section->addText('၅။'.'GPMS ဝန်ထမ်းအမှတ်: '. str_repeat(' ', 5).$staff->gpms_staff_no);
        $section->addText('၆။'.'လူမျိုး/ကိုးကွယ်သည့်ဘာသာ: '. str_repeat(' ', 5).$staff->ethnic?->name.'/'.$staff->religion?->name);
        $section->addText('၇။'.'အမျိုးသားမှတ်ပုံတင်အမှတ်: '.str_repeat(' ',5). $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code);
        $section->addText('၈။'.'မွေးသက္ကရာဇ်: '. str_repeat(' ', 5).en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')));
        $section->addText('၉။'.'မွေးဖွားရာဇာတိနှင့်လိပ်စာအပြည့်အစုံ: '.str_repeat(' ',5).$staff->place_of_birth.','.$staff->current_address_ward .','.$staff->current_address_street.','.$staff->current_address_township_or_town->name .','.$staff->current_address_region->name);
        $section->addText('၁၀။'.'ကိုယ်တွင်ထင်ရှားသောအမှတ်အသား: '.str_repeat(' ',5).$staff->prominent_mark);
        $section->addText('၁၁။'.'အရပ်အမြင့်(ပေ-လက်မ): '. str_repeat(' ', 5).$staff->height_feet.'/'.$staff->height_inch );
        $section->addText('၁၂။'.'မျက်စိအရောင်: '. str_repeat(' ', 5).$staff->eye_color);
        $section->addText('၁၃။'.'ဆံပင်အရောင်: '. str_repeat(' ', 5).$staff->hair_color);
        $section->addText('၁၄။'.'သွေးအုပ်စု: '.str_repeat(' ',5).$staff->blood_type->name);
        $section->addText('၁၅။'.'ပညာအရည်အချင်း', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(1000)->addText('စဉ်', ['bold' => true]);
        $table->addCell(2000)->addText('Education Group', ['bold' => true]);
        $table->addCell(2000)->addText('Education Type', ['bold' => true]);
        $table->addCell(2000)->addText('Education', ['bold' => true]);
        foreach ($staff->staff_educations as $index=> $education) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($education->education_group->name);
            $table->addCell(2000)->addText($education->education_type->name);
            $table->addCell(2000)->addText($education->education->name);
        }
        $section->addText('၁၆။'.'ဘွဲ့ရရှိခဲ့သည့်တက္ကသိုလ်/ကျောင်း', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(1000)->addText('စဉ်', ['bold' => true]);
        $table->addCell(2000)->addText('ဘွဲ့ရရှိခဲ့သည့်တက္ကသိုလ်/ကျောင်း', ['bold' => true]);
        $table->addCell(2000)->addText('ဘွဲ့ရရှိခဲ့သည့် နိုင်ငံ', ['bold' => true]);
        $table->addCell(2000)->addText('ဘွဲ့ရရှိခဲ့သည့် ခုနှစ်', ['bold' => true]);
        foreach ($staff->schools as $index => $school) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($school->school_name);
            $table->addCell(2000)->addText( $school->country->name ?? '-');
            $table->addCell(2000)->addText( $school->year);
        }
        $section->addText('၁၉။'.'ကျန်းမာရေး အခြေအနေ: '. str_repeat(' ', 5).$staff->health_condition );
        $section->addText('၂၀။'.'ဝါသနာပါသောအားကစား: '. str_repeat(' ', 5).$staff->habit);
        $section->addText('၂၁။'.'လက်ရှိရာထူးအမျိုးအစား: '. str_repeat(' ', 5).$staff->current_rank->name);
        $section->addText('၂၂။'.'လက်ရှိလစာနှုန်း: '. str_repeat(' ', 5).$staff->payscale->name);
        $section->addText('၂၃။'.'လက်ရှိလစာ: '. str_repeat(' ', 5).$staff->current_salary);
        $section->addText('၂၄။'.'အစိုးရဝန်ထမ်းစဖြစ်သော (ရက်-လ-နှစ်): '. str_repeat(' ', 5).$staff->government_staff_started_date);
        $section->addText('၂၅။'.'လက်ရှိဌာန၏အလုပ်ဝင်ရက်စွဲ (ရက်-လ-နှစ်): '. str_repeat(' ', 5).$staff->join_date);
        $section->addText('၂၆။'.'လက်ရှိရာထူးရသည့်နေ့ (ရက်-လ-နှစ်): '. str_repeat(' ', 5).$staff->current_rank_date);
        $section->addText('၂၇။'.'ယခုနေထိုင်သည့်နေရပ်လိပ်စာ (အပြည့်အစုံဖော်ပြရန်): '. str_repeat(' ', 5).$staff->current_address_street.','.$staff->current_address_ward.','.$staff->current_address_township_or_town->name.','.$staff->current_address_region->name );
        $section->addText('၂၈။'.'အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ: '. str_repeat(' ', 5).$staff->permanent_address_street.','.$staff->permanent_address_ward.','.$staff->permanent_address_township_or_town->name.','.$staff->permanent_address_region->name);
        $section->addText('၂၉။'.'ဆက်သွယ်နိုင်သောဖုန်းနံပါတ်: '. str_repeat(' ', 5).$staff->phone);
        $section->addText('၃၀။'.'အိမ်ထောင်ရှိ/ မရှိ (ဥပမာ- လူပျို/အပျို၊ မုဆိုးဖို/မုဆိုးမ၊ တစ်ခုလပ်): '. str_repeat(' ', 5).$staff->marital_statuses?->name);
        $section->addText('၃၁။'.'ဝင်ငွေခွန်သက်သာခွင့် ရှိ/ မရှိ (ရှိကဖော်ပြရန်):'. str_repeat(' ', 5).$staff->tax_exception);
        $section->addText('၃၂။'.'အခြားအမည်များ (ရှိလျှင်):'. str_repeat(' ', 5).$staff->other_name);
        $section->addText('၃၃။'.'အသားအရောင်:'. str_repeat(' ', 5).$staff->skin_color);
        $section->addText('၃၄။'.'ကိုယ်အလေးချိန်: '. str_repeat(' ', 5).$staff->weight);
        $section->addText('၃၅။'.'ယခင်နေခဲ့ဖူးသောဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ (တပ်မတော်သားဖြစ်ကတပ်လိပ်စာဖော်ပြရန်မလို):'. str_repeat(' ', 5).$staff->previous_addresses);
        $section->addText('၃၆။'.'ကာယကံရှင်မွေးဖွားချိန်၌မိဘနှစ်ပါးသည်နိုင်ငံသားဟုတ်/မဟုတ်:'. str_repeat(' ', 5).$staff->is_parents_citizen_when_staff_born);
        $section->addText('၃၇။'.'လက်ရှိအလုပ်အကိုင်ရလာပုံ (ပြိုင်အရွေးခံ(သို့)တိုက်ရိုက်ခန့်):'. str_repeat(' ', 5).$staff->is_direct_appointed);
        $section->addText('၃၈။'.'အလုပ်အကိုင်အတွက် ထောက်ခံသူများ', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(500)->addText('စဉ်', ['bold' => true]);
       $table->addCell(2000)->addText('ထောက်ခံသူ', ['bold' => true]);
       $table->addCell(2000)->addText('ဝန်ကြီးဌာန', ['bold' => true]);
       $table->addCell(2000)->addText('ဦးစီးဌာန', ['bold' => true]);
       $table->addCell(2000)->addText('ရာထူး', ['bold' => true]);
       $table->addCell(2000)->addText('အကြောင်းအရာ', ['bold' => true]);
       foreach ($staff->recommendations as $index => $recommendation) {
        $table->addRow();
        $table->addCell(500)->addText($index+1);
        $table->addCell(2000)->addText($recommendation->recommend_by);
        $table->addCell(2000)->addText($recommendation->ministry);
        $table->addCell(2000)->addText($recommendation->department);
        $table->addCell(2000)->addText($recommendation->rank);
        $table->addCell(2000)->addText($recommendation->remark);
    }
    $section->addText('၃၉။'.'မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊ ညီအစ်ကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီများတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်)
    : '.str_repeat(' ',5).$staff->family_in_politics);
        $section->addText('တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင်: '. str_repeat(' ', 5));
        $section->addText('၁။'.'ပြန်တမ်းဝင်အမှတ်: '. str_repeat(' ', 5).$staff->military_gazetted_no);
        $section->addText('၂။'.'ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်: '. str_repeat(' ', 5).$staff->military_dsa_no);
        $section->addText('၃။'.'စစ်မှုထမ်း‌ဟောင်းအဖွဲ့ဝင်အမှတ်နှင့်ရက်စွဲ: '. str_repeat(' ', 5).$staff->veteran_no.'/'.$staff->veteran_date);
        $section->addText('၄။'.'ကိုယ်ပိုင်အမှတ်: '. str_repeat(' ', 5).$staff->military_solider_no);
        $section->addText('၅။'.'အဆင့်: '. str_repeat(' ', 5).$staff->current_rank->name);
        $section->addText('၆။'.'နောက်ဆုံးတာဝန်ထမ်းဆောင်ခဲ့သည့် တိုင်း၊ တပ်မ၊ တပ်ရင်း၊ တပ်ဖွဲ့: '. str_repeat(' ', 5).$staff->last_serve_army);
        $section->addText('(၇။'.'တပ်သို့ဝင်သည့်နေ့ (ရက်-လ-နှစ်): '. str_repeat(' ', 5).$staff->military_join_date);
        $section->addText('၈။'.'ပြန်တမ်းဝင်ဖြစ်သည့်နေ့ (ရက်-လ-နှစ်): '. str_repeat(' ', 5).$staff->military_gazetted_date);
        $section->addText('၉။'.'အမှုထမ်းဆောင်ခဲ့သောတပ်များ: '. str_repeat(' ', 5).$staff->military_served_army);
        $section->addText('၁၀။'.'တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု: '. str_repeat(' ', 5).$staff->military_brief_history_or_penalty);
        $section->addText('၁၁။'.'အငြိမ်းစားလစာ'. str_repeat(' ', 5).$staff->military_pension);
        $section->addText('၁၂။'.'ရက်စွဲ (ရက်-လ-နှစ်):'. str_repeat(' ', 5).$staff->military_gazetted_date);
        $section->addText('၁၃။' . 'အကြောင်းအရာ'. str_repeat(' ', 5).$staff->transfer_remark);
        $section->addText('အသက်အာမခံ'. str_repeat(' ', 5));
        $section->addText('၁။' . 'အဆိုပြုလွှာ'. str_repeat(' ', 5).$staff->life_insurance_proposal);
        $section->addText('၂။' . 'ပေါ်လစီအမှတ်'. str_repeat(' ', 5).$staff->life_insurance_policy_no);
        $section->addText('၃။' . 'ပရီမီယံ'. str_repeat(' ', 5).$staff->life_insurance_premium);
        
       
       $section->addText('၄၀။'.'တက်ရောက်ခဲ့သောကျောင်းများ(မူလတန်း/အလယ်တန်း/အထက်တန်း)', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(500)->addText('စဉ်', ['bold' => true]);
       $table->addCell(2000)->addText('ကျောင်းအမည်', ['bold' => true]);
       $table->addCell(2000)->addText('မှ (ရက်-လ-နှစ်)	', ['bold' => true]);
       $table->addCell(2000)->addText('ထိ (ရက်-လ-နှစ်)	', ['bold' => true]);
       $table->addCell(2000)->addText('အောင်မြင်ခဲ့သည့်အတန်း', ['bold' => true]);
     
       foreach ($staff->schools as $index => $school) {
        $table->addRow();
        $table->addCell(500)->addText($index+1);
        $table->addCell(2000)->addText($school->school_name);
        $table->addCell(2000)->addText($school->from_date);
        $table->addCell(2000)->addText($school->to_date);
        $table->addCell(2000)->addText($school->education->name ?? 'N/A');
    }
   
       $section->addText('၄၁။'.'ဘွဲ့ရရှိခဲ့သောတက္ကသိုလ်များ', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(500)->addText('စဥ်', ['bold' => true]);
       $table->addCell(2000)->addText('တက္ကသိုလ်အမည်', ['bold' => true]);
       $table->addCell(2000)->addText('တက္ကသိုလ်တည်နေရာ', ['bold' => true]);
       $table->addCell(2000)->addText('အတန်း', ['bold' => true]);
       $table->addCell(2000)->addText('ခုံအမှတ်', ['bold' => true]);
       $table->addCell(2000)->addText('အထူးပြုဘာသာရပ်', ['bold' => true]);
       $table->addCell(2000)->addText('စတင်တက်ရောက်သော ရက်၊လ၊နှစ်', ['bold' => true]);
       $table->addCell(2000)->addText('ပြီးစီးသော ရက်၊လ၊နှစ်', ['bold' => true]);
       $table->addCell(2000)->addText('ဘွဲ့အမည်', ['bold' => true]);
       $table->addCell(2000)->addText('ဘွဲ့ရရှိခုနှစ်', ['bold' => true]);
       foreach ($staff->schools as $index => $school) {
        $table->addRow();
        $table->addCell(500)->addText($index+1);
        $table->addCell(2000)->addText($school->school_name);
        $table->addCell(2000)->addText($school->town);
        $table->addCell(2000)->addText($school->semester ?? '-');
        $table->addCell(2000)->addText($school->roll_no ?? '-');
        $table->addCell(2000)->addText($school->major ?? '-');
        $table->addCell(2000)->addText($school->from_date);
        $table->addCell(2000)->addText($school->to_date);
        $table->addCell(2000)->addText($school->education->name ?? '-');
        $table->addCell(2000)->addText($school->year);
    }
    $section->addText('၄၂။' . 'ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး/ရွာရေး ဆောင်ရွက်မှုများနှင့် အဆင့်အတန်း/တာဝန်'. str_repeat(' ', 5).$staff->student_life_political_social);
    $section->addText('၄၃။' . 'ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သော ကျန်းမာရေး/ အနုပညာ/ ပညာရေး/ စက်မှုလက်မှု'. str_repeat(' ', 5).$staff->habit);
    $section->addText('၄၄။' . 'လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်'. str_repeat(' ', 5).$staff->past_occupation);
    $section->addText('၄၅။' . 'တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင် လုပ်ကိုင်ဆောင်ရွက်ချက်များကို ဖော်ပြပါ'. str_repeat(' ', 5).$staff->revolution);
    $section->addText('၄၆။' . 'အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော အကြောင်းအကျိုးနှင့် လစာ'. str_repeat(' ', 5).$staff->transfer_reason_salary);
    $section->addText('၄၇။' . 'အမှုထမ်းနေစဉ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဉ် အဆင့်အတန်းနှင့် တာဝန်'. str_repeat(' ', 5).$staff->during_work_political_social);
    $section->addText('၄၈။' . 'စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ ရှိ/ မရှိ'. str_repeat(' ', 5).$staff->has_military_friend);
    $section->addText('၄၉။' . 'မိမိနှင့် ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသား ရှိ/ မရှိ၊ ရှိကမည်သည့်အလုပ်အကိုင်၊ လူမျိုး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ရင်းနှီးသည်'. str_repeat(' ', 5).$staff->foreigner_friend_name.'၊'.$staff->foreigner_friend_occupation.'၊'.$staff->foreigner_friend_nationality?->name.'၊'.$staff->foreigner_friend_country?->name.'၊'.$staff->foreigner_friend_how_to_know);
    $section->addText('၅၀။' . 'မိမိအားထောက်ခံသည့် (ကျောင်းဆရာ၊ ရပ်ကွက်လူကြီး၊ တပ်မတော်အရာရှိ)'. str_repeat(' ', 5));
   
    $section->addText('၅၁။' . 'ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/ မရှိ'. str_repeat(' ', 5).en2mm($staff->punishments->count()));

    $section->addText('၅၂။'.'ဖခင်', ['bold' => true]);
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
    $table->addRow();
    $table->addCell(2000)->addText('အမည်', ['bold' => true]);
    $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
    $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
    $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
    $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
    $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
     $table->addRow();
     $table->addCell(2000)->addText($staff->father_name);
     $table->addCell(2000)->addText($staff->father_ethnic?->name);
     $table->addCell(2000)->addText($staff->father_religion?->name);
     $table->addCell(2000)->addText($staff->father_place_of_birth);
     $table->addCell(2000)->addText($staff->father_occupation);
     $table->addCell(2000)->addText($staff->father_address_street.'၊'.$staff->father_address_ward.'၊'.$staff->father_address_township_or_town?->name.'၊'.$staff->father_address_region?->name);
     $section->addText('၅၃။'.'မိခင်', ['bold' => true]);
     $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
     $table->addRow();
     $table->addCell(2000)->addText('အမည်', ['bold' => true]);
     $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
     $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
     $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
     $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
     $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
      $table->addRow();
      $table->addCell(2000)->addText($staff->mother_name);
      $table->addCell(2000)->addText($staff->mother_ethnic?->name);
      $table->addCell(2000)->addText($staff->mother_religion?->name);
      $table->addCell(2000)->addText($staff->mother_place_of_birth);
      $table->addCell(2000)->addText($staff->mother_occupation);
      $table->addCell(2000)->addText($staff->mother_address_street.'၊'.$staff->mother_address_ward.'၊'.$staff->mother_address_township_or_town?->name.'၊'.$staff->mother_address_region?->name);


     $section->addText('၅၄။'.'မိဘ၏ညီအစ်ကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        $table->addCell(2000)->addText('ကျား/မ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
      
        foreach ($staff->siblings as $sibling) {
            $table->addRow();
            $table->addCell(2000)->addText($sibling->name );
            $table->addCell(2000)->addText($sibling->relation->name ?? '');
            $table->addCell(2000)->addText($sibling->gender?->name);
            $table->addCell(2000)->addText($sibling->occupation );
            $table->addCell(2000)->addText($sibling->ethnic?->name);
            $table->addCell(2000)->addText($sibling->religion?->name );
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->place_of_birth); 
        }
        $section->addText('၅၅။'.'အဘ၏ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        $table->addCell(2000)->addText('ကျား/မ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        foreach ($staff->fatherSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->relation?->name);
            $table->addCell(2000)->addText($sibling->gender?->name);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->ethnic?->name);
            $table->addCell(2000)->addText($staff->religion?->name);
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->place_of_birth);
        }
        $section->addText('၅၆။'.'အမိ၏ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        $table->addCell(2000)->addText('ကျား/မ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        foreach ($staff->motherSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name );
            $table->addCell(2000)->addText($sibling->relation->name ?? '' );
            $table->addCell(2000)->addText($sibling->gender?->name  );
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? '');
            $table->addCell(2000)->addText($sibling->religion?->name ?? '');
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->place_of_birth);
        }
        $section->addText('၅၇။'.'ခင်ပွန်း၊ ဇနီးသည်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        foreach ($staff->spouses as $index => $spouse) {
            $table->addRow();
            $table->addCell(500)->addText($index+1);
            $table->addCell(2000)->addText($spouse->name);
            $table->addCell(2000)->addText($spouse->place_of_birth);
            $table->addCell(2000)->addText($spouse->occupation);
            $table->addCell(2000)->addText($spouse->ethnic->name ?? '');
            $table->addCell(2000)->addText($spouse->religion->name ?? '');
            $table->addCell(2000)->addText($spouse->address );
        }
        $section->addText('၅၈။'.'သားသမီးများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ကျား/မ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
       
        foreach ($staff->children as $index => $child) {
            $table->addRow();
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($child->name);
            $table->addCell(2000)->addText($child->gender?->name);
            $table->addCell(2000)->addText($child->place_of_birth);
            $table->addCell(2000)->addText($child->occupation);
            $table->addCell(2000)->addText($child->ethnic?->name ?? '');
            $table->addCell(2000)->addText($child->religion?->name ?? '');
            $table->addCell(2000)->addText($child->address );
        }
        $section->addText('၅၉။'.'ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ကျား/မ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        
        foreach ($staff->spouseSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->gender?->name);
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? '');
            $table->addCell(2000)->addText($sibling->religion?->name ?? '');
            $table->addCell(2000)->addText($sibling->address );
        }
        $section->addText('၆၀။'.'ခင်ပွန်း/ ဇနီး၏ဖခင်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
            $table->addRow();
            $table->addCell(2000)->addText($staff->spouse_father_name);
            $table->addCell(2000)->addText($staff->spouse_father_place_of_birth);
            $table->addCell(2000)->addText($staff->spouse_father_occupation);
            $table->addCell(2000)->addText($staff->spouse_father_ethnic?->name);
            $table->addCell(2000)->addText($staff->spouse_father_religion?->name);
            $table->addCell(2000)->addText( $staff->spouse_father_address_street.','.$staff->spouse_father_address_ward.','.$staff->spouse_father_address_township_or_town?->name.','.$staff->spouse_father_address_district?->name.','.$staff->spouse_father_address_region?->name);

        $section->addText('၆၁။'.'ခင်ပွန်း/ ဇနီးဖခင်၏ညီအစ်ကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('ကျား/မ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
       
        foreach ($staff->spouseFatherSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->relation?->name );
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->gender?->name);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? '');
            $table->addCell(2000)->addText($sibling->religion?->name ?? '');
            $table->addCell(2000)->addText($sibling->address );
          
        }
        $section->addText('၆၂။'.'ခင်ပွန်း/ ဇနီး၏မိခင်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
            $table->addRow();
            $table->addCell(2000)->addText($staff->spouse_mother_name);
            $table->addCell(2000)->addText($staff->spouse_mother_place_of_birth);
            $table->addCell(2000)->addText($staff->spouse_mother_occupation);
            $table->addCell(2000)->addText($staff->spouse_mother_ethnic?->name);
            $table->addCell(2000)->addText($staff->spouse_mother_religion?->name);
            $table->addCell(2000)->addText( $staff->spouse_mother_address_street.','.$staff->spouse_mother_address_ward.','.$staff->spouse_mother_address_township_or_town?->name.','.$staff->spouse_mother_address_district?->name.','.$staff->spouse_mother_address_region?->name);

        $section->addText('၆၃။'.'ခင်ပွန်း/ ဇနီး၏မိခင်၏ညီအစ်ကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('ကျား/မ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        
        foreach ($staff->spouseMotherSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->relation->name ?? 'N/A');
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->gender->name ?? 'N/A');
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->ethnic->name ?? 'N/A');
            $table->addCell(2000)->addText($sibling->religion->name ?? 'N/A');
            $table->addCell(2000)->addText($sibling->address );
         
        }
        $section->addText('၆၄။'.'ရရှိခဲ့သော Diploma/Certificateနှင့် တက်ရောက်ထားသောသင်တန်းများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('Diploma/Certificate အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ကျောင်း/တက္ကသိုလ်/သင်တန်းအမည်', ['bold' => true]);
        $table->addCell(2000)->addText('မှ<br>ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('ထိ<br>ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('သင်တန်းကြေး', ['bold' => true]);
        $table->addCell(2000)->addText('TrainingType(local/foreign)', ['bold' => true]);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true]);
       
        foreach ($staff->trainings as $index => $training) {
            $table->addRow();
            $table->addCell(500)->addText($index + 1);
            $table->addCell(2000)->addText($training->diploma_name);
            $table->addCell(2000)->addText($training->trainingType->name ?? 'N/A');
            $table->addCell(2000)->addText($training->from_date);
            $table->addCell(2000)->addText($training->to_date);
            $table->addCell(2000)->addText($training->fees);
            $table->addCell(2000)->addText($training->trainingLocation->name ?? 'N/A');
            $table->addCell(2000)->addText($training->remark);
          
        }
        $section->addText('၆၅။'.'ရရှိခဲ့သောဆုတံဆိပ်များ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('ဆုတံဆိပ်အမျိူးအစား', ['bold' => true]);
        $table->addCell(2000)->addText('ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမိန့်စာအမှတ်နှင့်အမှတ်စဥ်', ['bold' => true]);
       
        foreach ($staff->awards as $index => $award) {
            $table->addRow();
            $table->addCell(500)->addText($index+1);
            $table->addCell(2000)->addText($award->awardType->name ?? 'N/A');
            $table->addCell(2000)->addText( \Carbon\Carbon::parse($award->order_date)->format('d-m-Y'));
            $table->addCell(2000)->addText($award->order_no );
          
        }  
        $section->addText('၆၆။'.'နိုင်ငံခြားခရီးစဥ်များ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('သွား‌ရောက်သည့်နိုင်ငံ', ['bold' => true]);
        $table->addCell(2000)->addText('မှ<br>ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('ထိ<br>ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('သွား‌ရောက်သည့်အကြောင်းအရာ', ['bold' => true]);
        $table->addCell(2000)->addText('ထောက်ပံ့သည့်နိုင်ငံ/ အဖွဲ့အစည်း', ['bold' => true]);
        foreach ($staff->abroads as $index => $abroad) {
            $table->addRow();
            $table->addCell(500)->addText($index+1);
            $table->addCell(2000)->addText($abroad->country->name ?? 'N/A'); 
            $table->addCell(2000)->addText($abroad->from_date); 
            $table->addCell(2000)->addText($abroad->to_date); 
            $table->addCell(2000)->addText($abroad->particular); 
            $table->addCell(2000)->addText($abroad->sponser); 
        }
       
        $section->addText('၆၇။'.'ယခင်လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('ဌာနအမည် (ဝန်ကြီးဌာန၊ ဦးစီးဌာန) အပြည့်အစုံဖော်ပြရန်	', ['bold' => true]);
        $table->addCell(2000)->addText('ရာထူး', ['bold' => true]);
        $table->addCell(2000)->addText('မှ<br>ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('ထိ<br>ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('လစာစကေး', ['bold' => true]);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true]);
       
       
        foreach ($staff->postings as $index => $posting) {
            $table->addRow();
            $table->addCell(500)->addText( $index+1);
            $table->addCell(2000)->addText($posting->department->name ?? ''); 
            $table->addCell(2000)->addText($posting->rank->name ?? '-'); 
            $table->addCell(2000)->addText($posting->from_date);
            $table->addCell(2000)->addText($posting->to_date); 
            $table->addCell(2000)->addText($posting->rank->payscale->name ?? '-'); 
            $table->addCell(2000)->addText($posting->remark ?? '-'); 
        }
        
        $section->addText('၆၈။'.'လူမှုရေးလုပ်ဆောင်ချက်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အသင်းအဖွဲ့အမည်နှင့်လုပ်ဆောင်မှုများ', ['bold' => true]);
        $table->addCell(2000)->addText('မှ<br>ရက်-လ-နှစ်	', ['bold' => true]);
        $table->addCell(2000)->addText('ထိ<br>ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true]);
       
        foreach ($staff->socialActivities as $index => $activity) {
            $table->addRow();
            $table->addCell(500)->addText($index+1);
            $table->addCell(2000)->addText($activity->particular); 
            $table->addCell(2000)->addText($activity->from_date); 
            $table->addCell(2000)->addText($activity->to_date);  
            $table->addCell(2000)->addText($activity->remark);  
        }

        $section->addText('၆၉။'.'ဘာသာစကားအချက်အလက်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('ဘာသာစကား', ['bold' => true]);
        $table->addCell(2000)->addText('အရေး', ['bold' => true]);
        $table->addCell(2000)->addText('အဖတ်', ['bold' => true]);
        $table->addCell(2000)->addText('အပြော', ['bold' => true]);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true]);
        foreach ($staff->staff_languages as $index => $language) {
            $table->addRow();
            $table->addCell(500)->addText($index+1);
            $table->addCell(2000)->addText($language->language->name ?? 'N/A'); 
            $table->addCell(2000)->addText($language->writing ?? 'N/A'); 
            $table->addCell(2000)->addText($language->reading ?? 'N/A'); 
            $table->addCell(2000)->addText($language->speaking ?? 'N/A');
            $table->addCell(2000)->addText($language->remark ?? 'N/A');  
        }

        $section->addText('၇၀။'.'ပြစ်ဒဏ်များ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('ပြစ်ဒဏ်', ['bold' => true]);
        $table->addCell(2000)->addText('မှ<br>ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('ထိ<br>ရက်-လ-နှစ်', ['bold' => true]);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true]);
        foreach ($staff->punishments as $index => $punishment) {
            $table->addRow();
            $table->addCell(500)->addText($index+1);
            $table->addCell(2000)->addText($punishment->penaltyType?->name ?? 'N/A'); 
            $table->addCell(2000)->addText(\Carbon\Carbon::parse($punishment->from_date)->format('d/m/Y')); 
            $table->addCell(2000)->addText(\Carbon\Carbon::parse($punishment->to_date)->format('d/m/Y')); 
            $table->addCell(2000)->addText($punishment->reason);
        }
       
       $section->addText('၇၁။','အထက်ပါအချက်အလက်များမှန်ကန်ကြောင်းလက်မှတ်ရေးထိုးပါသည်။', ['bold' => true]);
       $section->addText('လက်မှတ်: -', ['align' => 'center']);
       $section->addText('အမည်: ', ['align' => 'center']);
       $section->addText('ရာထူ: ', ['align' => 'center']);
       $section->addText('ဌာန: ', ['align' => 'center']);
      
        $fileName = 'staff_report_' . $staff->id . '.docx';
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
        $staff = Staff::get()->first();
        return view('livewire.pdf-staff-report71', [
            'staff' => $staff,
        ]);
    }
}







