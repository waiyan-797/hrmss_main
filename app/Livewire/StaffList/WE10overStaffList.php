<?php

namespace App\Livewire\StaffList;

use App\Models\Rank;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class WE10overStaffList extends Component
{
    public $exp_years = 10;
    public function go_pdf()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        $third_ranks = Rank::where('staff_type_id', 3)->get();
        $all_ranks = Rank::get();
        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
            'exp_years' => $this->exp_years
        ];
        $pdf = PDF::loadView('pdf_reports.w-e10over_staff_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'w-e10over_staff_list_report.pdf');
    }
    public function go_word()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        $third_ranks = Rank::where('staff_type_id', 3)->get();
        $all_ranks = Rank::get();

        // Create a new PhpWord object
        $phpWord = new PhpWord();


        $section = $phpWord->addSection();

        // Add title
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle('လက်ရှိရာထူးတွင် လုပ်သက် ၁၀ နှစ်နှင့်အထက် ရှိသောဝန်ထမ်းဦးရေစာရင်း', 2);

        // Create table
        $table = $section->addTable([
            'borderSize' => 6,
            'cellMargin' => 80,
        ]);


        $table->addRow();
        $table->addCell(2000)->addText('စဥ်', ['bold' => true, 'align' => 'center']);
        $table->addCell(2000)->addText('ရာထူးအမည်', ['bold' => true, 'align' => 'center']);
        $table->addCell(2000)->addText('ကျား', ['bold' => true, 'align' => 'center']);
        $table->addCell(2000)->addText('မ', ['bold' => true, 'align' => 'center']);
        $table->addCell(2000)->addText('စုစုပေါင်း', ['bold' => true, 'align' => 'center']);


        foreach ($first_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1), ['align' => 'center']);
            $table->addCell(2000)->addText($rank->name, ['align' => 'center']);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count()), ['align' => 'center']);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count()), ['align' => 'center']);
            $table->addCell(2000)->addText(en2mm($rank->staffs->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count()), ['align' => 'center']);
        }


        $table->addRow();
        $table->addCell(2000)->addText();
        $table->addCell(2000)->addText('စုစုပေါင်း အရာထမ်း', ['bold' => true, 'align' => 'center']);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())), ['align' => 'center']);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())), ['align' => 'center']);
        $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count())), ['align' => 'center']);

        foreach ($second_ranks as $index => $rank) {
            $table->addRow();
            $table->addCell(2000)->addText(en2mm($index + 1));
            $table->addCell(4000)->addText($rank->name);
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count()));
            $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count()));
            $table->addCell(2000)->addText();
        }


        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(4000)->addText('စုစုပေါင်း အမှုထမ်း', ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())));
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())));
        $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())));
        $table->addRow();
        $table->addCell(2000)->addText('၁');
        $table->addCell(2000)->addText('နေ့စား');
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())));
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())));
        $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())));

        $table->addRow();
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('စုစုပေါင်း ဝန်ထမ်းဦးရေ', ['bold' => true]);
        $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())));
        $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())));
        $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => \Carbon\Carbon::parse($staff->join_date)->diffInYears(\Carbon\Carbon::now()) > 10)->count())));
        $fileName = 'we_10over_staff_list_.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        return response()->stream(function () use ($objWriter) {
            $objWriter->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }




    public function render()
    {
        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        $third_ranks = Rank::where('staff_type_id', 3)->get();
        $all_ranks = Rank::get();
        return view('livewire.staff-list.w-e10over-staff-list', [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ]);
    }
}
