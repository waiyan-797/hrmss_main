<?php

namespace App\Livewire\StaffList;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class Age18OverStaffList extends Component
{
    public function go_pdf(){
        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        $third_ranks = Rank::where('staff_type_id', 3)->get();
        $all_ranks = Rank::get();
        $data = [
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ];
        $pdf = PDF::loadView('pdf_reports.age18_over_staff_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'age18_over_staff_list_pdf.pdf');
    }
    public function go_word()
{
    $first_ranks = Rank::where('staff_type_id', 1)->get();
    $second_ranks = Rank::where('staff_type_id', 2)->get();
    $third_ranks = Rank::where('staff_type_id', 3)->get();
    $all_ranks = Rank::get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
    $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
    $section->addTitle('အသက် ၁၈ နှစ်နှင့်အထက် ရှိသောဝန်ထမ်းဦးရေစာရင်း', 2);

    // Create table
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

    // Add header row
    $table->addRow();
    $table->addCell(2000)->addText('စဥ်', ['bold' => true]);
    $table->addCell(4000)->addText('ရာထူးအမည်', ['bold' => true]);
    $table->addCell(2000)->addText('ကျား', ['bold' => true]);
    $table->addCell(2000)->addText('မ', ['bold' => true]);
    $table->addCell(2000)->addText('စုစုပေါင်း', ['bold' => true]);

    
    foreach ($first_ranks as $index=> $rank) {
        $table->addRow();
        $table->addCell(2000)->addText(en2mm($index + 1));
        $table->addCell(4000)->addText($rank->name);
        $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count()));
        $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count()));
        $table->addCell(2000)->addText(en2mm($rank->staffs->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count()));
    }

   
    $table->addRow();
    $table->addCell(2000)->addText('');
    $table->addCell(4000)->addText('စုစုပေါင်း အရာထမ်း');
    $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())));
    $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())));
    $table->addCell(2000)->addText(en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count())));
     

    foreach ($second_ranks as $index=> $rank) {
        $table->addRow();
        $table->addCell(2000)->addText(en2mm($index + 1));
        $table->addCell(4000)->addText($rank->name);
        $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count()));
        $table->addCell(2000)->addText(en2mm($rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count()));
        $table->addCell(2000)->addText(en2mm($rank->staffs->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count()) );
    }

 
    $table->addRow();
    $table->addCell(2000)->addText('');
    $table->addCell(4000)->addText('စုစုပေါင်း အမှုထမ်း', ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())) );
    $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())) );
    $table->addCell(2000)->addText(en2mm($second_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())));
    $table->addRow();
    $table->addCell(2000)->addText('၁');
    $table->addCell(2000)->addText('နေ့စား');
    $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())));
    $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())));
    $table->addCell(2000)->addText(en2mm($third_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())));

    $table->addRow();
    $table->addCell(2000)->addText('');
    $table->addCell(2000)->addText('စုစုပေါင်း ဝန်ထမ်းဦးရေ', ['bold' => true]);
    $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())));
    $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())));
    $table->addCell(2000)->addText(en2mm($all_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => \Carbon\Carbon::parse($staff->dob)->diffInYears(\Carbon\Carbon::now()) > 18)->count())) );
   
    $fileName = 'age18_over_staff_list.docx';
    $filePath = storage_path('app/' . $fileName);
    $phpWord->save($filePath);

    return response()->download($filePath)->deleteFileAfterSend(true);
}


     public function render()
     {
        $first_ranks = Rank::where('staff_type_id', 1)->get();
        $second_ranks = Rank::where('staff_type_id', 2)->get();
        $third_ranks = Rank::where('staff_type_id', 3)->get();
        $all_ranks = Rank::get();
        return view('livewire.staff-list.age18-over-staff-list',[
            'first_ranks' => $first_ranks,
            'second_ranks' => $second_ranks,
            'third_ranks' => $third_ranks,
            'all_ranks' => $all_ranks,
        ]);
     }
}



// @foreach ($second_ranks as $rank)
// <tr>
//     <td>{{ en2mm($loop->index + 1) }}</td>
//     <td>{{ $rank->name }}</td>
//     <td>
//         {{ en2mm($rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count()) }}
//     </td>
//     <td>
//         {{ en2mm($rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count()) }}
//     </td>
//     <td>
//         {{ en2mm($rank->staffs->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count()) }}
//     </td>
// </tr>
// @endforeach
// <tr class="font-bold">
// <td></td>
// <td>စုစုပေါင်း အမှုထမ်း</td>
// <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
// <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
// <td>{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
// </tr>
// <tr>
// <td>၁</td>
// <td>နေ့စား</td>
// <td>{{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
// <td>{{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
// <td>{{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
// </tr>
// <tr class="font-bold">
// <td></td>
// <td>စုစုပေါင်း ဝန်ထမ်းဦးရေ</td>
// <td>{{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
// <td>{{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
// <td>{{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->filter(fn($staff) => Carbon\Carbon::parse($staff->dob)->diffInYears(Carbon\Carbon::now()) > 18)->count())) }}</td>
// </tr>