@extends('admin/layouts/master')


@section('title')
    {{ trans('admin.all_requests') }}
@endsection
@section('page_name')
    {{ trans('admin.all_requests') }}
@endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('admin.all_requests') }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-25px">{{ trans('admin.identifier_id') }}</th>
                                <th class="min-w-25px">{{ trans('admin.student') }}</th>
                                <th class="min-w-25px">{{ trans('admin.session') }}</th>
                                <th class="min-w-25px">{{ trans('admin.date') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($history as $h)
                            <tr>
                                <td>{{ $h->id }}</td>
                                <td>{{ $h->user->identifier_id }}</td>
                                <td>{{ $h->user->first_name . " " . $h->user->last_name }}</td>
                                <td>{{ $h->period }}</td>
                                <td>{{ $h->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ trans('admin.No results') }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        // type: text/javascript
    </script>
@endsection
