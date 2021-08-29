<!--main cards widgets -->
<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">{{__('Total')}} {{__('Students')}}</p>
                        <h4>{{$data_collect['students']['count']}}</h4>
                        <p>{{__('Registered This Month')}}</p>
                        <h6>{{$data_collect['students']['count_this_month']}}</h6>

                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                    {{__('Growth Rate')}} => {{$data_collect['students']['growth']}} %
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">{{__('Sections')}}</p>
                        <h4>{{$data_collect['sections']['count']}}</h4>
                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> {{__('Total')}} {{__('Sections')}}
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                                    </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">{{__('Receipts')}}</p>
                        <h4>@convert($data_collect['receipts']['count_this_week']) {{__("RY")}}</h4>
                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fa fa-calendar mr-1" aria-hidden="true"></i> {{__('Receipts')}} {{__('This Week')}}
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                                    </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">{{__('Guardians')}}</p>
                        <h4>{{$data_collect['guardians']['count']}}</h4>
                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i>
                </p>
            </div>
        </div>
    </div>
</div>
