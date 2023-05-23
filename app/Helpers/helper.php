<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



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