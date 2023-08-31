@extends('admin/layouts/master')

@section('title')
    الشهادة المدرسية
@endsection
@section('page_name')
     <button class="btn btn-sm btn-primary" onclick="Print_Specific_Element()">@lang('admin.Print')</button>
@endsection
@section('content')
    <style>
        body {
            background-color: white;
        }
        .border1{
            border: 1px solid #618597;
        }
        .border2{
            border: 15px solid #618597;
            margin:2px;
        }
        .border3{
            border: 1px solid #618597;
            margin:2px;
        }
        .image-logo1{
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .image-logo1 img{
            height: 30px;
        }
        .header{
            display: inline-block;
            min-width: 145px;
            padding-top: 0 !important;
        }
        .header1{
            display: inline-block;
            width: 200px;
            text-align: left;
        }
        #print_container{
            height: 100% !important;
            padding-bottom: 400px !important;
        }

        @media print {
            .app-header{
                display: none;
            }


        }
        .text-start{
            text-align: left;
        }
        .text-center{
            text-align: center;
        }
        .fw-bold{
            font-weight: bold;
        }
        .margin{
            margin-top: 100px !important;
        }

    </style>
    <div class="section" id="DivIdToPrint">
        <div class="container">
            <div class="border1">
                <div class="border2">
                    <div class="border3">
                        <div class="p-5" id="print_container">
                            <div class="image-logo1 mt-5">
                                <img style="height: 100px" src="{{ asset('/uploads/university_setting/'.$university_settings->logo) }}">
                            </div>



                            <h3 class="text-center mt-5 mb-3">شهادة مدرسية </h3>
                            <h3 class="text-center mb-5">ATTESTATIONSCOLAIRE</h3>
                            <br>
                            <h6 class="mb-5">  يشهد عميد   <strong>{{ $university_settings->getTranslation('title', app()->getLocale()) }}</strong>  أن السيد(ة): </h6>
                            <h6 class="text-start mb-2">Le Doyen de la Faculte</h6>
                            <h6 class="text-start mb-5">Atteste par la presente que M/Mme</h6>
                            <div class="d-flex justify-content-between mt-5">
                                <div>
                                    <span class="fs-5 header">الاسم العائلى: </span>
                                    <span class="fw-bold">{{$user->first_name}}</span>
                                </div>
                                <div>
                                    <span class="fw-bold">{{$user->first_name_latin}}</span>
                                    <span class="fs-5 header1">:  NOM </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <div>
                                    <span class="fs-5 header"> الاسم الشخصى :</span>
                                    <span class="fw-bold">{{$user->last_name}} </span>
                                </div>
                                <div>
                                    <span class="fw-bold">{{$user->last_name_latin}}</span>
                                    <span class="fs-5 header1">: Prenom  </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="fs-5 header">تاريخ الازدياد</span>
                                <span class="fw-bold">{{$user->birthday_date}}</span>
                                <span class="fs-5 header1"> Date de naissance</span>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                            <div >
                                <span class="fs-5 header">مكان الازدياد</span>
                                <span class="fw-bold">{{$user->city_ar}}</span>
                            </div>
                            <div>
                                <span class="fw-bold">{{ $user->city_latin }}</span>
                                <span class="fs-5 header1"> Lieu de naissance</span>
                            </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2 mb-4">
                                <span class="fs-5">رقم التسجيل</span>
                                <span class="fw-bold">{{ $user->identifier_id }}</span>
                                <span class="fs-5">N de inscription</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2 mb-4">
                                <span class="fs-5">رقم مسار</span>
                                <span class="fw-bold">{{ $user->national_number }}</span>
                                <span class="fs-5"> Code massar</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2 mb-4">
                                <span class="fs-5">ر.ب.و.ت/جواز السفر</span>
                                <span class="fw-bold">{{ $user->national_id }}</span>
                                <span class="fs-5"> C.I.N.E/Passport</span>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                            <div >
                                <span class="fs-5 header">يتابع دراسته ب</span>
                                <span class="fw-bold">{{ $university_settings->getTranslation('title', 'ar') }}</span>
                            </div>
                            <div>
                                <span class="fw-bold">{{ $university_settings->getTranslation('title', 'fr') }}</span>
                                <span class="fs-5 header1"> Poursuit ses etudes a</span>
                            </div>
                            </div>
                            <?php
                            $data = getInformationUser();
//                            dd($data);
                            ?>

                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <span class="fs-5 header"> مسلك</span>
                                    <span class="fw-bold">{{ @$user->user_department->department->department_name }}</span>
                                </div>
                                <div>
                                    <span class="fw-bold">{{@$user->user_department->department->department_name }}</span>
                                    <span class="fs-5 header1"> Filiere</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="fs-5">السنة الدراسية</span>
                                <span class="fw-bold">{{@$user->user_department->year}}</span>
                                <span class="fs-5"> Annee scolaire</span>
                            </div>
                            <div class="d-flex justify-content-center mt-5 margin">
                                <span class="fs-5 mt-5">    اكادير فى:   </span>
                                <span class="mt-5 fw-bold">{{ '    '.date('Y-m-d').'      ' }}</span>
                                <span class="fs-5 me-3 mt-5">  : Fait a Agadir le</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CDN/Reference To the pluggin PrintThis.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"
            integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w=="
            crossorigin="anonymous"></script>

    <script>
        function Print_Specific_Element() {
            window.print();
        }
    </script>

@endsection
