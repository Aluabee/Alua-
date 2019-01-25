@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Users</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        @include('layouts.message')

                        <form role="form" action="{{ route('user.update', $user->id ) }}" method="post">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">User name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                           value="@if( old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                           value="@if( old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
                                           value="@if( old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif">
                                </div>


                                <div class="form-group">
                                    <label for="confirm_password">Status</label>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="status" @if( (old('status') == 1) || $user->status == 1)
                                            checked
                                                      @endif value="1">Status</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Roles:</label>
                                    @foreach($roles as $role)
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="role[] " value="{{ $role->id }}"
                                                @foreach($user->roles as $user_role)
                                                    @if($user_role->id == $role->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                                >{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
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
