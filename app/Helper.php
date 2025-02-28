<?php

use App\Models\Country;
use App\Models\Division;
use App\Models\Leave;
use App\Models\Rank;
use App\Models\Region;
use App\Models\Salary;
use App\Models\Staff;
use App\Models\Township;
use App\Models\TrainingType;
use Carbon\Carbon;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;

if (! function_exists('getcsv')) {
    function getcsv($f)
    {
        $fp = fopen($f, 'r');
        $lines = [];

        while (!feof($fp) && ($line = fgetcsv($fp)) !== false) {
            $lines[] = $line;
        }

        fclose($fp);

        return $lines;
    }
}



if (! function_exists('en2mm')) {
    function en2mm($content)
    {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $my = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];

        return str_replace($en, $my, (string) $content);
    }
}





if (! function_exists('formatPeriodMM')) {
    function formatPeriodMM($year = 0, $month = 0, $day = 0)
    {
        $units = ['နှစ်', 'လ', 'ရက်'];

        return collect([$year, $month, $day])->map(fn($c, $i) => ($c ? en2mm($c) . ' ' . $units[$i] : ''))->join(' ');
    }
}



if (! function_exists('formatDMY')) {
    function formatDMY($date)
    {

        if($date){
            $formatted_date = \Carbon\Carbon::parse($date)->format('d-m-y');

            return $formatted_date;
        }
        else{
            return '';
        }

    }
}

if (! function_exists('formatDMYmm')) {
    function formatDMYmm($date)
    {

        if($date){
            $formatted_date = \Carbon\Carbon::parse($date)->format('j-n-Y');

            return en2mm($formatted_date);
        }
        else{
            return '';
        }

    }
}

if (! function_exists('myanmarAlphabet')) {
    function myanmarAlphabet($id)
    {
        $alphabets = ['က', 'ခ', 'ဂ', 'ဃ', 'င', 'စ', 'ဆ', 'ဇ', 'ဈ', 'ည', 'ဋ', 'ဌ', 'ဍ', 'ဎ', 'ဏ', 'တ', 'ထ', 'ဒ', 'ဓ', 'န', 'ပ', 'ဖ', 'ဗ', 'ဘ', 'မ', 'ယ', 'ရ', 'လ', 'ဝ', 'သ', 'ဟ', 'ဠ', 'အ'];

        return isset($alphabets[$id]) ? $alphabets[$id] : '';
    }
}





if (! function_exists('getOthersInTrainingType')) {
    function getOthersInTrainingType()
    {


        return TrainingType::where('name','အခြား')->first()?->id;
    }
}







if (! function_exists('dateDiff')) {
    function dateDiff($from_date, $to_date)
    {
        $diff = \Carbon\Carbon::parse($from_date)->diff(\Carbon\Carbon::parse($to_date));
        return $diff;
    }
}

if (! function_exists('dateDiffYMD')) {
    function dateDiffYMD($from_date, $to_date)
    {

        $diff = \Carbon\Carbon::parse($from_date)->diff(\Carbon\Carbon::parse($to_date));
        $diff_year = $diff->y ? en2mm($diff->y).' နှစ် ' : '';
        $diff_month = $diff->m ? en2mm($diff->m).' လ ' : '';
        $diff_day = $diff->d ? en2mm($diff->d).' ရက် ' : '';
        $diffYMD = "{$diff_year} {$diff_month} {$diff_day}";
        return $diffYMD  ;
    }
}


if (! function_exists('dateDiffYMDWithoutDays')) {  //ရက်မပါ နှစ်နှင့်လပါပဲ
    function dateDiffYMDWithoutDays($from_date, $to_date)
    {

        $diff = \Carbon\Carbon::parse($from_date)->diff(\Carbon\Carbon::parse($to_date));
        $diff_year = $diff->y ? en2mm($diff->y).' နှစ် ' : '';
        $diff_month = $diff->m ? en2mm($diff->m).' လ ' : '';
        // $diff_day = $diff->d ? en2mm($diff->d).' ရက် ' : '';
        $diffYMD = "{$diff_year} {$diff_month} ";
        return $diffYMD  ;
    }
}



//for changing from 01 to ၁ in calendar month
if (!function_exists('mmMonth')) {
    function mmMonth($month)
    {
        // Array of Myanmar month names
        $monthsInMyanmar = [
            01 => '၁',
            02 => '၂',
            03 => '၃',
            04 => '၄',
            5 => '၅',
            6 => '၆',
            7 => '၇',
            8 => '၈',
            9 => '၉',
            10 => '၁၀',
            11 => '၁၁',
            12 => '၁၂',
        ];

        return $monthsInMyanmar[(int) $month] ?? null;
    }
}





if (!function_exists('mmDateFormat')) {
    function mmDateFormat($year, $month)
    {
        // Array of Myanmar month names

        $monthsInMyanmar = [
            1 => 'ဇန်နဝါရီလ',
            2 => 'ဖေဖော်ဝါရီလ',
            3 => 'မတ်လ',
            //
            4 => 'ဧပြီလ',
            5 => 'မေလ',
            6 => 'ဇွန်လ',
            7 => 'ဇူလိုင်လ',
            8 => 'ဩဂုတ်လ',
            9 => 'စက်တင်ဘာလ',
            10 => 'အောက်တိုဘာလ',
            11 => 'နိုဝင်ဘာလ',
            12 => 'ဒီဇင်ဘာလ',
        ];



        $month = intval($month);
        if ($month < 1 || $month > 12) {
            return 'Invalid month. Please provide a month between 1 and 12.';
        }

        // Get the Myanmar month name
        $myanmarMonth = $monthsInMyanmar[$month];

        // Return formatted date

        $year = en2mm($year);
        return "$year ခုနှစ် ၊ $myanmarMonth"; // ၂၀၂၄ ခုနှစ် ဒီဇင်ဘာလ
    }

}

    if (!function_exists('mmDateFormatYearMonthDay')) {
        function mmDateFormatYearMonthDay($year, $month , $day )
        {
            // Array of Myanmar month names

            $monthsInMyanmar = [
                1 => 'ဇန်နဝါရီလ',
                2 => 'ဖေဖော်ဝါရီလ',
                3 => 'မတ်လ',
                //
                4 => 'ဧပြီလ',
                5 => 'မေလ',
                6 => 'ဇွန်လ',
                7 => 'ဇူလိုင်လ',
                8 => 'ဩဂုတ်လ',
                9 => 'စက်တင်ဘာလ',
                10 => 'အောက်တိုဘာလ',
                11 => 'နိုဝင်ဘာလ',
                12 => 'ဒီဇင်ဘာလ',
            ];

            $month = intval($month);
            if ($month < 1 || $month > 12) {
                return 'Invalid month. Please provide a month between 1 and 12.';
            }

            // Get the Myanmar month name
            $myanmarMonth = $monthsInMyanmar[$month];

            // Return formatted date

            $year = en2mm($year);
            return "$year ခုနှစ်၊ $myanmarMonth $day ရက်"; // ၂၀၂၄ ခုနှစ် ဒီဇင်ဘာလ
        }

    }

    // if (!function_exists('getTdyDateInMyanmarYearMonthDay')) { // ယနေ့ရက်စွဲရန်
    //     function getTdyDateInMyanmarYearMonthDay($type)
    //     {

    //         // $type 1 // ၂၀၂၄ ခုနှစ် ဒီဇင်ဘာလ  3ရက်
    //         // $type 2 // ၂၀၂၄-၁၂-၃

    //         $now  = explode('-' ,Carbon::now()->format('Y-m-d'));
    //       if($type == 1 ) {
    //         return mmDateFormatYearMonthDay($now[0], $now[1] , $now[2]);

    //       }
    //       if(
    //         $type == 2
    //       ){
    //         return formatDMYmm(Carbon::now());

    //       }
    //     }
    // }


    if (!function_exists('getTdyDateInMyanmarYearMonthDay')) {
        function getTdyDateInMyanmarYearMonthDay($type)
        {
            // Get the current date in Y-m-d format
            $now = Carbon::now();
            $year = $now->year;
            $month = $now->month;
            $day = $now->day;

            // Myanmar month names
            $myanmarMonths = [
                1 => 'ဇန်နဝါရီလ',
                2 => 'ဖေဖော်ဝါရီလ',
                3 => 'မတ်လ',
                4 => 'ဧပြီလ',
                5 => 'မေလ',
                6 => ' ဇွန်လ',
                7 => 'ဇူလိုင်လ',
                8 => 'ဩဂုတ်လ',
                9 => 'စက်တင်ဘာလ',
                10 => 'အောက်တိုဘာလ',
                11 => 'နိုဝင်ဘာလ',
                12 => 'ဒီဇင်ဘာလ',
            ];

            // Myanmar year formatting (e.g., ၂၀၂၄)
            $myanmarYear = convertNumberToMyanmar($year);

            // Format the date depending on the type
            if ($type == 1) {
                // Format: ၂၀၂၄ ခုနှစ် ဒီဇင်ဘာလ ၃ ရက်
                return $myanmarYear . ' ခုနှစ် ' . $myanmarMonths[$month] . ' ' . convertNumberToMyanmar($day) . ' ရက်';
            }

            if ($type == 2) {
                // Format: 2024-12-03 (standard format)
                return $now->format('Y-m-d');
            }
        }
    }

    // Helper function to convert numbers to Myanmar format
    if (!function_exists('convertNumberToMyanmar')) {
        function convertNumberToMyanmar($number)
        {
            $myanmarNumbers = [
                '0' => '၀', '1' => '၁', '2' => '၂', '3' => '၃', '4' => '၄',
                '5' => '၅', '6' => '၆', '7' => '၇', '8' => '၈', '9' => '၉'
            ];
            return strtr($number, $myanmarNumbers);
        }
    }


    if (!function_exists('getCountryNameById')) {
        function getCountryNameById($id)
        {
            return Country::where('id', $id)->first()->name;
        }
    }


    if (!function_exists('getDivisionBy')) {
        function getDivisionBy($id)
        {
            return Division::findOrFail($id);
        }
    }
    if (!function_exists('getRankById')) {
        function getRankById($id)
        {
            return Rank::findOrFail($id);
        }
    }
if (!function_exists('financeYear')) {

    function financeYear()
    {
        return [
            [
                4,
                5,
                6,
                7,
                8,
                9,
                10,
                11,
                12
            ],
            [
                1,
                2,
                3
            ]

        ];
    }
}

if (!function_exists('getSalary')) {

function getSalary($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('current_salary');
}
}
if (!function_exists('getAddition')) {

function getAddition($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('addition');
}
}
if (!function_exists('getDeductionInsurance')) {

function getDeductionInsurance($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('deduction_insurance');
}

}
if (!function_exists('getLeveTypeOne')) {

function getLeveTypeOne($month, $year)
{

    return    Leave::whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->where('leave_type_id', 1)
        ->count();
}
}
if (!function_exists('getLeveTypeTwo')) {

function getLeveTypeTwo($month, $year)
{

    return    Leave::whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->where('leave_type_id', 2)
        ->count();
}

}
if (!function_exists('getDeductionTax')) {

function getDeductionTax($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('deduction_tax');
}
}


if (!function_exists('getNetActualSalary')) {

function getNetActualSalary($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('actual_salary');
}
}



if (!function_exists('get2monthDeduction')) {
    function get2monthDeduction($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('deduction');
}
}


if (!function_exists(function: 'getStartOfMonth')) {
    function getStartOfMonth($date){
    return Carbon::parse($date)->startOfMonth()->format('d-m-Y');
}
}


if (!function_exists(function: 'getNextDay')) {

function getNextDay($date){
    return Carbon::parse($date)->addDay()->format('d-m-Y');
}
}

if (!function_exists(function: 'toMMText')) {

function toMMText($integer) {
    $name = ['', 'ဆယ်', 'ရာ', 'ထောင်', 'သောင်း', 'သိန်း', 'သန်း'];

    $integerArray = array_reverse(array_map('intval', str_split((string)$integer)));

    $strr = '';
    foreach ($integerArray as $index => $value) {

        if ($value > 0) {
            $mmSay =  $index  > 6 ?  ''   :    $name[$index];
            $strr = en2mmText($value) . $mmSay . $strr;
        }
    }
    return $strr.'ကျပ်';
}
}

if (! function_exists('en2mmText')) {
    function en2mmText($content)
    {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $my = ['သုည', 'တစ်', 'နှစ်', 'သုံး', 'လေး', 'ငါး', 'ခြောက်', 'ခုနှစ်', 'ရှစ်', 'ကိုး', 'ဆယ်'];

        return str_replace($en, $my, (string) $content);
    }
}



if (!function_exists('getFirstOf')) {
    function getFirstOf($modelName)
    {
        // Build the fully qualified class name
        $class = 'App\Models\\' . $modelName;

        // Check if the class exists
        if (class_exists($class)) {
            // Instantiate the model and return the first record
            return (new $class)->first();
        }


        throw new Exception("Model {$modelName} does not exist.");
    }
}





if (!function_exists('getAddress')) {
    function getAddress(  $street , $ward  , $townshipId ,$regionId)
    {
        $regionName = Region::find($regionId)->name;
        $townshipName = Township::find($townshipId)->name;






        return $street . '၊' . $ward  . '၊' . $townshipName . '၊' . $regionName ;
    }
}



if (!function_exists(function: 'endsWithSiblings')) {

    function endsWithSiblings($string) {
        return substr($string, -8) === 'siblings' ;
    }


}

// endsWithSiblings($key) ? $relations->where('relation_ship_type_id' , 1 ) : $relations
if (!function_exists(function: 'getRelatedRsType')) {

    function getRelatedRsType($relations , $key) {

        if($key == 'spouse_father_siblings'){
            return $relations->whereIn('relation_ship_type_id' , [1,2])->where('id' ,'!=' , 5  ) ;
        }
        elseif( $key == 'spouse_mother_siblings'){
                        return $relations->whereIn('relation_ship_type_id' , [1,2])->where('id','!=' , 6) ;

        }

        elseif(endsWithSiblings($key)){
            return $relations->where('relation_ship_type_id' , 1 ) ;
        }

        elseif($key == 'spouses'){
            return $relations->where('relation_ship_type_id' , 3 ) ;

        }
        elseif($key=='children'){
            return $relations->where('relation_ship_type_id' , 5 ) ;

        }
        else{
            return $relations ;
        }


    }


}
