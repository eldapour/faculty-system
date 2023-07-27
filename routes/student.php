<?php

use App\Http\Controllers\Student\DocumentController;
use App\Http\Controllers\Student\PointStatement\PointStatementController;
use App\Http\Controllers\Student\SubjectExamStudentController;
use App\Http\Controllers\Student\SubjectExamStudentResultController;
use App\Http\Controllers\Student\SubjectStudentController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


// Humsi fix it eslam

Route::group(['prefix' => LaravelLocalization::setLocale() . '/dashboard', 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth']], function () {

    Route::get('subject-student-all',[SubjectStudentController::class,'index'])->name('subject-student-all');
    Route::get('point-statement-student',[PointStatementController::class,'pointStatementStudent'])->name('point-statement-student');


    Route::get('subject-exam-result-normal',[SubjectExamStudentResultController::class,'normal'])->name('subject-exam-result-normal');
    Route::get('subject-exam-result-remedial',[SubjectExamStudentResultController::class,'remedial'])->name('subject-exam-result-remedial');


    Route::get('subject-exam-student-normal',[SubjectExamStudentController::class,'normal'])->name('subject-exam-student-normal');
    Route::get('subject-exam-student-remedial',[SubjectExamStudentController::class,'remedial'])->name('subject-exam-student-remedial');


    Route::get('documents-student-all', [DocumentController::class,'index'])->name('documents-student-all');
    Route::get('document-create', [DocumentController::class, 'create'])->name('document-create');
    Route::post('document-store', [DocumentController::class, 'store'])->name('document-store');
    Route::post('documents-delete', [DocumentController::class, 'destroy'])->name('documents-delete');

});
