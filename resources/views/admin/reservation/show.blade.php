@extends('layouts.main')


@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h3 class="card-title">@lang('app.reservation_data') <b style="color: #be0a0a">( {{$reservation->reservation_number}})</b></h3>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
        </div>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <div class="card-body">
            </div>
            <div class="datatable-scroll">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card border-left-3 border-left-danger rounded-left-0">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <h6 class="font-weight-semibold">@lang('app.reservation_data') <b style="color: #0a53be">( {{$reservation->reservation_number}})</b></h6>
                                        <ul class="list list-unstyled mb-0">
                                            <li class="font-weight-semibold">@lang('app.name') : <span >{{$reservation->customer->name}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.phone') : <span >{{$reservation->customer->mobile }}-{{$reservation->customer->mobile_code}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.email') : <span >{{$reservation->customer->email}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.date') : <span >{{$reservation->created_at}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.time') : <span >{{$reservation->created_at->diffForHumans()}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.place_delivery') : <span >{{$reservation->delivery_branch }}</span></li>
                                            <li class="font-weight-semibold">@lang('app.delivery_place') : <span >{{$reservation->receiving_branch}}</span></li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card border-left-3 border-left-danger rounded-left-0">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <h6 class="font-weight-semibold">@lang('app.vehicles')</h6>
                                        <ul class="list list-unstyled mb-0">


                                            <li class="font-weight-semibold">@lang('app.description') : <span >{{$reservation->vehicle->description}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.gear') : <span >{{$reservation->vehicle->gear_name}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.body_type') : <span >{{$reservation->vehicle->vehicle_type_name}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.year') : <span >{{$reservation->vehicle->manufacture_history}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.color') : <span >{{$reservation->vehicle->color}}</span></li>
                                            <li class="font-weight-semibold">@lang('app.price') : <span >{{$reservation->vehicle->price}}   @lang('app.ras')</span></li>
                                            <li class="font-weight-semibold">@lang('app.fuel') : <span >{{$reservation->vehicle->fuel}}  </span></li>
                                            <li class="font-weight-semibold">@lang('app.number_seats') : <span >{{$reservation->vehicle->number_seats}}  </span></li>
                                            <li class="font-weight-semibold">@lang('app.brand_vehicle') : <span >{{$reservation->vehicle->brand->name}}  </span></li>
                                            <li class="font-weight-semibold">@lang('app.branch_name') : <span >{{$reservation->vehicle->branch->name}}  </span></li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
