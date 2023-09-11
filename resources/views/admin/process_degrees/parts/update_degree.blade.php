@extends('admin.layouts.master')

@section('title')
    {{ trans('admin.update_degree') }}
@endsection
@section('page_name')
    {{ trans('admin.update_degree') }}
@endsection
@section('content')
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }
    </style>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="updateDegreeForm">
                        <input type="hidden" value="{{ $old_degree->id }}" id="id" name="id">
                        <input type="hidden" value="{{ $process_degrees->id }}" id="process_degree_id" name="process_degree_id">
                        <table id="customers">
                            <thead>
                                <tr>
                                    <th>المادة</th>
                                    <th>الطالب</th>
                                    <th>درجة الامتحان</th>
                                    <th>الدرجة القديمة</th>
                                    <th>الدرجة الجديدة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $old_degree->subject->subject_name }}</td>
                                    <td>{{ $old_degree->user->first_name }}</td>
                                    <td>{{ $old_degree->exam_degree }}</td>
                                    <td>{{ $old_degree->student_degree }}</td>
                                    <td><input type="text" id="student_degree" name="student_degree" required></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <button class="btn btn-success" type="submit">{{ trans('admin.update_degree') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @include('admin.layouts.myAjaxHelper')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script>
        // This function to update Degree Student
        $(document).ready(function() {
            $('#updateDegreeForm').submit(function(event) {
                event.preventDefault();
                let id = $("#id").val();
                let studentDegree = $("#student_degree").val();
                let process_degree_id = $("#process_degree_id").val();

                $.ajax({
                    url: '{{ route('updateDegree') }}',
                    method: 'POST',
                    data: {
                        id: id,
                        process_degree_id: process_degree_id,
                        studentDegree: studentDegree,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.code === 200) {
                            toastr.success('{{ trans('admin.updated_degree_successfully') }}');
                            window.setTimeout(function () {
                                window.location.href = '{{ route('process_degrees.index') }}';
                            }, 1000);

                        } else {
                            toastr.error('{{ trans('admin.the_entered_mark') }}');
                        }
                    },
                    error: function(response) {
                        if (response.code == 505)
                            toastr.error('AJAX request failed. Error: ' + error);
                    }
                });
            });
        });
    </script>
@endsection
