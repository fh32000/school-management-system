@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{__('student.student_details')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{__('student.student_details')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{__('student.student_details')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">{{__('student.attachments')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{__('student.name')}}</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">{{__('student.email')}}</th>
                                            <td>{{$student->email}}</td>
                                            <th scope="row">{{__('student.gender')}}</th>
                                            <td>{{$student->gender->name}}</td>
                                            <th scope="row">{{__('student.nationality')}}</th>
                                            <td>{{$student->nationality->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{__('student.grade')}}</th>
                                            <td>{{ $student->grade->name }}</td>
                                            <th scope="row">{{__('student.classrooms')}}</th>
                                            <td>{{$student->classroom->name}}</td>
                                            <th scope="row">{{__('student.section')}}</th>
                                            <td>{{$student->section->name}}</td>
                                            <th scope="row">{{__('student.date_of_birth')}}</th>
                                            <td>{{ $student->birthday}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{__('student.guardian')}}</th>
                                            <td>{{ $student->guardian->father_name}}</td>
                                            <th scope="row">{{__('student.academic_year')}}</th>
                                            <td>{{ $student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form action="{{route('students.update',['student'=>$student->id])}}"
                                                  enctype="multipart/form-data" method="post" autocomplete="off">
                                                @method('PUT')
                                                @csrf
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">{{__('student.attachments')}}
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" enctype="multipart/form-data"
                                                               accept="image/*" name="attachments[]" multiple required>
                                                        <input type="hidden" name="id" value="{{$student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                    {{__('student.submit')}}
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{__('student.filename')}}</th>
                                                <th scope="col">{{__('student.created_at')}}</th>
                                                <th scope="col">{{__('student.processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($student->getMedia('attachments')  as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$attachment->name}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{$attachment->getFullUrl()}}" target="_blank"
                                                           role="button"><i
                                                                class="fas fa-download"></i>&nbsp; {{__('student.download')}}
                                                        </a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}"
                                                                title="{{ __('grade.delete') }}">{{__('student.delete')}}
                                                        </button>

                                                    </td>
                                                </tr>
                                                @include('pages.students.delete_img')
                                            @endforeach
                                            </tbody>
                                        </table>
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
