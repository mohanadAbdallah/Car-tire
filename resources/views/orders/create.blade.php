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
            <h2 class="card-title title_process">@lang('app.choose_process')</h2>
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

        <div class="card-body ">
            <form action="{{route('tire.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="text">@lang('app.process')</label>
                                <select class=" form-group select process @error('process') is-invalid @enderror" name="process" aria-label=".form-select-lg example">
                                    <option>Choose Process </option>
                                    <option value="Tire">Tire </option>
                                    <option value="Doors">Doors</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="order_create">


                </div>


                <!-- Basic markers -->
     <div class="text-right" style="margin: 10px">
                    <button type="submit" class="btn btn-primary">@lang('app.save') <i class="icon-paperplane ml-2"></i></button>
                </div>

            </form>
        </div>

    </div>


@section('script')
    <script>


        function tire_create_fun(){
            $.ajax({
                type:'GET',
                url:"/fetch-tire",
                success:function (response) {
                    console.log(response);
                    $('.order_create').html(response.tireComp)
                },
            });
        };

        function order_create_fun() {
            $.ajax({
                type:'GET',
                url:"/fetch-door",
                success:function (response) {
                    console.log(response);
                    $('.order_create').html(response.doorComp)
                },

            });

        };

        $(".customer_id").on("change", function (e) {
            e.preventDefault();
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

        $(".process").on("change", function (e) {
            var process = $('.process').val();

            $('.title_process').html(process);

            if(process == 'Tire'){
                tire_create_fun();

            }else if(process == 'Doors') {
                order_create_fun();
            }

        });

    </script>

@endsection
@endsection



