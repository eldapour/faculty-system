<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $university_settings->title }}</title>
    <link href="{{ asset('/uploads/university_setting/'.$university_settings->logo) }}" rel="icon" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('certificate_student_exam_assets') }}/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('certificate_student_exam_assets') }}/css/bootstrap.min.css" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=Jost:wght@200;300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <style>

        table{
            width: 100%;
            border: 1px solid black;
        }
        thead{background-color: #eb9984;}
        table td{
            border: 1px solid black;
            padding: 1px;
            width: 10% !important;
        }
        .border1 {
            border: 1px solid #618597;
        }

        .border2 {
            border: 15px solid #618597;
            margin: 2px;
        }

        .border3 {
            border: 1px solid #618597;
            margin: 2px;
        }

        .image-logo1 {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .image-logo1 img {
            height: 100px;
        }
        .border-color {
            border: 1px solid black;
            width: 40%;
            font-weight: bold;
        }
        .table td {
            padding: 0.2rem !important;
        }
        @media print {
            body{
                font-size: 7px;
            }
            .table td {
                padding: 0.2rem !important;
            }
            .p-5{
                padding: 10px !important;
            }
            .print{
                font-size: 10px;
            }
            .img-print{
                width: 50px !important;
            }
            .mb-4{
                margin-bottom: 0px;
            }
            .mt-4{
                margin-top: 0px !important;
            }
            .image-logo1 {
                margin-bottom: 0px;
            }
        }
    </style>
</head>

<body>
<div class="section text-right">
    <div class="container">
        <div class="border1">
            <div class="border2">
                <div class="border3">
                    <div class="p-5">
                        <div class="row">
                            <div class="left_section_1 col-6">
                                <h5 class="mb-2 print">استدعاء الامتحانات</h5>
                                <p>{{ period()->year_start }}: {{ period()->year_end }}</p>
                                <h6 class="mb-4 print">{{ period()->period  }}</h6>
                            </div>
                            <!--end left_section_1 -->
                            <div class="image-logo1 right_section_1 col-6">
                                <img src="{{ asset('/uploads/university_setting/'.$university_settings->logo) }}" />
                            </div>
                            <!--end right_section_1 -->
                        </div>
                        <!-- End Row -->

                        <div class="row">
                            <div class="col-2  d-flex justify-content-center">
                                <img src="{{ asset('uploads/users/'.auth()->user()->image) }}"
                                     alt="{{ auth()->user()->first_name }}" style="width: 140px; height: 120px" class="img-fluid" />
                            </div>
                            <div class="col-8">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="border-color">الاسم الكامل</td>
                                        <td>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-color">رقم التسجيل</td>
                                        <td>{{ auth()->user()->identifier_id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-color">رقم أبووجي</td>
                                        <td>{{ auth()->user()->points }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-color">الرقم الوطني</td>
                                        <td>{{ auth()->user()->national_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-color">
                                            رقم البطاقة الوطنية/جواز السفر
                                        </td>
                                        <td>{{ auth()->user()->national_id }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class=" col-2 d-flex justify-content-center">
                                {{ QrCode::size(120)->generate(route('subject_exams.print')) }}
                            </div>
                        </div>
                        <!--End Row -->
                        <!--start table -->
                        <table>
                            <thead>
                            <tr>
                                <th class="min-w-50px">{{ trans('admin.unit_name') }}</th>
                                <th class="min-w-25px">{{ trans('admin.subject_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.group_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.day_name_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.date_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.time_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.section_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.exam_code_') }}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.exam_number_name')}}</th>
                                <th class="min-w-25px">{{ trans('admin.doctor') }}</th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($subject_exam_students as $subject_exam_student)

                                @php
                                    $doctor = App\Models\SubjectUnitDoctor::query()
                                    ->with(['doctor'])
                                    ->whereHas('doctor', function ($q) use($subject_exam_student){
                                        $q->where('subject_id','=',$subject_exam_student->subject_exam->subject->id);

                                    })
                                    ->whereIn('subject_id',$array)
                                    ->where('period', '=',period()->period)
                                    ->where('year', '=', period()->year_start)->first()->doctor
                                @endphp

                                <tr>
                                    <td>{{ $subject_exam_student->subject_exam->subject->unit->unit_name }}</td>
                                    <td>{{ $subject_exam_student->subject_exam->subject->subject_name }}</td>
                                    <td>{{ $subject_exam_student->subject_exam->group->group_name }}</td>
                                    <td>{{ $subject_exam_student->subject_exam->exam_day }}</td>
                                    <td>{{ $subject_exam_student->subject_exam->exam_date }}</td>
                                    <td>{{$subject_exam_student->subject_exam->time_start . ' - ' . $subject_exam_student->subject_exam->time_end}}</td>
                                    <td>{{ $subject_exam_student->section }}</td>
                                    <td>{{ $subject_exam_student->subject_exam->exam_code }}</td>
                                    <td>{{ $subject_exam_student->exam_number }}</td>
                                    <td>{{ $doctor->first_name . " " .$doctor->last_name}}</td>


                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <!--End table -->

                        <div class="d-flex justify-content-between">
                            <p class="mt-4 mb-3 fw-bold">
                                تنبيهات:
                                <br>• الحضور الي مقر الا متحانات نصف ساعة قبل الموعد المحدد.
                                <br>• يمنع منعا كليا ادخال او استعمال الهاتف النقال والاجهزه الالكترونية داخل قاعات الامتحانات .
                                <br>• احترام لجنه الامتحانات والالتزام التام بضوابط اجراء الامتحانات .
                                <br>
                            </p>


                            <div class="">
                                <div class="">
                                    <div>ختم المؤسسة</div>
                                </div>
                                <div>
                                    <img class="img-print" style="width: 100px;" src="{{ asset('/uploads/university_setting/'.$university_settings->stamp_logo) }}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('certificate_student_exam_assets') }}/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('certificate_student_exam_assets') }}/js/all.min.js"></script>
<script>
    window.print();
</script>
</body>

</html>
