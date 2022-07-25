@extends('layouts.main')


@section('content')

<style>
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #a585ca;
        border-color: #2196f3;
    }
</style>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h3 class="card-title">@lang('app.addrole')</h3>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" href="{{ route('roles.index') }}"><li class="icon-backward2"></li></a>
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        @include('includes.messages')

        <div class="card-header border-0 pt-5">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="post" action="{{route('roles.store')}}">

@csrf
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>@lang('app.name') @lang('app.role')</strong>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <br/>
                        <div class="row">
                            <div class="col-sm-3" style="margin-top: 20px;">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.users')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="user")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-sm-3" style="margin-top: 20px;">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.car')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="car")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-3" style="margin-top: 20px;">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.shelves')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="shelf")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-3" style="margin-top: 20px;">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.orders')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="orders")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-3" style="margin-top: 20px;">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.company')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="company")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-3" style="margin-top: 20px;">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.company_links')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="company_links")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-3" style="margin-top: 20px;">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.tires')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="tire")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-sm-3" style="margin-top: 20px;">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.role')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="role")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>


                            <div class="col-sm-3" style="margin-top: 20px;">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.customers')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="customer")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
{{--                            <div class="col-sm-3" style="margin-top: 20px;">--}}
{{--                                <div class="list-group">--}}
{{--                                    <button type="button" class="list-group-item list-group-item-action active">--}}
{{--                                        <h5>@lang('app.notifications')</h5>--}}
{{--                                    </button>--}}

{{--                                    @foreach($permission as $value)--}}
{{--                                        @if($value->parent=="notifications")--}}
{{--                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">--}}
{{--                                                <div class="form-check mb-0">--}}
{{--                                                    <label class="form-check-label">--}}
{{--                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">--}}
{{--                                                        {{$value->name_key }}--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
{{--                                            </button>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-sm-3" style="margin-top: 20px;">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.dashboard')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="dashboard")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>


                            <div class="col-sm-3" style="margin-top: 20px;">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        <h5>@lang('app.settings')</h5>
                                    </button>

                                    @foreach($permission as $value)
                                        @if($value->parent=="settings")
                                            <button type="button" for="ch1" class="list-group-item list-group-item-action btn-ch">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label">
                                                        <input class="form-input-styled" type="checkbox" name="permission[]"  value="{{$value->id}}">
                                                        {{$value->name_key }}
                                                    </label>
                                                </div>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">@lang('app.save')</button>
                </div>
            </div>
            </form>
        </div>

    </div>

@endsection





