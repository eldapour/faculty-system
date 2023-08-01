<?php

use App\Http\Controllers\Admin\DepartmentStudentController;
use App\Http\Controllers\Student\DocumentController;
use App\Http\Controllers\Student\PointStatement\PointStatementController;
use App\Http\Controllers\Student\ProcessDegree\ProcessDegreeController;
use App\Http\Controllers\Student\ProcessExam\ProcessExamController;
use App\Http\Controllers\Student\SubjectExamStudentController;
use App\Http\Controllers\Student\SubjectExamStudentResultController;
use App\Http\Controllers\Student\SubjectStudentController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale() . '/dashboard', 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth']], function () {

    Route::get('subject-student-all',[SubjectStudentController::class,'index'])->name('subject-student-all');
    Route::get('point-statement-student',[PointStatementController::class,'pointStatementStudent'])->name('point-statement-student');


    Route::get('subject-exam-result-normal',[SubjectExamStudentResultController::class,'normal'])->name('subject-exam-result-normal');
    Route::get('subject-exam-result-remedial',[SubjectExamStudentResultController::class,'remedial'])->name('subject-exam-result-remedial');
    Route::get('subject-exam-student-normal',[SubjectExamStudentController::class,'normal'])->name('subject-exam-student-normal');
    Route::get('subject-exam-student-remedial',[SubjectExamStudentController::class,'remedial'])->name('subject-exam-student-remedial');


    //documents routes
    Route::get('documents-student-all', [DocumentController::class,'index'])->name('documents-student-all');
    Route::get('document-create', [DocumentController::class, 'create'])->name('document-create');
    Route::post('document-store', [DocumentController::class, 'store'])->name('document-store');
    Route::post('documents-delete', [DocumentController::class, 'destroy'])->name('documents-delete');



    #### user department ####
    Route::resource('departmentStudents', DepartmentStudentController::class)->middleware('forbidden');
    Route::get('exportDepartmentStudents', [DepartmentStudentController::class, 'exportDepartmentStudents'])->name('exportDepartmentStudents')->middleware('forbidden');
    Route::post('importDepartmentStudents', [DepartmentStudentController::class, 'importDepartmentStudents'])->name('importDepartmentStudents')->middleware('forbidden');

    //process exam routes
    Route::get('get-all-process-exams', [ProcessExamController::class, 'get_all_process_exams'])->name('get-all-process-exams');
    Route::get('create-process-exam', [ProcessExamController::class, 'create_process_exam'])->name('create-process-exam');
    Route::post('store-process-exam', [ProcessExamController::class, 'store_process_exam'])->name('store-process-exam');
    Route::post('delete-process-exam', [ProcessExamController::class, 'delete_process_exam'])->name('delete-process-exam');


    //process degree routes
    Route::get('get-all-process-degrees', [ProcessDegreeController::class, 'get_all_process_degrees'])->name('get-all-process-degrees');

    Route::get('create-process-degree-normal/{id}', [ProcessDegreeController::class, 'normalCreate'])->name('create-process-degree-normal');
    Route::post('store-process-degree-normal', [ProcessDegreeController::class, 'normalStore'])->name('store-process-degree-normal');


    Route::get('create-process-degree-remedial/{id}', [ProcessDegreeController::class, 'remedialCreate'])->name('create-process-degree-remedial');
    Route::post('store-process-degree-remedial', [ProcessDegreeController::class, 'remedialStore'])->name('store-process-degree-remedial');



});
