<?php

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuActionController;
use App\Http\Controllers\UserMenuActionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TeachingPermissionController;
use App\Http\Controllers\PrincipleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\UsefulController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AcademiccalenderController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\HolidaylistController;
use App\Http\Controllers\AdmissioninfoController;

use App\Http\Controllers\ExamroutineController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\LessonplanController;
use App\Http\Controllers\SuggestionController;

use App\Http\Controllers\ClassController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SectionController;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherstaffController;
use App\Http\Controllers\SettingController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ViewAdmissionController;
use App\Http\Controllers\VicePrincipalMessage;
use App\Http\Controllers\GenderWiseController;
use App\Http\Controllers\SectionWiseController;
use App\Http\Controllers\MujibController;

use App\Http\Controllers\MpoNationalizatioController;

use App\Http\Controllers\StudentAttendanceInfoController;
use App\Http\Controllers\ClassWiseStudentinfo;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\StudentInfoController;
use App\Http\Controllers\AddSubjectController;
use App\Http\Controllers\SubjectPartController;
use App\Http\Controllers\MarkDistributionController;
use App\Http\Controllers\AddMarksController;
use App\Http\Controllers\ViewMarksController;
use App\Http\Controllers\ViewTotalSubjectMarksEntryController;
use App\Http\Controllers\ViewCompletedSubjectController;
use App\Http\Controllers\GenerateGPAController;
use App\Http\Controllers\GenerateGradePointController;
use App\Http\Controllers\OnlineLectureUploadController;
use App\Http\Controllers\UploadDownloadFileController;
use App\Http\Controllers\AddExamTypeController;
use App\Http\Controllers\NOCController;
use App\Http\Controllers\SessionController;

use App\Http\Controllers\othersIncomeController;
use App\Http\Controllers\ExpenseColumnController;
use App\Http\Controllers\StudentFeeColumnController;
use App\Http\Controllers\IncomeExpenseController;
use App\Http\Controllers\ExpenseEntryController;
use App\Http\Controllers\OthersIncomeEntryController;
use App\Http\Controllers\InstitutePositionDetailsController;

use App\Http\Controllers\BankInformationController;
use App\Http\Controllers\BankTransactionEntryController;
use App\Http\Controllers\BankTransactionReportController;
use App\Http\Controllers\BankTransactionStatementController;

use App\Http\Controllers\AddFeeTitleController;
use App\Http\Controllers\SupplierInfoController;
use App\Http\Controllers\PurchaseEntryController;
use App\Http\Controllers\SupplierPaymentController;
use App\Http\Controllers\SupplierStatementController;
use App\Http\Controllers\CashReceiverInfo;
use App\Http\Controllers\CashDepositController;
use App\Http\Controllers\CashWithdrawController;
use App\Http\Controllers\CashTransactionController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/getSecondData',function(){

    $data = DB::connection('mysql_second')->table('examsetup')->get();
    dd($data);

});

Route::get('admin',function(){
    echo '<script>location="/result/adminloginpanel/index.php";</script>';
});

Route::get('/complainbox', function() {
    return view('frontend.complainbox');
});


Route::get('/mujib_corner', [MujibController::class,'index']);
Route::get('/time_line', [MujibController::class,'time_line']);
Route::get('/graphic_novel', [MujibController::class,'graphic_novel']);
Route::get('/recognition', [MujibController::class,'recognition']);
Route::get('/photo_archive', [MujibController::class,'photo_archive']);
Route::get('/speeches', [MujibController::class,'speeches']);

Route::get('/', [FrontendController::class, 'index']);
Route::get('/page/{id}', [FrontendController::class, 'page']);
Route::get('/teacher_permission', [FrontendController::class, 'teacher_permission']);
Route::get('/mpo_nationalizations', [FrontendController::class, 'mpo_nationalizations']);
Route::get('/principal_message', [FrontendController::class, 'principle_message']);
Route::get('/vice_principal_messages', [FrontendController::class, 'vice_principal_message']);
Route::get('/presidentmessage', [FrontendController::class, 'presidentmessage']);
Route::get('/ministerofstatemessage', [FrontendController::class, 'ministerofstatemessage']);
Route::get('/chairmanmessage', [FrontendController::class, 'chairmanmessage']);

Route::get('/managing_comitte', [FrontendController::class, 'managing_comitte']);
Route::get('/presidents', [FrontendController::class, 'presidents']);
Route::get('/principles', [FrontendController::class, 'principles']);
Route::get('/donar', [FrontendController::class, 'donar']);
Route::get('/ex_member', [FrontendController::class, 'ex_member']);
Route::get('/memberdetails/{id}', [FrontendController::class, 'memberdetails']);
Route::get('/department_teacher/{id}', [FrontendController::class, 'Teacher_infos']);

Route::get('/teacherinfo', [FrontendController::class, 'teacherinfo']);
Route::get('/staffinfo', [FrontendController::class, 'staffinfo']);
Route::get('/teacherstaffdetails/{id}', [FrontendController::class, 'teacherstaffdetails']);

Route::get('/admissionInfo/{id}', [FrontendController::class, 'admissionInfo']);

Route::get('/examroutines', [FrontendController::class, 'examroutine']);
Route::get('/examsyllabus', [FrontendController::class, 'examsyllabus']);
Route::get('/examsuggession', [FrontendController::class, 'examsuggession']);

Route::get('/academiccalenders', [FrontendController::class, 'academiccalenders']);
Route::get('/classroutines', [FrontendController::class, 'classroutines']);
Route::get('/holidaylists', [FrontendController::class, 'holidaylist']);

Route::get('/gender_wise_student_list',[FrontendController::class,'gender_wise_student_list']);
Route::get('/section_wise_student_list',[FrontendController::class,'section_wise_student_list']);
Route::get('/gender_wise_students',[FrontendController::class,'gender_wise_students']);
Route::get('/section_wise_students',[FrontendController::class,'section_wise_students']);
Route::get('/student_attendance',[FrontendController::class,'student_attendance']);
Route::get('/online_lecture',[FrontendController::class,'OnlineLectureUpload']);
Route::get('/download_file',[FrontendController::class,'UploadDownloadFile']);

Route::get('/classWiseStudent/{id}',[FrontendController::class,'classWiseStudent']);



Route::get('/noc_info', [FrontendController::class, 'noc_info']);
Route::get('/nocdetails/{id}', [FrontendController::class, 'noc_details']);

Route::get('/institute_position_info', [FrontendController::class, 'institute_position_info']);
Route::get('/InstitutePositionDetails/{id}', [FrontendController::class, 'institute_position_detail']);

Route::get('/allnotices', [FrontendController::class, 'allnotices']);
Route::get('/photogallery', [FrontendController::class, 'photogallery']);
Route::get('/videogallery', [FrontendController::class, 'videogallery']);

Route::get('/noticesdetails/{id}', [FrontendController::class, 'notices']);
Route::get('/events', [FrontendController::class, 'events']);



Route::get('/agreements', [FrontendController::class, 'agreements']);
Route::get('/industrialattachment', [FrontendController::class, 'industrialattachment']);
Route::get('/industriesvisit', [FrontendController::class, 'industriesvisit']);
Route::get('/nearindustries', [FrontendController::class, 'nearindustries']);
Route::get('/internalresult/{id}', [FrontendController::class, 'internalresult']);

Route::get('/class_routine/{id}', [FrontendController::class, 'class_routine']);
Route::get('/syllabuss/{id}', [FrontendController::class, 'syllabus']);
Route::get('/semesterplans/{id}', [FrontendController::class, 'semesterplan']);
Route::get('/probidhans', [FrontendController::class, 'probidhan']);

Route::get('/aboutdepartments/{id}', [FrontendController::class, 'aboutdepartment']);
Route::get('/departmentteacher/{id}', [FrontendController::class, 'departmentteacher']);
Route::get('/departmentteacherdetails/{id}', [FrontendController::class, 'departmentteacherdetails']);


Route::get('/principledetails', [FrontendController::class, 'principledetails']);
Route::get('/viceprincipledetails', [FrontendController::class, 'viceprincipledetails']);
Route::get('/previousprinciples', [FrontendController::class, 'previousprinciples']);
Route::get('/prevprincipledetails/{id}', [FrontendController::class, 'prevprincipledetails']);


Route::get('/departmentemployee/{id}', [FrontendController::class, 'departmentemployee']);
Route::get('/departmentemployeedetails/{id}', [FrontendController::class, 'departmentemployeedetails']);


Route::get('/departmenthead/{id}', [FrontendController::class, 'departmenthead']);
Route::get('/departmentstudent/{id}', [FrontendController::class, 'departmentstudent']);
Route::get('/departmentstudentdetails/{id}', [FrontendController::class, 'departmentstudentdetails']);


Route::get('/principledetails', [FrontendController::class, 'principledetails']);
Route::get('/viceprincipledetails', [FrontendController::class, 'viceprincipledetails']);
Route::get('/Previous_Principles', [FrontendController::class, 'Previous_Principles']);

Route::get('/class_student_info/{id}',[FrontendController::class,'class_student_info']);
Route::post('/loadSearchStudent',[FrontendController::class,'loadSearchStudent']);
Route::get('/view_student_details/{student_id}',[FrontendController::class,'view_student_details']);
Route::post('/getDateAttData',[FrontendController::class,'getDateAttData']);

//admission_form

Route::get('/admission_form',[AdmissionController::class,'admission_form']);
Route::post('/storeAdmissionForm',[AdmissionController::class,'storeAdmissionForm']);
Route::get('/getGroupClasswise/{id}',[AdmissionController::class,'getGroupClasswise']);
Route::get('/getSubject/{class_id}/{group_id}',[AdmissionController::class,'getSubject']);
Route::post('/storeStudentInfo',[AdmissionController::class,'storeStudentInfo']);


Route::get('/editStudentData/{step}/{id}',[AdmissionController::class,'editStudentData']);
Route::post('/getGroup',[AdmissionController::class,'getGroup']);

Route::post('/updateStep1/{id}',[AdmissionController::class,'updateStep1']);
Route::post('/updateStep2/{id}',[AdmissionController::class,'updateStep2']);
Route::post('/updateStep3/{id}',[AdmissionController::class,'updateStep3']);
Route::post('/updateStep4/{id}',[AdmissionController::class,'updateStep4']);




Auth::routes();


Route::get('/member/login', [LoginController::class, 'showMemberLoginForm'])->name('member.login-view');
Route::post('/member/login', [LoginController::class, 'memberLogin'])->name('member.login');

// member routes
// Route::get('/member', function () {
//     return redirect()->url('member/dashboard');
// });

Route::group(['middleware' => ['member'], 'prefix' => 'member'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Member\DashboardController::class, 'index'])->name('member.dashboard');
    Route::get('/profile', [\App\Http\Controllers\Member\DashboardController::class, 'profile'])->name('member.profile');
});


Route::any('lang/{lang}', function ($lang) {
    session()->put('lang', $lang);
    return redirect()->back();
})->name('lang');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => '/backup'], function () {
        Route::get('/index', [BackupController::class, 'index'])->name('backup.index');
        Route::get('/create', [BackupController::class, 'create'])->name('backup.create');
        Route::get('/clean', [BackupController::class, 'clean'])->name('backup.clean');
        Route::get('/download/{file_name}', [BackupController::class, 'download'])->name('backup.download');
        Route::get('/delete/{file_name}', [BackupController::class, 'delete'])->name('backup.delete');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //    Route::get('user/permission/{id}', 'UserController@permission')->name('user.permission');
//    Route::post('user/permission-update/{id}', 'UserController@permissionUpdate')->name('user.permission_update');
//    Route::post('get_role_permission', 'RoleController@getRolePermission')->name('get_role_permission');
//    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile-update', [UserController::class, 'profileUpdate'])->name('user.profile-update');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
    Route::post('/user/print', [UserController::class, 'print'])->name('user.print');
    Route::post('/user/status', [UserController::class, 'status'])->name('user.status');
    Route::get('/user/deleted-list', [UserController::class, 'deletedListIndex'])->name('user.deleted_list');
    Route::get('/user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
    Route::get('/user/force-delete/{id}', [UserController::class, 'forceDelete'])->name('user.force_destroy');
    Route::resource('user', UserController::class);

    Route::post('/menu/status', 'MenuController@status')->name('menu.status');
    Route::get('/menu/deleted-list', 'MenuController@deletedListIndex')->name('menu.deleted_list');
    Route::get('/menu/restore/{id}', 'MenuController@restore')->name('menu.restore');
    Route::delete('/menu/force-delete/{id}', 'MenuController@forceDelete')->name('menu.force_destroy');
    Route::post('/menu/multiple-delete', 'MenuController@multipleDelete')->name('menu.multiple_delete');
    Route::post('/menu/multiple-restore', 'MenuController@multipleRestore')->name('menu.multiple_restore');
    Route::resource('menu', MenuController::class);


    Route::post('/menu_action/status', 'MenuActionController@status')->name('menu_action.status');
    Route::get('/menu-action/deleted-list', 'MenuActionController@deletedListIndex')->name('menu_action.deleted_list');
    Route::get('/menu-action/restore/{id}', 'MenuActionController@restore')->name('menu_action.restore');
    Route::delete('/menu-action/force-delete/{id}', 'MenuActionController@forceDelete')->name('menu_action.force_destroy');
    Route::resource('menu_action', MenuActionController::class);

    Route::post('member/print', [MemberController::class, 'print'])->name('member.print');
    Route::post('member/status', [MemberController::class, 'status'])->name('member.status');
    Route::get('/member/deleted-list', [MemberController::class, 'deletedListIndex'])->name('member.deleted_list');
    Route::get('/member/restore/{id}', [MemberController::class, 'restore'])->name('member.restore');
    Route::delete('/member/force-delete/{id}', [MemberController::class, 'forceDelete'])->name('member.force_destroy');

    Route::resources([
        'aboutus' => AboutUsController::class,
        'webiste_info' => WebsiteInformation::class,
        'photo_gallery' => PhotoGallery::class,
        'services' => ServiceController::class,
        'project_cat' => ProjectCategorey::class,
        'project_info' => ProjectController::class,
        'testimonial' => TestimonialController::class,
        'member' => MemberController::class,
        'team' => TeamController::class,
        'messages' => MessageController::class,
        'vedio_gallery' => VedioGallery::class,
        'admission_info' => ViewAdmissionController::class,
        'vice_principal_message' => VicePrincipalMessage::class,
        'gender_wise' => GenderWiseController::class,
        'section_wise' => SectionWiseController::class,
        'add_subject' => AddSubjectController::class,
        'add_subject_part' => SubjectPartController::class,
        'mark_distribution' => MarkDistributionController::class,
        'online_lecture_upload' => OnlineLectureUploadController::class,
        'upload_download_file' => UploadDownloadFileController::class,
        'add_noc' => NOCController::class,
        'session' => SessionController::class,
        'institute_position_details' => InstitutePositionDetailsController::class,
        'add_fee_title' => AddFeeTitleController::class,
        'cash_transaction_report' => CashTransactionController::class,
    ]);

    Route::get('/cash_satement',[CashTransactionController::class,'cash_statement']);

    Route::post('getExamType',[MarkDistributionController::class,'getExamType']);
    Route::post('getMarksClassGropup',[MarkDistributionController::class,'getMarksClassGropup']);
    Route::post('getMarksSubjects',[MarkDistributionController::class,'getMarksSubjects']);
    Route::post('getSubjectPart',[MarkDistributionController::class,'getSubjectPart']);
    Route::post('getSubjectCode',[MarkDistributionController::class,'getSubjectCode']);
    Route::post('getSubjectPartCode',[MarkDistributionController::class,'getSubjectPartCode']);
    Route::post('showMarksDstribution',[MarkDistributionController::class,'showMarksDstribution']);

    Route::post('getExams',[SubjectPartController::class,'getExams']);
    Route::post('getSubjects',[SubjectPartController::class,'getSubjects']);
    Route::post('getSubjectInfo',[SubjectPartController::class,'getSubjectInfo']);
    Route::get('partStatusChange/{id}',[SubjectPartController::class,'partStatusChange']);

    Route::get('retrive_message/{id}', [MessageController::class, 'retrive_message']);
    Route::get('permenantMessageDelete/{id}', [MessageController::class, 'permenantMessageDelete']);


    Route::post('photoGalleryStatusChange', [PhotoGallery::class, 'photoGalleryStatusChange']);
    Route::get('retrive_photo/{id}', [PhotoGallery::class, 'retrive_photo']);
    Route::get('permenant_delete/{id}', [PhotoGallery::class, 'permenant_delete']);


    Route::get('retrive_service/{id}', [ServiceController::class, 'retrive_service']);
    Route::get('service_per_delete/{id}', [ServiceController::class, 'service_per_delete']);
    Route::post('serviceStatusChange', [ServiceController::class, 'serviceStatusChange']);

    Route::get('retrive_project_cat/{id}', [ProjectCategorey::class, 'retrive_project_cat']);
    Route::get('permenantDeleteProjectCat/{id}', [ProjectCategorey::class, 'permenantDeleteProjectCat']);
    Route::post('projectCatStatus', [ProjectCategorey::class, 'projectCatStatus']);

    Route::post('projectStatus', [ProjectController::class, 'projectStatus']);
    Route::get('retrive_project/{id}', [ProjectController::class, 'retrive_project']);
    Route::get('project_per_delete/{id}', [ProjectController::class, 'project_per_delete']);


    Route::post('testimonialStatus', [TestimonialController::class, 'testimonialStatus']);
    Route::get('retrive_testimonial/{id}', [TestimonialController::class, 'retrive_testimonial']);
    Route::get('testimonial_per_delete/{id}', [TestimonialController::class, 'testimonial_per_delete']);

    Route::post('teamMemberStatus', [TeamController::class, 'teamMemberStatus']);
    Route::get('retrive_teammember/{id}', [TeamController::class, 'retrive_teammember']);
    Route::get('temameber_per_delete/{id}', [TeamController::class, 'temameber_per_delete']);


    Route::post('vedioStatus', [VedioGallery::class, 'vedioStatus']);
    Route::get('retrive_vedio/{id}', [VedioGallery::class, 'retrive_vedio']);
    Route::get('vedio_per_delete/{id}', [VedioGallery::class, 'vedio_per_delete']);


    Route::get('menu/action/{menu_id}', [UserMenuActionController::class, 'index'])->name('user_menu_action.index');
    Route::get('menu/action/create/{menu_id}', [UserMenuActionController::class, 'create'])->name('user_menu_action.create');
    Route::post('menu/action/store/{menu_id}', [UserMenuActionController::class, 'store'])->name('user_menu_action.store');
    Route::get('menu/action/edit/{menu_id}/{id}', [UserMenuActionController::class, 'edit'])->name('user_menu_action.edit');
    Route::delete('menu/action/destroy/{menu_id}/{id}', [UserMenuActionController::class, 'destroy'])->name('user_menu_action.destroy');
    Route::post('menu/action/update/{menu_id}/{id}', [UserMenuActionController::class, 'update'])->name('user_menu_action.update');
    Route::post('user/menu/action/status', [UserMenuActionController::class, 'status'])->name('user_menu_action.status');

    Route::get('/role/{id}/permission', [RoleController::class, 'permission'])->name('role.permission');
    Route::post('/role/{id}/permission', [RoleController::class, 'permission'])->name('role.permission.store');
    Route::post('role/print', [RoleController::class, 'print'])->name('role.print');
    Route::post('role/status', [RoleController::class, 'status'])->name('role.status');
    Route::get('/role/deleted-list', [RoleController::class, 'deletedListIndex'])->name('role.deleted_list');
    Route::get('/role/restore/{id}', [RoleController::class, 'restore'])->name('role.restore');
    Route::delete('/role/force-delete/{id}', [RoleController::class, 'forceDelete'])->name('role.force_destroy');
    Route::resource('role', RoleController::class);

    Route::resource('permission', PermissionController::class);

    // tazim
    Route::get('retrive_teachingpermission/{id}', [TeachingPermissionController::class, 'retrive_teachingpermission']);
    Route::get('teachingpermissionDelete/{id}', [TeachingPermissionController::class, 'teachingpermissionDelete']);
    Route::resource('teaching_permission', TeachingPermissionController::class);

    // My Route

    Route::resource('class_wise_student', ClassWiseStudentinfo::class);

    Route::resource('pages', PagesController::class);
    Route::resource('principle', PrincipleController::class);
    Route::resource('photogallerys', PhotoController::class);
    Route::resource('videogallerys', VideoController::class);
    Route::resource('notices', NoticesController::class);
    Route::resource('usefullink', UsefulController::class);
    Route::resource('members', MemberController::class);

    Route::resource('academiccalender', AcademiccalenderController::class);
    Route::resource('holidaylist', HolidaylistController::class);

    Route::resource('admissioninfo', AdmissioninfoController::class);

    Route::resource('addclass', ClassController::class);
    Route::resource('addgroup', GroupController::class);
    Route::resource('addsection', SectionController::class);
    Route::get('getgroup/{class_id}', [SectionController::class, 'getgroup']);

    Route::resource('classroutine', RoutineController::class);

    Route::resource('examroutine', ExamroutineController::class);
    Route::resource('syllabus', SyllabusController::class);
    Route::resource('lessonplan', LessonplanController::class);
    Route::resource('suggestion', SuggestionController::class);

    Route::resource('department', DepartmentController::class);
    Route::resource('teacherstaff', TeacherstaffController::class);


    Route::resource('setting', SettingController::class);

    Route::resource('mpo_nationalization', MpoNationalizatioController::class);
    route::get('retrive_mpo/{id}',[MpoNationalizatioController::class,'retrive_mpo']);
    route::get('delete_mpo/{id}',[MpoNationalizatioController::class,'delete_mpo']);

    Route::resource('student_attendance_info', StudentAttendanceInfoController::class);


    Route::post('getStudentData', [ViewAdmissionController::class,'getStudentData']);
    Route::get('deleteAdmissionInfo/{id}', [ViewAdmissionController::class,'destroy']);

    //Mujib Corner


    // student info

    Route::resource('student_info', StudentInfoController::class);

    Route::get('student_info/edit/tab1/{id}',[StudentInfoController::class,'tab1']);
    Route::get('student_info/edit/tab2/{id}',[StudentInfoController::class,'tab2']);
    Route::get('student_info/edit/tab3/{id}',[StudentInfoController::class,'tab3']);
    Route::get('student_info/edit/tab4/{id}',[StudentInfoController::class,'tab4']);

    Route::post('studentInfoTab1Update/{student_id}',[StudentInfoController::class,'studentInfoTab1Update']);
    Route::post('studentInfoTab2Update/{student_id}',[StudentInfoController::class,'studentInfoTab2Update']);
    Route::post('studentInfoTab3Update/{student_id}',[StudentInfoController::class,'studentInfoTab3Update']);
    Route::post('studentInfoTab4Update/{student_id}',[StudentInfoController::class,'studentInfoTab4Update']);

    Route::post('loadGroups',[StudentInfoController::class,'loadGroups']);

    Route::get('student_registration/{student_id}',[StudentInfoController::class,'student_registration']);
    Route::get('edit_registration/{student_id}',[StudentInfoController::class,'edit_registration']);


    Route::get('registered_student',[StudentInfoController::class,'reg_student'])->name('registered_student.index');

    Route::get('showRegStudent',[StudentInfoController::class,'showRegStudent']);
    Route::get('view_std_info/{student_id}',[StudentInfoController::class,'view_std_info']);

    Route::post('studentRegistration',[StudentInfoController::class,'studentRegistration']);
    Route::post('editStudentRegistration',[StudentInfoController::class,'editStudentRegistration']);

    Route::post('loadRegistrationGroups',[StudentInfoController::class,'loadRegistrationGroups']);
    Route::post('loadClassSubject',[StudentInfoController::class,'loadClassSubject']);
    Route::post('loadGroupSubjects',[StudentInfoController::class,'loadGroupSubjects']);

    Route::get('showStudent',[StudentInfoController::class,'showStudent']);

    Route::resource('add_marks', AddMarksController::class);
    Route::post('loadGroupsSubject',[AddMarksController::class,'loadGroupsSubject']);
    Route::post('getSection',[AddMarksController::class,'getSection']);
    Route::get('searchingStudent',[AddMarksController::class,'searchingStudent']);
    Route::post('searchSerialStudent',[AddMarksController::class,'searchSerialStudent']);
    Route::resource('view_marks', ViewMarksController::class);
    Route::get('searchMarksEntry',[ViewMarksController::class,'searchMarksEntry']);
    Route::post('searchStoredSerialStudent',[ViewMarksController::class,'searchStoredSerialStudent']);
    Route::resource('view_total_subject_marks', ViewTotalSubjectMarksEntryController::class);
    Route::resource('view_completed_subject', ViewCompletedSubjectController::class);
    Route::resource('generate_gpa', GenerateGPAController::class);
    Route::resource('generate_grade_point', GenerateGradePointController::class);

    Route::get('student_info_from', [StudentInfoController::class, 'from']);
    Route::post('loadDistrict', [StudentInfoController::class, 'loadDistrict']);
    Route::post('loadUpazilla', [StudentInfoController::class, 'loadUpazilla']);
    Route::post('loadParmanenetDistrict', [StudentInfoController::class, 'loadParmanenetDistrict']);
    Route::post('loadParmanenetUpazilla', [StudentInfoController::class, 'loadParmanenetUpazilla']);

    Route::resource('add_exam_type', AddExamTypeController::class);

    Route::get('changeExamTypeStatus/{id}',[AddExamTypeController::class,'changeExamTypeStatus']);


    // subejct group routes
    Route::post('getClassGroup',[AddSubjectController::class,'getClassGroup']);
    Route::get('subjectStatusChanged/{id}',[AddSubjectController::class,'subjectStatusChanged']);
    // Route::get('nocStatusChanged/{id}',[NOCController::class,'nocStatusChanged']);

    Route::resource('others_income', othersIncomeController::class);


    route::get('retrive_income/{id}',[othersIncomeController::class,'retrive_income']);
    route::get('delete_income/{id}',[othersIncomeController::class,'delete_income']);

     Route::resource('expense_column', ExpenseColumnController::class);

    route::get('retrive_expense/{id}',[ExpenseColumnController::class,'retrive_expense']);
    route::get('delete_expense/{id}',[ExpenseColumnController::class,'delete_expense']);

     Route::resource('student_fee_column', StudentFeeColumnController::class);

    route::get('retrive_student_fee/{id}',[StudentFeeColumnController::class,'retrive_student_fee']);
    route::get('delete_student_fee/{id}',[StudentFeeColumnController::class,'delete_student_fee']);

     Route::resource('income_expense', IncomeExpenseController::class);

    route::get('retrive_income_expense/{id}',[IncomeExpenseController::class,'retrive_income_expense']);
    route::get('delete_income_expense/{id}',[IncomeExpenseController::class,'delete_income_expense']);

     Route::resource('expense_entry', ExpenseEntryController::class);
     Route::get('report/{voucher_no}',[ExpenseEntryController::class,'report']);

    route::get('retrive_expense_entry/{id}',[ExpenseEntryController::class,'retrive_expense_entry']);
    route::get('delete_expense_entry/{id}',[ExpenseEntryController::class,'delete_expense_entry']);

     Route::resource('others_income_entry', OthersIncomeEntryController::class);
     Route::get('other_report/{voucher_no}',[OthersIncomeEntryController::class,'OtherReport']);

    route::get('retrive_others_income_entry/{id}',[OthersIncomeEntryController::class,'retrive_others_income_entry']);
    route::get('delete_others_income_entry/{id}',[OthersIncomeEntryController::class,'delete_others_income_entry']);


     Route::resource('bank_info', BankInformationController::class);

     route::get('retrive_bank_info/{id}',[BankInformationController::class,'retrive_bank_info']);
     route::get('delete_bank_info/{id}',[BankInformationController::class,'delete_bank_info']);

     Route::resource('bank_transaction_entry', BankTransactionEntryController::class);
     Route::get('transactionReport/{check_no}',[BankTransactionEntryController::class,'TransactionReport']);
     Route::get('getBankBalance/{bank_id}',[BankTransactionEntryController::class,'getBankBalance']);

     route::get('retrive_bank_transaction_entry/{id}',[BankTransactionEntryController::class,'retrive_bank_transaction_entry']);
     route::get('delete_bank_transaction_entry/{id}',[BankTransactionEntryController::class,'delete_bank_transaction_entry']);

     Route::resource('bank_transaction_report', BankTransactionReportController::class);

     Route::resource('bank_transaction_statement', BankTransactionStatementController::class);
     Route::get('/bankstatementreports', [BankTransactionStatementController::class,'bankstatementreports']);



    // Route::resource();
    Route::get('showFreeTitle',[AddFeeTitleController::class,'showFreeTitle']);


    Route::resource('supplier_info', SupplierInfoController::class);

    route::get('retrive_supplier_info/{id}',[SupplierInfoController::class,'retrive_supplier_info']);

    route::get('delete_supplier_info/{id}',[SupplierInfoController::class,'delete_supplier_info']);

    Route::resource('purchase_entry', PurchaseEntryController::class);

    route::get('retrive_purchase_entry/{id}',[PurchaseEntryController::class,'retrive_purchase_entry']);

    route::get('delete_purchase_entry/{id}',[PurchaseEntryController::class,'delete_purchase_entry']);

    Route::resource('supplier_payment', SupplierPaymentController::class);
    Route::get('getSupplierDue/{id}',[SupplierPaymentController::class,'getSupplierDue']);

    route::get('retrive_supplier_payment/{id}',[SupplierPaymentController::class,'retrive_supplier_payment']);

    route::get('delete_supplier_payment/{id}',[SupplierPaymentController::class,'delete_supplier_payment']);

    Route::resource('supplier_statement', SupplierStatementController::class);

    Route::resource('cash_receiver_info', CashReceiverInfo::class);

    route::get('retrive_cash_receiver_info/{id}',[CashReceiverInfo::class,'retrive_cash_receiver_info']);

    route::get('delete_cash_receiver_info/{id}',[CashReceiverInfo::class,'delete_cash_receiver_info']);

    Route::resource('cash_deposit', CashDepositController::class);

    route::get('retrive_cash_deposit/{id}',[CashDepositController::class,'retrive_cash_deposit']);

    route::get('delete_cash_deposit/{id}',[CashDepositController::class,'delete_cash_deposit']);

    Route::resource('cash_withdraw', CashWithdrawController::class);

    route::get('retrive_cash_withdraw/{id}',[CashWithdrawController::class,'retrive_cash_withdraw']);

    route::get('delete_cash_withdraw/{id}',[CashWithdrawController::class,'delete_cash_withdraw']);

    Route::get('getReceiverDue/{id}',[CashWithdrawController::class,'getReceiverDue']);

});

Route::get('/backups', function() {
    Artisan::call('backup:run');
  });
