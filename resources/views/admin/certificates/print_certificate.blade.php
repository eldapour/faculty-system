@extends('admin/layouts/master')

@section('title')
    {{ trans('admin.diploma_all') }}
@endsection
@section('page_name')
    {{ trans('admin.diploma_all') }}
@endsection
@section('content')
    <style>
        body {
            background-color: white;
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

        .table {
            border: 1px solid black;
        }

        .table td {
            border: 1px solid black;
        }

        .border-color {
            border: 1px solid black;
            width: 40%;
            font-weight: bold;
        }

        .borded-div {
            border: 1px solid black;
            height: 86px;
            width: 135px;
            margin: 8px 0px 15px 70px;
            text-align: center;
            padding-top: 30px;
        }
    </style>
    <button class="btn btn-sm btn-primary" onclick="Print_Specific_Element()">@lang('admin.Print')</button>
    <div class="section" id="DivIdToPrint">
        <div class="container">
            <div class="border1">
                <div class="border2">
                    <div class="border3">
                        <div class="p-5">
                            <div class="image-logo1">
                                <img src="{{ asset($university_settings[0]->logo) }}">
                            </div>
                            <h3 class="text-center mb-2">شهادة التسجيل بالكلية</h3>
                            <p class="text-center">رقم الشهادة</p>
                            <h5 class="mb-4">يشهد عميد الكلية أن الطالب:</h5>
                            <div class="row">
                                <div class="col-lg-9 col-9">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="border-color">الاسم الكامل</td>
                                            <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-color">رقم التسجيل</td>
                                            <td>{{ $user->identifier_id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-color">رقم أبووجي</td>
                                            <td>{{ $user->points }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-color">الرقم الوطني</td>
                                            <td>{{ $user->national_number }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-color">رقم البطاقة الوطنية/جواز السفر</td>
                                            <td>{{ $user->national_id }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-3 col-3 d-flex justify-content-center">
                                    {{ QrCode::size(150)->generate(route('certificates.registeration')) }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <span class="fs-6 fw-bold">مسجل بالكلية:</span>
                                <span>{{ $university_settings[0]->title[lang()] }}</span>
                                <span class="fs-6 fw-bold">,برسم الموسم الجامعي: </span>
                                <span>{{ $periods[0]->year_start . '/' . $periods[0]->year_end   }}</span>
                            </div>
                            <div class="mb-3">
                                <span class="fs-6 fw-bold"> بالمسلك الدراسي:</span>
                                <span>{{ $department->department_name }}</span>
                            </div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="fw-bold">الوحدات المسجل بها</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="border-color">اسم الوحدة</td>
                                    <td class="fw-bold">الفصل الدراسي</td>
                                </tr>
                                @foreach($semesters as $data)
                                    <tr>
                                        <td class="border-color">{{ $data->subject->subject_name }}</td>
                                        <td class="border-color">{{ $data->subject->unit->unit_code }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p class="mt-4 mb-3">سلمت هذه الشهادة الى المعني بالامر لتقديمها عند الحاجة</p>
                            <div class="d-flex justify-content-end">
                                <div class="borded-div">ختم المؤسسة</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Your Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Another Jquery version, which will be compatible with PrintThis.js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- CDN/Reference To the pluggin PrintThis.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"
            integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w=="
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        var j = jQuery.noConflict(true);
        function Print_Specific_Element() {
            j('#DivIdToPrint').printThis({
                importCSS: true,
                importStyle: true,
                loadCSS: true,
                header: null,
                footer: null,
            });
        }
    </script>

@endsection
