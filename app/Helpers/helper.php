<?php

use App\Models\Document;
use App\Models\ProcessDegree;
use App\Models\ProcessExam;
use App\Models\SubjectStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


if (!function_exists('checkUser')){
    function checkUser($user): bool
    {
        return auth()->user()->user_type == $user;
    }
}

if (!function_exists('saveFile')) {
    function saveFile($photo,$folder)
    {
        $file_extension = $photo->getClientOriginalExtension();
        $file_name =  $folder.'/'.rand('1','9999').time().'.'.$file_extension;
        $photo -> move($folder,$file_name);

        return $file_name;
    }
}



if (!function_exists('get_file')) {
    function getFile($image): string
    {
        if ($image!= null){
            if (!file_exists($image)){
                return asset('uploads/noImage.png');
            }else{
                return asset($image);
            }
        }else{
            return asset('uploads/noImage.png');
        }
    }
}

if (!function_exists('admin')) {
    function admin(){
        return auth()->guard('admin');
    }
}
if (!function_exists('setting')) {
    function setting(){
        return \App\Models\Setting::first();
    }
}

if (!function_exists('loggedAdmin')) {
    function loggedAdmin($field = null){
        return auth()->guard('admin')->user()->$field;
    }
}

if (!function_exists('user')) {
    function user() {
        return auth()->guard('user');
    }
}

if(!function_exists('lang')){

    function lang(){

        return Config::get('app.locale');
    }
}
if (!function_exists('trans_model')) {

    function trans_model($model,$word){

        return $model->{$word.'_'. app()->getlocale()};
    }

}

if (!function_exists('get_user_file')) {
    function get_user_file($image) {
        if ($image!= null){
            if (!file_exists($image)){
                return asset('assets/uploads/avatar.png');
            }else{
                return asset($image);
            }
        }else{
            return asset('assets/uploads/avatar.png');
        }
    }
}
if (!function_exists('userCount')) {
    function userCount() {
        $count = DB::table('users')->where('user_type', 'student')->count();
        return $count;
    }
}
if (!function_exists('doctorCount')) {
    function doctorCount() {
        $count = DB::table('users')->where('user_type', 'doctor')->count();
        return $count;
    }
}
if (!function_exists('adminCount')) {
    function adminCount() {
        $count = DB::table('users')->where('user_type', 'manger')->count();
        return $count;
    }
}
if (!function_exists('departmentCount')) {
    function departmentCount() {
        $count = DB::table('departments')->count();
        return $count;
    }
}
if (!function_exists('branchCount')) {
    function branchCount() {
        $count = DB::table('department_branches')->count();
        return $count;
    }
}


if (!function_exists('get_file')) {
    function get_file($image) {

        if ($image!= null){
            if (!file_exists($image)){
                return asset('assets/uploads/empty.png');
            }else{
                return asset($image);
            }
        }else{
            return asset('assets/uploads/empty.png');
        }
    }
}

if (!function_exists('api')) {
    function api() {
        return auth()->guard('api');
    }
}

if (!function_exists('helperJson')) {
    function helperJson($data=null,$message='',$code=200,$status=200) {
        $json = response()->json(['data'=>$data,'message'=>$message,'code'=>$code],$status);
        return $json;
    }
}


//dashboard student home

/*
 * documentCountUser()
 * processExamCountUser()
 * processDegreeCountUser()
 * subjectStudentCountUser()
 */
if (!function_exists('documentCountUser')) {
    function documentCountUser(): int
    {

        $period = \App\Models\Period::query()
            ->where('status','=','start')
            ->first();

        $documentCount = 0;

        if($period){

            $documentCount = Document::query()
                ->where('user_id','=',auth()->id())
                ->whereYear('created_at','=', $period->year_start);

            return $documentCount->count();
        }else{

            return $documentCount;
        }
    }
}


if (!function_exists('processExamCountUser')) {
    function processExamCountUser(): int {

        $period = \App\Models\Period::query()
            ->where('status','=','start')
            ->first();



            $processExamCount = ProcessExam::query()
                ->where('user_id', '=', auth()->id());

            return $processExamCount->count();

       

    }
}


if (!function_exists('processDegreeCountUser')) {
    function processDegreeCountUser():int {

        $period = \App\Models\Period::query()
            ->where('status','=','start')
            ->first();

        $processDegreeCount = 0;

        if($period) {

            $processDegreeCount = ProcessDegree::query()
                ->where('user_id', '=', auth()->id())
                ->where('year', '=', $period->year_start);

            return $processDegreeCount->count();

        }else{

            return $processDegreeCount;
        }


    }
}

if (!function_exists('subjectStudentCountUser')) {
    function subjectStudentCountUser(): int {


        $period = \App\Models\Period::query()
            ->where('status','=','start')
            ->first();

        $subjectStudentCount = 0;

        if($period) {

            $subjectStudentCount = SubjectStudent::query()
                ->where('user_id', '=', auth()->id())
                ->where('period','=',$period->period)
                ->where('year', '=', $period->year);

            return  $subjectStudentCount->count();

        }else{

            return  $subjectStudentCount;
        }


    }
}
