@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    معالجات الرسوم الدراسية
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    معالجات الرسوم الدراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>المبلغ</th>
                                            <th>البيان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($processing_fees as $processing_fee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$processing_fee->student->name}}</td>
                                                <td>{{ number_format($processing_fee->amount, 2) }}</td>
                                                <td>{{$processing_fee->description}}</td>
                                                <td>
                                                    <a href="{{route('processing-fees.edit',$processing_fee->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_receipt{{$processing_fee->id}}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.processing_fees.delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
