<div class="row mt-4">

<div class="col-md-3">
    <div class="form-group">
        <label class="text">@lang('app.tire')</label>
        <select class="form-control select @error('tire') is-invalid @enderror" name="tire_id" aria-label=".form-select-lg example">
            <option>Choose Tire </option>
            <option>Summer Rim 152-1998 sentry </option>
            <option>winter Ripple 189-2002 ventral </option>
            <option>Summer fancy 200-1900 hos </option>
        </select>
    </div>
</div>

<div class="col-md-3">
    <div class=" form-group">
        <label class="text">@lang('app.customer')</label>
        <select class="form-control select customer_id @error('customer')is-invalid @enderror" name="customer_id"  aria-label=".form-select-lg example">
            <option value=""> Choose customer </option>
            @foreach($customer as $item)
                <option value="{{$item->id}}" {{old('customer_id')==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach
        </select>
    </div>
</div>
    <div class="col-md-3">
    <div class=" form-group">
        <label class="text">@lang('app.price')</label>
        <input class="form-control" type="text" name="price">
    </div>
</div>
</div>
<div class="row mt-4">
    <div class="col-md-3">
        <div class=" form-group">
            <label class="text">@lang('app.car')</label>
            <select name="car_id" id="car_id" class="form-control @error('car')is-invalid @enderror">
                <option value="">Firstly, Choose Customer</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class=" form-group">
            <label class="text ">@lang('app.malfunction_degree')</label>
            <select class="form-control malfunction_degree" name="malfunction_degree">
                @for($i = 0 ;$i<=10 ; ++$i)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="text">@lang('app.shelf')</label>
            <select class=" form-group form-control select  @error('shelf')is-invalid @enderror" name="shelf_id" aria-label=".form-select-lg example">
                <option> Choose Shelf Number </option>
                @foreach($shelf as $item)
                    <option value="{{$item->id}}" {{$item->status==0 || $item->status==2 ? 'disabled':''}}>{{$item->shelf_number}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row mt-4 ">
    <div class="col-md-9 checkBox1">
    </div>
    <div class="col-md-9 input-date d-none">

        <label>please choose when you want to buy .</label>
        <input class="form-control" type="date">

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

<script>
    $(".malfunction_degree").on("change",function(e){

        var malfunction_degree = $('.malfunction_degree').val();

        if(malfunction_degree >= 3){

            $('.checkBox1').html('<div class="alert alert-danger" role="alert">' +
                '  <h4 class="alert-heading">OOOps!</h4>' +
                '<p>It Seam that the degree of the malfunction of your Tire is large, and it may cause critical danger if you dont change it ! .</p>' +
                '<hr>' +
                '<div class="form-check">' +
                '<input class="form-check-label" type="checkbox" id="newtire" value=""> ' +
                '  <label for="newtire" class="form-check-label"> Buy New Tire from our store ? </label>' +
                '</div>');

            $("#newtire").on("change",function (e){
                e.preventDefault();
                if($(this).prop('checked')){
                    $(".input-date").removeClass('d-none');

                }else {
                    $(".input-date").addClass('d-none');

                }
            });
        }else {
            $('.checkBox1').html("");
            $(".input-date").addClass('d-none');
        }
    });
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
                }
                else {
                    $('#car_id').html('<option value="">There is no Cars</option>');
                }
            }
        });
        return false;
    });
    $(".customer_id").change();
</script>
