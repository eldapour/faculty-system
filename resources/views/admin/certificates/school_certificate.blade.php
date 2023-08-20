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
        }
        .header1{
            display: inline-block;
            width: 200px;
            text-align: left;
        }

        @media print {
            .app-header{
                display: none;
            }
        }

    </style>
    <div class="section" id="DivIdToPrint">
        <div class="container">
            <div class="border1">
                <div class="border2">
                    <div class="border3">
                        <div class="p-5">
                            <div class="image-logo1">
                                <img style="height: 100px" src="{{ asset('/uploads/university_setting/'.$university_settings->logo) }}">
                            </div>


                            <h3 class="text-center mb-2">شهادة مدرسية </h3>
                            <h3 class="text-center mb-2">ATTESTATIONSCOLAIRE</h3>
                            <h6 class="mb-4">يشهد عميد 'اسم الكلية' أن السيد(ة):</h6>
                            <h6 class="text-start">Le Doyen de la Faculte</h6>
                            <h6 class="text-start mb-5">Atteste par la presente que M/Mme</h6>
                            <div class="d-flex justify-content-between mt-4">
                                <div class="mt-2">
                                    <span class="fs-5 fw-bold header">الاسم العائلى: </span>
                                    <span>{{$user->first_name}}</span>
                                </div>
                                <div>
                                    <span>{{$user->first_name_latin}}</span>
                                    <span class="fs-5 fw-bold header1">:  NOM </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <div class="mt-2">
                                    <span class="fs-5 fw-bold header"> الاسم الشخصى :</span>
                                    <span>{{$user->last_name}} </span>
                                </div>
                                <div>
                                    <span>{{$user->last_name_latin}}</span>
                                    <span class="fs-5 fw-bold header1">: Prenom  </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="fs-5 fw-bold header">تاريخ الازدياد</span>
                                <span>{{$user->birthday_date}}</span>
                                <span class="fs-5 fw-bold header1"> Date de naissance</span>
                            </div>
                            <div class="mt-2">
                                <span class="fs-5 fw-bold header">مكان الازدياد</span>
                                <span>{{$user->birthday_place}}</span>
                            </div>
                            <div class="text-start mt-2">
                                <span>french</span>
                                <span class="fs-5 fw-bold header1"> Lieu de naissance</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="fs-5 fw-bold">رقم التسجيل</span>
                                <span>{{ $user->identifier_id }}</span>
                                <span class="fs-5 fw-bold">N de inscription</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="fs-5 fw-bold">رقم مسار</span>
                                <span>{{ $user->national_number }}</span>
                                <span class="fs-5 fw-bold"> Code massar</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="fs-5 fw-bold">ر.ب.و.ت/جواز السفر</span>
                                <span>{{ $user->national_id }}</span>
                                <span class="fs-5 fw-bold"> C.I.N.E/Passport</span>
                            </div>
                            <div class="mt-2">
                                <span class="fs-5 fw-bold header">يتابع دراسته ب</span>
                                <span>{{ $university_settings->getTranslation('title', 'ar') }}</span>
                            </div>
                            <div class="text-start mt-2">
                                <span>{{ $university_settings->getTranslation('title', 'fr') }}</span>
                                <span class="fs-5 fw-bold header1"> Poursuit ses etudes a</span>
                            </div>
                            <?php
                            $data = getInformationUser();
//                            dd($data);
                            ?>

                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <span class="fs-5 fw-bold header"> مسلك</span>
                                    <span>{{ @$user->user_department->department->getTranslation('department_name', 'ar') }}</span>
                                </div>
                                <div>
                                    <span>{{@$user->user_department->department->getTranslation('department_name', 'fr')}}</span>
                                    <span class="fs-5 fw-bold header1"> Filiere</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="fs-5 fw-bold">السنة الدراسية</span>
                                <span>{{@$user->user_department->year}}</span>
                                <span class="fs-5 fw-bold"> Annee scolaire</span>
                            </div>
                            <div class="d-flex justify-content-center mt-5">
                                <span class="fs-5 fw-bold ">    اكادير فى:   </span>
                                <span>{{ '    '.date('Y-m-d').'      ' }}</span>
                                <span class="fs-5 fw-bold me-3">  : Fait a Agadir le</span>
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
