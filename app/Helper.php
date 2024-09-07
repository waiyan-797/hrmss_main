<?php
if (! function_exists('getcsv')) {
    function getcsv($f)
    {
        $fp = fopen($f, 'r');
        $lines = [];

        while(!feof($fp) && ($line = fgetcsv($fp)) !== false) {
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

        return collect([$year, $month, $day])->map(fn ($c, $i) => ($c ? en2mm($c).' '.$units[$i] : ''))->join(' ');
    }
}

