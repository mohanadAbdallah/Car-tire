@extends('layouts.main')
@section('title')
    @lang('app.add_customer')
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
            <h2 class="card-title">@lang('app.add_customer')</h2>
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
            <form action="{{route('customers.update',$customers->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="mb-8 form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('app.name') (AR)</label>
                        <input type="text" class="form-control rounded-round" placeholder="@lang('app.name') (AR)" name="name_ar" value="{{$customers->name_ar}}"/>
                    </div>
                    <div class="mb-10 form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('app.name') (EN)</label>
                        <input type="text" class="form-control rounded-round" placeholder="@lang('app.name') (EN)" name="name_en" value="{{$customers->name_en}}"/>
                    </div>
                    <div class="mb-10 form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('app.email')</label>
                        <input type="text" class="form-control rounded-round" placeholder=" @lang('app.email')" name="email" value="{{$customers->email}}"/>
                    </div>
                    <div class="mb-10 form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('app.mobile')</label>
                        <input type="text" class="form-control rounded-round" placeholder=" @lang('app.mobile')" name="mobile" value="{{$customers->mobile}}"/>
                    </div>

                    <div class="mb-10 form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('app.address')</label>
                        <input type="text" class="form-control rounded-round" placeholder="@lang('app.address')" name="address" value="{{$customers->address}}"/>
                    </div>

                    {{--                    <div class="form-group ">--}}
                    {{--                        <label class="col-form-label col-lg-2">@lang('app.cities')</label>--}}
                    {{--                        <div class="col-lg-16">--}}
                    {{--                            <select class="form-control" name="city_id">--}}
                    {{--                                @foreach($city as $item)--}}
                    {{--                                    <option value="{{$item->id}}">{{$item->name}}</option>--}}
                    {{--                                @endforeach--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="form-group">--}}
                    {{--                        <label for="exampleFormControlInput1" class="required form-label">@lang('app.role')</label>--}}
                    {{--                        <select name="roles[]" multiple="multiple" data-placeholder="Select a State..." class="form-control form-control-lg select" data-container-css-class="select-lg" data-fouc>--}}
                    {{--                            @foreach($roles as $item)--}}
                    {{--                                <option>{{$item}}</option>--}}
                    {{--                            @endforeach--}}

                    {{--                        </select>--}}
                    {{--                    </div>--}}


                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">@lang('app.save') <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection
