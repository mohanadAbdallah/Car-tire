@extends('layouts.main')


@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">

            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

                <div class="card-header header-elements-inline">
                    <h3 class="card-title">{{$customer->name_en}}</h3>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" href="{{ route('customers.index') }}"><li class="icon-backward2"></li></a>
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body p-9">
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.name')</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-dark">{{ $customer->name_en }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.email')</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6">  {{ $customer->email }}</span>
                        </div>
                    </div>

                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.phone')
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bolder fs-6 me-2" >{{ $customer->mobile }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.address')
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bolder fs-6 me-2" >{{ $customer->address }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
