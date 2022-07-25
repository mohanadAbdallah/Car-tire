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
                <option> Choose customer </option>
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
