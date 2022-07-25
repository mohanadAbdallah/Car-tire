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
            <h2 class="card-title">@lang('app.cars')</h2>
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
            <form action="{{route('car.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >@lang('app.car_number')</label>
                            <input type="text"  name="car_number" class="form-control" placeholder="@lang('app.car_number')">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                        </div>
                    </div>
                    <div class="col-md-2 mt-4">
                        <div class="form-group">
                            <a class="btn btn-success" data-toggle="collapse" href="#collapse-link-collapsed" aria-expanded="false">
                                @lang('app.check_validity')
                            </a>
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


                <div class="mt-2 row">
                    <div class="col-md-3">
                        <label>@lang('app.customer')</label>
                        <div class=" form-group">
                            <select class=" form-group select select-search" name="customer_id" aria-label=".form-select-lg example">
                               @foreach($customer as $item)
                                   <option value="{{$item->id}}">{{$item->name_en}}</option>
                                @endforeach
                            </select>
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

@section('script')



    <script src="{{ asset('public/plugins/timedropper/timedropper.min.js') }}"></script>
    <script>
        $('#from_time').timeDropper();
        $('#to_time').timeDropper();

    </script>

    <script>
        function initMap() {

            var lat = 31.37946287959819;
            var lng =  34.32007235515173;

            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: lat, lng: lng},
                zoom: 10
            });
            marker = new google.maps.Marker({
                position: {lat: lat, lng: lng},
                map: map
            });

            marker.setIcon(({
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));
            map.setZoom(17);

            google.maps.event.addListener(map, 'click', function (event) {
                $("#company_lat").val(event.latLng.lat());
                $("#company_long").val(event.latLng.lng());

                if (marker) {
                    marker.setPosition(event.latLng);
                } else {
                    marker = new google.maps.Marker({
                        position: event.latLng,
                        map: map
                    });
                }
            });

            var input = document.getElementById('searchInput');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
                marker.setIcon(({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                infowindow.open(map, marker);

                //Location details
                $("#company_lat").val(place.geometry.location.lat());
                $("#company_long").val(place.geometry.location.lng());
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPQwgQSGCkZkWxv7PjbusEs9Yg9_lFjCk&libraries=places&callback=initMap"
            async defer></script>

@endsection
@endsection




