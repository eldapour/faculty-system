<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DataModificationController;
use App\Http\Controllers\Admin\DepartmentBranchController;
use App\Http\Controllers\Admin\DepartmentBranchStudentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DocumentTypeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeadlineController;
use App\Http\Controllers\Admin\InternalAdController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WordController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\GroupController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectExamController;
use App\Http\Controllers\Admin\SubjectStudentController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\SubjectUnitDoctorController;
use App\Http\Controllers\Admin\UniversitySettingController;
use App\Http\Controllers\Admin\SubjectExamStudentController;
use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ProcessDegreeController;
use App\Http\Controllers\Admin\ProcessExamController;
use App\Http\Controllers\Admin\SubjectExamStudentResultController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/login-admin', [LoginController::class, 'index'])->name('admin.login');
    Route::get('/login-student', [LoginController::class, 'indexStudent'])->name('student.login');
    Route::post('/do-login', [LoginController::class, 'login'])->name('login');
});


Route::group([
    'prefix' => LaravelLocalization::setLocale() . '/dashboard',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
], function () {


    ###################### Category #############################
    Route::resource('categories', CategoryController::class);

    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');


    #### Users ####
    Route::resource('users', UserController::class)->except(['show']);
    Route::post('users.delete', [UserController::class, 'delete'])->name('users.delete');


    #### Admins ####
    Route::resource('admins', AdminController::class)->except(['show']);
    Route::post('admins.delete', [AdminController::class, 'delete'])->name('admins.delete');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');

    #### Deadline ####
    Route::resource('deadlines', DeadlineController::class);

    #### Setting ####
    Route::resource('settings', SettingController::class);

    #### Service ####
    Route::resource('services', ServiceController::class);

    #### departments ####
    Route::resource('departments', DepartmentController::class);

    #### sliders ####
    Route::resource('sliders', SliderController::class);

    #### pages ####
    Route::resource('pages', PageController::class);

    #### word ####
    Route::resource('word', WordController::class);

    #### branches ####
    Route::resource('branches', DepartmentBranchController::class);


    #### user branches ####
    Route::resource('userBranches', DepartmentBranchStudentController::class);
    Route::get('getBranches', [DepartmentBranchStudentController::class, 'getBranches'])->name('getBranches');


    #### Internal Ads ####
    Route::resource('internal_ads', InternalAdController::class);
    Route::post('active_status', [InternalAdController::class, 'makeActive'])->name('makeActive');

    #### Video ####
    Route::resource('video', VideoController::class);

    #### Advertisement ####
    Route::resource('advertisements', AdvertisementController::class);

    #### Presentation ####
    Route::resource("presentations", PresentationController::class);

    #### Slider ####
    Route::resource('slider', SliderController::class);

    #### Slider ####
    Route::resource('data_modify', DataModificationController::class);

    #### Group ####
    Route::resource('group', GroupController::class);

    ### Subject ####
    Route::resource('subject', SubjectController::class);

    #### Unit ####
    Route::resource('unit', UnitController::class);

    #### Subject Student ####
    Route::resource('subject_student', SubjectStudentController::class);

    #### Subject Unit Doctor ####
    Route::resource('subject_unit_doctor', SubjectUnitDoctorController::class);
    Route::get('get_unit', [SubjectUnitDoctorController::class, 'getUnit'])->name('getUnit');

    #### University Setting
    Route::resource('university_settings', UniversitySettingController::class);

    #### Subject Exam ####
    Route::resource('subject_exams', SubjectExamController::class);
    Route::get('getSubject', [SubjectExamController::class, 'getSubject'])->name('getSubject');

    #### Subject Exam Student ####
    Route::resource('subject_exam_students', SubjectExamStudentController::class);
    Route::get('getStudent', [SubjectExamStudentController::class, 'getStudent'])->name('getStudent');
    Route::get('getSubject', [SubjectExamStudentController::class, 'getSubject'])->name('getSubject');


    #### Element ####
    Route::resource('elements', ElementController::class);

    #### process Degrees ####
    Route::resource('process_degrees', ProcessDegreeController::class);
    Route::get('get_doctor', [ProcessDegreeController::class, 'getDoctor'])->name('getDoctor');

    #### Subject Exam Student Result ####
    Route::resource('subject_exam_student_result', SubjectExamStudentResultController::class);


    #### document types ####
    Route::resource('document_types', DocumentTypeController::class);
    Route::post('document_types.delete', [DocumentTypeController::class, 'delete'])->name('document_types.delete');


    #### documents ####
    Route::resource('documents', DocumentController::class)->except(['edit', 'update', 'show']);
    Route::post('documents.delete', [DocumentController::class, 'delete'])->name('documents.delete');
    Route::post('documents/processing', [DocumentController::class, 'processing'])->name('documents.processing');
    Route::get('documents/student', [DocumentController::class, 'documentsStudent'])->name('documents.student');


    #### Process Exam ####
    Route::resource('process_exams', ProcessExamController::class);
    Route::get('process_examss/students', [ProcessExamController::class, 'processExamStudent'])->name('processExamStudent');
    Route::post('updateRequestStatus/', [ProcessExamController::class, 'updateRequestStatus'])->name('updateRequestStatus');


    #### Element ####
    Route::resource('elements', ElementController::class);

    #### Process Degrees ####
    Route::resource('process_degrees', ProcessDegreeController::class)->except('show');
    Route::get('process_degreess/students', [ProcessDegreeController::class, 'processDegreeStudent'])->name('processDegreeStudent');
    Route::post('RequestStatusDegree/', [ProcessDegreeController::class, 'RequestStatusDegree'])->name('RequestStatusDegree');
    Route::post('updateDegree', [ProcessDegreeController::class, 'updateDegree'])->name('updateDegree');

    #### Subject Exam Student Result ####
    Route::resource('subject_exam_student_result', SubjectExamStudentResultController::class);


    #### certificates ####
    Route::resource('certificates', CertificateController::class);
    Route::post('certificates.delete', [CertificateController::class, 'delete'])->name('certificates.delete');
    Route::post('certificates/processing', [CertificateController::class, 'processing'])->name('certificates.processing');

    Route::get('exportCertificate', [CertificateController::class, 'exportCertificate'])->name('exportCertificate');
    Route::post('importCertificate', [CertificateController::class, 'importCertificate'])->name('importCertificate');


    #### Event ####
    Route::resource('events', EventController::class);

    #### schedules ####
    Route::resource('schedules', ScheduleController::class);
    Route::post('schedules/delete', [ScheduleController::class, 'delete'])->name('schedules.delete');


    #### periods ####
    Route::resource('periods', PeriodController::class)->only(['index', 'create', 'store']);
    Route::post('period/status', [PeriodController::class, 'status'])->name('period.status');



});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
], function () {

//get all subject by group_id and department_branch_id
Route::get('get-subject-by-branch/{department_branch_id}/{group_id}',[HomeController::class,'getSubjectByBranch']);
});
