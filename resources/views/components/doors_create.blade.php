<div class="row mt-4">

    <div class="col-md-3">
        <div class="form-group">
            <label class="text">@lang('app.door')</label>
            <select class="form-control select @error('door') is-invalid @enderror" name="door" aria-label=".form-select-lg example">
                <option>Choose door </option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class=" form-group">
            <label class="text">@lang('app.customer')</label>
            <select class="form-control select customer_id @error('customer')is-invalid @enderror" name="customer_id"  aria-label=".form-select-lg example">
                <option> Choose customer </option>
                @foreach($customer as $item)
                    <option value="{{$item->id}}" {{old('customer_id')==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </select>
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

</script>
