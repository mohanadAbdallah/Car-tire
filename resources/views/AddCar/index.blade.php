@extends('layouts.main')
@section('title')
    @lang('app.add_car')
@endsection

@section('content')
    <style>
        #map {
            width: 100%;
            height: 400px;
        }

        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #searchInput {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 50%;
        }
        .grey_color {
             color: #ff0000;
             font-size: 14px;
         }

        #searchInput:focus {
            border-color: #4d90fe;
        }
    </style>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h2 class="card-title">@lang('app.add_car')</h2>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <hr>
        @include('includes.messages')
        <div class="card-body">
            <form action="{{route('add-car.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-8 form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="text">@lang('app.customer')</label>
                                <select class="form-control select-search select customer_select customer_id @error('customer')is-invalid @enderror" name="customer_id"  aria-label=".form-select-lg example">
                                    <option value="null" disabled="disabled" selected="selected"> Choose customer </option>
                                    @foreach($customer as $item)
                                        <option value="{{$item->id}}" {{old('customer_id')==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                 <div class="form-group mt-4 ">
                                    <button class=" btn btn-primary legitRipple btn-sm" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span><a href="{{route('customers.create')}}" style="color: #ffffff">@lang('app.add_customer')</a> <i class="icon-googleplus5"></i></span></button>
                            </div>
                            </div>
                            <div class="col-md-4">
                                <label class="text">@lang('app.shelf')</label>
                                <select class=" form-group select-search form-control shelf_select  @error('shelf')is-invalid @enderror" name="shelf_id" aria-label=".form-select-lg example">
                                    <option value="null" disabled="disabled" selected="selected"> Choose Shelf Number </option>
                                    @foreach($shelf as $item)
                                        <option value="{{$item->id}}" {{$item->status==0 || $item->status==2 ? 'disabled':''}}>{{$item->shelf_number}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mt-4 ">
                                    <button class="btn btn-primary legitRipple btn-sm " tabindex="0" aria-controls="DataTables_Table_1" type="button"><span><a href="{{route('shelf.create')}}" style="color: #ffffff">@lang('Add New Shelf')</a> <i class="icon-googleplus5"></i></span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text">@lang('app.car_number')</label>
                                <input type="text" class="form-control" placeholder="@lang('app.car_number')">
                            </div>
                        </div>
                            <div class="col-md-2 mt-4">
                                <div class="form-group">
                                    <a class="btn btn-success" data-toggle="collapse" href="#collapse-link-collapsed" aria-expanded="false">
                                        @lang('app.check_validity')
                                    </a>
                                </div>
                            </div>

                        <div class="col-md-4">
                            <label class="text">@lang('app.tire')</label>
                            <select class=" form-group select-search form-control shelf_select  @error('tire')is-invalid @enderror" name="shelf_id" aria-label=".form-select-lg example">
                                <option value="null" disabled="disabled" selected="selected"> Choose Tire Type </option>
                                <option>Summer Rim 152-1998 sentry </option>
                                <option>winter Ripple 189-2002 ventral </option>
                                <option>Summer fancy 200-1900 hos </option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mt-4 ">
                                <button class="btn btn-primary legitRipple btn-sm " tabindex="0" aria-controls="DataTables_Table_1" type="button"><span><a href="{{route('tire.create')}}" style="color: #ffffff">@lang('Add New Tire')</a> <i class="icon-googleplus5"></i></span></button>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="collapse" id="collapse-link-collapsed" style="">
                            <div class="row mt-4 ml-1 mb-4">
                                <div class="col-md-4">
                                    <label class="text-muted">@lang('app.car_type')</label>
                                    <input type="text"  name="type" class="form-control" placeholder="@lang('app.car_type')">
                                </div>
                                <div class="col-md-4">
                                    <label class="text-muted">@lang('app.vehicle_type')</label>
                                    <input type="text"  name="vehicle_type" class="form-control" placeholder="@lang('app.vehicle_type')">
                                </div>
                                <div class="col-md-4">
                                    <label class="text-muted">@lang('app.model')</label>
                                    <input type="text"  name="model" class="form-control" placeholder="@lang('app.model')">
                                </div>
                            </div>
                            <div class="row mt-4 ml-1 mb-4">
                                <div class="col-md-4">
                                    <label class="text-muted">@lang('app.color')</label>
                                    <input type="text"  name="color" class="form-control" placeholder="@lang('app.color')">
                                </div>
                                <div class="col-md-4">
                                    <label class="text-muted">@lang('app.tire_size')</label>
                                    <input type="text"  name="tire_size" class="form-control" placeholder="@lang('app.tire_size')">
                                </div>
                                <div class="col-md-4">
                                    <label class="text-muted">@lang('app.fuel_type')</label>
                                    <input type="text"  name="fuel_type" class="form-control" placeholder="@lang('app.fuel_type')">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="card-footer mt-5">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <div class="text-right">
                                <button type="submit" class="btn btn-secondary">@lang('app.save') <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>




@section('script')
    <script>
        $(".customer_name").on('input',function (e){
            var customer_name = $('.customer_name').val();
            if(customer_name == "mo"){
                fetch_customer();
            }
            else {
                $('.customer_data').html("");
            }

        });

        $(".shelf_select").on('change',function (e){
            var shelf_select = $('.shelf_select').val();
            if(shelf_select === "create"){
                    window.location.href = "{{ route('shelf.create')}}";
                }
            else {

            }

        });
        $(".customer_select").on('change',function (e){
            var customer_select = $('.customer_select').val();
            if(customer_select === "create"){
                    window.location.href = "{{ route('customers.create')}}";
                }
            else {

            }

        });

       function fetch_customer(){
            $.ajax({
                type:'GET',
                url:"/fetch-customer",
                success:function (response) {
                    console.log(response);
                    $('.customer_data').html(response.customerComp)
                },
            })  ;

        }
</script>
@endsection
@endsection
