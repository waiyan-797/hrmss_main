<?php

namespace App\Livewire\StaffList;

use App\Models\BloodType;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;


class BloodStaffList6 extends Component
{

    public $bloodTypes, $selectedBlood_type;

    public function go_pdf()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $third_ranks = Rank::where('staff_type_id', 3)->withCount('staffs')->get();
        $all_ranks = Rank::withCount('staffs')->get();

        $bloodName = BloodType::find($this->selectedBlood_type)->name;
        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'first_second_ranks' => $first_second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
            'selectedBlood_type' => $this->selectedBlood_type,
            'bloodTypes' => $this->bloodTypes,
            'bloodName' => $bloodName

        ];
        $pdf = PDF::loadView('pdf_reports.blood_staff_list6_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'blood_staff_list_pdf.pdf');
    }
    public function go_word()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $third_ranks = Rank::where('staff_type_id', 3)->withCount('staffs')->get();
        $all_ranks = Rank::withCount('staffs')->get();

        // Create a new PHPWord object
        $phpWord = new PhpWord();
        // $section = $phpWord->addSection();
        $section = $phpWord->addSection([
            'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.27), // A4 width in inches
            'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11.69), // A4 height in inches
            'orientation' => 'portrait',
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.8),
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.7),
        ]);
        

        // Add titles
        // $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        // $section->addTitle('သွေးအုပ်စု A ရှိသောဝန်ထမ်းစာရင်း', 2);
        $phpWord->setDefaultFontSize(13); 
        $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true, 'size' => 13], ['align' => 'center']);
        $section->addText('သွေးအုပ်စု A ရှိသောဝန်ထမ်းစာရင်း', ['bold' => true, 'size' => 13], ['align' => 'center']);

        // Add a table
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 350, 'spaceBefore' => 350];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 300, 'spaceBefore' => 300];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];

        // Add table header
        $table->addRow();
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_3);
        $table->addCell(6000)->addText('ရာထူးအမည်', ['bold' => true],$pStyle_3);
        $table->addCell(4000)->addText('ကျား', ['bold' => true],$pStyle_3);
        $table->addCell(4000)->addText('မ', ['bold' => true],$pStyle_3);
        $table->addCell(4000)->addText('စုစုပေါင်း', ['bold' => true],$pStyle_3);

        // Add rows for first ranks
        foreach ($first_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(700)->addText(en2mm($index + 1),null,$pStyle_3);
            $table->addCell(6000)->addText($rank->name,null,$pStyle_3);
            $table->addCell(4000)->addText(en2mm($rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count()),null,$pStyle_3);
            $table->addCell(4000)->addText(en2mm($rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count()),null,$pStyle_3);
            $table->addCell(4000)->addText(en2mm($rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count() + $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count()),null,$pStyle_3);
        }

        // Add summary row for first ranks
        $table->addRow();
        $table->addCell(700)->addText('');
        $table->addCell(6000)->addText('စုစုပေါင်း အရာထမ်း', ['bold' => true],null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count())),null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())),null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count() + $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())),null,$pStyle_3);

        foreach ($second_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(700)->addText(en2mm($index + 1),null,$pStyle_3);
            $table->addCell(6000)->addText($rank->name,null,$pStyle_3);
            $table->addCell(4000)->addText(en2mm($rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count()),null,$pStyle_3);
            $table->addCell(4000)->addText(en2mm($rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count()),null,$pStyle_3);
            $table->addCell(4000)->addText(en2mm($rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count() + $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count()),null,$pStyle_3);
        }

        // Add summary row for first ranks
        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(6000)->addText('စုစုပေါင်း အမှုထမ်း', ['bold' => true],null,$pStyle_2);
        $table->addCell(4000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count())),null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())),null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count() + $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())),null,$pStyle_3);
        // $table->addRow();
        // $table->addCell(2000)->addText('');
        // $table->addCell(4000)->addText('စုစုပေါင်း အရာထမ်း အမှုထမ်း', ['bold' => true]);
        // $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count())));
        // $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())));
        // $table->addCell(2000)->addText(en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count() + $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())));
        $table->addRow();
        $table->addCell(700)->addText('၁',null,$pStyle_3);
        $table->addCell(4000)->addText('နေ့စား',null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count())),null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())),null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count() + $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())),null,$pStyle_3);
        $table->addRow();
        $table->addCell(700)->addText('');
        $table->addCell(4000)->addText('စုစုပေါင်း ဝန်ထမ်းဦးရေ', ['bold' => true],null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count())),null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())),null,$pStyle_3);
        $table->addCell(4000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('blood_type_id', 1)->where('gender_id', 1)->count() + $rank->staffs->where('blood_type_id', 1)->where('gender_id', 2)->count())),null,$pStyle_3);
        $fileName = 'blood_staff_list.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        return response()->stream(function () use ($objWriter) {
            $objWriter->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="' . 'blood_staff_list.docx"',
        ]);
    }
    public function mount()
    {
        $this->bloodTypes = BloodType::all();
        $this->selectedBlood_type  = 1;
    }
    public function render()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->withCount('staffs')->get();
        $second_ranks = Rank::where('staff_type_id', 2)->withCount('staffs')->get();
        $first_second_ranks = Rank::whereIn('staff_type_id', [1, 2])->withCount('staffs')->get();
        $third_ranks = Rank::where('staff_type_id', 3)->withCount('staffs')->get();
        $all_ranks = Rank::withCount('staffs')->get();

        $bloodName = BloodType::find($this->selectedBlood_type)->name;
        return view('livewire.staff-list.blood-staff-list6', [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'first_second_ranks' => $first_second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
            'bloodTypes' => $this->bloodTypes,
            'bloodName' =>   $bloodName
        ]);
    }
}
