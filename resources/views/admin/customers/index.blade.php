@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h2 class="card-title"><b>@lang('app.customers')</b></h2>
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
            <div class="datatable-header">
                   @can('add_customer')
                    <div class="dt-buttons">
                        <button class=" rounded-round dt-button buttons-pdf buttons-html5 btn bg-primary-400" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span><a href="{{route('customers.create')}}" style="color: #ffffff">@lang('app.add_customer')</a> <i class="icon-googleplus5"></i></span></button>
                    </div>
                @endcan
            </div>

            <div class="datatable-scroll">
                                <table class="table datatable-reorder dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>


                                    <tr role="row" class="table-active">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('app.id')</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="Last Name: activate to sort column ascending">@lang('app.name')</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.email')</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.phone')</th>
                                        <th  hidden class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.type_account')</th>
                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customer as $item)
                                        <tr role="row" class="odd">
                                            <td class="text-center">{{++$i}}</td>
                                            <td class="text-center">{{$item->name}}</td>
                                            <td class="text-center">{{$item->email}}</td>
                                            <td class="text-center">{{$item->mobile}}</td>
                                            <td hidden></td>
                                            <td class="text-center" >
                                                <div class="list-icons">
                                                    @can('edit_customer')
                                                    <a href="{{route('customers.edit',$item->id)}}" class="list-icons-item">
                                                        <span class="badge badge-primary badge-pill">  <i class="icon-pencil7"></i></span>
                                                    </a>
                                                    @endcan
                                                        @can('delete_customer')
                                                    <a class="list-icons-item" data-placement="top" title="Delete"
                                                       href="javascript:void(0)"
                                                       onclick="delete_item_customers('{{$item->id}}','{{$item->sender_naem}}')"
                                                       data-toggle="modal"
                                                       data-target="#delete_item_modal">
                                                        <span class="badge badge-danger badge-pill"><i class=" icon-trash"></i></span>

                                                    </a>
                                                        @endcan

                                                        @can('view_customer')
                                                    <a href="{{route('customers.show',$item->id)}}" class="list-icons-item">
                                                        <span class="badge badge-success badge-pill"><i class="icon-cog6"></i></span>
                                                    </a>
                                                        @endcan

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>


            </div>
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
    <script>
        function delete_item_customers(id, title) {
            $('#item_id').val(id);
            var url = "{{url('customers')}}/" + id;
            $('#delete_form').attr('action', url);
            $('#grup_title').text(title);
            $('#del_label_title').html(title);
        }
    </script>
@endsection
