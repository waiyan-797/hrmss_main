<?php

namespace App\Exports;

use App\Models\Staff;
use App\Models\PensionYear;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PA17 implements FromView, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return PA17::all();
    // }
    public $staffs;
    public $pension_year;
    public $rankId;
    public $deptId;
    public $startDate;

    public function __construct($rankId, $deptId, $startDate)
    {
        $this->rankId = $rankId;
        $this->deptId = $deptId;
        $this->startDate = $startDate;
    }

    public function view(): View
    {
        $staffQuery = Staff::query();


        // Independent rank filter
        if ($this->rankId) {
            $staffQuery = Staff::query()->whereHas('currentRank', function ($query) {
                $query->where('id', $this->rankId);
            });
        }

        // Independent department filter
        if ($this->deptId) {
            $staffQuery = Staff::query()->where('current_division_id', $this->deptId);
        }

        // Independent start date filter
        if ($this->startDate) {
            $staffQuery = Staff::query()->whereDate('join_date', '=', $this->startDate);
        }

        $pension_year = PensionYear::where('id', 1)->value('year');
        $this->staffs = $staffQuery->get();
        $this->pension_year = $pension_year;

        return view('excel_reports.staff_report_2', [
            'staffs' => $this->staffs,
            'pension' => $this->pension_year,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Set paper size and orientation
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LEGAL); // Set paper size to A4
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE); // Set orientation to Landscape

        // Fit to page width
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // $sheet->getPageSetup()->setScale(80);

        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setRight(0.18);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet ->getPageMargins()->setBottom(0.67);
        $sheet->getPageMargins()->setHeader(0.3);
        $sheet->getPageMargins()->setFooter(0.67);

        // Enable gridlines for unbordered areas
        $sheet->setShowGridlines(true);
        // $sheet->setPrintGridlines(true);

        // Dynamically calculate the highest row and column
        $highestRow = $sheet->getHighestRow()-1; // e.g. 19
        $highestColumn = $sheet->getHighestColumn(); // e.g. 'N'

        $sheet->getColumnDimension('A')->setWidth(6.34);
        $sheet->getColumnDimension('B')->setWidth(26.45);
        $sheet->getColumnDimension('C')->setWidth(30.66);
        $sheet->getColumnDimension('D')->setWidth(27.44);
        $sheet->getColumnDimension('E')->setWidth(15.33);
        $sheet->getColumnDimension('F')->setWidth(16.66);
        $sheet->getColumnDimension('G')->setWidth(14.44);
        $sheet->getColumnDimension('H')->setWidth(28.33);
        $sheet->getColumnDimension('I')->setWidth(36.88);
        $sheet->getColumnDimension('J')->setWidth(14.99);
        $sheet->getColumnDimension('K')->setWidth(17.);
        $sheet->getColumnDimension('L')->setWidth(10.77);

        $sheet->getRowDimension(1)->setRowHeight(27);
        $sheet->getRowDimension(2)->setRowHeight(27);
        $sheet->getRowDimension(4)->setRowHeight(75);
        $sheet->getRowDimension(5)->setRowHeight(46.5);
        $sheet->getRowDimension(6)->setRowHeight(48.8);
        $sheet->getRowDimension(7)->setRowHeight(73.5);
        $sheet->getRowDimension(8)->setRowHeight(97.5);
        $sheet->getRowDimension(9)->setRowHeight(129.8);
        $sheet->getRowDimension(10)->setRowHeight(76.5);
        $sheet->getRowDimension(11)->setRowHeight(51.8);
        $sheet->getRowDimension(12)->setRowHeight(45.8);
        $sheet->getRowDimension(13)->setRowHeight(45.8);
        $sheet->getRowDimension(14)->setRowHeight(72.8);
        $sheet->getRowDimension(15)->setRowHeight(97.5);
        $sheet->getRowDimension(16)->setRowHeight(48.8);
        $sheet->getRowDimension(17)->setRowHeight(48.8);
        $sheet->getRowDimension(18)->setRowHeight(49.5);
        $sheet->getRowDimension(19)->setRowHeight(75.8);
        $sheet->getRowDimension(20)->setRowHeight(47.3);
        $sheet->getRowDimension(21)->setRowHeight(49.5);
        $sheet->getRowDimension(22)->setRowHeight(71.3);
        $sheet->getRowDimension(23)->setRowHeight(75.8);
        $sheet->getRowDimension(24)->setRowHeight(48.8);
        $sheet->getRowDimension(25)->setRowHeight(94.5);
        $sheet->getRowDimension(26)->setRowHeight(48.8);
        $sheet->getRowDimension(27)->setRowHeight(48.8);
        $sheet->getRowDimension(28)->setRowHeight(48.8);
        $sheet->getRowDimension(29)->setRowHeight(122.3);
        $sheet->getRowDimension(30)->setRowHeight(100.5);
        $sheet->getRowDimension(31)->setRowHeight(47.3);
        $sheet->getRowDimension(32)->setRowHeight(51);
        $sheet->getRowDimension(33)->setRowHeight(48);
        $sheet->getRowDimension(34)->setRowHeight(48.8);
        $sheet->getRowDimension(35)->setRowHeight(76.5);
        $sheet->getRowDimension(36)->setRowHeight(46.5);
        $sheet->getRowDimension(37)->setRowHeight(48);
        $sheet->getRowDimension(38)->setRowHeight(69.8);
        $sheet->getRowDimension(39)->setRowHeight(51.8);
        $sheet->getRowDimension(40)->setRowHeight(50.3);
        $sheet->getRowDimension(41)->setRowHeight(46.5);
        $sheet->getRowDimension(42)->setRowHeight(51);
        $sheet->getRowDimension(43)->setRowHeight(48);
        $sheet->getRowDimension(44)->setRowHeight(48);
        $sheet->getRowDimension(45)->setRowHeight(68.3);
        $sheet->getRowDimension(46)->setRowHeight(51);
        $sheet->getRowDimension(47)->setRowHeight(51);
        $sheet->getRowDimension(48)->setRowHeight(51);
        $sheet->getRowDimension(49)->setRowHeight(51);
        $sheet->getRowDimension(50)->setRowHeight(72);
        $sheet->getRowDimension(51)->setRowHeight(47.3);
        $sheet->getRowDimension(52)->setRowHeight(45.8);
        $sheet->getRowDimension(53)->setRowHeight(67.5);
        $sheet->getRowDimension(54)->setRowHeight(47.3);
        $sheet->getRowDimension(55)->setRowHeight(75.8);
        $sheet->getRowDimension(56)->setRowHeight(45.8);
        $sheet->getRowDimension(57)->setRowHeight(45.8);
        $sheet->getRowDimension(58)->setRowHeight(45.8);
        $sheet->getRowDimension(59)->setRowHeight(51.8);
        $sheet->getRowDimension(60)->setRowHeight(48);
        $sheet->getRowDimension(61)->setRowHeight(52.5);
        $sheet->getRowDimension(62)->setRowHeight(52.5);
        $sheet->getRowDimension(63)->setRowHeight(96);
        $sheet->getRowDimension(64)->setRowHeight(72.8);
        $sheet->getRowDimension(65)->setRowHeight(54.8);
        $sheet->getRowDimension(66)->setRowHeight(75.8);
        $sheet->getRowDimension(67)->setRowHeight(45.8);
        $sheet->getRowDimension(68)->setRowHeight(45.8);
        $sheet->getRowDimension(69)->setRowHeight(45.8);
        $sheet->getRowDimension(70)->setRowHeight(45.8);
        $sheet->getRowDimension(71)->setRowHeight(45.8);
        $sheet->getRowDimension(72)->setRowHeight(47.3);
        $sheet->getRowDimension(73)->setRowHeight(47.3);
        $sheet->getRowDimension(74)->setRowHeight(139.5);
        $sheet->getRowDimension(75)->setRowHeight(52.5);
        $sheet->getRowDimension(76)->setRowHeight(122.3);
        $sheet->getRowDimension(77)->setRowHeight(77.3);
        $sheet->getRowDimension(78)->setRowHeight(47.3);
        $sheet->getRowDimension(79)->setRowHeight(47.3);
        $sheet->getRowDimension(80)->setRowHeight(47.3);
        $sheet->getRowDimension(81)->setRowHeight(54);
        $sheet->getRowDimension(82)->setRowHeight(46.5);
        $sheet->getRowDimension(83)->setRowHeight(50.3);
        $sheet->getRowDimension(84)->setRowHeight(51.8);
        $sheet->getRowDimension(85)->setRowHeight(46.5);
        $sheet->getRowDimension(86)->setRowHeight(47.3);
        $sheet->getRowDimension(87)->setRowHeight(76.5);
        $sheet->getRowDimension(88)->setRowHeight(45.8);
        $sheet->getRowDimension(89)->setRowHeight(45.8);
        $sheet->getRowDimension(90)->setRowHeight(45.8);
        $sheet->getRowDimension(91)->setRowHeight(45.8);
        $sheet->getRowDimension(92)->setRowHeight(43.2);
        $sheet->getRowDimension(93)->setRowHeight(46.5);
        $sheet->getRowDimension(94)->setRowHeight(46.5);
        $sheet->getRowDimension(95)->setRowHeight(68.3);
        $sheet->getRowDimension(96)->setRowHeight(45);
        $sheet->getRowDimension(97)->setRowHeight(50.3);
        $sheet->getRowDimension(98)->setRowHeight(46.5);
        $sheet->getRowDimension(99)->setRowHeight(50.3);
        $sheet->getRowDimension(100)->setRowHeight(45);
        $sheet->getRowDimension(101)->setRowHeight(46.5);
        $sheet->getRowDimension(102)->setRowHeight(46.5);
        $sheet->getRowDimension(103)->setRowHeight(46.5);
        $sheet->getRowDimension(104)->setRowHeight(45.8);
        $sheet->getRowDimension(105)->setRowHeight(45.8);
        $sheet->getRowDimension(106)->setRowHeight(45.8);
        $sheet->getRowDimension(107)->setRowHeight(46.8);
        $sheet->getRowDimension(108)->setRowHeight(51.8);
        $sheet->getRowDimension(109)->setRowHeight(69.8);
        $sheet->getRowDimension(110)->setRowHeight(47.3);
        $sheet->getRowDimension(111)->setRowHeight(47.3);
        $sheet->getRowDimension(112)->setRowHeight(43.2);
        $sheet->getRowDimension(113)->setRowHeight(48);
        $sheet->getRowDimension(114)->setRowHeight(47.3);
        $sheet->getRowDimension(115)->setRowHeight(48.8);
        $sheet->getRowDimension(116)->setRowHeight(45);
        $sheet->getRowDimension(117)->setRowHeight(45);
        $sheet->getRowDimension(118)->setRowHeight(46.5);
        $sheet->getRowDimension(119)->setRowHeight(46.5);
        $sheet->getRowDimension(120)->setRowHeight(46.5);
        $sheet->getRowDimension(121)->setRowHeight(46.5);
        $sheet->getRowDimension(122)->setRowHeight(47.3);
        $sheet->getRowDimension(123)->setRowHeight(46.5);
        $sheet->getRowDimension(124)->setRowHeight(46.5);
        $sheet->getRowDimension(125)->setRowHeight(46.5);
        $sheet->getRowDimension(126)->setRowHeight(46.5);
        $sheet->getRowDimension(127)->setRowHeight(46.5);
        $sheet->getRowDimension(128)->setRowHeight(46.5);
        $sheet->getRowDimension(129)->setRowHeight(46.5);
        $sheet->getRowDimension(130)->setRowHeight(46.5);
        $sheet->getRowDimension(131)->setRowHeight(104.3);
        $sheet->getRowDimension(132)->setRowHeight(101.3);
        $sheet->getRowDimension(133)->setRowHeight(108.8);
        $sheet->getRowDimension(134)->setRowHeight(46.5);
        $sheet->getRowDimension(135)->setRowHeight(48);
        $sheet->getRowDimension(136)->setRowHeight(47.3);
        $sheet->getRowDimension(137)->setRowHeight(46.5);
        $sheet->getRowDimension(138)->setRowHeight(75.8);
        $sheet->getRowDimension(139)->setRowHeight(45.8);
        $sheet->getRowDimension(140)->setRowHeight(45.8);
        $sheet->getRowDimension(141)->setRowHeight(48.8);
        $sheet->getRowDimension(142)->setRowHeight(46.5);
        $sheet->getRowDimension(143)->setRowHeight(48.8);
        $sheet->getRowDimension(144)->setRowHeight(51.8);
        $sheet->getRowDimension(145)->setRowHeight(48.8);
        $sheet->getRowDimension(146)->setRowHeight(48.8);
        $sheet->getRowDimension(147)->setRowHeight(48.8);
        $sheet->getRowDimension(148)->setRowHeight(46.5);
        $sheet->getRowDimension(149)->setRowHeight(72);
        $sheet->getRowDimension(150)->setRowHeight(46.5);
        $sheet->getRowDimension(151)->setRowHeight(46.5);
        $sheet->getRowDimension(152)->setRowHeight(46.5);
        $sheet->getRowDimension(153)->setRowHeight(48);
        $sheet->getRowDimension(154)->setRowHeight(46.5);
        $sheet->getRowDimension(155)->setRowHeight(46.5);
        $sheet->getRowDimension(156)->setRowHeight(48);
        $sheet->getRowDimension(157)->setRowHeight(52.5);
        $sheet->getRowDimension(158)->setRowHeight(48);
        $sheet->getRowDimension(159)->setRowHeight(48.8);
        $sheet->getRowDimension(160)->setRowHeight(46.5);
        $sheet->getRowDimension(161)->setRowHeight(47.3);
        $sheet->getRowDimension(162)->setRowHeight(48);
        $sheet->getRowDimension(163)->setRowHeight(48);
        $sheet->getRowDimension(164)->setRowHeight(48);
        $sheet->getRowDimension(165)->setRowHeight(48.8);
        $sheet->getRowDimension(166)->setRowHeight(46.5);
        $sheet->getRowDimension(167)->setRowHeight(72);
        $sheet->getRowDimension(168)->setRowHeight(45);
        $sheet->getRowDimension(169)->setRowHeight(45);
        $sheet->getRowDimension(170)->setRowHeight(48);
        $sheet->getRowDimension(171)->setRowHeight(45);
        $sheet->getRowDimension(172)->setRowHeight(46.5);
        $sheet->getRowDimension(173)->setRowHeight(46.5);
        $sheet->getRowDimension(174)->setRowHeight(46.5);
        $sheet->getRowDimension(175)->setRowHeight(46.5);
        $sheet->getRowDimension(176)->setRowHeight(46.5);
        $sheet->getRowDimension(177)->setRowHeight(46.5);
        $sheet->getRowDimension(178)->setRowHeight(46.5);
        $sheet->getRowDimension(179)->setRowHeight(46.5);
        $sheet->getRowDimension(180)->setRowHeight(46.5);
        $sheet->getRowDimension(181)->setRowHeight(46.2);
        $sheet->getRowDimension(182)->setRowHeight(45.8);
        $sheet->getRowDimension(183)->setRowHeight(46.5);
        $sheet->getRowDimension(184)->setRowHeight(46.5);
        $sheet->getRowDimension(185)->setRowHeight(46.5);
        $sheet->getRowDimension(186)->setRowHeight(46.5);
        $sheet->getRowDimension(187)->setRowHeight(46.5);
        $sheet->getRowDimension(188)->setRowHeight(53.3);
        $sheet->getRowDimension(189)->setRowHeight(46.5);
        $sheet->getRowDimension(190)->setRowHeight(46.5);
        $sheet->getRowDimension(191)->setRowHeight(46.5);
        $sheet->getRowDimension(192)->setRowHeight(77.3);
        $sheet->getRowDimension(193)->setRowHeight(46.5);
        $sheet->getRowDimension(194)->setRowHeight(69.8);
        $sheet->getRowDimension(195)->setRowHeight(46.5);
        $sheet->getRowDimension(196)->setRowHeight(46.5);
        $sheet->getRowDimension(197)->setRowHeight(46.5);
        $sheet->getRowDimension(198)->setRowHeight(46.5);
        $sheet->getRowDimension(199)->setRowHeight(46.5);
        $sheet->getRowDimension(200)->setRowHeight(72.8);
        $sheet->getRowDimension(201)->setRowHeight(46.5);
        $sheet->getRowDimension(202)->setRowHeight(67.5);
        $sheet->getRowDimension(203)->setRowHeight(46.5);
        $sheet->getRowDimension(204)->setRowHeight(46.5);
        $sheet->getRowDimension(205)->setRowHeight(46.5);
        $sheet->getRowDimension(206)->setRowHeight(46.5);
        $sheet->getRowDimension(207)->setRowHeight(46.5);
        $sheet->getRowDimension(208)->setRowHeight(46.5);
        $sheet->getRowDimension(209)->setRowHeight(46.5);
        $sheet->getRowDimension(210)->setRowHeight(46.5);
        $sheet->getRowDimension(211)->setRowHeight(46.5);
        $sheet->getRowDimension(212)->setRowHeight(46.5);
        $sheet->getRowDimension(213)->setRowHeight(46.5);
        $sheet->getRowDimension(214)->setRowHeight(46.5);
        $sheet->getRowDimension(215)->setRowHeight(50.3);
        $sheet->getRowDimension(216)->setRowHeight(48);
        $sheet->getRowDimension(217)->setRowHeight(48);
        $sheet->getRowDimension(218)->setRowHeight(46.5);
        $sheet->getRowDimension(219)->setRowHeight(47.3);
        $sheet->getRowDimension(220)->setRowHeight(46.5);
        $sheet->getRowDimension(221)->setRowHeight(48);
        $sheet->getRowDimension(222)->setRowHeight(45.8);
        $sheet->getRowDimension(223)->setRowHeight(46.5);
        $sheet->getRowDimension(224)->setRowHeight(73.5);
        $sheet->getRowDimension(225)->setRowHeight(46.5);
        $sheet->getRowDimension(226)->setRowHeight(46.5);
        $sheet->getRowDimension(227)->setRowHeight(46.5);
        $sheet->getRowDimension(228)->setRowHeight(45.8);
        $sheet->getRowDimension(229)->setRowHeight(46.5);
        $sheet->getRowDimension(230)->setRowHeight(46.5);
        $sheet->getRowDimension(231)->setRowHeight(46.5);
        $sheet->getRowDimension(232)->setRowHeight(49.5);
        $sheet->getRowDimension(233)->setRowHeight(49.5);
        $sheet->getRowDimension(234)->setRowHeight(49.5);
        $sheet->getRowDimension(235)->setRowHeight(45.8);
        $sheet->getRowDimension(236)->setRowHeight(45.8);
        $sheet->getRowDimension(237)->setRowHeight(49.5);
        $sheet->getRowDimension(238)->setRowHeight(49.5);
        $sheet->getRowDimension(239)->setRowHeight(49.5);
        $sheet->getRowDimension(240)->setRowHeight(49.5);
        $sheet->getRowDimension(241)->setRowHeight(45.8);
        $sheet->getRowDimension(242)->setRowHeight(45.8);
        $sheet->getRowDimension(243)->setRowHeight(45.8);
        $sheet->getRowDimension(244)->setRowHeight(49.5);
        $sheet->getRowDimension(245)->setRowHeight(47.3);
        $sheet->getRowDimension(246)->setRowHeight(47.3);
        $sheet->getRowDimension(247)->setRowHeight(47.3);
        $sheet->getRowDimension(248)->setRowHeight(47.3);
        $sheet->getRowDimension(249)->setRowHeight(47.3);
        $sheet->getRowDimension(250)->setRowHeight(47.3);
        $sheet->getRowDimension(251)->setRowHeight(45.8);
        $sheet->getRowDimension(252)->setRowHeight(45.8);
        $sheet->getRowDimension(253)->setRowHeight(46.5);
        $sheet->getRowDimension(254)->setRowHeight(48);
        $sheet->getRowDimension(255)->setRowHeight(48);
        $sheet->getRowDimension(256)->setRowHeight(49.5);
        $sheet->getRowDimension(257)->setRowHeight(45.8);
        $sheet->getRowDimension(258)->setRowHeight(45.8);
        $sheet->getRowDimension(259)->setRowHeight(45.8);
        $sheet->getRowDimension(260)->setRowHeight(45.8);
        $sheet->getRowDimension(261)->setRowHeight(46.5);
        $sheet->getRowDimension(262)->setRowHeight(45.8);
        $sheet->getRowDimension(263)->setRowHeight(45.8);
        $sheet->getRowDimension(264)->setRowHeight(48);
        $sheet->getRowDimension(265)->setRowHeight(45.8);
        $sheet->getRowDimension(266)->setRowHeight(45.8);
        $sheet->getRowDimension(267)->setRowHeight(45.8);
        $sheet->getRowDimension(268)->setRowHeight(45.8);
        $sheet->getRowDimension(269)->setRowHeight(45.8);
        $sheet->getRowDimension(270)->setRowHeight(45.8);
        $sheet->getRowDimension(271)->setRowHeight(45.8);
        $sheet->getRowDimension(272)->setRowHeight(45.8);
        $sheet->getRowDimension(273)->setRowHeight(45.8);
        $sheet->getRowDimension(274)->setRowHeight(45.8);
        $sheet->getRowDimension(275)->setRowHeight(45.8);
        $sheet->getRowDimension(276)->setRowHeight(45.8);
        $sheet->getRowDimension(277)->setRowHeight(45.8);
        $sheet->getRowDimension(278)->setRowHeight(45.8);
        $sheet->getRowDimension(279)->setRowHeight(45.8);
        $sheet->getRowDimension(280)->setRowHeight(45.8);
        $sheet->getRowDimension(281)->setRowHeight(45.8);
        $sheet->getRowDimension(282)->setRowHeight(45.8);
        $sheet->getRowDimension(283)->setRowHeight(45.8);
        $sheet->getRowDimension(284)->setRowHeight(45.8);
        $sheet->getRowDimension(285)->setRowHeight(45.8);
        $sheet->getRowDimension(286)->setRowHeight(45.8);
        $sheet->getRowDimension(287)->setRowHeight(45.8);
        $sheet->getRowDimension(288)->setRowHeight(45.8);
        $sheet->getRowDimension(289)->setRowHeight(45.8);
        $sheet->getRowDimension(290)->setRowHeight(45.8);
        $sheet->getRowDimension(291)->setRowHeight(45.8);
        $sheet->getRowDimension(292)->setRowHeight(45.8);
        $sheet->getRowDimension(293)->setRowHeight(45.8);
        $sheet->getRowDimension(294)->setRowHeight(45.8);
        $sheet->getRowDimension(295)->setRowHeight(45.8);
        $sheet->getRowDimension(296)->setRowHeight(45.8);
        $sheet->getRowDimension(297)->setRowHeight(45.8);
        $sheet->getRowDimension(298)->setRowHeight(48);
        $sheet->getRowDimension(299)->setRowHeight(48);
        $sheet->getRowDimension(300)->setRowHeight(45.8);
        $sheet->getRowDimension(301)->setRowHeight(45.8);
        $sheet->getRowDimension(302)->setRowHeight(50.3);
        $sheet->getRowDimension(303)->setRowHeight(45.8);
        $sheet->getRowDimension(304)->setRowHeight(45.8);
        $sheet->getRowDimension(305)->setRowHeight(45.8);
        $sheet->getRowDimension(306)->setRowHeight(75.8);
        $sheet->getRowDimension(307)->setRowHeight(45.8);
        $sheet->getRowDimension(308)->setRowHeight(45.8);
        $sheet->getRowDimension(309)->setRowHeight(45.8);
        $sheet->getRowDimension(310)->setRowHeight(45.8);
        $sheet->getRowDimension(311)->setRowHeight(45.8);
        $sheet->getRowDimension(312)->setRowHeight(45.8);
        $sheet->getRowDimension(313)->setRowHeight(45.8);
        $sheet->getRowDimension(314)->setRowHeight(45.8);
        $sheet->getRowDimension(315)->setRowHeight(45.8);
        $sheet->getRowDimension(316)->setRowHeight(45.8);
        $sheet->getRowDimension(317)->setRowHeight(48.8);
        $sheet->getRowDimension(318)->setRowHeight(45.8);
        $sheet->getRowDimension(319)->setRowHeight(46.5);
        $sheet->getRowDimension(320)->setRowHeight(45.8);
        $sheet->getRowDimension(321)->setRowHeight(45.8);
        $sheet->getRowDimension(322)->setRowHeight(45.8);
        $sheet->getRowDimension(323)->setRowHeight(45.8);
        $sheet->getRowDimension(324)->setRowHeight(48);
        $sheet->getRowDimension(325)->setRowHeight(48);
        $sheet->getRowDimension(326)->setRowHeight(49.5);
        $sheet->getRowDimension(327)->setRowHeight(48);
        $sheet->getRowDimension(328)->setRowHeight(48);
        $sheet->getRowDimension(329)->setRowHeight(48);
        $sheet->getRowDimension(330)->setRowHeight(73.5);
        $sheet->getRowDimension(331)->setRowHeight(52.5);
        $sheet->getRowDimension(332)->setRowHeight(48);
        $sheet->getRowDimension(333)->setRowHeight(43.2);
        $sheet->getRowDimension(334)->setRowHeight(51);
        $sheet->getRowDimension(335)->setRowHeight(45.8);
        $sheet->getRowDimension(336)->setRowHeight(45);
        $sheet->getRowDimension(337)->setRowHeight(46.5);
        $sheet->getRowDimension(338)->setRowHeight(45);
        $sheet->getRowDimension(339)->setRowHeight(45);
        $sheet->getRowDimension(340)->setRowHeight(47.3);
        $sheet->getRowDimension(341)->setRowHeight(47.3);
        $sheet->getRowDimension(342)->setRowHeight(47.3);
        $sheet->getRowDimension(343)->setRowHeight(45);
        $sheet->getRowDimension(344)->setRowHeight(45);
        $sheet->getRowDimension(345)->setRowHeight(45);
        $sheet->getRowDimension(346)->setRowHeight(45);
        $sheet->getRowDimension(347)->setRowHeight(48.8);
        $sheet->getRowDimension(348)->setRowHeight(48.8);
        $sheet->getRowDimension(349)->setRowHeight(45);
        $sheet->getRowDimension(350)->setRowHeight(45);
        $sheet->getRowDimension(351)->setRowHeight(48.8);
        $sheet->getRowDimension(352)->setRowHeight(49.5);
        $sheet->getRowDimension(353)->setRowHeight(45);
        $sheet->getRowDimension(354)->setRowHeight(47.3);
        $sheet->getRowDimension(355)->setRowHeight(45);
        $sheet->getRowDimension(356)->setRowHeight(45);
        $sheet->getRowDimension(357)->setRowHeight(45);
        $sheet->getRowDimension(358)->setRowHeight(45);
        $sheet->getRowDimension(359)->setRowHeight(48.8);
        $sheet->getRowDimension(360)->setRowHeight(48.8);
        $sheet->getRowDimension(361)->setRowHeight(45);
        $sheet->getRowDimension(362)->setRowHeight(45);
        $sheet->getRowDimension(363)->setRowHeight(49.5);
        $sheet->getRowDimension(364)->setRowHeight(47.3);
        $sheet->getRowDimension(365)->setRowHeight(47.3);
        $sheet->getRowDimension(366)->setRowHeight(47.3);
        $sheet->getRowDimension(367)->setRowHeight(47.3);
        $sheet->getRowDimension(368)->setRowHeight(47.3);
        $sheet->getRowDimension(369)->setRowHeight(47.3);
        $sheet->getRowDimension(370)->setRowHeight(47.3);
        $sheet->getRowDimension(371)->setRowHeight(47.3);
        $sheet->getRowDimension(372)->setRowHeight(47.3);
        $sheet->getRowDimension(373)->setRowHeight(47.3);
        $sheet->getRowDimension(374)->setRowHeight(47.3);
        $sheet->getRowDimension(375)->setRowHeight(47.3);
        $sheet->getRowDimension(376)->setRowHeight(47.3);
        $sheet->getRowDimension(377)->setRowHeight(47.3);
        $sheet->getRowDimension(378)->setRowHeight(47.3);
        $sheet->getRowDimension(379)->setRowHeight(47.3);
        $sheet->getRowDimension(380)->setRowHeight(47.3);
        $sheet->getRowDimension(381)->setRowHeight(47.3);
        $sheet->getRowDimension(382)->setRowHeight(47.3);
        $sheet->getRowDimension(383)->setRowHeight(47.3);
        $sheet->getRowDimension(384)->setRowHeight(47.3);
        $sheet->getRowDimension(385)->setRowHeight(47.3);
        $sheet->getRowDimension(386)->setRowHeight(47.3);
        $sheet->getRowDimension(387)->setRowHeight(47.3);
        $sheet->getRowDimension(388)->setRowHeight(47.3);
        $sheet->getRowDimension(389)->setRowHeight(47.3);
        $sheet->getRowDimension(390)->setRowHeight(48);
        $sheet->getRowDimension(391)->setRowHeight(47.3);
        $sheet->getRowDimension(392)->setRowHeight(47.3);
        $sheet->getRowDimension(393)->setRowHeight(47.3);
        $sheet->getRowDimension(394)->setRowHeight(50.3);
        $sheet->getRowDimension(395)->setRowHeight(47.2);
        $sheet->getRowDimension(396)->setRowHeight(47.2);
        $sheet->getRowDimension(397)->setRowHeight(47.2);
        $sheet->getRowDimension(398)->setRowHeight(47.2);
        $sheet->getRowDimension(399)->setRowHeight(47.2);
        $sheet->getRowDimension(400)->setRowHeight(51.8);
        $sheet->getRowDimension(401)->setRowHeight(81);
        $sheet->getRowDimension(402)->setRowHeight(48.8);
        $sheet->getRowDimension(403)->setRowHeight(48.8);
        $sheet->getRowDimension(404)->setRowHeight(48.8);
        $sheet->getRowDimension(405)->setRowHeight(48.8);
        $sheet->getRowDimension(406)->setRowHeight(48.8);
        $sheet->getRowDimension(407)->setRowHeight(48.8);
        $sheet->getRowDimension(408)->setRowHeight(48.8);
        $sheet->getRowDimension(409)->setRowHeight(48.8);
        $sheet->getRowDimension(410)->setRowHeight(48);
        $sheet->getRowDimension(411)->setRowHeight(48);
        $sheet->getRowDimension(412)->setRowHeight(48);
        $sheet->getRowDimension(413)->setRowHeight(48);
        $sheet->getRowDimension(414)->setRowHeight(48);
        $sheet->getRowDimension(415)->setRowHeight(48);
        $sheet->getRowDimension(416)->setRowHeight(48);
        $sheet->getRowDimension(417)->setRowHeight(51.8);
        $sheet->getRowDimension(418)->setRowHeight(51.8);
        $sheet->getRowDimension(419)->setRowHeight(51.8);
        $sheet->getRowDimension(420)->setRowHeight(51.8);
        $sheet->getRowDimension(421)->setRowHeight(48.8);
        $sheet->getRowDimension(422)->setRowHeight(51.8);
        $sheet->getRowDimension(423)->setRowHeight(51.8);
        $sheet->getRowDimension(424)->setRowHeight(51.8);
        $sheet->getRowDimension(425)->setRowHeight(51.8);
        $sheet->getRowDimension(426)->setRowHeight(51.8);
        $sheet->getRowDimension(427)->setRowHeight(51.8);
        $sheet->getRowDimension(428)->setRowHeight(51.8);
        $sheet->getRowDimension(429)->setRowHeight(51.8);
        $sheet->getRowDimension(430)->setRowHeight(51.8);
        $sheet->getRowDimension(431)->setRowHeight(51.8);
        $sheet->getRowDimension(432)->setRowHeight(51.8);
        $sheet->getRowDimension(433)->setRowHeight(51.8);
        $sheet->getRowDimension(434)->setRowHeight(51.8);
        $sheet->getRowDimension(435)->setRowHeight(51.8);
        $sheet->getRowDimension(436)->setRowHeight(51.8);
        $sheet->getRowDimension(437)->setRowHeight(48);
        $sheet->getRowDimension(438)->setRowHeight(51.8);
        $sheet->getRowDimension(439)->setRowHeight(54.8);
        $sheet->getRowDimension(440)->setRowHeight(51.8);
        $sheet->getRowDimension(441)->setRowHeight(51.8);
        $sheet->getRowDimension(442)->setRowHeight(51.8);
        $sheet->getRowDimension(443)->setRowHeight(51.8);
        $sheet->getRowDimension(444)->setRowHeight(51.8);





        $sheet->removeRow(3);

        $sheet->getStyle('A1:A2')->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'size' => 13,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE, // Default gridline
                ],
            ],
        ]);



        $sheet->getStyle("A3:$highestColumn$highestRow")->applyFromArray([
            'font' => [
                'name' => 'Pyidaungsu',
                'bold' =>true,
                'size' => 13,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);
    }
}
