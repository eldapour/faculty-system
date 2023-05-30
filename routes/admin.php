<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepartmentBranchController;
use App\Http\Controllers\Admin\DepartmentBranchStudentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DocumentTypeController;
use App\Http\Controllers\Admin\PageController;
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
use App\Http\Controllers\Admin\ProcessDegreeController;
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
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/do-login', [LoginController::class, 'login'])->name('login');
});

Route::group([
    'prefix' => LaravelLocalization::setLocale() . '/admin',
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
    Route::get('getBranches', [DepartmentBranchStudentController::class,'getBranches'])->name('getBranches');

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

    #### University Setting
    Route::resource('university_settings', UniversitySettingController::class);

    #### Subject Exam ####
    Route::resource('subject_exams', SubjectExamController::class);

    #### Subject Exam Student ####
    Route::resource('subject_exam_students', SubjectExamStudentController::class);

<<<<<<< HEAD

    #### document types ####
    Route::resource('document_types', DocumentTypeController::class);
    Route::post('document_types.delete', [DocumentTypeController::class, 'delete'])->name('document_types.delete');



    #### documents ####
    Route::resource('documents', DocumentController::class)->except(['edit','update','show']);
    Route::post('documents.delete', [DocumentController::class, 'delete'])->name('documents.delete');
    Route::post('documents/processing', [DocumentController::class, 'processing'])->name('documents.processing');
    Route::get('documents/student', [DocumentController::class, 'documentsStudent'])->name('documents.student');




=======
    #### Element ####
    Route::resource('elements', ElementController::class);

    #### Process Degrees ####
    Route::resource('process_degrees', ProcessDegreeController::class);

    #### Subject Exam Student Result ####
    Route::resource('subject_exam_student_result', SubjectExamStudentResultController::class);
>>>>>>> 9d21daff488fe1d591f1193d6107382c49cabbff
});
