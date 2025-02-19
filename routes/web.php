<?php
use App\Exports\AllowInserviceFreeExport;
use App\Livewire\AboutToIncrement;
use App\Livewire\AgeFilter;
use App\Livewire\AppointmentsCalendar;
use App\Livewire\AttendTraining;
use App\Livewire\Award\Award;
use App\Livewire\AwardType\AwardType;
use App\Livewire\BloodType\BloodType;
use App\Livewire\ChildrenReportDetails;
use App\Livewire\ChildrenReportSummary;
use App\Livewire\Country\Country;
use App\Livewire\Department;
use App\Livewire\Depromotion;
use App\Livewire\DifficultyLevel;
use App\Livewire\District\District;
use App\Livewire\Education\Education;
use App\Livewire\EducationGroup\EducationGroup;
use App\Livewire\EducationType\EducationType;
use App\Livewire\EEN\EnglishEffectiveNegotiations;
use App\Livewire\Ethnic\Ethnic;
use App\Livewire\FinancePension\FinancePensionAge62;
use App\Livewire\FTR\ForeignTrainingReport;
use App\Livewire\Gender\Gender;
use App\Livewire\InvestmentCompanies\InvestmentCompanies;
use App\Livewire\InvestmentCompanies\InvestmentCompanies10;
use App\Livewire\InvestmentCompanies\InvestmentCompanies11;
use App\Livewire\InvestmentCompanies\InvestmentCompanies12;
use App\Livewire\InvestmentCompanies\InvestmentCompanies13;
use App\Livewire\InvestmentCompanies\InvestmentCompanies14;
use App\Livewire\InvestmentCompanies\InvestmentCompanies2;
use App\Livewire\InvestmentCompanies\InvestmentCompanies3;
use App\Livewire\InvestmentCompanies\InvestmentCompanies4;
use App\Livewire\InvestmentCompanies\InvestmentCompanies5;
use App\Livewire\InvestmentCompanies\InvestmentCompanies6;
use App\Livewire\InvestmentCompanies\InvestmentCompanies7;
use App\Livewire\InvestmentCompanies\InvestmentCompanies8;
use App\Livewire\InvestmentCompanies\InvestmentCompanies9;
use App\Livewire\Leave\LeaveNuberPercent2;
use App\Livewire\Leave\LeaveNuberPercent3;
use App\Livewire\Nationality\Nationality;
use App\Livewire\PenaltyType\PenaltyType;
use App\Livewire\PensionReport\PensionReport;
use App\Livewire\PensionType\PensionType;
use App\Livewire\PlanningAccounting\PlanningAccounting;
use App\Livewire\Post\Post;
use App\Livewire\Religion\Religion;
use App\Livewire\Reports\Report1;
use App\Livewire\Reports\Report2;
use App\Livewire\Reports\Report3;
use App\Livewire\Reports\Report4;
use App\Livewire\Staff;
use App\Livewire\StaffList\Age18OverStaffList;
use App\Livewire\StaffList\BloodStaffList6;
use App\Livewire\StaffList\StaffList1;
use App\Livewire\StaffList\StaffList2;
use App\Livewire\StaffList\StaffList3;
use App\Livewire\StaffList\StaffList4;
use App\Livewire\StaffList\StaffList5;
use App\Livewire\StaffList\StaffProgeny;
use App\Livewire\StaffList\WE10overStaffList;
use App\Livewire\StaffReport\StaffReport;
use App\Livewire\StaffReport\StaffReport3;
use App\Livewire\StaffType\StaffType;
use App\Livewire\TrainingLocation\TrainingLocation;
use App\Livewire\Division;
use App\Livewire\EmployeeInformation;
use App\Livewire\TrainingType;
use App\Livewire\EmployeeRecordReport\EmpoyeeRecordReport;
use App\Livewire\EmployeeTakingLeave;
use App\Livewire\Finance;
use App\Livewire\FTR\ForeignGoneTotal;
use App\Livewire\FTR\ForeignTrainingReport2;
use App\Livewire\Increment;
use App\Livewire\InvestmentCompanies\AprilSalaryList;
use App\Livewire\InvestmentCompanies\DetailStaffSalary;
use App\Livewire\InvestmentCompanies\FinanceSalaryList;
use App\Livewire\InvestmentCompanies\FinanceYearSalaryList;
use App\Livewire\InvestmentCompanies\InformationList;
use App\Livewire\InvestmentCompanies\InvestmentCompanies15;
use App\Livewire\InvestmentCompanies\JanuarySalaryList;
use App\Livewire\InvestmentCompanies\LastPayCertificate;
use App\Livewire\InvestmentCompanies\MarchSalaryList;
use App\Livewire\InvestmentCompanies\NoSalaryLeave;
use App\Livewire\InvestmentCompanies\OctoberSalaryList;
use App\Livewire\InvestmentCompanies\PayscaleList;
use App\Livewire\InvestmentCompanies\PermanentStaff;
use App\Livewire\InvestmentCompanies\SalaryList;
use App\Livewire\InvestmentCompanies\StaffSalary;
use App\Livewire\InvestmentCompanies\StaffSalaryList;
use App\Livewire\InvestmentCompanies\StaffSalaryList2;
use App\Livewire\InvestmentCompanies\StaffSalaryList3;
use App\Livewire\InvestmentCompanies\StaffSalaryList4;
use App\Livewire\InvestmentCompanies\StartedSalaryList;
use App\Livewire\InvestmentCompanies\YangonOfficeStaff;
use App\Livewire\InvestmentCompanies\YangonOfficeStaff2;
use App\Livewire\InvestmentCompanies\YangonStaffAprilSalaryList;
use App\Livewire\Labour;
use App\Livewire\Labour\LabourStaff;
use App\Livewire\LabourDetails;
use App\Livewire\LabourStaff as LivewireLabourStaff;
use App\Livewire\Language as LivewireLanguage;
use App\Livewire\Leave;
use App\Livewire\Leave\LeaveNuberPercent;
use App\Livewire\Leave\LeaveNuberPercent4;
use App\Livewire\Leave\LeaveNuberPercent5;
use App\Livewire\LeaveType;
use App\Livewire\LocalTrainingReport\LocalTrainingReport;
use App\Livewire\LocalTrainingReport\LocalTrainingReport2;
use App\Livewire\Ministry as LivewireMinistry;
use App\Livewire\Payscale\Payscale;
use App\Livewire\PdfStaffReport;
use App\Livewire\PdfStaffReport15;
use App\Livewire\PdfStaffReport17;
use App\Livewire\PdfStaffReport18;
use App\Livewire\PdfStaffReport19;
use App\Livewire\PdfStaffReport53;
use App\Livewire\PdfStaffReport68;
use App\Livewire\PdfStaffReport71;
use App\Livewire\Pension\Pensioner;
use App\Livewire\PensionFamily\PensionFamily;
use App\Livewire\PensionList\PensionList;
use App\Livewire\PensionYear;
use App\Livewire\Rank\Rank;
use App\Livewire\RankSalary\RankSalaryList;
use App\Livewire\Region;
use App\Livewire\Relation;
use App\Livewire\ReligionReport\ReligionReport;
use App\Livewire\StaffDetail;
use App\Livewire\Report\ReportName;
use App\Livewire\Reports\AwardReport;
use App\Livewire\Reports\EducationReport;
use App\Livewire\Reports\ForeignReport;
use App\Livewire\Reports\LanguageReport;
use App\Livewire\Reports\OtherQualificationReport;
use App\Livewire\Reports\PunishmentReport;
use App\Livewire\Reports\SocialReport;
use App\Livewire\Section\Section;
use App\Livewire\StaffReport\StaffReport1;
use App\Livewire\StaffReport\StaffReport2;
use App\Livewire\Table\Table;
use App\Livewire\Township\Township;
use App\Livewire\Language;
use App\Livewire\LastPayCertificateMain;
use App\Livewire\Leave\LeaveDate;
use App\Livewire\LeaveCalendar;
use App\Livewire\LeaveSummary;
use App\Livewire\LetterType;
use App\Livewire\LocalTrainingReport3;
use App\Livewire\MaritalStatus;
use App\Livewire\Pension;
use App\Livewire\NptBySamePayScale;
use App\Livewire\NPTThreee;
use App\Livewire\PersonnelAccount;
use App\Livewire\Promotion as LivewirePromotion;
use App\Livewire\RelationShipType;
use App\Livewire\Report;
use App\Livewire\Retirement;
use App\Livewire\Salary;
use App\Livewire\SortableStaff;
use App\Livewire\StaffInNpt;
use App\Livewire\StaffStrengthList;
use App\Livewire\TravelAbroad;
use App\Livewire\User;
use App\Livewire\VacancyOverByDivision;
use App\Models\Ministry;
use App\Models\Promotion;
use App\Models\Staff as ModelsStaff;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
// dkfj
// Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('home', 'home')->name('home');
    Route::view('profile', 'profile')->name('profile');
    Route::get('/training_type', TrainingType::class)->name('training_type');
    Route::get('/relation', Relation::class)->name('relation');
    Route::get('/relation-type', RelationShipType::class)->name('relation_type');    
    Route::get('/division', Division::class)->name('division');
    Route::get('/department', Department::class)->name('department');
    Route::get('/region', Region::class)->name('region');
    Route::get('/district', District::class)->name('district');
    Route::get('/township', Township::class)->name('township');
    Route::get('/pension_year', PensionYear::class)->name('pension_year');
    Route::get('/staff/{status}', Staff::class)->name('staff')
    // ->defaults('status',   1)
    ;
    Route::get('/payscale', Payscale::class)->name('payscale');
    Route::get('/rank', Rank::class)->name('rank');
    Route::get('/staff_type', StaffType::class)->name('staff_type');
    Route::get('/award', Award::class)->name('award');
    Route::get('/award_type', AwardType::class)->name('award_type');
    Route::get('/blood_type', BloodType::class)->name('blood_type');

    Route::get('/letter_type', LetterType::class)->name('letter_type');
    Route::get('marital_status',MaritalStatus::class)->name('marital_status');
    Route::get('/post', Post::class)->name('post');
    Route::get('/section', Section::class)->name('section');
    Route::get('/leave', Leave::class)->name('leave'); //no longer use
    Route::get('/leave/{staff_id}', Leave::class)->name('staff_leave');
    Route::get('/leave_type', LeaveType::class)->name('leave_type');
    Route::get('/nationality', Nationality::class)->name('nationality');
    Route::get('/country', Country::class)->name('country');
    Route::get('/ministry', LivewireMinistry::class)->name('ministry');
    Route::get('/language', Language::class)->name('language');
    Route::get('/education_group', EducationGroup::class)->name('education_group');
    Route::get('/difficulty_level',DifficultyLevel::class)->name('difficulty_level');
    Route::get('/education_type', EducationType::class)->name('education_type');
    Route::get('/education', Education::class)->name('education');
    Route::get('/penalty_type', PenaltyType::class)->name('penalty_type');
    Route::get('/pension_type', PensionType::class)->name('pension_type');
    Route::get('/training_location', TrainingLocation::class)->name('training_location');
    Route::get('/ethnic', Ethnic::class)->name('ethnic');
    Route::get('/religion', Religion::class)->name('religion');
    Route::get('/gender', Gender::class)->name('gender');
    Route::get('/salary', Salary::class)->name('salary');
    Route::get('/promotion', LivewirePromotion::class)->name('promotion'); //no longer use
    Route::get('/promotion/{staff_id}', LivewirePromotion::class)->name('staff_promotion'); //no longer use
    // Route::get('/increment', Increment::class)->name('increment'); //no longer use
    Route::get('/retirement/{staff_id}', Retirement::class)->name('staff_retirement'); //no longer use
    Route::get('/depromotion',Depromotion::class)->name('depromotion');
    Route::get('/depromotion/{staff_id}',Depromotion::class)->name('staff_depromotion');

    Route::get('/increment/{staff_id}', Increment::class)->name('staff_increment'); //currently use
    Route::get('/staff_detail/{confirm_add?}/{confirm_edit?}/{staff_id?}/{tab?}', StaffDetail::class)->name('staff_detail');
    Route::get('/file/{path}', function ($path) {
        if (File::exists(storage_path('app/upload/') . $path)) {
            return response()->file(storage_path('app/upload/') . $path);
        } else {
            abort(404, 'File Not Found');
        }
    })->name('file')->where('path', '.*');
    Route::get('/local_training_report', LocalTrainingReport::class)->name('local_training_report');
    Route::get('/local_training_report_3',  LocalTrainingReport3::class)->name('local_training_report_3'); // new
    Route::get('/local_training_report2', LocalTrainingReport2::class)->name('local_training_report2');
    // Route::get('/staff_report', ReportName::class)->name('staff_report');
    Route::get('/current-department-arrival-date', StaffReport1::class)->name('staff_report1');
    Route::get('/pension_issue2', StaffReport2::class)->name('staff_report2');
    Route::get('/list-of-retired-employees', StaffReport3::class)->name('staff_report3');
    Route::get('/pension_list', PensionList::class)->name('pension_list');
    Route::get('/pension_family', PensionFamily::class)->name('pension_family');

    Route::get('/pdf_staff_report68/{staff_id?}', PdfStaffReport68::class)->name('pdf_staff_report68');
    Route::get('/pdf_staff_report18/{staff_id?}', PdfStaffReport18::class)->name('pdf_staff_report18');
    Route::get('/pdf_staff_report53/{staff_id?}', PdfStaffReport53::class)->name('pdf_staff_report53');
    Route::get('/pdf_staff_report15/{staff_id?}', PdfStaffReport15::class)->name('pdf_staff_report15');
    Route::get('/pdf_staff_report17/{staff_id?}', PdfStaffReport17::class)->name('pdf_staff_report17');
    Route::get('/pdf_staff_report19/{staff_id?}', PdfStaffReport19::class)->name('pdf_staff_report19');
    // Route::get('/pdf_staff_report71/{staff_id?}', PdfStaffReport71::class)->name('pdf_staff_report71');
    Route::get('/last_pay_certificate/{staff_id}/{cert_id?}', LastPayCertificate::class)->name('pdf_staff_report_last_pay_detail');
    Route::get('/last_pay_certificate-main/{staff_id}', LastPayCertificateMain::class)->name('pdf_staff_report_last_pay_main');


    Route::get('/pdf_staff_report_leave_3/{staff_id?}', LeaveDate::class)->name('pdf_staff_report_leave_3');
    Route::get('/pdf_staff_report_staff_list_2/{staff_id?}', StaffList2::class)->name('pdf_staff_report_staff_list_2');
    Route::get('/planning_accounting', PlanningAccounting::class)->name('planning_accounting');
    Route::get('/allowe-male-female-staffs', InvestmentCompanies::class)->name('investment_companies');
    Route::get('/inservice-male-female-staffs', InvestmentCompanies2::class)->name('investment_companies2');
    Route::get('/allow-inservice-free-by-rank', InvestmentCompanies3::class)->name('investment_companies3');
    Route::get('/allow-inservice-free-by-payscale', InvestmentCompanies4::class)->name('investment_companies4');
    Route::get('/allow-inservice-free-by-same-rank', InvestmentCompanies5::class)->name('investment_companies5');
    Route::get('/action-completed-ongoing', InvestmentCompanies6::class)->name('investment_companies6');
    Route::get('/napata-reach-strength', InvestmentCompanies7::class)->name('investment_companies7');
    Route::get('/npt_by_same_payscale', NptBySamePayScale::class)->name('npt_by_same_payscale');
    Route::get('/npt-three', NPTThreee::class)->name('npt_three');
    Route::get('/staff_in_npt', StaffInNpt::class)->name('staff_in_npt');
    Route::get('/departmental-change-strength-report', InvestmentCompanies8::class)->name('investment_companies8');
    Route::get('/dismissal-fired-employee', InvestmentCompanies9::class)->name('investment_companies9');
    Route::get('/monthly-workforce-summary', InvestmentCompanies10::class)->name('investment_companies10');
    Route::get('/over-10-under-10-pension-list', InvestmentCompanies11::class)->name('investment_companies11');
    Route::get('/pension-issue', InvestmentCompanies12::class)->name('investment_companies12');
    Route::get('/degree-related-list', InvestmentCompanies13::class)->name('investment_companies13');
    Route::get('/organization-polo-headquarters', InvestmentCompanies14::class)->name('investment_companies14');
    Route::get('/team-polo-regional', InvestmentCompanies15::class)->name('investment_companies15');
    Route::get('/salary-negotiation-promotion', MarchSalaryList::class)->name('march_salary_list');
    Route::get('/salary-negotiation-promotion/{staff_id?}', MarchSalaryList::class)
    ->name('pdf_staff_report_salary-negotiation-promotion');


    Route::get('/salary-adjustment-annual-increase', OctoberSalaryList::class)->name('october_salary_list');
    Route::get('/salary-adjustment-annual-increase/{staff_id?}', OctoberSalaryList::class)
    ->name('pdf_staff_report_salary-adjustment-annual-increase');


    Route::get('/payroll-summary-1', StaffSalaryList::class)->name('staff_salary_list');
    Route::get('/payroll-summary-2', StaffSalaryList2::class)->name('staff_salary_list2');
    Route::get('/payroll-summary-3', StaffSalaryList3::class)->name('staff_salary_list3');
    Route::get('/payroll-summary-4', StaffSalaryList4::class)->name('staff_salary_list4');
    Route::get('/payroll-1', YangonOfficeStaff::class)->name('yangon_office_staff');
    Route::get('/payroll-2', YangonOfficeStaff2::class)->name('yangon_office_staff2');
    Route::get('/payroll-3', JanuarySalaryList::class)->name('january_salary_list');
    Route::get('/april-list-yangon-headquarters', AprilSalaryList::class)->name('april_salary_list');
    Route::get('/income-tax-calculation-form-salary', PayscaleList::class)->name('payscale_list');
    Route::get('/staffing-payroll-status', StaffSalary::class)->name('staff_salary');
    Route::get('/average-salary-calculation', SalaryList::class)->name('salary_list');
    Route::get('/unpaid-leave-calculation', NoSalaryLeave::class)->name('no_salary_leave');
    Route::get('/employee-commencement-calculation', StartedSalaryList::class)->name('started_salary_list');
    Route::get('/payroll-for-financial-year', FinanceSalaryList::class)->name('finance_salary_list');
    Route::get('/april-headquarters-yangon', YangonStaffAprilSalaryList::class)->name('yangon_staff_april_salary_list');
    Route::get('/fiscal-year-salary', FinanceYearSalaryList::class)->name('finance_year_salary_list');
    Route::get('/same-rank-gender-agegroup', InformationList::class)->name('information_list');


    Route::get('/employee-salary-bill', DetailStaffSalary::class)->name('detail_staff_salary');
    Route::get('/permanent_staff', PermanentStaff::class)->name('permanent_staff');
    Route::get('/staff-list-region-state', StaffList1::class)->name('staff_list1');
    Route::get('/general-staff-statistics', StaffList3::class)->name('staff_list3');
    Route::get('/planning-accounting-division-staff-list', StaffList4::class)->name('staff_list4');
    Route::get('/planning-accounting-division1', StaffProgeny::class)->name('staff_progeny');
    Route::get('/planning-accounting-division2', StaffList5::class)->name('staff_list5');
    Route::get('/list-employees-blood-A', BloodStaffList6::class)->name('blood_staff_list6');
    Route::get('/we10over_staff_list', WE10overStaffList::class)->name('we10over_staff_list');
    Route::get('/age18over_staff_list', Age18OverStaffList::class)->name('age18over_staff_list');
    Route::get('/age-filter', AgeFilter::class)->name('age_filter');
    Route::get('/allowance-number-percentage', LeaveNuberPercent::class)->name('leaves');
    Route::get('/percentages-by-most-permissiveness', LeaveNuberPercent2::class)->name('leaves2');

    Route::get('/leaves3', LeaveNuberPercent3::class)->name('leaves3');
    Route::get('/leaves4', LeaveNuberPercent4::class)->name('leaves4');
    Route::get('/leaves5', LeaveNuberPercent5::class)->name('leaves5');
    Route::get('/leave_date',LeaveDate::class)->name('leave_date');
    Route::get('/een', EnglishEffectiveNegotiations::class)->name('een');
    Route::get('/foreign_training_report', ForeignTrainingReport::class)->name('foreign_training_report');
    Route::get('/foreign_training_report2',ForeignTrainingReport2::class)->name('foreign_training_report2');
    Route::get('/foreign_gone_total', ForeignGoneTotal::class)->name('foreign_gone_total');
    Route::get('/report1', Report1::class)->name('report1');
    Route::get('/report2', Report2::class)->name('report2');
    Route::get('/report3', Report3::class)->name('report3');
    Route::get('/report4', Report4::class)->name('report4');
    Route::get('/report',Report::class)->name('report');
    Route::get('/attend_training',AttendTraining::class)->name('attend_training');
    Route::get('/penison',Pension::class)->name('pension');
    Route::get('/travel_abroad',TravelAbroad::class)->name('travel_abroad');
    Route::get('/employee_taking_leave',EmployeeTakingLeave::class)->name('employee_taking_leave');
    Route::get('/staff_strength_list',StaffStrengthList::class)->name('staff_strength_list');
    Route::get('/personnel_account',PersonnelAccount::class)->name('personnel_account');
    Route::get('/finance',Finance::class)->name('finance');
    Route::get('/employee_information',EmployeeInformation::class)->name('employee_information');
    Route::get('/pension_report', PensionReport::class)->name('pension_report');
    Route::get('/pensioner', Pensioner::class)->name('pensioner');
    Route::get('/resignation-list', EmpoyeeRecordReport::class)->name('employee_record_report');
    Route::get('/finance_pension_age62', FinancePensionAge62::class)->name('finance_pension_age62');

    Route::get('/religion_report', ReligionReport::class)->name('religion_report');
    Route::get('/language_report', LanguageReport::class)->name('language_report');
    Route::get('/social_report', SocialReport::class)->name('social_report');
    Route::get('/award_report', AwardReport::class)->name('award_report');
    Route::get('/foreign_report', ForeignReport::class)->name('foreign_report');
    Route::get('/education_report', EducationReport::class)->name('education_report');
    Route::get('/other_qualification_report', OtherQualificationReport::class)->name('other_qualification_report');
    Route::get('/punishment_report', PunishmentReport::class)->name('punishment_report');
    Route::get('/list-of-salary-rates-by-position', RankSalaryList::class)->name('rank_salary_list');
    Route::get('/staff_report', StaffReport::class)->name('staff_report');



Route::get('/labour',Labour::class)->name('labour');
Route::get('/labour_view/{id?}' , LabourDetails::class )->name('labourDetails');
Route::get('/calender/{id}' , AppointmentsCalendar::class)->name('calender');
Route::get('/leave-calender/{id}' , LeaveCalendar::class)->name('leaveCalendar');
Route::get('/labour-staff' , LivewireLabourStaff::class )->name('labour-staff');
Route::get('/leave_summary', LeaveSummary::class)->name('leave_summary');

Route::get('/about_to_increment', AboutToIncrement::class)->name('about_to_increment');  //new

Route::get('vacancy_over_by_division' , VacancyOverByDivision::class)->name('vacancy_over_by_division');



Route::get('/children_report_detials' , ChildrenReportDetails::class)->name('children_report_detials');
Route::get('/children_report_summary' , ChildrenReportSummary::class)->name('children_report_summary');
// Route::get('/children_report_summary' , ChildrenReportSummary::class)->name('children_report_summary');



//sortable staff



Route::get('/sortable' , SortableStaff::class)->name('sortable');

    Route::get(
        'user_create',
        User::class
    )->name('user_create');
});

require __DIR__ . '/auth.php';


//test//test
