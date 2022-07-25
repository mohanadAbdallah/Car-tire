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
            <form action="{{route('tire.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text">@lang('app.type')</label>
                            <select class=" form-group select @error('type') is-invalid @enderror" name="type" aria-label=".form-select-lg example">
                                <option>Choose Tire Type </option>
                                <option value="1">Summer </option>
                                <option value="2">Winter </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.manufacture_year')</label>
                            <input type="text"  name="manufacture_year" class="form-control @error('manufacture_year')is-invalid @enderror" placeholder="@lang('app.manufacture_year')">
                        </div>
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.manufacture_company')</label>
                            <input type="text"  name="manufacture_company" class="form-control  @error('manufacture_company')is-invalid @enderror" placeholder="@lang('app.manufacture_company')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class=" form-group">
                            <label class="text">@lang('app.rim_type')</label>
                            <input type="text"  name="rim_type" class="form-control @error('rim_type')is-invalid @enderror" placeholder="@lang('app.rim_type')">
                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class=" form-group">
                            <label class="text">@lang('app.size')</label>

                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" name="size1" class="form-control @error('size1')is-invalid @enderror" >
                                </div>
:
                                <div class="col-sm-3">
                                    <input type="text" name="size2" class="form-control @error('size2')is-invalid @enderror" >
                                </div>
:
                                <div class="col-sm-3">
                                    <input type="text" name="size3" class="form-control @error('size3')is-invalid @enderror" >
                                </div>
                            </div>

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
                    <button type="submit" class="btn btn-primary">@lang('app.save') <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>

@endsection



