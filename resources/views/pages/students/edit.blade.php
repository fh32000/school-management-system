@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{__('student.student_edit')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{__('student.student_edit')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @include('layouts.error_alert')

                    <form action="{{route('students.update','test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('student.personal_information')}}</h6>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('student.name_ar')}} : <span class="text-danger">*</span></label>
                                    <input value="{{$student->getTranslation('name','ar')}}" type="text" name="name_ar"
                                           class="form-control">
                                    <input type="hidden" name="id" value="{{$student->id}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('student.name_en')}} : <span class="text-danger">*</span></label>
                                    <input value="{{$student->getTranslation('name','en')}}" class="form-control"
                                           name="name_en" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('student.email')}} : </label>
                                    <input type="email" value="{{ $student->email }}" name="email" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('student.password')}} :</label>
                                    <input value="" type="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{__('student.gender')}} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>{{__('main.choose')}}...</option>
                                        @foreach($genders as $gender)
                                            <option
                                                value="{{$gender->id}}" {{$gender->id == $student->gender_id ? 'selected' : ""}}>{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{__('student.nationality')}} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationality_id">
                                        <option selected disabled>{{__('main.choose')}}...</option>
                                        @foreach($nationalities as $nationality)
                                            <option
                                                value="{{ $nationality->id }}" {{$nationality->id == $student->nationality_id ? 'selected' : ""}}>{{ $nationality->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">{{__('student.blood_type')}} : </label>
                                    <select class="custom-select mr-sm-2" name="blood_id">
                                        <option selected disabled>{{__('main.choose')}}...</option>
                                        @foreach($blood_types as $blood_type)
                                            <option
                                                value="{{ $blood_type->id }}" {{$blood_type->id == $student->blood_type_id ? 'selected' : ""}}>{{ $blood_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{__('student.birthday')}} :</label>
                                    <input class="form-control" type="text" value="{{$student->birthday}}"
                                           id="datepicker-action" name="birthday" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>

                        </div>

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('student.student_information')}}</h6>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{__('student.grade')}} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>{{__('main.choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option
                                                value="{{ $grade->id }}" {{$grade->id == $student->grade_id ? 'selected' : ""}}>{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{__('student.classrooms')}} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">
                                        <option
                                            value="{{$student->classroom_id}}">{{$student->classroom->name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{__('student.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                        <option value="{{$student->section_id}}"> {{$student->section->name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{__('student.guardian')}} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="guardian_id">
                                        <option selected disabled>{{__('main.choose')}}...</option>
                                        @foreach($guardians as $guardian)
                                            <option
                                                value="{{ $guardian->id }}" {{ $guardian->id == $student->guardian_id ? 'selected' : ""}}>{{ $guardian->father_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{__('student.academic_year')}} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{__('main.choose')}}...</option>
                                        @php
                                            $current_year = date("Y")
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option
                                                value="{{ $year}}" {{$year == $student->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">{{__('student.submit')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('get-classrooms') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option selected disabled >{{__('main.choose')}}...</option>');
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('get-sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
