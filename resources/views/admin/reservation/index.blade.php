
@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"> @lang('app.reservations')</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
        </div>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">

            <div class="datatable-scroll">
                <table class="table datatable-reorder dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                    <tr role="row" class="table-active">
                        <th class=" text-center  sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('app.id')</th>
                        <th class="text-center  sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="Last Name: activate to sort column ascending">@lang('app.name')</th>
                        <th class="text-center  sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="Last Name: activate to sort column ascending">@lang('app.mobile')</th>
                        <th class=" text-center  sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="Last Name: activate to sort column ascending" style="width: 100px">@lang('app.status')</th>
                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="text-align:center" >@lang('app.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservation as $item)
                        <tr role="row" class="odd">
                            <td class="text-center fs-3">{{$item->reservation_number}}</td>
                            <td class="text-center fs-3">{{$item->customer->name ?? '--'}}</td>
                            <td class="text-center fs-3">{{$item->customer->mobile ?? '--'}}</td>

                            <td class="text-center fs-3"><span class="{{$item->status_color}} ">{{$item->status_name ?? '--'}} </span></td>
                            <td class="text-center" >
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="badge-pill list-icons-item" data-toggle="dropdown">
                                            <span class="badge badge-warning badge-pill">   <i class="icon-menu9"></i></span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="{{ url(route('status.reservation' , ['reservation_id' => $item->id , 'status_id' => 0]))}}" class="dropdown-item">@lang('app.booked_up')</a>
                                            <a href="{{ url(route('status.reservation' , ['reservation_id' => $item->id , 'status_id' => 1]))}}" class="dropdown-item">@lang('app.cancel')</a>
                                            <a href="{{ url(route('status.reservation' , ['reservation_id' => $item->id , 'status_id' => 2]))}}" class="dropdown-item">@lang('app.complete')</a>
                                            <a href="{{ url(route('status.reservation' , ['reservation_id' => $item->id , 'status_id' => 3]))}}" class="dropdown-item">@lang('app.underProcedure')</a>
                                            <a href="{{ url(route('status.reservation' , ['reservation_id' => $item->id , 'status_id' => 4]))}}" class="dropdown-item">@lang('app.accepted')</a>
                                            <a href="{{ url(route('status.reservation' , ['reservation_id' => $item->id , 'status_id' => 5]))}}" class="dropdown-item">@lang('app.delivered')</a>



                                        </div>
                                    </div>
                                </div>

                                <div class="list-icons">
                                    <a href="{{route('reservations.edit',$item->id)}}" class="list-icons-item">
                                        <span class="badge badge-primary badge-pill">  <i class="icon-pencil7"></i></span>

                                    </a>
                                    <a class="list-icons-item" data-placement="top" title="Delete"
                                       href="javascript:void(0)"
                                       onclick="delete_item_orders('{{$item->id}}','{{$item->sender_naem}}')"
                                       data-toggle="modal"
                                       data-target="#delete_item_modal">
                                        <span class="badge badge-danger badge-pill"><i class=" icon-trash"></i></span>

                                    </a>
                                    <a href="{{route('reservations.show',$item->id)}}" class="list-icons-item">
                                        <span class="badge badge-success badge-pill"><i class="icon-cog6"></i></span>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="d-flex justify-content-end">

                    {{ $reservation->appends(Request::only('reservation_number'))->links('pagination::bootstrap-4') }}


                </div>
                <hr>
            </div>

        </div>
        <div id="delete_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="delete_form" method="post" action="">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input name="id" id="item_id" class="form-control" type="hidden">
                        <input name="_method" type="hidden" value="DELETE">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">@lang('app.delete')<span id="del_label_title"></span>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <h4>@lang('app.confirm_delete_item')</h4>
                            <p id="grup_title"></p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">@lang('app.close')</button>
                            <button type="submit" class="btn btn-danger waves-effect" id="delete_url">@lang('app.delete')</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
    <script>
        function delete_item_orders(id, title) {
            $('#item_id').val(id);
            var url = "{{url('ar/reservations')}}/" + id;
            $('#delete_form').attr('action', url);
            $('#grup_title').text(title);
            $('#del_label_title').html(title);
        }
    </script>
@endsection
