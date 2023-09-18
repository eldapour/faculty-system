
<style>
    .myTable, .myTable th,.myTable td {
        border:1px solid grey;
        padding: 6px;
    }



</style>

<br>
<div style="overflow-y: auto;">
    <table class="myTable" style="width:100%">
        <tr style="background-color: #a6c64c;color: white">

            <th>{{trans('subject_exam.subject_exam_id')}}</th>
            <th>{{trans('subject_exam.identifier_id_student')}}</th>
            <th>{{trans('subject_exam.subject_code_')}}</th>
            <th>{{trans('subject_exam.session')}}</th>
            <th>{{trans('subject_exam.year')}}</th>
            <th>{{trans('subject_exam.section_name')}}</th>
            <th>{{trans('subject_exam.exam_code')}}</th>
            <th>{{trans('subject_exam.doctor')}}</th>
            <th>{{trans('subject_exam.student_degree_before_request')}}</th>
            <th>{{trans('subject_exam.student_degree_after_request')}}</th>
            <th>{{trans('subject_exam.request_type')}}</th>
            <th>{{trans('subject_exam.request_date')}}</th>
            <th>{{trans('subject_exam.request_status')}}</th>
            <th>{{trans('subject_exam.processing_date')}}</th>
            <th>{{trans('admin.action')}}</th>

        </tr>



        @foreach( $processDegrees as $processDegree)
            <tr>
                <td>{{$processDegree->id}}</td>
                <td>{{$processDegree->user->identifier_id}}</td>
                <td>{{$processDegree->subject->code}}</td>
                <td>{{$processDegree->session}}</td>
                <td>{{$processDegree->year}}</td>
                <td>{{$processDegree->section}}</td>
                <td>{{$processDegree->exam_code}}</td>
                <td>{{$processDegree->doctor->first_name . " " . $processDegree->doctor->last_name}}</td>
                <td>{{$processDegree->student_degree_before_request}}</td>
                <td>{{$processDegree->student_degree_after_request}}</td>
                <td>{{$processDegree->request_type}}</td>
                <td>{{$processDegree->created_at->diffForHumans()}}</td>
                <td>{{$processDegree->request_status}}</td>
                <td>{{$processDegree->processing_date ?? 'No Date'}}</td>
                <td><select id="request_status" data-id="{{$processDegree->id}}">
                        <option value="accept">{{trans('subject_exam.accept')}}</option>
                        <option value="refused">{{trans('subject_exam.refused')}}</option>
                        <option value="under_processing">{{trans('subject_exam.under_processing')}}</option>
                    </select></td>

            </tr>
        @endforeach

    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" id="closeBtn">
        Close
    </button>
</div>

<script>
    $('#closeBtn').on('click',function (){
        $('#detailsModal').modal('hide');
    });
    $('#closeIcon').on('click',function (){
        $('#detailsModal').modal('hide');
    });
</script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $("#request_status").change(function()
        {
            let id  = $(this).data("id");
            let request_status =$(this).val();
            // alert(id + request_status);
            $.ajax({
                type: "POST",
                url: "{{route('changeRequestStatus')}}",
                data: {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                    'request_status' : request_status
                },
                success: function(data)
                {
                    if (data.status == 200) {
                        $('#detailsModal').modal('hide');
                        toastr.success('Request Updated Successfully');
                    }
                }
            });

        });

    });
</script>
