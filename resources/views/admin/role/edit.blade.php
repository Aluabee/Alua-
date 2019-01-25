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

                        <form role="form" action="{{ route('role.update', $role->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Role name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Role" value="{{ $role->name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="name">Posts Permissions</label>
                                    @foreach ($permissions as $permission)
                                        @if ($permission->for == 'post')
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                @foreach ($role->permissions as $role_permit)
                                                    @if ($role_permit->id == $permission->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                                 >{{ $permission->name }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-lg-4">
                                    <label for="name">User Permissions</label>
                                    @foreach ($permissions as $permission)
                                        @if ($permission->for == 'user')
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                    @foreach ($role->permissions as $role_permit)
                                                        @if ($role_permit->id == $permission->id)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                    >{{ $permission->name }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-lg-4">
                                    <label for="name">Other Permissions</label>
                                    @foreach ($permissions as $permission)
                                        @if ($permission->for == 'others')
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                @foreach ($role->permissions as $role_permit)
                                                    @if ($role_permit->id == $permission->id)
                                                        checked
                                                    @endif
                                                 @endforeach
                                                    >{{ $permission->name }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
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