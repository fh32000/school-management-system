@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ __('class.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ __('class.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @include('layouts.error_alert')

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ __('class.add_class') }}
                    </button>

                    <button type="button" class="button x-small" id="btn_delete_all">
                        {{ __('class.delete_checkbox') }}
                    </button>


                    <br><br>

                    <form action="{{route('filter-classes')}}" method="post">
                        {{ csrf_field() }}
                        <select class="selectpicker" data-style="btn-info" name="grade_id" required
                                onchange="this.form.submit()">
                            <option value="" selected disabled>{{ __('class.search_by_grade') }}</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </form>


                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                           onclick="CheckAll('box1', this)"/></th>
                                <th>#</th>
                                <th>{{ __('class.name_class') }}</th>
                                <th>{{ __('class.name_grade') }}</th>
                                <th>{{ __('class.processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if (isset($details))

                                <?php $classrooms = $details; ?>

                            @endif

                            <?php $i = 0; ?>

                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <?php $i++; ?>
                                    <td><input type="checkbox" value="{{ $classroom->id }}" class="box1"></td>
                                    <td>{{ $i }}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td>{{ $classroom->grade->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $classroom->id }}"
                                                title="{{ __('grade.edit') }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $classroom->id }}"
                                                title="{{ __('grade.delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ __('class.edit_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('classrooms.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{ __('class.name_class') }}
                                                                :</label>
                                                            <input id="name_ar" type="text" name="name_ar"
                                                                   class="form-control"
                                                                   value="{{ $classroom->getTranslation('name', 'ar') }}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $classroom->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="name_en"
                                                                   class="mr-sm-2">{{ __('class.name_class_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $classroom->getTranslation('name', 'en') }}"
                                                                   name="name_en" required>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ __('class.name_grade') }}
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                                id="exampleFormControlSelect1" name="grade_id">
                                                            <option value="{{ $classroom->grade->id }}">
                                                                {{ $classroom->grade->name }}
                                                            </option>
                                                            @foreach ($grades as $grade)
                                                                <option value="{{ $grade->id }}">
                                                                    {{ $grade->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ __('grade.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ __('grade.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ __('class.delete_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('classrooms.destroy', 'test') }}"
                                                      method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ __('class.warning_class') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $classroom->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ __('class.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ __('class.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_class -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ __('class.add_class') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list="classrooms">
                                        <div data-repeater-item>
                                            <div class="row">

                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2">{{ __('class.name_class_ar') }}
                                                        :</label>
                                                    <input class="form-control" type="text" name="name_en"/>
                                                </div>


                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2">{{ __('class.name_class_en') }}
                                                        :</label>
                                                    <input class="form-control" type="text" name="name_ar"/>
                                                </div>


                                                <div class="col">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ __('class.name_grade') }}
                                                        :</label>

                                                    <div class="box">
                                                        <select class="fancyselect" name="grade_id">
                                                            @foreach ($grades as $grade)
                                                                <option
                                                                    value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ __('class.processes') }}
                                                        :</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete
                                                           type="button" value="{{ __('class.delete_row') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button"
                                                   value="{{ __('class.add_row') }}"/>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{ __('grade.close') }}</button>
                                        <button type="submit"
                                                class="btn btn-success">{{ __('grade.submit') }}</button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>
    </div>



    <!-- حذف مجموعة صفوف -->
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ __('class.delete_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('delete-all') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{ __('class.warning_class') }}
                        <input class="text" type="hidden" id="delete_all_id" name="ids" value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('class.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('class.submit') }}</button>
                    </div>
                </form>
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

    <script type="text/javascript">
        $(function () {
            $("#btn_delete_all").click(function () {
                var selected = [];
                $("#datatable input[type=checkbox]:checked").each(function () {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(array);
                }
            });
        });

    </script>




@endsection
