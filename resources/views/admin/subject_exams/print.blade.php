<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MY FACULTY</title>
    <link href="{{ asset($university_settings[0]->logo) }}" rel="icon" />
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
            padding: 10px;
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
            height: 30px;
        }
        .border-color {
            border: 1px solid black;
            width: 40%;
            font-weight: bold;
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
                                <h2 class="mb-2">استدعاء الامتحانات</h2>
                                <p>{{ $period->year_start }}: {{ $period->year_end }}</p>
                                <h5 class="mb-4">{{ $period->period }} - {{ $period->session }}</h5>
                            </div>
                            <!--end left_section_1 -->
                            <div class="image-logo1 right_section_1 col-6">
                                <img src="{{ asset($university_settings[0]->logo) }}" />
                            </div>
                            <!--end right_section_1 -->
                        </div>
                        <!-- End Row -->

                        <div class="row">
                            <div class="col-2  d-flex justify-content-center">
                                <img src="{{ asset('/users/'.auth()->user()->image) }}"
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
                                <th class="min-w-50px">{{ trans('admin.unit_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.subject_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.group_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.doctor_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.day_name_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.date_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.time_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.section_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.exam_code_') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subject_exams as $subject)
                            <tr>
                                <td>{{ $subject->subject->unit->unit_name ?? '' }}</td>
                                <td>{{ $subject->subject->subject_name }}</td>
                                <td>{{ $subject->subject->group->group_name }}</td>
                                <td>{{ $doctor->doctor->first_name }}</td>
                                <td>{{ $subject->exam_day }}</td>
                                <td>{{ $subject->exam_date }}</td>
                                <td>{{$subject->time_start . ' - ' . $subject->time_end}}</td>
                                <td>{{ $section->section }}</td>
                                <td>{{ $exam_code->exam_code }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!--End table -->

                        <p class="mt-4 mb-3 fw-bold">
                            تنبيهات:
                            <br>................................................
                            <br>..........................................
                            <br>
                        </p>

                        <div class="d-flex justify-content-end">
                            <div>ختم المؤسسة</div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div>
                                <img style="width: 145px;" src="{{ asset($university_settings[0]->stamp_logo) }}">
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
