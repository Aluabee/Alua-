@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Titles</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        @include('layouts.message')

                        <form role="form" action="{{ route('role.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Role name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Role">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Post permissions</label>
                                @foreach($permissions as $permission)
                                    @if($permission->for == 'post')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-lg-6">
                                <label for="name">User permissions</label>
                                @foreach($permissions as $permission)
                                    @if($permission->for == 'user')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-lg-6">
                                <label for="name">Other permissions</label>
                                @foreach($permissions as $permission)
                                    @if($permission->for == 'others')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('role.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection