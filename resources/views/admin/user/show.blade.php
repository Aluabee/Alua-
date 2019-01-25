
@extends('admin.layouts.app')

@section('headSection')

    <link rel="stylesheet" href="{{ asset('admin//bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css ') }}">

@endsection


@section('main-content')

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>
                    @if (Auth::guard('admin')->user()->can('users.update'))
                    <a class="col-lg-offset-5 btn btn-success" href="{{ route('user.create') }}">Add new user</a>
                    @endif
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Users</h3>
                        </div>
                        @include('layouts.message')
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>User name</th>
                                    <th>Assigned Role</th>
                                    @if (Auth::guard('admin')->user()->can('users.update'))
                                    <th>Status</th>
                                    <th>Edit</th>
                                    @endif
                                    @if (Auth::guard('admin')->user()->can('users.delete'))
                                    <th>Delete</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </td>
                                        @if (Auth::guard('admin')->user()->can('users.update'))
                                        <td>{{ $user->status? 'Active':'Not active' }}</td>
                                        <td><a href="{{ route('user.edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                        @endif
                                        @if (Auth::guard('admin')->user()->can('users.delete'))
                                        <form id="delete-form-{{$user->id}}" method="post" action="{{ route('user.destroy', $user->id) }}" style="display: none">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <td><a href="" onclick="if (confirm('Are you sure?')){
                                                    event.preventDefault();document.getElementById('delete-form-{{$user->id}}').submit();
                                                    }
                                                    else {event.preventDefault();}">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>User name</th>
                                    <th>Assigned Role</th>
                                    @if (Auth::guard('admin')->user()->can('users.update'))
                                    <th>Status</th>
                                    <th>Edit</th>
                                    @endif
                                    @if (Auth::guard('admin')->user()->can('users.delete'))
                                    <th>Delete</th>
                                    @endif
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('footerSection')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

@endsection