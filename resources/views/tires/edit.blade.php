@extends('layouts.main')
@section('title')
    @lang('app.createCity')
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

        #searchInput:focus {
            border-color: #4d90fe;
        }
    </style>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h2 class="card-title">@lang('app.tires')</h2>
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
            <form action="{{route('tire.update',$tire->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text">@lang('app.type')</label>
                            <select class=" form-group select " name="type" aria-label=".form-select-lg example">
                                <option>Choose Tire Type </option>
                                <option value="1" {{$tire->type==1 ? 'selected':''}}>Summer </option>
                                <option value="2" {{$tire->type==2 ? 'selected':''}}>Winter </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.customer')</label>
                            <select class=" form-group select customer_id" name="customer_id"  aria-label=".form-select-lg example">
                                <option> Choose customer </option>
                                @foreach($customer as $item)
                                    <option value="{{$item->id}}" {{$item->id == $tire->car->customer->id ? 'selected':''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.car')</label>
                            <select name="car_id" id="car_id" class="form-control">
                                <option value="">Firstly, Choose Customer</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row mt-4">

                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.manufacture_year')</label>
                            <input type="text"  name="manufacture_year" class="form-control" value="{{$tire->manufacture_year}}" placeholder="@lang('app.manufacture_year')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.rim_type')</label>
                            <input type="text"  name="rim_type" class="form-control" value="{{$tire->rim_type}}" placeholder="@lang('app.rim_type')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text">@lang('app.shelf')</label>
                            <select class=" form-group select " name="shelf_id"  aria-label=".form-select-lg example">
                                <option> Choose Shelf Number </option>
                            @foreach($shelf as $item)
                                    <option value="{{$item->status}}" {{$item->id==$tire->shelf_id? 'selected':''}} {{$item->status==0 || $item->status==2  ? 'disabled':''}} >{{$item->shelf_number}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.manufacture_company')</label>
                            <input type="text"  name="manufacture_company" value="{{$tire->manufacture_company}}" class="form-control" placeholder="@lang('app.manufacture_company')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.size')</label>
                            <input type="text"  name="size" value="{{$tire->size}}" class="form-control" placeholder="@lang('app.size')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.malfunction_degree')</label>
                            <input type="number" id="tentacles"
                                   min="0.00" max="10.00"
                                   name="malfunction_degree" value="{{$tire->malfunction_degree}}" class="form-control" placeholder="@lang('app.malfunction_degree')">
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-9">
                        <div class=" form-group">
                            <label for="exampleFormControlTextarea1">@lang('app.notes')</label>
                            <textarea  name="notes" id="exampleFormControlTextarea1" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Basic markers -->


                <div class="text-right" style="margin: 10px">
                    <button type="submit" class="btn btn-primary">@lang('app.update') <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>


@section('script')
    <script>
        $(".customer_id").on("change", function (e) {
            var customer_id = $(this).val();
            $('#car_id').html('<option value="">Firstly, Choose Customer</option>');
            $.ajax({
                type: 'get',
                dataType: "json",
                url: '{{url('customers/cars')}}/' + customer_id,
                data: {'car_id': '{{old('car_id') ?? ''}}'},
                cache: "false",
                success: function (data) {
                    $('#car_id').html(data.options);
                }, error: function (data) {
                    if (customer_id === '') {
                        $('#car_id').html('<option value="">Firstly, Choose Customer</option>');
                    } else {
                        $('#car_id').html('<option value="">There is no Cars</option>');
                    }
                }
            });
            return false;
        });
        $(".customer_id").change();

    </script>

@endsection
@endsection



